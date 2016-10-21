<?php
namespace frontend\controllers;


use common\service\ServerService;
use common\utils\Identity;
use dosamigos\qrcode\QrCode;
use Yii;
use common\service\UserService;
use common\utils\Exption;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\User;
use common\utils\Email;
use common\utils\Encryption;

/**
 * Site controller
 */
class SiteController extends Controller
{

//    /**
//     * @inheritdoc
//     */
//    public function actions()
//    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//                //'layout'=>false
//            ],
//        ];
//    }

    public function actionError()
    {
        $this->layout = false;
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $username = $_GET['username'];
        $password = $_GET['password'];
        $callback = $_GET['callback'];
        UserService::getInstance()->login($username, $password);
        $error = UserService::getInstance()->getError();
        echo $callback . '(' . json_encode($error) . ')';
        exit;
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        UserService::getInstance()->logout();
        echo json_encode([
            'error' => Exption::USE_LOGOUT_SUCCESS,
            'error_msg' => '成功退出'
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionRegister()
    {
        $this->layout = false;
        if (Yii::$app->request->isAjax) {
            $get = Yii::$app->request->get();
            $get['refer'] = 0;
            if (!UserService::getInstance()->compareTo($get['password'], $get['password2'])) {
                echo json_encode(['error' => 1, 'error_msg' => '两次密码输入不一至']);
                exit;
            }
            //var_dump($get);exit;
            if (Identity::IdCard($get['name'], $get['idNum'])) {
                $get['consistency'] = 1;
            } else {
                echo json_encode([
                    'error' => 1,
                    'error_msg' => '身份验证失败！',
                ]);
                exit;
            }
            $user = UserService::getInstance()->register($get);
            $userInfo = UserService::getInstance()->addInfo($get);
            if (true === $user && true === $userInfo) {
                $msg = [
                    'error' => 0,
                    'error_msg' => '注册成功！',
                ];
            } else {
                $msg = [
                    'error' => 1,
                    'error_msg' => '注册失败！请稍后在试',
                ];
                if (is_array($user)) {
                    Yii::info(implode(',', $user), Yii::$app->controller->id . Yii::$app->controller->action->id);
                }
                if (is_array($userInfo)) {
                    Yii::info(implode(',', $userInfo), Yii::$app->controller->id . Yii::$app->controller->action->id);
                }
            }
            echo json_encode($msg);
            exit;
        }
        $this->layout = '@frontend/views/layouts/sub.php';
        return $this->render('register');
    }

    public function actionTgReg()
    {
        $get = Yii::$app->request->get();
        $user = UserService::getInstance()->register($get);
        if (true === $user) {
            $msg = [
                'error' => 0,
                'error_msg' => '注册成功！',
            ];
        } else {
            $msg = [
                'error' => 1,
                'error_msg' => Yii::t('app', implode(' ', $user))
            ];
        }
        echo $get['callback'] . '(' . json_encode($msg) . ')';
        exit;
    }

    /**
     * 检查用户名，邮箱是否已经注册
     * @param string type 需要检查的类型
     * @return string json
     */
    public function actionCheck()
    {
        $type = Yii::$app->request->get('type');
        switch ($type) {
            case 'user':
                $username = Yii::$app->request->get('username');
                if (UserService::getInstance()->getUserByName($username)) {
                    $msg = [
                        'error' => Exption::USERNAME_EXIST,
                        'error_msg' => '用户名已经存在'
                    ];
                } else {
                    $msg = [
                        'error' => 0,
                        'error_msg' => '可以注册'
                    ];
                }
                break;
            case 'email':
                $email = Yii::$app->request->get('email');
                if (UserService::getInstance()->getUserByEmail($email)) {
                    $msg = [
                        'error' => -1,
                        'error_msg' => '邮箱已经存在'
                    ];
                } else {
                    $msg = [
                        'error' => 0,
                        'error_msg' => '邮箱可以使用'
                    ];
                }
        }
        echo json_encode($msg);
        exit;
    }

    /**
     * @desc  未登录用户点击游戏或用户中心，会跳到这个页面登录，然后回调到游戏或用户中心
     * @param string username 用户名
     * @param string password 用户密码
     * @param string url 回调地址
     * @return string json
     */
    public function actionCallback()
    {
        $url = Yii::$app->request->get('url');
        if (Yii::$app->request->isAjax) {
            $get = Yii::$app->request->get();
            UserService::getInstance()->login($get['username'], $get['password']);
            $error = UserService::getInstance()->getError();
            echo json_encode($error);
            exit;
        }
        $this->layout = '@frontend/views/layouts/sub.php';
        return $this->render('callback', ['url' => $url]);
    }

    /**
     * @desc 密码修改
     * @param string oldpass
     * @param string password
     * @param string password2
     * @return string json
     */
    public function actionRestpass()
    {
        if (Yii::$app->request->isAjax) {
            $get = Yii::$app->request->get();
            if (!UserService::getInstance()->compareTo($get['password'], $get['password2'])) {
                echo json_encode(['error' => 1, 'error_msg' => '两次密码输入不一至']);
                exit;
            }
            Yii::$app->session->open();
            if (!User::validatePassword($_SESSION['user'], $get['oldpass'])) {
                echo json_encode(['error' => 1, 'error_msg' => '旧密码输入错误']);
                exit;
            }
            UserService::getInstance()->restPassword($get['password']);
            echo json_encode(UserService::getInstance()->getError());
            exit;
        }
    }

    /**
     * 密码重置
     */
    public function actionEditpass()
    {
        if (Yii::$app->request->isAjax) {
            $get = Yii::$app->request->get();
            if ($get['password'] != $get['password2']) {
                echo json_encode(['error' => 1, 'error_msg' => '两次密码输入不一至']);
                exit;
            }
            $uid = Encryption::decrypt(urldecode($get['acl']));
            $user = User::findOne(['uid' => $uid]);
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($get['password']);
            if ($user->save()) {
                echo json_encode(['error' => 0, 'error_msg' => '找回密码成功']);
                exit;
            } else {
                echo json_encode(['error' => 0, 'error_msg' => '找回密码失败']);
                exit;
            }
        }
        $acl = Yii::$app->request->get('acl');
        $t = Yii::$app->request->get('t');
        if (time() - $t <= 1800) {
            //$uid = Encryption::decrypt($acl);
            $this->layout = '@frontend/views/layouts/sub.php';
            return $this->render('editpass', ['acl' => urlencode($acl)]);
        } else {
            $this->layout = '@frontend/views/layouts/sub.php';
            return $this->render('eeditpass');
        }

    }

    public function actionSuccess()
    {
        $this->layout = '@frontend/views/layouts/sub.php';
        return $this->render('success');
    }

    public function actionFindpass()
    {
        if (Yii::$app->request->isAjax) {
            $get = Yii::$app->request->get();
            $user = UserService::getInstance()->getUserByName($get['username']);
            if ($user) {
                if ($user['reg_email'] == $get['email']) {
                    $url = 'http://' . $_SERVER['SERVER_NAME'] . Url::to(['site/editpass', 'acl' => Encryption::encrypt($user['uid']), 't' => time()]);
                    if (Email::send($user['username'], $url, $get['email'], Email::template($user['username'], $url))) {
                        $msg = [
                            'error' => 0,
                            'url' => Url::to(['site/success']),
                            'error_msg' => '',
                        ];
                    } else {
                        $msg = [
                            'error' => 1,
                            'error_msg' => '邮件发送失败，请稍后在试',
                        ];
                    }
                } else {
                    $msg = [
                        'error' => 1,
                        'error_msg' => '用户名与邮箱不匹配',
                    ];
                }
            } else {
                $msg = [
                    'error' => 1,
                    'error_msg' => '用户名不存在',
                ];
            }
            echo json_encode($msg);
            exit;
        }
        $this->layout = '@frontend/views/layouts/sub.php';
        return $this->render('findpass');
    }

    /**
     * 生成微信支付二维码
     * @param $url 微信支付生成的url
     */
    public function actionQrcode($url)
    {
        return QrCode::png($url, false, 3, 10);
    }
}
