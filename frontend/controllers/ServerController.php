<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/11
 * Time: 9:57
 */

namespace frontend\controllers;


use common\service\GameService;
use common\service\ServerService;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class ServerController extends Controller
{

    public function actionList($game_id)
    {
        $game = GameService::findGameById($game_id);
        
        $server = ServerService::serverList(['server_id', 'server_name'], $game_id);
        $this->layout = false;
        return $this->render('list', ['game' => ArrayHelper::toArray($game)]);
    }
}