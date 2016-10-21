<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/10
 * Time: 17:28
 */

namespace frontend\payment\wxpay;

use Yii;
use yii\base\ExitException;

class Utils
{
    /**
     * 产生随机字符串，不长于32位
     * @param int $length
     * @return string
     */
    public static function makeNonceStr($length = 32)
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    /**
     * @param array
     * @return mixed
     */
    public static function makeSign($params)
    {
        //MyLog::write(var_export($params,true),Logger::LEVEL_INFO,'sign_params',time());
        //签名步骤一：按字典序排序参数
        ksort($params);
        $string = self::toUrlParams($params);
        //签名步骤二：在string后加入KEY
        $string = $string . "&key=" . Config::KEY;
        //签名步骤三：MD5加密
        $string = md5($string);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);
        //MyLog::write(var_export($result,true),Logger::LEVEL_INFO,'makeSign',time());
        return $result;
    }

    /**
     * @param $params
     * @return string
     */
    public static function toUrlParams($params)
    {
        $buff = "";
        foreach ($params as $k => $v) {
            if ($k != "sign" && $v != "" && !is_array($v)) {
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff;
    }

    /**
     * 数组转换成xml
     * @param $params
     * @return string
     * @throws ExitException
     */
    public static function toXml($params)
    {
        if (!is_array($params) || count($params) <= 0) {
            throw new ExitException(-1, '数组数据异常');
        }

        $xml = "<xml>";
        foreach ($params as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            } else {
                $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
            }
        }
        $xml .= "</xml>";
        return $xml;
    }

    /**
     * @param $xml 需要post的xml数据
     * @param $url url
     * @param bool $useCert 是否需要证书，默认不需要
     * @param int $second url执行超时时间，默认30s
     * @return mixed
     */
    public static function postXmlCurl($xml, $url, $useCert = false, $second = 30)
    {
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);

        //如果有配置代理这里就设置代理
        if (Config::CURL_PROXY_HOST != "0.0.0.0" && Config::CURL_PROXY_PORT != 0) {
            curl_setopt($ch, CURLOPT_PROXY, Config::CURL_PROXY_HOST);
            curl_setopt($ch, CURLOPT_PROXYPORT, Config::CURL_PROXY_PORT);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);//严格校验
        //设置header
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        if ($useCert == true) {
            //设置证书
            //使用证书：cert 与 key 分别属于两个.pem文件
            curl_setopt($ch, CURLOPT_SSLCERTTYPE, 'PEM');
            curl_setopt($ch, CURLOPT_SSLCERT, Yii::$app->basePath . Config::SSLCERT_PATH);
            curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
            curl_setopt($ch, CURLOPT_SSLKEY, Yii::$app->basePath . Config::SSLKEY_PATH);
        }
        //post提交方式
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        //运行curl
        $data = curl_exec($ch);
        $info = curl_getinfo($ch);
        //返回结果
        if ($data) {
            curl_close($ch);
            return $data;
        } else {
            $error = curl_errno($ch);
            curl_close($ch);
        }
    }


    public static function fromXml($xml)
    {
        if (!$xml) {
            return false;
        }
        //将XML转为array
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

    }

    public static function ReplyNotify($return_code, $needSign = true, $params = [])
    {
        //如果需要签名
        if ($needSign == true && $return_code == "SUCCESS") {
            self::makeSign($params);
        }
        return self::toXml($params);
    }
}