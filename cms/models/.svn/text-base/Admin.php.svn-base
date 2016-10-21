<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $status
 * @property string $last_time
 * @property string $last_ip
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * 后台管理员状态 0 删除 10 激活
     */
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['status'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
            [['last_time', 'last_ip'], 'string', 'max' => 45],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
            'last_time' => 'Last Time',
            'last_ip' => 'Last Ip',
        ];
    }

    /**
     * @inheritdoc
     * @return AdminQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdminQuery(get_called_class());
    }

    /**
     * @param Admin $admin
     * @param $password
     * @return bool
     */
    public static function validatePassword(array $admin, $password)
    {

        if (Yii::$app->getSecurity()->validatePassword($password, $admin['password'])) {
            return true;
        } else {
            return false;
        }


    }

    /**
     * @param Admin $admin
     * @return bool
     */
    public static function checkActive(array $admin)
    {
        if ($admin['status'] == self::STATUS_ACTIVE) {
            return true;
        } else {
            return false;
        }
    }
}
