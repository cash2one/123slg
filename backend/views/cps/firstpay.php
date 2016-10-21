<?php
use common\utils\Utils;
use common\models\FirstPay;
const MONEY = 1;
?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">游戏链接</strong>
                <small></small>
            </div>
            <hr>
            <?php
            foreach ($userList as $key => $val) {
                //TODO 检查是否已经发过首充
                $firPay = FirstPay::find()->where(['uid' => $val['uid'], 'game_id' => $val['game_id'], 'server_id' => $val['server_id'], 'refer' => $val['refer'], 'flag_game' => 1])->asArray()->one();
                if ($firPay) {
                    echo "<font color='red'>没有可以充值的账号</font><br>";
                } else {
                    $order_num = Utils::makeOutTradeNo();
                    $game = \common\service\GameService::findGameById($val['game_id']);
                    $gameTag = ucfirst($game['enname']);
                    //构造一个反射类
                    if (!class_exists('\\frontend\\game\\' . $gameTag)) {
                        echo '游戏接口不存在';
                        exit;

                    }
                    $reflection = new \ReflectionClass('\\frontend\\game\\' . $gameTag);
                    //实例化这个类
                    $instance = $reflection->newInstance();
                    if ($instance instanceof \frontend\game\GameApi) {
                        $result = $instance->pay(['pay_uid' => $val['uid'], 'sid' => $val['server_id'], 'order_num' => $order_num, 'fee_cny' => MONEY]);
                        if (!$result) {
                            echo "账号<font color='red'>" . $val['username'] . "</font>：充值失败<br>";
                        } else {
                            $firPay = new FirstPay();
                            $firPay->order_num = $order_num;
                            $firPay->uid = $val['uid'];
                            $firPay->username = $val['username'];
                            $firPay->pay_cny = MONEY;
                            $firPay->pay_time = time();
                            $firPay->flag_game = 1;
                            $firPay->pay_ip = Yii::$app->request->getUserIP();
                            $firPay->game_id = $val['game_id'];
                            $firPay->server_id = $val['server_id'];
                            $firPay->refer = $val['refer'];
                            if ($firPay->save()) {
                                echo "账号<font color='green'>" . $val['username'] . "</font>：充值成功<br>";
                            } else {
                                $firPay->save();
                                \common\utils\MyLog::write([$gameTag . '账号:' . $val['username'] . '首充成功，保存数据失败'], \yii\log\Logger::LEVEL_INFO, 'firstpay', time());
                            }
                        }
                    }

                }
            }
            ?>
        </div>
    </div>
</div>
