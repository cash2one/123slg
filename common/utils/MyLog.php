<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/19 0019
 * Time: 上午 11:04
 */

namespace common\utils;


class MyLog
{

    public static function write($message, $level, $category, $timestamp)
    {
        $log = new FileLog();
        $log->messages[] = [$message, $level, $category, $timestamp];
        $log->export();
    }
}