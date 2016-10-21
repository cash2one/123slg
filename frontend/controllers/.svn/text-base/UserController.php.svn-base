<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/31
 * Time: 17:56
 */

namespace frontend\controllers;


use common\models\UserInfo;
use common\utils\Email;
use common\utils\Encryption;
use common\utils\Identity;
use Yii;
use yii\helpers\Url;
use common\service\UserService;
use yii\web\Controller;
use common\utils\Mask;

class UserController extends Controller
{
    public function beforeAction($action)
    {
        Yii::$app->session->open();
        if (parent::beforeAction($action)) {
            if (!UserService::getInstance()->checkLogin()) {
                $this->redirect(['site/callback', 'url' => Url::to(['user/index'])]);
            }
            return true;
        }

        return false;
    }

    public function actionIndex()
    {
        $reg_email = isset($_SESSION['user']['reg_email']) ? Mask::email($_SESSION['user']['reg_email']) : '';
        $idCard = isset($_SESSION['user']['idCard']) ? Mask::idCard($_SESSION['user']['idCard']) : '';
        $this->layout = '@frontend/views/layouts/sub.php';
        return $this->render('index', ['reg_email' => $reg_email, 'idCard' => $idCard]);
    }

    public function actionChangeEmail($email)
    {
        if (UserService::getInstance()->bindEmail($email)) {
            $url = 'http://' . $_SERVER['SERVER_NAME'] . Url::to(['user/bind', 'acl' => md5($_SESSION['user']['uid'])]);
            if (Email::send($_SESSION['user']['username'], $url, $email)) {
                echo Email::bindComplete();
                exit;
            } else {
                echo Email::bindError();
                exit;
            }
        }
    }

    public function actionBind()
    {
        $acl = Yii::$app->request->get('acl');
        if (md5($_SESSION['user']['uid']) == $acl) {
            $user = UserService::getInstance()->getUserByName($_SESSION['user']['username']);
            if ($user['btime'] - time() < 1300) {
                $userInfo = UserInfo::findOne(['uid' => $_SESSION['user']['uid']]);
                $userInfo->isbind = 1;
                if ($userInfo->save()) {
                    $_SESSION['user']['isbind'] = 1;
                    $this->layout = '@frontend/views/layouts/sub.php';
                    return $this->render('bind', ['msg' => '恭喜您，邮箱绑定成功', 'btnMsg' => '绑定完成']);
                } else {
                    $this->layout = '@frontend/views/layouts/sub.php';
                    return $this->render('bind', ['msg' => '邮箱绑定失败', 'btnMsg' => '重新绑定']);
                }
            }
        } else {
            $this->redirect(['user/index']);
        }
    }

    public function actionUnbind()
    {
        $acl = Yii::$app->request->get('acl');
        if (md5($_SESSION['user']['uid']) == $acl) {
            $user = UserService::getInstance()->getUserByName($_SESSION['user']['username']);
            if ($user['btime'] - time() < 1300) {
                $userInfo = UserInfo::findOne(['uid' => $_SESSION['user']['uid']]);
                $userInfo->isbind = 0;
                if ($userInfo->save()) {
                    $_SESSION['user']['isbind'] = 0;
                    $this->layout = '@frontend/views/layouts/sub.php';
                    return $this->render('unbind', ['msg' => '恭喜您，邮箱解除绑定成功！', 'btnMsg' => '解绑完成']);
                } else {
                    $this->layout = '@frontend/views/layouts/sub.php';
                    return $this->render('unbind', ['msg' => '邮箱解绑失败', 'btnMsg' => '重新解绑']);
                }
            }
        } else {
            $this->redirect(['user/index']);
        }

        if (Yii::$app->request->isAjax) {
            $url = 'http://' . $_SERVER['SERVER_NAME'] . Url::to(['user/unbind', 'acl' => md5($_SESSION['user']['uid'])]);
            if (Email::send($_SESSION['user']['username'], $url, $_SESSION['user']['reg_email'])) {
                echo Email::unbindComplete();
                exit;
            } else {
                echo Email::unbindError();
                exit;
            }
        }
    }

    public function actionIdcard()
    {
        if (Yii::$app->request->isAjax) {
            $get = Yii::$app->request->get();
            if (Identity::IdCard($get['name'], $get['idNum'])) {
                $get['consistency'] = 1;
            } else {
                echo json_encode([
                    'error' => 1,
                    'error_msg' => '身份验证失败！',
                ]);
                exit;
            }
            if (UserService::getInstance()->editInfo($_SESSION['user']['uid'], $get)) {
                echo json_encode(['error' => 0, 'error_msg' => '认证成功']);
                exit;
            } else {
                echo json_encode(['error' => 1, 'error_msg' => '认证失败']);
                exit;
            }
        }
        $this->layout = '@frontend/views/layouts/sub.php';
        return $this->render('idcard');
    }
}