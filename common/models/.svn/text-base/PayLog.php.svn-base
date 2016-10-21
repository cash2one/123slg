<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pay_log".
 *
 * @property string $order_num
 * @property string $uid
 * @property string $username
 * @property string $pay_uid
 * @property string $pay_username
 * @property string $paytypename
 * @property string $paytype
 * @property string $pay_cny
 * @property string $fee_cny
 * @property double $fee_rate
 * @property string $pay_time
 * @property string $pay_done_time
 * @property integer $flag_game
 * @property integer $flag
 * @property string $pay_ip
 * @property string $comfirm_ip
 * @property integer $gid
 * @property integer $sid
 * @property string $discript
 * @property string $plugin_oid
 * @property string $bank_oid
 * @property string $remark
 */
class PayLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pay_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_num', 'paytype', 'pay_cny', 'pay_time'], 'required'],
            [['pay_uid', 'paytype', 'pay_time', 'pay_done_time', 'flag_game', 'flag', 'gid', 'sid'], 'integer'],
            [['pay_cny', 'fee_cny'], 'number'],
            [['order_num', 'paytypename', 'discript', 'plugin_oid', 'bank_oid', 'remark'], 'string', 'max' => 255],
            [['username', 'pay_username'], 'string', 'max' => 20],
            [['pay_ip', 'comfirm_ip'], 'string', 'max' => 45],
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
            'pay_uid' => 'Pay Uid',
            'pay_username' => 'Pay Username',
            'paytypename' => 'Paytypename',
            'paytype' => 'Paytype',
            'pay_cny' => 'Pay Cny',
            'fee_cny' => 'Fee Cny',
            'fee_rate' => 'Fee Rate',
            'pay_time' => 'Pay Time',
            'pay_done_time' => 'Pay Done Time',
            'flag_game' => 'Flag Game',
            'flag' => 'Flag',
            'pay_ip' => 'Pay Ip',
            'comfirm_ip' => 'Comfirm Ip',
            'gid' => 'Gid',
            'sid' => 'Sid',
            'discript' => 'Discript',
            'plugin_oid' => 'Plugin Oid',
            'bank_oid' => 'Bank Oid',
            'remark' => 'Remark',
        ];
    }

    public function getGame()
    {
        return $this->hasOne(Game::className(), ['id' => 'gid']);
    }
}
