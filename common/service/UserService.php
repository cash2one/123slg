<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/29
 * Time: 13:23
 */

namespace common\service;

use common\models\CpsLog;
use common\models\CpsMember;
use common\models\GameLoginLog;
use common\models\TgGameInfo;
use common\models\UserInfo;
use common\utils\Cookie;
use Yii;
use common\models\User;
use common\utils\Exption;
use yii\data\Pagination;

class UserService
{
    private static $instance;
    private $_user;
    private $_error;

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    /**
     * @param $username
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getUserByName($username)
    {
        return User::find()->select([User::tableName() . '.*', UserInfo::tableName() . '.real_name', UserInfo::tableName() . '.idCard', UserInfo::tableName() . '.isbind', UserInfo::tableName() . '.isAuth', UserInfo::tableName() . '.reg_email', UserInfo::tableName() . '.btime'])->leftJoin(UserInfo::tableName(), UserInfo::tableName() . '.`uid`=' . User::tableName() . '.uid')->where([User::tableName() . '.username' => $username])->asArray()->one();
    }

    public function getUserById($uid)
    {
        return User::find()->select([User::tableName() . '.*', UserInfo::tableName() . '.real_name', UserInfo::tableName() . '.idCard', UserInfo::tableName() . '.isbind', UserInfo::tableName() . '.isAuth', UserInfo::tableName() . '.reg_email', UserInfo::tableName() . '.btime'])->leftJoin(UserInfo::tableName(), UserInfo::tableName() . '.`uid`=' . User::tableName() . '.uid')->where([User::tableName() . '.uid' => $uid])->asArray()->one();
    }

    /**
     * @param $username
     * @param $password
     */
    public function login($username, $password)
    {
        $this->_user = $this->getUserByName($username);
        if (User::validatePassword($this->_user, $password)) {
            $this->upLoginInfo();
            $this->setLoginSession();
            $this->setLoginCookie();
            $this->getLastGameCookie();
            $this->addError(Exption::USER_LOGIN_SUCCESS);
        } else {
            $this->addError(Exption::USER_LOGIN_ERROR, '用户名或密码错误');
        }
    }

    /**
     * 更新用户登录信息
     * @throws \yii\db\Exception
     */
    private function upLoginInfo()
    {
        Yii::$app->db->createCommand("UPDATE `user` SET `login_times`=`login_times`+1, `last_time`='" . time() . "', `last_ip`='" . Yii::$app->request->getUserIP() . "' WHERE uid='" . $this->_user['uid'] . "'")->execute();
    }

    public function addError($error, $error_msg = '')
    {
        $this->_error = [
            'error' => $error,
            'error_msg' => $error_msg
        ];
    }

    public function getError()
    {
        return $this->_error;
    }

    private function setLoginSession()
    {
        Yii::$app->session->open();
        $_SESSION['user'] = $this->_user;
    }

    private function setLoginCookie()
    {
        Cookie::cookie('username', $this->_user['username']);
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        Yii::$app->session->open();
        unset($_SESSION['user']);
        session_destroy();

        $_COOKIE['username'] = null;
        Cookie::cookie('username', null, -1);
        Cookie::cookie('slg123', null, -1);
    }

    /**
     * @param $email
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getUserByEmail($email)
    {
        return UserInfo::find()->where(['reg_email' => $email])->asArray()->one();
    }

    public function compareTo($password, $password1)
    {
        if ($password == $password1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $data
     * @return array|bool
     * @throws \yii\base\Exception
     */
    public function register($data)
    {
        $user = new User();
        $user->username = $data['username'];
        $user->password = Yii::$app->getSecurity()->generatePasswordHash($data['password']);
        $user->reg_ip = Yii::$app->request->getUserIP();
        $user->reg_time = time();
        $user->refer = $data['refer'];
        if ($user->save()) {
            $this->_user = $this->getUserByName($data['username']);
            $this->setLoginSession();
            $this->setLoginCookie();
            $this->getLastGameCookie();
            return true;
        } else {
            return $user->getFirstErrors();
        }
    }

