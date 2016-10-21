<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/10
 * Time: 16:59
 */

namespace frontend\payment;

use common\utils\MyLog;
use Yii;
use frontend\payment\wxpay\Config;
use frontend\payment\wxpay\Utils;
use yii\log\Logger;

class Wxpay
{
    const URL = "https://api.mch.weixin.qq.com/pay/unifiedorder";

    public function pay(array $get)
    {
        $params = [
            'appid' => Config::APPID,
            'mch_id' => Config::MCHID,
            'nonce_str' => Utils::makeNonceStr(),
            'body' => '深圳策略一二三-' . $get['discript'],
            'out_trade_no' => $get['order_num'],
            'total_fee' => $get['fee_cny'] * 100,//单位分
            'spbill_create_ip' => Yii::$app->request->getUserIP(),
            'notify_url' => 'http://www.123slg.com/wxpay/notify',
            'trade_type' => 'NATIVE',
        ];
        $params['sign'] = Utils::makeSign($params);
        $xml = Utils::toXml($params);
        $response = Utils::postXmlCurl($xml, self::URL, false, 30);
        $result = Utils::fromXml($response);
        if ($result['return_code'] == 'SUCCESS' && $result['return_msg'] == 'OK') {
            return $result['code_url'];
        } else {
            Yii::info('wxpay:' . var_export($result, true), 'wxpay');
            return false;
        }
    }

    public function query($transaction_id, $total_fee)
    {
        $params = [
            'appid' => Config::APPID,
            'mch_id' => Config::MCHID,
            'transaction_id' => $transaction_id,
            'nonce_str' => Utils::makeNonceStr(),
        ];
        $params['sign'] = Utils::makeSign($params);
        $xml = Utils::toXml($params);
        $response = Utils::postXmlCurl($xml, 'https://api.mch.weixin.qq.com/pay/orderquery', false, 30);
        $result = Utils::fromXml($response);
        if ($result['return_code'] == 'SUCCESS' && $result['return_msg'] == 'OK') {
            if ($result['result_code'] == 'SUCCESS') {
                if ($result['trade_state'] == 'SUCCESS') {
                    if ($result['total_fee'] == $total_fee) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    MyLog::write(['trade_state=' . $result['trade_state']], Logger::LEVEL_INFO, 'wxpay_query', time());
                    return false;
                }
            } else {
                Yii::info(var_export($result, true), 'wxpay_query');
                MyLog::write($result, Logger::LEVEL_INFO, 'wxpay_query', time());
                return false;
            }
        } else {
            Yii::info(var_export($result, true), 'wxpay_query');
            MyLog::write($result, Logger::LEVEL_INFO, 'wxpay_query', time());
            return false;
        }
    }
}