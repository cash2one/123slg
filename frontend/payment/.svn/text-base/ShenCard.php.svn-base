<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/14
 * Time: 16:44
 */

namespace frontend\payment;


class ShenCard
{
    public function pay(array $get)
    {
        $time = time();
        $data['Name'] = 'B2CPayment';
        $data['Version'] = 'V4.1.1.1.1';
        $data['Charset'] = 'UTF-8';
        $data['TraceNo'] = $get['order_num'];
        $data['MsgSender'] = '659528';
        $data['SendTime'] = date("YmdHis", $time);
        $data['OrderNo'] = $get['order_num'];
        $data['OrderAmount'] = sprintf('%.2f', floor($get['fee_cny']));
        $data['OrderTime'] = date("YmdHis", $time);
        $data['Currency'] = 'CNY';
        $data['Language'] = 'zh-CN';
        $data['PageUrl'] = 'http://www.123slg.com/sheng/return';
        $data['NotifyUrl'] = 'http://www.123slg.com/sheng/notify';
        $data['ProductName'] = $get['discript'];
        $data['ProductDesc'] = $get['discript'];
//        $data['payType'] = $bankname['PayType'];//支付类型
//        $data['payChannel'] = $bankname['PayChannel'];//支付渠道
//        $data['instCode'] = $bankname['InstCode'];//支付机构
        $data['SignType'] = 'MD5';
        //$data['merchantKey'] = 'G1Pl8Ka5v7Z0o2Bs98';
        $data['SignMsg'] = self::makeSign($data);
        echo self::buildHtml($data);
//        $data['md5'] = strtoupper(md5($data['sign']));

    }

    public static function makeSign($data)
    {
//        $len = count($data);
        $str = '';
//        $i = 1;
        foreach ($data as $key => $val) {
            $str .= $val;
        }

        return md5($str . 'G1Pl8Ka5v7Z0o2Bs98');
    }

    public static function buildHtml($data)
    {
        $html = '<form name="form1" id="form1" action="https://cardpay.shengpay.com/web-acquire-channel/cashier.htm" method="post">';
        foreach ($data as $key => $val) {
            $html .= '<input type="hidden" name="' . $key . '"  value="' . $val . '"/>';
        }
        $html .= '</form>';
        $html .= '<script>document.forms["form1"].submit();</script>';
        return $html;
    }
}