<?php
namespace frontend\payment;

use frontend\payment\alipay\AlipaySubmit;


/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/10
 * Time: 10:28
 */
class Alipay
{
    /**
     * @var array 配置文件
     */
    private $alipay_config;

    /**
     * @var string 商户订单号，商户网站订单系统中唯一订单号
     */
    private $out_trade_no;

    /**
     * @var string 订单名称
     */
    private $subject;

    /**
     * @var integer 订单金额
     */
    private $total_fee;

    /**
     * @var integer 商品描述 可选
     */
    private $body;

    public function __construct()
    {
        $this->setAlipayConfig();
    }

    /**
     * @return mixed
     */
    public function getAlipayConfig()
    {
        return $this->alipay_config;
    }

    /**
     * @param mixed $alipay_config
     */
    public function setAlipayConfig()
    {
        $this->alipay_config = require(__DIR__ . '/alipay/config.php');
    }

    public function pay(array $get)
    {
        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service" => $this->alipay_config['service'],
            "partner" => $this->alipay_config['partner'],
            "seller_id" => $this->alipay_config['seller_id'],
            "payment_type" => $this->alipay_config['payment_type'],
            "notify_url" => $this->alipay_config['notify_url'],
            "return_url" => $this->alipay_config['return_url'],

            "anti_phishing_key" => $this->alipay_config['anti_phishing_key'],
            "exter_invoke_ip" => $this->alipay_config['exter_invoke_ip'],
            "out_trade_no" => $get['order_num'],
            "subject" => $get['discript'],
            "total_fee" => $get['fee_cny'],
            "body" => $get['discript'],
            "_input_charset" => trim(strtolower($this->alipay_config['input_charset']))
        );
        
        //建立请求
        $alipaySubmit = new AlipaySubmit($this->alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter, "get", "确认");
        return $html_text;
    }
}