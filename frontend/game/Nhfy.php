<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 17:13
 */

namespace frontend\game;


class Nhfy extends GameApi
{
    const KEY = '8542gd4jgd3e23bdt43hjet34vrqrhf8';
    const AGENT = 'slg123';

    public function login(array $data)
    {
        $username = $data['uid'];
        $server_id = $data['server_id'];
        $cm_flag = $data['isAuth'] == 0 ? 'n' : 'y';;    //是	防沉迷标示，y: n:,y表示被防沉迷，n表示不需要被防沉迷
        $time = time();//	是	服务请求时间戳，格式int
        $sum = strtoupper(md5(self::KEY . 'agent' . self::AGENT . 'cm_flag' . $cm_flag . 'server_id' . $server_id . 'time' . $time . 'username' . $username));
        return "http://swlogin.123slg.com/login_slg123.php?agent=" . self::AGENT . "&username={$username}&server_id={$server_id}&cm_flag={$cm_flag}&time={$time}&sum={$sum}";
    }

    public function pay($data)
    {
        $user_id = $data['pay_uid'];
        $server_id = $data['sid'];
        $order_id = $data['order_num'];
        $amount = floor($data['fee_cny']) * 10;
        $timestamp = time();
        $sign = strtoupper(md5(self::KEY . 'agent' . self::AGENT . 'amount' . $amount . 'order_id' . $order_id . 'server_id' . $server_id . 'timestamp' . $timestamp . 'user_id' . $user_id));
        $url = "http://swpay.123slg.com/pay_slg123.php?agent=" . self::AGENT . "&user_id={$user_id}&server_id={$server_id}&order_id={$order_id}&amount={$amount}&timestamp={$timestamp}&sign={$sign}";
        $result = file_get_contents($url);
        return $result == 1 ? 1 : 0;
    }

    public function role()
    {
        // TODO: Implement role() method.
    }

    public function card()
    {
        // TODO: Implement card() method.
    }
}