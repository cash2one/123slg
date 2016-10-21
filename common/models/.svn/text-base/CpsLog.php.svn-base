<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cps_log".
 *
 * @property integer $cps_id
 * @property integer $refer
 */
class CpsLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cps_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cps_id', 'refer'], 'required'],
            [['cps_id', 'refer'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cps_id' => 'Cps ID',
            'refer' => 'Refer',
        ];
    }

    public function getTgGameInfo()
    {
        return $this->hasOne(TgGameInfo::className(), ['id' => 'refer']);
    }

    public function getCpsMember()
    {
        return $this->hasOne(CpsMember::className(), ['id' => 'cps_id']);
    }
}
