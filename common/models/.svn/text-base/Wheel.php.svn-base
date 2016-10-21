<?php

namespace common\models;

use common\models\Game;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "wheel".
 *
 * @property integer $id
 * @property integer $game_id
 * @property string $img_url
 */
class Wheel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wheel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id', 'img_url'], 'required'],
            [['game_id'], 'integer'],
            [['img_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => 'Game ID',
            'img_url' => 'Img Url',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    public function getGame()
    {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }
}
