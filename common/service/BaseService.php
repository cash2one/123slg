<?php

namespace common\service;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/12
 * Time: 17:02
 */
class BaseService
{
    private static $_instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * 把反序列化方法声明为 private，防止反序列化单例
     *
     * @return void
     */
    private function __wakeup()
    {
    }

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        $class = get_called_class();
        if (empty(self::$_instance[$class])) {
            self::$_instance[$class] = new static();
        }
        return self::$_instance[$class];
    }
}