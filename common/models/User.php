<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $uid
 * @property string $username
 * @property string $password
 * @property string $reg_ip
 * @property string $reg_time
 * @property string $login_times
 * @property string $last_ip
 * @property string $last_time
 * @property string $refer
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['reg_time', 'login_times', 'last_time', 'refer'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 74],
            [['reg_ip', 'last_ip'], 'string', 'max' => 45],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'username' => '用户名',
            'password' => '密码',
            'reg_ip' => 'Reg Ip',
            'reg_time' => 'Reg Time',
            'login_times' => 'Login Times',
            'last_ip' => 'Last Ip',
            'last_time' => 'Last Time',
            'refer' => 'Refer',
        ];
    }

    /**
     * @param array $user
     * @param $password
     * @return bool
     */
    public static function validatePassword(array $user, $password)
    {
        if (Yii::$app->getSecurity()->validatePassword($password, $user['password'])) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserInfo()
    {
        return $this->hasOne(UserInfo::className(), ['uid' => 'uid']);
    }
}
