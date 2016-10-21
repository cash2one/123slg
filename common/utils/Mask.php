<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 14:08
 */

namespace common\utils;

/**
 * 给字符串添加掩码
 * Class Mask
 * @package common\utils
 */
class Mask
{

    /**
     * @param $str email
     * @return bool|string
     */
    public static function email($str)
    {
        $temp = explode('@', $str);
        if ($temp[0] == $str) {
            return false;
        }
        $mask = '******';
        return substr_replace($temp[0], $mask, 1, strlen($temp[0]) - 2) . '@' . $temp[1];
    }

    public static function idCard($str)
    {
        $mask = '**********';
        return substr_replace($str, $mask, 4,10);
    }
}