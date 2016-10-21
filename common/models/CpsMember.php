<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cps_member".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $pid
 */
class CpsMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cps_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['pid'], 'integer'],
            [['username', 'password'], 'string', 'max' => 100],
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
            'username' => '用户名',
            'password' => 'Password',
            'pid' => 'Pid',
        ];
    }

    public function getCpsLog()
    {
        return $this->hasMany(CpsLog::className(), ['cps_id' => 'id']);
    }
}
