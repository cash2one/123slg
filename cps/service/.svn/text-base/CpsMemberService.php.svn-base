<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/20
 * Time: 10:52
 */

namespace cps\service;

use common\utils\Exption;
use Yii;
use common\models\CpsMember;

class CpsMemberService extends BaseService
{

    /**
     * cps管理员状态 0 删除 1 激活
     */
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @param $username
     * @param $password
     * @return array
     */
    public function login($username, $password)
    {
        $cps = $this->findByUserName($username);

        if ($cps && $this->checkActive($cps)) {
            if ($this->validatePassword($cps, $password)) {
                $this->setLoginSession($cps);
                return [
                    'error' => Exption::USER_LOGIN_SUCCESS,
                    'msg' => '登录成功！',
                ];
            } else {
                return [
                    'error' => Exption::USER_LOGIN_ERROR,
                    'msg' => '账号或密码错误！',
                ];
            }
        } else {
            return [
                'error' => Exption::USER_LOGIN_ERROR,
                'msg' => '账号不存在！',
            ];
        }
    }

    /**
     * @param $username
     * @return array|null|\yii\db\ActiveRecord
     */
    public function findByUserName($username)
    {
        return CpsMember::find()->where(['username' => $username])->asArray()->one();
    }

    public function findById($id)
    {
        return CpsMember::findOne(['id' => $id]);
    }

    /**
     * @param array $cps
     * @return bool
     */
    public function checkActive(array $cps)
    {
        if ($cps['active'] == self::STATUS_ACTIVE) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param array $cps
     * @param $password
     * @return bool
     */
    public function validatePassword(array $cps, $password)
    {
        if (Yii::$app->getSecurity()->validatePassword($password, $cps['password'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param array $cps
     */
    public function setLoginSession(array $cps)
    {
        $session = Yii::$app->session;
        $session->gcSession(68400);
        $session->open();
        $session['cps'] = $cps;
    }

    /**
     * @return bool
     */
    public static function checkLogin()
    {
        $session = Yii::$app->session;
        if (isset($session['cps'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 退出登录
     */
    public static function logout()
    {
        $session = Yii::$app->session;
        unset($session['cps']);
        $session->destroy();
    }
}