<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/10
 * Time: 17:30
 */

namespace common\utils;


class Utils
{
    /**
     * @return string 生成订单号
     */
    public static function makeOutTradeNo()
    {
        return date("YmdHis") . rand(0000, 9999);
    }
}