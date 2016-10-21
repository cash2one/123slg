<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property string $uid
 * @property string $real_name
 * @property string $idCard
 * @property integer $isbind
 * @property string $reg_email
 * @property integer $isAuth
 * @property string $btime
 * @property integer $consistency
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'real_name', 'idCard'], 'required'],
            [['uid', 'isbind', 'isAuth', 'btime'], 'integer'],
            [['real_name'], 'string', 'max' => 20],
            [['idCard'], 'string', 'max' => 40],
            [['reg_email'], 'string', 'max' => 255],
            [['uid'], 'unique'],
            [['idCard'], 'unique'],
            [['reg_email'], 'unique'],
            [['isbind'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'real_name' => 'Real Name',
            'idCard' => 'Id Card',
            'isbind' => 'Isbind',
            'reg_email' => 'Reg Email',
            'isAuth' => 'Is Auth',
            'btime' => 'Btime',
        ];
    }
}
