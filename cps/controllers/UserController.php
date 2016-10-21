<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/24
 * Time: 11:52
 */

namespace cps\controllers;

use common\models\Server;
use common\service\CpsService;
use common\service\PayLogService;
use common\service\ServerService;
use common\service\UserService;
use Yii;
use common\service\GameService;

class UserController extends BaseController
{

    public function actionRegister()
    {
        $pid = $_SESSION['cps']['pid'];
        $id = $_SESSION['cps']['id'];

        $gameList = GameService::gameList(['id', 'gamename']);
        $cpsList = CpsService::childList($id);

        if ($pid == 0) {
            $cps_id = Yii::$app->request->get('cps_id') ? Yii::$app->request->get('cps_id') : '';
        } else {
            $cps_id = $_SESSION['cps']['id'];
        }
        $game_id = Yii::$app->request->get('game_id') ? Yii::$app->request->get('game_id') : '';
        $server_id = Yii::$app->request->get('server_id') ? Yii::$app->request->get('server_id') : '';
        $username = Yii::$app->request->get('username') ? Yii::$app->request->get('username') : '';
        $dt1 = Yii::$app->request->get('dt1') ? strtotime(Yii::$app->request->get('dt1')) : strtotime(date('Y-m-d'));
        $dt2 = Yii::$app->request->get('dt2') ? strtotime(Yii::$app->request->get('dt2')) : strtotime(date('Y-m-d')) + 86400;

        $serverList = [];
        if ($game_id) {
            $serverList = ServerService::serverList(['server_id', 'server_name'], $game_id);
        }

        $server = [];
        if ($server_id) {
            $server = Server::findOne(['game_id' => $game_id, 'server_id' => $server_id]);
        }

        $result = UserService::pagination($cps_id, $game_id, $server_id, $username, $dt1, $dt2);

        return $this->render('register', [
            'gameList' => $gameList,
            'username' => $username,
            'cps_id' => $cps_id,
            'dt1' => $dt1,
            'dt2' => $dt2,
            'game_id' => $game_id,
            'server_id' => $server_id,
            'server' => $server,
            'serverList' => $serverList,
            'result' => $result,
            'cpsList' => $cpsList,
            'pid' => $pid
        ]);
    }

    public function actionPay()
    {
        $pid = $_SESSION['cps']['pid'];
        $id = $_SESSION['cps']['id'];

        $gameList = GameService::gameList(['id', 'gamename']);
        $cpsList = CpsService::childList($id);

        if ($pid == 0) {
            $cps_id = Yii::$app->request->get('cps_id') ? Yii::$app->request->get('cps_id') : '';
        } else {
            $cps_id = $_SESSION['cps']['id'];
        }
        $game_id = Yii::$app->request->get('game_id') ? Yii::$app->request->get('game_id') : '';
        $server_id = Yii::$app->request->get('server_id') ? Yii::$app->request->get('server_id') : '';
        $username = Yii::$app->request->get('username') ? Yii::$app->request->get('username') : '';
        $dt1 = Yii::$app->request->get('dt1') ? strtotime(Yii::$app->request->get('dt1')) : strtotime(date('Y-m-d'));
        $dt2 = Yii::$app->request->get('dt2') ? strtotime(Yii::$app->request->get('dt2')) : strtotime(date('Y-m-d')) + 86400;

        $serverList = [];
        if ($game_id) {
            $serverList = ServerService::serverList(['server_id', 'server_name'], $game_id);
        }

        $server = [];
        if ($server_id) {
            $server = Server::findOne(['game_id' => $game_id, 'server_id' => $server_id]);
        }

        $result = PayLogService::paginationCps($cps_id, $game_id, $server_id, $username, $dt1, $dt2);

        return $this->render('pay', [
            'gameList' => $gameList,
            'username' => $username,
            'cps_id' => $cps_id,
            'dt1' => $dt1,
            'dt2' => $dt2,
            'game_id' => $game_id,
            'server_id' => $server_id,
            'server' => $server,
            'serverList' => $serverList,
            'result' => $result,
            'cpsList' => $cpsList,
            'pid' => $pid
        ]);
    }
}