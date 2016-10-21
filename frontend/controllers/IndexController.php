<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\service\GameService;

class IndexController extends Controller
{

    public function actionIndex()
    {
        $hotGame = GameService::gameList(['id', 'gamename', 'main_site'], ['ishot' => 1]);
        return $this->render('index', ['hotGame' => $hotGame]);
    }
}