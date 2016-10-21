<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/25
 * Time: 17:59
 */

namespace common\service;


class Singleton
{
    /**
     * @var 这个类的 *单例*
     */
    private static $instance;

    /**
     * 返回这个类的 *单例*
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * 把构造函数声明为 protected，防止用 `new` 操作符在这个类之外创建新的实例
     */
    protected function __construct()
    {
    }

    /**
     * 把 clone 方法声明为 private，防止克隆单例
     *
     * @return void
     */
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
}