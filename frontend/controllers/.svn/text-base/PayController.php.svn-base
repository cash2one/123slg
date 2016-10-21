<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 11:33
 */

namespace frontend\controllers;

use Yii;
use common\service\PayLogService;
use common\utils\Utils;
use common\models\Paytype;
use common\models\Server;
use common\service\GameService;
use common\service\ServerService;
use common\service\UserService;
use yii\web\Controller;

class PayController extends Controller
{

    public function actionIndex()
    {
        $this->layout = false;
        $paytype = Paytype::find()->where(['flag' => 1])->orderBy(['listorder' => SORT_DESC])->asArray()->all();
        $gameList = GameService::gameList(['id', 'gamename']);
        return $this->render('index', [
            'paytype' => $paytype,
            'gameList' => $gameList
        ]);
    }

    public function actionCifpay()
    {
        $get = Yii::$app->request->get();

        $user = UserService::getInstance()->getUserByName($get['username']);
        $get['uid'] = $user['uid'];

        $fee = PayLogService::payFee($get['payId'])['fee'];
        $get['fee_cny'] = $fee != 0 ? $get['money'] * (1 - $fee / 100) : $get['money'];

        $server = ServerService::serverOne($get['game_id'], $get['server_id']);
        $get['discript'] = $server->game->gamename . '|' . $server->server_name;
        $get['order_num'] = Utils::makeOutTradeNo();

        if (PayLogService::addLog($get)) {
            //TODO 成功 根据payTag 走渠道充值

            $payTag = ucfirst($get['payTag']);
            
            $reflection = new \ReflectionClass('\\frontend\\payment\\' . $payTag);
            $instance = $reflection->newInstance();
            if ($get['payTag'] == 'wxpay') {
                $url = $instance->pay($get);
                $this->layout = false;//'@frontend/views/layouts/sub.php';
                return $this->render('wxpay', ['descript' => $get['discript'], 'money' => $get['money'], 'url' => $url]);
            } else {
                echo $instance->pay($get);
            }

        } else {
            //TODO 失败 提示用户，跳回充值页面
            return $this->render('error');
        }
    }

    public function actionCheckrole($username, $game_id, $server_id)
    {
        if (UserService::getInstance()->getGameLoginLog($username, $game_id, $server_id)) {
            echo json_encode(['error' => 0, 'error_msg' => '']);
            exit;
        } else {
            echo json_encode(['error' => 1, 'error_msg' => '']);
            exit;
        }
    }

    public function actionCheckplayer($playerId)
    {
        $user = UserService::getInstance()->getUserByName($playerId);
        if ($user) {
            echo json_encode(['error' => 0, 'error_msg' => '']);
            exit;
        } else {
            echo json_encode(['error' => 1, 'error_msg' => '']);
            exit;
        }
    }

    public function actionServers($game_id)
    {
        $server = Server::find()->select(['server_id', 'server_name'])->where(['game_id' => $game_id])->orderBy(['server_id' => SORT_DESC])->asArray()->all();
        $game = GameService::findGameById($game_id, ['cny_rate', 'gold_name']);
        echo json_encode(['game' => $game, 'server' => $server]);
    }
}