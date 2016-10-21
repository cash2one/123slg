<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/19
 * Time: 9:23
 */

namespace backend\controllers;


use common\models\PayLog;
use common\utils\Utils;
use frontend\game\GameApi;
use Yii;
use common\service\GameService;
use common\Service\ServerService;
use common\service\UserService;

class SelfController extends BaseController
{

    public function actionPay()
    {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($post['game_id'] == 0) {
                echo json_encode([
                    'error' => 1,
                    'msg' => '请选择游戏区服'
                ]);
                exit;
            }
            $game_id = $post['game_id'];
            $server_id = $post['server_id'];
            if ($post['money'] == 0) {
                echo json_encode([
                    'error' => 1,
                    'msg' => '请输入要充值的金额'
                ]);
                exit;
            }
            $money = $post['money'];
            if ($post['users'] == '') {
                echo json_encode([
                    'error' => 1,
                    'msg' => '请输入需要充值的玩家账号'
                ]);
                exit;
            }
            $users = explode("\r\n", $post['users']);
            if ($post['remark'] == '') {
                echo json_encode([
                    'error' => 1,
                    'msg' => '请填写备注信息'
                ]);
                exit;
            }
            $remark = $post['remark'];
            //TODO 角色存在则充值游戏，否则记录用户名，提示错误
            foreach ($users as $key => $val) {
                if (!UserService::getInstance()->getGameLoginLog($val, $game_id, $server_id)) {
                    $errorUser[] = $val;
                } else {
                    $user = UserService::getInstance()->getUserByName($val);
                    $server = ServerService::serverOne($game_id, $server_id);
                    $order_num = Utils::makeOutTradeNo();
                    $log = new PayLog();
                    $log->order_num = $order_num;
                    $log->pay_uid = $user['uid'];
                    $log->pay_username = $val;
                    $log->paytypename = '内充';
                    $log->paytype = 18;
                    $log->pay_cny = $money;
                    $log->fee_cny = $money;
                    $log->pay_time = time();
                    $log->flag = 1;
                    $log->flag_game = 0;
                    $log->pay_ip = Yii::$app->request->getUserIP();
                    $log->gid = $game_id;
                    $log->sid = $server_id;
                    $log->remark = $remark;
                    $log->discript = $server->game->gamename . '|' . $server->server_name;
                    if ($log->save()) {
                        $gameTag = ucfirst($server->game->enname);
                        //构造一个反射类
                        if (!class_exists('\\frontend\\game\\' . $gameTag)) {
                            $this->layout = '@frontend/views/layouts/sub.php';
                            echo json_encode([
                                'error' => 1,
                                'error_msg' => '游戏接口不存在'
                            ]);
                        }
                        $reflection = new \ReflectionClass('\\frontend\\game\\' . $gameTag);
                        //实例化这个类
                        $instance = $reflection->newInstance();
                        if ($instance instanceof GameApi) {
                            $result = $instance->pay(['pay_uid' => $user['uid'], 'sid' => $server_id, 'order_num' => $order_num, 'fee_cny' => $money]);
                            if (!$result) {
                                $errorUser[] = $val;
                            } else {
                                $log = PayLog::findOne(['order_num' => $order_num]);
                                $log->flag_game = 1;
                                $log->save();
                            }
                        }
                    } else {
                        $errorUser[] = $val;
                    }

                }
            }
            if (!empty($errorUser)) {
                echo json_encode([
                    'error' => 1,
                    'msg' => '充值失败的用户有：' . implode(',', $errorUser)
                ]);
                exit;
            } else {
                echo json_encode([
                    'error' => 0,
                    'msg' => '充值成功'
                ]);
                exit;
            }

        }
        $gameList = GameService::gameList(['id', 'gamename']);
        return $this->render('selfPay', ['gameList' => $gameList]);
    }
}