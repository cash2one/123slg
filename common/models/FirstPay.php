<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "first_pay".
 *
 * @property string $order_num
 * @property string $uid
 * @property string $username
 * @property string $pay_cny
 * @property string $pay_time
 * @property integer $flag_game
 * @property string $pay_ip
 * @property integer $game_id
 * @property string $server_id
 * @property integer $refer
 */
class FirstPay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'first_pay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_num', 'username', 'pay_cny', 'pay_time', 'game_id', 'server_id', 'refer'], 'required'],
            [['uid', 'pay_time', 'flag_game', 'game_id', 'server_id', 'refer'], 'integer'],
            [['pay_cny'], 'number'],
            [['order_num'], 'string', 'max' => 255],
            [['username'], 'string', 'max' => 20],
            [['pay_ip'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_num' => 'Order Num',
            'uid' => 'Uid',
            'username' => 'Username',
            'pay_cny' => 'Pay Cny',
            'pay_time' => 'Pay Time',
            'flag_game' => 'Flag Game',
            'pay_ip' => 'Pay Ip',
            'game_id' => 'Game ID',
            'server_id' => 'Server ID',
            'refer' => 'Refer',
        ];
    }

    public function getTgGame()
    {
        return $this->hasOne(TgGameInfo::className(), ['id' => 'refer']);
    }

    public function getServer()
    {
        return $this->hasOne(Server::className(), ['game_id' => 'game_id', 'server_id' => 'server_id']);
    }
}
