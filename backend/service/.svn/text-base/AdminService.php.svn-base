<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/12
 * Time: 17:04
 */

namespace backend\service;


use common\service\BaseService;
use Yii;
use app\models\Admin;
use common\utils\Exption;

class AdminService extends BaseService
{
    /**
     * @param $usernme
     * @param $password
     * @return array
     */
    public function login($usernme, $password)
    {
        $admin = Admin::find()->findByUserName($usernme);

        if ($admin && Admin::checkActive($admin)) {
            if (Admin::validatePassword($admin, $password)) {
                $this->setLoginSession($admin);
                $this->setLoginLog($admin['id']);
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

    protected function setLoginSession(array $admin)
    {
        $session = Yii::$app->session;
        $session->gcSession(68400);
        $session->open();
        $session['admin'] = $admin;
    }

    public static function checkLogin()
    {
        $session = Yii::$app->session;
        if (isset($session['admin'])) {
            return true;
        } else {
            return false;
        }
    }

    protected function setLoginLog($id)
    {
        $lastIp = Yii::$app->request->getUserIP() != null ? ip2long(Yii::$app->request->getUserIP()) : 0;
        Yii::$app->db->createCommand()->update(Admin::tableName(),
            ['last_time' => time(), 'last_ip' => $lastIp],
            ['id' => $id])->execute();
    }

    public static function logout()
    {
        $session = Yii::$app->session;
        unset($session['admin']);
        $session->destroy();
    }
}