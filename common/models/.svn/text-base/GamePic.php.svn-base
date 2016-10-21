<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "game_pic".
 *
 * @property string $game_id
 * @property string $hot_game
 * @property string $new_server
 * @property string $game_center
 */
class GamePic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_pic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hot_game', 'new_server', 'game_center'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'game_id' => 'Game ID',
            'hot_game' => 'Hot Game',
            'new_server' => 'New Server',
            'game_center' => 'Game Center',
        ];
    }
}
