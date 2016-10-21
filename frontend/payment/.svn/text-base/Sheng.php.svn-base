<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/14
 * Time: 11:42
 */

namespace frontend\payment;

use Yii;

class Sheng
{
    public function pay(array $get)
    {
        //var_dump($data, $bankname);
        $time = time();
        $data['Name'] = "B2CPayment";
        $data['Version'] = "V4.1.1.1.1";
        $data['Charset'] = "UTF-8";
        $data['MsgSender'] = "659528";//商户号
        //$data['MsgSender'] = "703450";//商户号
        //$data['SendTime'] = '';
        $data['OrderNo'] = $get['order_num'];
        $data['OrderAmount'] = $get["fee_cny"];
        $data['OrderTime'] = date("YmdHis");
        $data['PayType'] = "PT001";
//        if (isset($PayType) && strcasecmp($PayType, "PT001") === 0) {
//            $InstCode = $_POST["InstCode"];
//        } else {
//            $InstCode = "";
//        }
        $data['InstCode'] = $get['bankCode'];
        $data['PageUrl'] = "http://www.123slg.com/sheng/return";//前台返回
        //$data['BackUrl'] = "";//收银台返回
        $data['NotifyUrl'] = "http://www.123slg.com/sheng/notify";//后台返回
        $data['ProductName'] = $get['discript'];//商品名称
        //$data['BuyerContact'] = '';
        $data['BuyerIp'] = Yii::$app->request->getUserIP();
        $data['Ext1'] = md5('zns');
        $data['SignType'] = "MD5";
        $key = "G1Pl8Ka5v7Z0o2Bs98";
        //var_dump($data);
        //echo "<br>";
//        exit;
//加密数据串
        $testStr = "";
        $testStr .= $this->isEmpty($data['Name']) ? "" : $data['Name'] . "|";
        $testStr .= $this->isEmpty($data['Version']) ? "" : $data['Version'] . "|";
        $testStr .= $this->isEmpty($data['Charset']) ? "" : $data['Charset'] . "|";
        $testStr .= $this->isEmpty($data['MsgSender']) ? "" : $data['MsgSender'] . "|";
        //$testStr .= $this->isEmpty($data['SendTime']) ? "" : $data['SendTime'] . "|";
        $testStr .= $this->isEmpty($data['OrderNo']) ? "" : $data['OrderNo'] . "|";
        $testStr .= $this->isEmpty($data['OrderAmount']) ? "" : $data['OrderAmount'] . "|";
        $testStr .= $this->isEmpty($data['OrderTime']) ? "" : $data['OrderTime'] . "|";
        $testStr .= $this->isEmpty($data['PayType']) ? "" : $data['PayType'] . "|";
        $testStr .= $this->isEmpty($data['InstCode']) ? "" : $data['InstCode'] . "|";
        $testStr .= $this->isEmpty($data['PageUrl']) ? "" : $data['PageUrl'] . "|";
        $testStr .= $this->isEmpty($data['NotifyUrl']) ? "" : $data['NotifyUrl'] . "|";
        $testStr .= $this->isEmpty($data['ProductName']) ? "" : $data['ProductName'] . "|";
        //$testStr .= $this->isEmpty($data['BuyerContact']) ? "" : $data['BuyerContact'] . "|";
        $testStr .= $this->isEmpty($data['BuyerIp']) ? "" : $data['BuyerIp'] . "|";
        $testStr .= $this->isEmpty($data['Ext1']) ? "" : $data['Ext1'] . "|";
        $testStr .= $this->isEmpty($data['SignType']) ? "" : $data['SignType'] . "|";
        $testStr .= $key;
        //echo $testStr . "<br>";

        $data['signMsg'] = md5($testStr);
        //echo $data['signMsg'];exit;

        $html = '<form id="shengpaysubmit" name="shengpaysubmit" method="post" action="https://mas.shengpay.com/web-acquire-channel/cashier.htm">';
        $html .= '<input name="Name"  type="hidden" id="Name" value="' . $data['Name'] . '" />';
        $html .= '<input name="Version"  type="hidden" id="Version" value="' . $data['Version'] . '" />';
        $html .= '<input name="Charset"  type="hidden" id="Charset" value="' . $data['Charset'] . '" />';
        $html .= '<input name="MsgSender"  type="hidden" id="MsgSender" value="' . $data['MsgSender'] . '" />';
        $html .= '<input name="SendTime"  type="hidden" id="SendTime" value="' . $data['SendTime'] . '" />';
        $html .= '<input name="OrderNo"  type="hidden" id="OrderNo" value="' . $data['OrderNo'] . '" />';
        $html .= '<input name="OrderAmount"  type="hidden" id="OrderAmount" value="' . $data['OrderAmount'] . '" />';
        $html .= '<input name="OrderTime"  type="hidden" id="OrderTime" value="' . $data['OrderTime'] . '" />';
        $html .= '<input name="PayType"  type="hidden" id="PayType" value="' . $data['PayType'] . '" />';
        $html .= '<input name="InstCode"  type="hidden" id="InstCode" value="' . $data['InstCode'] . '" />';
        $html .= '<input name="PageUrl"  type="hidden" id="PageUrl" value="' . $data['PageUrl'] . '" />';
        $html .= '<input name="BackUrl"  type="hidden" id="BackUrl" value="' . $data['BackUrl'] . '" />';
        $html .= '<input name="NotifyUrl"  type="hidden" id="NotifyUrl" value="' . $data['NotifyUrl'] . '" />';
        $html .= '<input name="ProductName"  type="hidden" id="ProductName" value="' . $data['ProductName'] . '" />';
        $html .= '<input name="BuyerContact"  type="hidden" id="BuyerContact" value="' . $data['BuyerContact'] . '" />';
        $html .= '<input name="BuyerIp"  type="hidden" id="BuyerIp" value="' . $data['BuyerIp'] . '" />';
        $html .= '<input name="Ext1"  type="hidden" id="Ext1" value="' . $data['Ext1'] . '" />';
        $html .= '<input name="SignType"  type="hidden" id="SignType" value="' . $data['SignType'] . '" />';
        $html .= '<input name="SignMsg"  type="hidden" id="SignMsg" value="' . $data['signMsg'] . '" />';
        $html .= '</form>';
        $html .= "<script>document.forms['shengpaysubmit'].submit();</script>";
        //var_dump($data);exit;
        return $html;
    }

    private function isEmpty($var)
    {
        if (isset($var) && $var != "") {
            return false;
        } else {
            return true;
        }
    }
}