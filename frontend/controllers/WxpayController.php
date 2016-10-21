<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/13
 * Time: 16:28
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\PayLog;
use frontend\game\GameApi;
use frontend\payment\Wxpay;
use frontend\payment\wxpay\Utils;

/**
 * 微信支付后台通知
 * Class WxpayController
 * @package frontend\controllers
 */
class WxpayController extends Controller
{

    public $enableCsrfValidation = false;
    protected $return_code;
    protected $return_msg;

    public function actionNotify()
    {
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        file_put_contents('/data/web/slg123/frontend/runtime/logs/wx.xml', $xml);
        $result = Utils::fromXml($xml);
        if (false !== $result) {
            if ($result['result_code'] == 'SUCCESS') {
                if ($result['return_code'] == 'SUCCESS') {
                    if (Utils::makeSign($result) == $result['sign']) {
                        //TODO 为了安全，增加一个订单号查询功能
                        $wxpay = new Wxpay();
                        if ($wxpay->query($result['transaction_id'], $result['total_fee'])) {
                            $payLog = PayLog::findOne(['order_num' => $result['out_trade_no']]);
                            if ($payLog && $payLog->flag == 0) {
                                $payLog->flag = 1;
                                $payLog->plugin_oid = $result['transaction_id'];
                                $payLog->comfirm_ip = Yii::$app->request->getUserIP();
                                $payLog->pay_done_time = time();
                                if ($payLog->save()) {
                                    unset($payLog);
                                    $payLog = PayLog::findOne(['order_num' => $result['out_trade_no']]);
                                    $gameTag = $payLog->game->enname;
                                    $reflection = new \ReflectionClass('\\frontend\\game\\' . ucfirst($gameTag));
                                    //实例化这个类
                                    $instance = $reflection->newInstance();
                                    if ($instance instanceof GameApi) {
                                        if ($instance->pay($payLog)) {
                                            $payLog->flag_game = 1;
                                            if ($payLog->save()) {
                                                // TODO 游戏充值成功
                                                $this->return_code = 'SUCCESS';
                                                $this->return_msg = 'OK';
                                                echo Utils::ReplyNotify($this->return_code, true, ['return_code' => $this->return_code, 'return_msg' => $this->return_msg]);
                                                exit;
                                            } else {
                                                //TODO 游戏充值失败
                                                Yii::info('订单更新失败：' . var_export($payLog->getFirstError(), true), 'wxnotify');
                                                $this->return_code = 'SUCCESS';
                                                $this->return_msg = 'OK';
                                                echo Utils::ReplyNotify($this->return_code, true, ['return_code' => $this->return_code, 'return_msg' => $this->return_msg]);
                                                exit;
                                            }
                                        }
                                    }
                                }
                            } else {
                                Yii::info('订单号不存在或重复:' . var_export($result, true), 'wxnotify');
                                $this->return_code = 'SUCCESS';
                                $this->return_msg = 'OK';
                                echo Utils::ReplyNotify($this->return_code, true, ['return_code' => $this->return_code, 'return_msg' => $this->return_msg]);
                                exit;
                            }
                        }
                    } else {
                        Yii::info(var_export($result, true), 'wxnotify');
                        $this->return_code = 'FAIL';
                        $this->return_msg = 'xml error';
                        echo Utils::ReplyNotify($this->return_code, false, ['return_code' => $this->return_code, 'return_msg' => $this->return_msg]);
                        exit;
                    }
                } else {
                    Yii::info(var_export($result, true), 'wxnotify');
                    $this->return_code = 'FAIL';
                    $this->return_msg = 'xml error';
                    echo Utils::ReplyNotify($this->return_code, false, ['return_code' => $this->return_code, 'return_msg' => $this->return_msg]);
                    exit;
                }
            }
            $this->return_code = 'SUCCESS';
            $this->return_msg = 'OK';
            echo Utils::ReplyNotify($this->return_code, true, ['return_code' => $this->return_code, 'return_msg' => $this->return_msg]);
            exit;
        } else {
            $this->return_code = 'FAIL';
            $this->return_msg = 'xml error';
            echo Utils::ReplyNotify($this->return_code, false, ['return_code' => $this->return_code, 'return_msg' => $this->return_msg]);
            exit;
        }
    }
}