<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/14
 * Time: 14:40
 */

namespace frontend\controllers;

use common\models\PayLog;
use common\utils\MyLog;
use frontend\game\GameApi;
use Yii;
use yii\log\Logger;
use yii\web\Controller;

class ShengController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionReturn()
    {
        $get = Yii::$app->request->post();
        
        $verifyResult = "false";
        $key = "G1Pl8Ka5v7Z0o2Bs98";//密钥

        $signMessage = "";
        $signMessage .= $this->isEmpty($get["Name"]) ? "" : $get["Name"] . "|";
        $signMessage .= $this->isEmpty($get["Version"]) ? "" : $get["Version"] . "|";
        $signMessage .= $this->isEmpty($get["Charset"]) ? "" : $get["Charset"] . "|";
        $signMessage .= $this->isEmpty($get["TraceNo"]) ? "" : $get["TraceNo"] . "|";
        $signMessage .= $this->isEmpty($get["MsgSender"]) ? "" : $get["MsgSender"] . "|";
        $signMessage .= $this->isEmpty($get["SendTime"]) ? "" : $get["SendTime"] . "|";
        $signMessage .= $this->isEmpty($get["InstCode"]) ? "" : $get["InstCode"] . "|";
        $signMessage .= $this->isEmpty($get["OrderNo"]) ? "" : $get["OrderNo"] . "|";
        $signMessage .= $this->isEmpty($get["OrderAmount"]) ? "" : $get["OrderAmount"] . "|";
        $signMessage .= $this->isEmpty($get["TransNo"]) ? "" : $get["TransNo"] . "|";
        $signMessage .= $this->isEmpty($get["TransAmount"]) ? "" : $get["TransAmount"] . "|";
        $signMessage .= $this->isEmpty($get["TransStatus"]) ? "" : $get["TransStatus"] . "|";
        $signMessage .= $this->isEmpty($get["TransType"]) ? "" : $get["TransType"] . "|";
        $signMessage .= $this->isEmpty($get["TransTime"]) ? "" : $get["TransTime"] . "|";
        $signMessage .= $this->isEmpty($get["MerchantNo"]) ? "" : $get["MerchantNo"] . "|";
        $signMessage .= $this->isEmpty($get["ErrorCode"]) ? "" : $get["ErrorCode"] . "|";
        $signMessage .= $this->isEmpty($get["ErrorMsg"]) ? "" : $get["ErrorMsg"] . "|";
        $signMessage .= $this->isEmpty($get["Ext1"]) ? "" : $get["Ext1"] . "|";
        $signMessage .= $this->isEmpty($get["SignType"]) ? "" : $get["SignType"] . "|";
        $signMessage .= $key;

        $signMsg = strtoupper(md5($signMessage));
        $org_signMsg = $get["SignMsg"];

        if (isset($org_signMsg) && strcasecmp($signMsg, $org_signMsg) === 0) {
            $verifyResult = "true";
        }
        $SignMsgMerchant = $signMsg;
        if (isset($verifyResult) && strcasecmp($verifyResult, "true") === 0) {
            $transStatus = $_REQUEST["TransStatus"];
            if (isset($transStatus) && strcasecmp(trim($transStatus), "01") === 0) {
                $payLog = PayLog::findOne(['order_num' => $get["OrderNo"]]);
                if ($payLog) {
                    if ($payLog->flag != 1) {
                        $payLog->flag = 1;
                        $payLog->plugin_oid = $get['TransNo'];
                        $payLog->comfirm_ip = Yii::$app->request->getUserIP();
                        $payLog->pay_done_time = time();
                        $payLog->bank_oid = $get['BankSerialNo'];
                        if ($payLog->save()) {
                            unset($payLog);
                            $payLog = PayLog::findOne([['order_num' => $get["OrderNo"], 'flag' => 1]]);
                            $gameTag = ucfirst($payLog->game->enname);
                            $reflection = new \ReflectionClass('\\frontend\\game\\' . $gameTag);
                            //实例化这个类
                            $instance = $reflection->newInstance();
                            if ($instance instanceof GameApi) {
                                if ($instance->pay($payLog)) {
                                    $payLog->flag_game = 1;
                                    if ($payLog->save()) {
                                        $this->layout = '@frontend/views/layouts/sub.php';
                                        return $this->render('error', ['msg' => '充值成功！']);
                                    } else {
                                        //TODO 数据库更新失败，记录日志
                                        MyLog::write(['游戏已经以账，更新数据库失败' . var_export($payLog->getFirstError(), true)], Logger::LEVEL_ERROR, 'shengpayreturn', time());
                                        $this->layout = '@frontend/views/layouts/sub.php';
                                        return $this->render('error', ['msg' => '充值成功！']);
                                    }
                                }
                            }
                        } else {
                            //TODO 更新数据库失败 记录日志
                            MyLog::write(['更新数据库失败' . var_export($payLog->getFirstError(), true)], Logger::LEVEL_ERROR, 'shengpayreturn', time());
                            $this->layout = '@frontend/views/layouts/sub.php';
                            return $this->render('error', ['msg' => '支付失败！']);
                        }
                    } else {
                        $this->layout = '@frontend/views/layouts/sub.php';
                        return $this->render('error', ['msg' => '支付成功！']);
                    }
                } else {
                    $this->layout = '@frontend/views/layouts/sub.php';
                    return $this->render('error', ['msg' => '订单号错误！']);
                }
            } else {
                $this->layout = '@frontend/views/layouts/sub.php';
                return $this->render('error', ['msg' => '签名校验失败！']);
            }
        } else {
            $this->layout = '@frontend/views/layouts/sub.php';
            return $this->render('error', ['msg' => '签名校验失败！']);
        }
    }

    private function isEmpty($var)
    {
        if (isset($var) && $var != "") {
            return false;
        } else {
            return true;
        }
    }

    public function actionNotify()
    {
        $post = Yii::$app->request->post();
        $key = "G1Pl8Ka5v7Z0o2Bs98";

        $signMessage = "";
        $signMessage .= $this->isEmpty($post["Name"]) ? "" : $post["Name"] . "|";
        $signMessage .= $this->isEmpty($post["Version"]) ? "" : $post["Version"] . "|";
        $signMessage .= $this->isEmpty($post["Charset"]) ? "" : $post["Charset"] . "|";
        $signMessage .= $this->isEmpty($post["TraceNo"]) ? "" : $post["TraceNo"] . "|";
        $signMessage .= $this->isEmpty($post["MsgSender"]) ? "" : $post["MsgSender"] . "|";
        $signMessage .= $this->isEmpty($post["SendTime"]) ? "" : $post["SendTime"] . "|";
        $signMessage .= $this->isEmpty($post["InstCode"]) ? "" : $post["InstCode"] . "|";
        $signMessage .= $this->isEmpty($post["OrderNo"]) ? "" : $post["OrderNo"] . "|";
        $signMessage .= $this->isEmpty($post["OrderAmount"]) ? "" : $post["OrderAmount"] . "|";
        $signMessage .= $this->isEmpty($post["TransNo"]) ? "" : $post["TransNo"] . "|";
        $signMessage .= $this->isEmpty($post["TransAmount"]) ? "" : $post["TransAmount"] . "|";
        $signMessage .= $this->isEmpty($post["TransStatus"]) ? "" : $post["TransStatus"] . "|";
        $signMessage .= $this->isEmpty($post["TransType"]) ? "" : $post["TransType"] . "|";
        $signMessage .= $this->isEmpty($post["TransTime"]) ? "" : $post["TransTime"] . "|";
        $signMessage .= $this->isEmpty($post["MerchantNo"]) ? "" : $post["MerchantNo"] . "|";
        $signMessage .= $this->isEmpty($post["ErrorCode"]) ? "" : $post["ErrorCode"] . "|";
        $signMessage .= $this->isEmpty($post["ErrorMsg"]) ? "" : $post["ErrorMsg"] . "|";
        $signMessage .= $this->isEmpty($post["Ext1"]) ? "" : $post["Ext1"] . "|";
        $signMessage .= $this->isEmpty($post["SignType"]) ? "" : $post["SignType"] . "|";
        $signMessage .= $key;

        $signMsg = strtoupper(md5($signMessage));
        $SignMsgMerchant = $post["SignMsg"];


        if (isset($SignMsgMerchant) && strcasecmp($signMsg, $SignMsgMerchant) === 0) {
            $payLog = PayLog::findOne(['order_num' => $post["OrderNo"], 'flag' => 0]);
            if ($payLog) {
                $payLog->flag = 1;
                $payLog->plugin_oid = $post['TransNo'];
                $payLog->comfirm_ip = Yii::$app->request->getUserIP();
                $payLog->pay_done_time = time();
                $payLog->bank_oid = $post['BankSerialNo'];
                if ($payLog->save()) {
                    unset($payLog);
                    $payLog = PayLog::findOne([['order_num' => $post["OrderNo"], 'flag' => 1]]);
                    $gameTag = ucfirst($payLog->game->enname);
                    $reflection = new \ReflectionClass('\\frontend\\game\\' . $gameTag);
                    //实例化这个类
                    $instance = $reflection->newInstance();
                    if ($instance instanceof GameApi) {
                        if ($instance->pay($payLog)) {
                            $payLog->flag_game = 1;
                            if ($payLog->save()) {
                                echo 'OK';
                            } else {
                                //TODO 数据库更新失败，记录日志
                                MyLog::write(['游戏已经以账，更新数据库失败' . var_export($payLog->getFirstError(), true)], Logger::LEVEL_ERROR, 'shengpaynotify', time());
                                echo 'OK';
                                exit;
                            }
                        }
                    }
                } else {
                    //TODO 更新数据库失败 记录日志
                    MyLog::write(['更新数据库失败' . var_export($payLog->getFirstError(), true)], Logger::LEVEL_ERROR, 'shengpaynotify', time());
                    echo 'fail!';
                    exit;
                }
            } else {
                echo 'OK';
                exit;
            }
        } else {
            echo 'fail!';
            exit;
        }
    }

}