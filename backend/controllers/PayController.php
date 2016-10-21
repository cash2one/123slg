<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/17
 * Time: 11:33
 */

namespace backend\controllers;

use common\models\PayLog;
use common\models\Paytype;
use common\service\CpsService;
use common\service\PayLogService;
use common\models\Server;
use common\service\ServerService;
use frontend\game\GameApi;
use Yii;
use common\service\GameService;

class PayController extends BaseController
{

    public function actionIndex()
    {
        $gameList = GameService::gameList(['id', 'gamename']);
        $game_id = Yii::$app->request->get('game_id') ? Yii::$app->request->get('game_id') : '';
        $server_id = Yii::$app->request->get('server_id') ? Yii::$app->request->get('server_id') : '';
        $username = Yii::$app->request->get('username') ? Yii::$app->request->get('username') : '';
        $dt1 = Yii::$app->request->get('dt1') ? strtotime(Yii::$app->request->get('dt1')) : strtotime(date('Y-m-d'));
        $dt2 = Yii::$app->request->get('dt2') ? strtotime(Yii::$app->request->get('dt2')) : strtotime(date('Y-m-d')) + 86400;
        $paytype_id = Yii::$app->request->get('paytype_id') ? Yii::$app->request->get('paytype_id') : '';
        $serverList = [];
        if ($game_id) {
            $serverList = ServerService::serverList(['server_id', 'server_name'], $game_id);
        }

        $server = [];
        if ($server_id) {
            $server = Server::findOne(['game_id' => $game_id, 'server_id' => $server_id]);
        }

        $result = PayLogService::pagination($game_id, $server_id, $paytype_id, $username, $dt1, $dt2);

        foreach ($result['list'] as $key => &$val) {
            if ($val['refer']) {
                $val['referName'] = CpsService::referName($val['refer'])['username'];
            } else {
                $val['referName'] = '';
            }

        }

        $paytype = Paytype::find()->where(['flag' => 1])->orderBy(['listorder' => SORT_DESC])->asArray()->all();

        return $this->render('index', [
            'gameList' => $gameList,
            'username' => $username,
            'dt1' => $dt1,
            'dt2' => $dt2,
            'game_id' => $game_id,
            'server_id' => $server_id,
            'server' => $server,
            'serverList' => $serverList,
            'result' => $result,
            'paytype' => $paytype,
            'paytype_id' => $paytype_id
        ]);
    }

    public function actionSelf()
    {
        $gameList = GameService::gameList(['id', 'gamename']);
        $game_id = Yii::$app->request->get('game_id') ? Yii::$app->request->get('game_id') : '';
        $server_id = Yii::$app->request->get('server_id') ? Yii::$app->request->get('server_id') : '';
        $username = Yii::$app->request->get('username') ? Yii::$app->request->get('username') : '';
        $dt1 = Yii::$app->request->get('dt1') ? strtotime(Yii::$app->request->get('dt1')) : strtotime(date('Y-m-d'));
        $dt2 = Yii::$app->request->get('dt2') ? strtotime(Yii::$app->request->get('dt2')) : strtotime(date('Y-m-d')) + 86400;
        $paytype_id = 18;
        $serverList = [];
        if ($game_id) {
            $serverList = ServerService::serverList(['server_id', 'server_name'], $game_id);
        }

        $server = [];
        if ($server_id) {
            $server = Server::findOne(['game_id' => $game_id, 'server_id' => $server_id]);
        }

        $result = PayLogService::paginationself($game_id, $server_id, $paytype_id, $username, $dt1, $dt2);
        //var_dump($result);exit;
        foreach ($result['list'] as $key => &$val) {
            if ($val['refer']) {
                $val['referName'] = CpsService::referName($val['refer'])['username'];
            } else {
                $val['referName'] = '';
            }

        }

        $paytype = Paytype::find()->where(['flag' => 1])->orderBy(['listorder' => SORT_DESC])->asArray()->all();

        return $this->render('self', [
            'gameList' => $gameList,
            'username' => $username,
            'dt1' => $dt1,
            'dt2' => $dt2,
            'game_id' => $game_id,
            'server_id' => $server_id,
            'server' => $server,
            'serverList' => $serverList,
            'result' => $result,
            'paytype' => $paytype,
            'paytype_id' => $paytype_id
        ]);
    }
    public function actionBudan()
    {
        if (Yii::$app->request->isGet) {
            $order_num = Yii::$app->request->get('order_num');
            $pay = PayLog::findOne(['order_num' => $order_num]);
            if (!$pay && $pay->flag != 1) {
                echo json_encode(['error' => 1, 'msg' => '订单号：' . $order_num . '错误']);
                exit;
            } else {
                $server = $server = ServerService::serverOne($pay->gid, $pay->sid);
                $gameTag = ucfirst($server->game->enname);
                //构造一个反射类
                if (!class_exists('\\frontend\\game\\' . $gameTag)) {
                    echo json_encode([
                        'error' => 1,
                        'error_msg' => '游戏接口不存在'
                    ]);
                }
                $reflection = new \ReflectionClass('\\frontend\\game\\' . $gameTag);
                //实例化这个类
                $instance = $reflection->newInstance();
                if ($instance instanceof GameApi) {
                    $result = $instance->pay(['pay_uid' => $pay->pay_uid, 'sid' => $pay->sid, 'order_num' => $order_num, 'fee_cny' => $pay->fee_cny]);
                    if (!$result) {
                        echo json_encode([
                            'error' => 1, 'msg' => '补单失败'
                        ]);
                    } else {
                        $pay->flag_game = 1;
                        $pay->save();
                        echo json_encode([
                            'error' => 0, 'msg' => '补单成功'
                        ]);
                    }
                }
            }
        }
    }
}