    public function addInfo($data)
    {
        $userInfo = new UserInfo();
        $userInfo->uid = $this->_user['uid'];
        $userInfo->real_name = $data['name'];
        $userInfo->idCard = $data['idNum'];
        $userInfo->reg_email = $data['email'];
        $userInfo->isAuth = $this->getIDCardInfo($data['idNum']);
        if ($userInfo->save()) {
            Yii::$app->session->open();
            $_SESSION['user']['real_name'] = $data['name'];
            $_SESSION['user']['idCard'] = $data['idNum'];
            $_SESSION['user']['email'] = $data['email'];
            $_SESSION['user']['isAuth'] = $this->getIDCardInfo($data['idNum']);
            return true;
        } else {
            return $userInfo->getFirstErrors();
        }
    }

    public function editInfo($uid, $data)
    {
        $userInfo = UserInfo::findOne(['uid' => $uid]);
        $userInfo->real_name = $data['name'];
        $userInfo->idCard = $data['idNum'];
        $userInfo->isAuth = $this->getIDCardInfo($data['idNum']);
        if ($userInfo->save()) {
            $_SESSION['user']['isAuth'] = $this->getIDCardInfo($data['idNum']);
            return true;
        } else {
            return false;
        }
    }

    public function checkLogin()
    {
        Yii::$app->session->open();
        if (isset($_SESSION['user']) && $_SESSION['user']['uid'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function restPassword($password)
    {
        $user = User::findOne(['uid' => $_SESSION['user']['uid']]);
        $user->password = Yii::$app->getSecurity()->generatePasswordHash($password);
        if ($user->save()) {
            $this->logout();
            $this->addError(0, '修改成功，请用新密码重新登录');
        } else {
            $this->addError(1, '密码修改失败');
        }
    }

    public function bindEmail($email)
    {
        $userInfo = UserInfo::findOne(['uid' => $_SESSION['user']['uid']]);
        $userInfo->reg_email = $email;
        $userInfo->btime = time();
        if ($userInfo->save()) {
            $_SESSION['user']['reg_email'] = $email;
            return true;
        } else {
            return false;
        }
    }

    /**
     * 游戏登录日志
     * @param $game_id
     * @param $server_id
     */
    public function addGameLoginLog($game_id, $server_id)
    {
        $user = $_SESSION['user'];
        $log = GameLoginLog::findOne(['uid' => $user['uid'], 'game_id' => $game_id, 'server_id' => $server_id]);
        if ($log) {
            $log->login_times = $log->login_times + 1;
            $log->last_ip = Yii::$app->request->getUserIP();
            $log->last_time = time();
            $log->save();
        } else {
            $log = new GameLoginLog();
            $log->uid = $user['uid'];
            $log->username = $user['username'];
            $log->game_id = $game_id;
            $log->server_id = $server_id;
            $log->login_times = 1;
            $log->last_ip = Yii::$app->request->getUserIP();
            $log->last_time = time();
            $log->first_ip = Yii::$app->request->getUserIP();
            $log->first_time = time();
            $log->refer = $user['refer'];
            $log->save();
        }
    }

    public function getGameLoginLog($username, $game_id, $server_id)
    {
        return GameLoginLog::find()->where(['username' => $username, 'game_id' => $game_id, 'server_id' => $server_id])->asArray()->one();
    }

    public function getLastGameCookie()
    {
        $log = GameLoginLog::find()->where(['uid' => $this->_user['uid']])->limit(3)->all();

        $game = [];
        if ($log) {
            foreach ($log as $key => $val) {
                $game[$key]['gamename'] = $val->game->gamename;
                $game[$key]['server_name'] = $val->server->server_name;
                $game[$key]['game_id'] = $val['game_id'];
                $game[$key]['server_id'] = $val['server_id'];
            }
            unset($log);
        }
        Cookie::cookie('last_game', json_encode($game));
    }

    /**
     * admin后台用户管理
     * @param $game_id
     * @param $server_id
     * @param $username
     * @param $dt1
     * @param $dt2
     * @return array
     */
    public static function backMember($game_id, $server_id, $username, $dt1, $dt2)
    {
        $query = GameLoginLog::find()->where('game_login_log.first_time>=' . $dt1 . ' and game_login_log.first_time<' . $dt2);
        if ($game_id) {
            $query->andWhere(['game_login_log.game_id' => $game_id]);
        }
        if ($server_id) {
            $query->andWhere(['game_login_log.server_id' => $server_id]);
        }
        if ($username != '') {
            $query->andWhere(['game_login_log.username' => $username]);
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy(['game_login_log.uid' => SORT_DESC])->all();

        return [
            'totalCount' => $count,
            'list' => $articles,
            'pagination' => $pagination,
        ];

    }

    /**
     * cps后台
     * @param $cps_id
     * @param $game_id
     * @param $server_id
     * @param $username
     * @param $dt1
     * @param $dt2
     * @return array
     */
    public static function pagination($cps_id, $game_id, $server_id, $username, $dt1, $dt2)
    {
        //TODO cps_id为0的就返回该账号下所有子渠道的注册账号

        $query = GameLoginLog::find()->where('game_login_log.first_time>=' . $dt1 . ' and game_login_log.first_time<' . $dt2);

        if ($game_id) {
            $query->andWhere(['game_login_log.game_id' => $game_id]);
        }
        if ($server_id) {
            $query->andWhere(['game_login_log.server_id' => $server_id]);
        }
        if ($username != '') {
            $query->andWhere(['game_login_log.username' => $username]);
        }
        if ($cps_id == 0) {
            $childList = CpsMember::find()->where(['pid' => $_SESSION['cps']['id']])->all();
            $childId = [];
            foreach ($childList as $key => $val) {
                foreach ($val->cpsLog as $k => $v) {
                    $childId[] = $v['refer'];
                }
            }
            $query->innerJoin(CpsLog::tableName(), 'cps_log.refer=game_login_log.refer')->andWhere('cps_log.refer in (' . implode(',', $childId) . ')');
        } else {
            $child = CpsMember::find()->where(['id' => $cps_id])->one();
            foreach ($child->cpsLog as $k => $v) {
                $childId[] = $v['refer'];
            }
            $query->innerJoin(CpsLog::tableName(), 'cps_log.refer=game_login_log.refer')->andWhere('cps_log.refer in (' . implode(',', $childId) . ')');
        }

        $query->innerJoin(TgGameInfo::tableName(), 'tg_game_info.game_id=game_login_log.game_id and tg_game_info.area_num=game_login_log.server_id');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy(['game_login_log.uid' => SORT_DESC])->all();

        return [
            'totalCount' => $count,
            'list' => $articles,
            'pagination' => $pagination,
        ];
    }

    /**
     * @param string $IDCard 身份证号
     * @return int 0标示成年，1标示未成年
     */
    private function getIDCardInfo($IDCard)
    {
        if (strlen($IDCard) == 18) {
            $tyear = intval(substr($IDCard, 6, 4));
            $tmonth = intval(substr($IDCard, 10, 2));
            $tday = intval(substr($IDCard, 12, 2));
            if ($tyear > date("Y") || $tyear < (date("Y") - 100)) {
                $flag = 0;
            } elseif ($tmonth < 0 || $tmonth > 12) {
                $flag = 0;
            } elseif ($tday < 0 || $tday > 31) {
                $flag = 0;
            } else {
                $tdate = $tyear . "-" . $tmonth . "-" . $tday . " 00:00:00";
                if ((time() - mktime(0, 0, 0, $tmonth, $tday, $tyear)) > 18 * 365 * 24 * 60 * 60) {
                    $flag = 0;
                } else {
                    $flag = 1;
                }
            }
        } elseif (strlen($IDCard) == 15) {
            $tyear = intval("19" . substr($IDCard, 6, 2));
            $tmonth = intval(substr($IDCard, 8, 2));
            $tday = intval(substr($IDCard, 10, 2));
            if ($tyear > date("Y") || $tyear < (date("Y") - 100)) {
                $flag = 0;
            } elseif ($tmonth < 0 || $tmonth > 12) {
                $flag = 0;
            } elseif ($tday < 0 || $tday > 31) {
                $flag = 0;
            } else {
                $tdate = $tyear . "-" . $tmonth . "-" . $tday . " 00:00:00";
                if ((time() - mktime(0, 0, 0, $tmonth, $tday, $tyear)) > 18 * 365 * 24 * 60 * 60) {
                    $flag = 0;
                } else {
                    $flag = 1;
                }
            }
        }
        return $flag;//0标示成年，1标示未成年
    }
}