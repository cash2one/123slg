<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 16/8/11
 * Time: 下午9:18
 */

namespace backend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use backend\service\AdminService;

class BaseController extends Controller
{
    protected $session;

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if ($this->enableCsrfValidation && Yii::$app->getErrorHandler()->exception === null && !Yii::$app->getRequest()->validateCsrfToken()) {
                throw new BadRequestHttpException(Yii::t('yii', 'Unable to verify your data submission.'));
            }
            $this->session = Yii::$app->session;
            if (!AdminService::checkLogin()) {
                $this->redirect(['/site/login']);
            }
            return true;
        }

        return false;
    }
}