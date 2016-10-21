<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paytype".
 *
 * @property integer $id
 * @property string $typename
 * @property integer $listorder
 * @property integer $flag
 * @property string $fee
 * @property string $paytag
 */
class Paytype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paytype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'listorder', 'flag'], 'integer'],
            [['fee'], 'number'],
            [['typename'], 'string', 'max' => 20],
            [['paytag'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'typename' => 'Typename',
            'listorder' => 'Listorder',
            'flag' => 'Flag',
            'fee' => 'Fee',
            'paytag' => 'Paytag',
        ];
    }
}
