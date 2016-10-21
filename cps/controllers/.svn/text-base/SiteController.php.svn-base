<?php
namespace cps\controllers;


use common\service\ServerService;
use common\service\UserService;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use cps\service\CpsMemberService;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = false;
    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (Yii::$app->request->isPost) {
            $username = Yii::$app->request->post('username');
            $password = Yii::$app->request->post('password');
            $result = CpsMemberService::getInstance()->login($username, $password);
            echo json_encode($result);
            exit;
        }
        if (CpsMemberService::checkLogin()) {
            $this->redirect(Url::to(['index/index']));
        } else {
            return $this->render('login');
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        CpsMemberService::logout();
        return $this->goHome();
    }

    public function actionAsync($username, $password)
    {
        $cps = CpsMemberService::getInstance()->findByUserName($username);
        if ($cps) {
            if ($cps['password'] == $password) {
                CpsMemberService::getInstance()->setLoginSession($cps);
                $msg = [
                    'error' => 0,
                    'msg' => '通讯成功'
                ];
            } else {
                $msg = [
                    'error' => 1,
                    'msg' => '通讯错误'
                ];
            }
        } else {
            $msg = [
                'error' => 1,
                'msg' => '通讯错误'
            ];
        }

        echo $_GET['callback'] . '(' . json_encode($msg) . ')';
        exit;
    }

    public function actionServerList($game_id)
    {
        $serverList = ServerService::serverList(['server_id', 'server_name'], $game_id);

        echo json_encode(ArrayHelper::toArray($serverList));
        exit;
    }
}
