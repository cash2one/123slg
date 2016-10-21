<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/30
 * Time: 13:26
 */

namespace common\utils;

/**
 * 及时生效cookie
 * 因为YII的cookie是保存的对象，在前端获取不到，所有这里用原生的写法
 * Class Cookie
 * @package common\utils
 */
class Cookie
{
    public static function cookie($var, $value = '', $time = 0, $path = '/', $domain = '123slg.com', $s = false)
    {
        $_COOKIE[$var] = $value;
        if (is_array($value)) {
            foreach ($value as $k => $v) {
                setcookie($var . '[' . $k . ']', $v, $time, $path, $domain, $s);
            }
        } else {
            setcookie($var, $value, $time, $path, $domain, $s);
        }
    }
}