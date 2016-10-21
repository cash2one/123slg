<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/12
 * Time: 16:52
 */

namespace frontend\controllers;


use yii\web\Controller;

class JianhuController extends Controller
{
    public $layout = '@frontend/views/layouts/jianhu.php';

    public function actionMain()
    {
        return $this->render('main');
    }

    public function actionXtjs()
    {
        return $this->render('xtjs');
    }

    public function actionSqlc()
    {
        return $this->render('sqlc');
    }

    public function actionSqxz()
    {
        return $this->render('sqxz');
    }

    public function actionSqxd()
    {
        return $this->render('sqxd');
    }

    public function actionFaq()
    {
        return $this->render('faq');
    }
}