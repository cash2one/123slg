<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cps_pay".
 *
 * @property integer $id
 * @property string $cpsname
 * @property integer $pid
 * @property integer $active
 * @property integer $refer
 * @property string $order_num
 * @property string $uid
 * @property string $username
 * @property string $pay_uid
 * @property string $pay_username
 * @property string $paytypename
 * @property string $paytype
 * @property string $pay_cny
 * @property string $pay_time
 * @property integer $flag
 * @property string $pay_ip
 * @property string $comfirm_ip
 * @property integer $gid
 * @property integer $sid
 * @property string $discript
 * @property integer $flag_game
 */
class CpsPay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cps_pay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'active', 'refer', 'uid', 'pay_uid', 'paytype', 'pay_time', 'flag', 'gid', 'sid', 'flag_game'], 'integer'],
            [['cpsname', 'refer', 'order_num', 'paytype', 'pay_cny', 'pay_time'], 'required'],
            [['pay_cny'], 'number'],
            [['cpsname'], 'string', 'max' => 100],
            [['order_num', 'paytypename', 'discript'], 'string', 'max' => 255],
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
            'id' => 'ID',
            'cpsname' => 'Cpsname',
            'pid' => 'Pid',
            'active' => 'Active',
            'refer' => 'Refer',
            'order_num' => 'Order Num',
            'uid' => 'Uid',
            'username' => 'Username',
            'pay_uid' => 'Pay Uid',
            'pay_username' => 'Pay Username',
            'paytypename' => 'Paytypename',
            'paytype' => 'Paytype',
            'pay_cny' => 'Pay Cny',
            'pay_time' => 'Pay Time',
            'flag' => 'Flag',
            'pay_ip' => 'Pay Ip',
            'comfirm_ip' => 'Comfirm Ip',
            'gid' => 'Gid',
            'sid' => 'Sid',
            'discript' => 'Discript',
            'flag_game' => 'Flag Game',
        ];
    }
}
