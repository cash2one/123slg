<?php
namespace backend\controllers;


use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use backend\service\AdminService;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = false;

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
            $result = AdminService::getInstance()->login($username, $password);
            echo json_encode($result);
            exit;
        }
        if (AdminService::checkLogin()) {
            $this->redirect(Url::to(['index/index']));
        } else {
            return $this->render('/site/login');
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        AdminService::logout();
        return $this->goHome();
    }
}
