<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/10
 * Time: 14:47
 */

namespace frontend\controllers;

use common\models\PayLog;
use frontend\game\GameApi;
use frontend\payment\alipay\AlipayNotify;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class AlipayController extends Controller
{
    public $enableCsrfValidation = false;
    protected $alipay_config;

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if ($this->enableCsrfValidation && Yii::$app->getErrorHandler()->exception === null && !Yii::$app->getRequest()->validateCsrfToken()) {
                throw new BadRequestHttpException(Yii::t('yii', 'Unable to verify your data submission.'));
            }
            $this->alipay_config = require(dirname(__DIR__) . '/payment/alipay/config.php');
            return true;
        }

        return false;
    }

    /**
     * 前台回调地址
     */
    public function actionReturn()
    {
        $get = Yii::$app->request->get();
        file_put_contents('/data/web/slg123/frontend/runtime/logs/alipay_return.txt', var_export($get, true));
        $alipayNotify = new AlipayNotify($this->alipay_config);
        $verify_result = $alipayNotify->verifyReturn($get);
        if ($verify_result) {//验证成功
            //商户订单号
            $out_trade_no = $get['out_trade_no'];
            //支付宝交易号
            $trade_no = $get['trade_no'];
            //交易状态
            $trade_status = $get['trade_status'];
            if ($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS') {
                $payLog = PayLog::findOne(['order_num' => $out_trade_no]);
                if ($payLog && $payLog->flag == 0) {
                    $payLog->flag = 1;
                    $payLog->plugin_oid = $trade_no;
                    $payLog->comfirm_ip = Yii::$app->request->getUserIP();
                    $payLog->pay_done_time = time();
                    if ($payLog->save()) {
                        unset($payLog);
                        $payLog = PayLog::findOne(['order_num' => $out_trade_no]);
                        $gameTag = $payLog->game->enname;
                        $reflection = new \ReflectionClass('\\frontend\\game\\' . ucfirst($gameTag));
                        //实例化这个类
                        $instance = $reflection->newInstance();
                        if ($instance instanceof GameApi) {
                            if ($instance->pay($payLog)) {
                                $payLog->flag_game = 1;
                                if ($payLog->save()) {
                                    // TODO 游戏充值成功
                                    $this->layout = '@frontend/views/layouts/sub.php';
                                    return $this->render('success');
                                } else {
                                    //TODO 游戏充值失败
                                    Yii::info('订单更新失败：' . var_export($payLog->getFirstError(), true), 'alipay return_url');
                                }
                            } else {
                                //TODO 游戏充值失败，请联系客服处理 返回前台玩家
                                $this->layout = '@frontend/views/layouts/sub.php';
                                $msg = '游戏充值失败';
                                return $this->render('error', ['msg' => $msg, 'flag' => 0]);
                            }
                        }
                    } else {
                        //TODO 订单更新失败，请联系客服处理
                        Yii::info('订单更新失败：' . var_export($payLog->getFirstError(), true), 'alipay return_url');
                        $this->layout = '@frontend/views/layouts/sub.php';
                        $msg = var_export($payLog->getFirstError());
                        return $this->render('error', ['msg' => $msg, 'flag' => 0]);
                    }
                } else {
                    //TODO 订单号不存在 充值失败
                    Yii::info('支付失败信息：订单号不存在', 'alipay return_url');
                    $this->layout = '@frontend/views/layouts/sub.php';
                    $msg = '订单号不存在';
                    return $this->render('error', ['msg' => $msg, 'flag' => 0]);
                }
            } else {
                //TODO 支付宝返回 支付失败信息
                Yii::info('支付失败信息：' . $trade_status, 'alipay return_url');
                $this->layout = '@frontend/views/layouts/sub.php';
                $msg = '支付宝充值申请失败';
                return $this->render('error', ['msg' => $trade_status, 'flag' => 0]);
            }
        } else {
            //验证失败
            Yii::info('验证失败：' . var_export($get, true), 'alipay return_url');
            $this->layout = '@frontend/views/layouts/sub.php';
            $msg = '支付宝充值申请失败';
            return $this->render('error', ['msg' => $msg, 'flag' => 1]);
        }
    }

    /**
     * 支付宝后台通知地址
     */
    public function actionNotify()
    {
        $alipayNotify = new AlipayNotify($this->alipay_config);
        $post = Yii::$app->request->post();
        $verify_result = $alipayNotify->verifyNotify($post);

        if ($verify_result) {//验证成功
            //订单号
            $out_trade_no = $post['out_trade_no'];
            //支付宝交易号
            $trade_no = $post['trade_no'];
            //交易状态
            $trade_status = $post['trade_status'];
            if ($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS') {
                $payLog = PayLog::findOne(['order_num' => $out_trade_no]);
                if ($payLog && $payLog->flag == 0) {
                    $payLog->flag = 1;
                    $payLog->plugin_oid = $trade_no;
                    $payLog->comfirm_ip = Yii::$app->request->getUserIP();
                    $payLog->pay_done_time = time();
                    if ($payLog->save()) {
                        unset($payLog);
                        $payLog = PayLog::findOne(['order_num' => $out_trade_no]);
                        $gameTag = ucfirst($payLog->game->enname);
                        $reflection = new \ReflectionClass('\\frontend\\game\\' . $gameTag);
                        //实例化这个类
                        $instance = $reflection->newInstance();
                        if ($instance instanceof GameApi) {
                            if ($instance->pay($payLog)) {
                                $payLog->flag_game = 1;
                                if ($payLog->save()) {
                                    echo "success";
                                } else {
                                    //TODO 数据库更新失败，记录日志
                                    Yii::info('支付失败信息：更新数据库失败', 'alipay notify_url');
                                }
                            }
                        }
                    } else {
                        //TODO 更新数据库失败 记录日志
                        Yii::info('支付失败信息：更新数据库失败', 'alipay notify_url');
                    }
                } else {
                    //TODO 订单号不存在 充值失败
                    Yii::info('支付失败信息：订单号不存在', 'alipay notify_url');
                    echo "fail";
                }
            } else {
                //TODO 支付宝返回 支付失败信息
                Yii::info('支付失败信息：' . $trade_status, 'alipay notify_url');
                echo "fail";
            }
            echo "success";        //请不要修改或删除
        } else {
            //验证失败
            echo "fail";
            //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
        }
    }
}