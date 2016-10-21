<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/18
 * Time: 15:50
 */

namespace backend\controllers;

use common\models\CpsMember;
use common\models\GameLoginLog;
use common\models\Server;
use common\models\TgGameInfo;
use common\service\GameService;
use common\service\PayLogService;
use common\service\ServerService;
use common\service\TgGameService;
use common\utils\Encryption;
use common\utils\Exption;
use Yii;
use common\service\CpsService;


class CpsController extends BaseController
{

    public function actionIndex()
    {

        $cpsList = CpsService::cpsList();

        foreach ($cpsList as $key => &$val) {
            $val['child'][] = CpsService::childList($val['id']);
        }

        return $this->render('index', ['cpsList' => $cpsList]);
    }

    public function actionAdd()
    {
        if (Yii::$app->request->isPost) {
            $cps = CpsService::addCps(Yii::$app->request->post());
            if (true === $cps) {
                echo json_encode(['error' => Exption::ADMIN_OPER_SUCCESS, 'msg' => '操作成功']);
                exit;
            } else {
                echo json_encode(['error' => Exption::ADMIN_OPER_ERROR, 'msg' => Yii::t('app', implode(' ', $cps))]);
                exit;
            }
        }
        return $this->render('add');
    }

    public function actionEdit()
    {
        if (Yii::$app->request->isPost) {
            $cps = CpsService::editCps(Yii::$app->request->post());
            if (true === $cps) {
                echo json_encode(['error' => Exption::ADMIN_OPER_SUCCESS, 'msg' => '操作成功']);
                exit;
            } else {
                echo json_encode(['error' => Exption::ADMIN_OPER_ERROR, 'msg' => Yii::t('app', implode(' ', $cps))]);
                exit;
            }
        }
        $id = Yii::$app->request->get('id');
        $cps = CpsMember::findOne(['id' => $id]);
        return $this->render('edit', ['cps' => $cps]);
    }

    public function actionAddChild()
    {
        if (Yii::$app->request->isPost) {
            $cps = CpsService::addChild(Yii::$app->request->post());
            if (true === $cps) {
                echo json_encode(['error' => Exption::ADMIN_OPER_SUCCESS, 'msg' => '操作成功']);
                exit;
            } else {
                echo json_encode(['error' => Exption::ADMIN_OPER_ERROR, 'msg' => Yii::t('app', implode(' ', $cps))]);
                exit;
            }
        }
        $id = Yii::$app->request->get('id');
        return $this->render('addChild', ['id' => $id]);
    }

    public function actionEditChild()
    {
        return $this->render('editChild');
    }

    public function actionLink()
    {
        $cps_id = Yii::$app->request->get('cps_id') ? Yii::$app->request->get('cps_id') : '';
        $game_id = Yii::$app->request->get('game_id') ? Yii::$app->request->get('game_id') : '';
        $server_id = Yii::$app->request->get('server_id') ? Yii::$app->request->get('server_id') : '';

        $gameList = GameService::gameList(['id', 'gamename']);
        $cpsList = CpsService::allChild();

        $serverList = [];
        if ($game_id) {
            $serverList = ServerService::serverList(['server_id', 'server_name'], $game_id);
        }
        $server = [];
        if ($server_id) {
            $server = Server::findOne(['game_id' => $game_id, 'server_id' => $server_id]);
        }
        //TODO 分页和首充未完成
        $result = TgGameService::pagination($game_id, $server_id, $cps_id);

        return $this->render('link', [
            'gameList' => $gameList,
            'result' => $result,
            'cpsList' => $cpsList,
            'game_id' => $game_id,
            'server_id' => $server_id,
            'cps_id' => $cps_id,
            'server' => $server,
            'serverList' => $serverList,
        ]);
    }

    public function actionFirstPay($key)
    {
        $key = Encryption::decrypt($key);
        $key = explode('&', $key);

        $refer = $key[0];
        $game_id = $key[1];
        $server_id = $key[2];

        $userList = GameLoginLog::find()->where([
            'game_id' => $game_id,
            'server_id' => $server_id,
            'refer' => $refer
        ])->asArray()->all();

        return $this->render('firstpay', ['userList' => $userList]);
        //TODO 生成订单号插入订单表 去游戏接口充值，根据返回装态修改订单表
    }

    public function actionFirstSearch()
    {

        $gameList = GameService::gameList(['id', 'gamename']);

        $cps_id = Yii::$app->request->get('cps_id') ? Yii::$app->request->get('cps_id') : '';
        $game_id = Yii::$app->request->get('game_id') ? Yii::$app->request->get('game_id') : '';
        $server_id = Yii::$app->request->get('server_id') ? Yii::$app->request->get('server_id') : '';
        $username = Yii::$app->request->get('username') ? Yii::$app->request->get('username') : '';
        $dt1 = Yii::$app->request->get('dt1') ? strtotime(Yii::$app->request->get('dt1')) : strtotime(date('Y-m-d'));
        $dt2 = Yii::$app->request->get('dt2') ? strtotime(Yii::$app->request->get('dt2')) : strtotime(date('Y-m-d')) + 86400;

        $cpsList = CpsService::allChild();

        $serverList = [];
        if ($game_id) {
            $serverList = ServerService::serverList(['server_id', 'server_name'], $game_id);
        }

        $server = [];
        if ($server_id) {
            $server = Server::findOne(['game_id' => $game_id, 'server_id' => $server_id]);
        }

        $result = PayLogService::paginationFirst($cps_id, $game_id, $server_id, $username, $dt1, $dt2);

        return $this->render('firstsearch', [
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
        ]);
    }
}