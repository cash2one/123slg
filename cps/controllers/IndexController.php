<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/12
 * Time: 15:20
 */

namespace cps\controllers;


class IndexController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}