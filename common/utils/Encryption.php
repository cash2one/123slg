<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 16:01
 */

namespace common\utils;

use Yii;

class Encryption
{
    const SERCREKEY = 'SLG123';

    public static function encrypt($data)
    {
        return Yii::$app->getSecurity()->encryptByPassword($data, self::SERCREKEY);
    }

    public static function decrypt($encryptedData)
    {
        return Yii::$app->getSecurity()->decryptByPassword($encryptedData, self::SERCREKEY);
    }
}