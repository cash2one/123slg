<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tg_game_info".
 *
 * @property integer $id
 * @property string $refname
 * @property string $refurl
 * @property string $shorturl
 * @property integer $game_id
 * @property integer $area_num
 */
class TgGameInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tg_game_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['refname', 'game_id', 'area_num'], 'required'],
            [['game_id', 'area_num'], 'integer'],
            [['refname'], 'string', 'max' => 50],
            [['refurl', 'shorturl'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'refname' => 'Refname',
            'refurl' => 'Refurl',
            'shorturl' => 'Shorturl',
            'game_id' => 'Game ID',
            'area_num' => 'Area Num',
        ];
    }

    public function getServer()
    {
        return $this->hasOne(Server::className(), ['game_id' => 'game_id', 'server_id' => 'area_num']);
    }

    public function getGame()
    {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }

    public function getCpsLog()
    {
        return $this->hasOne(CpsLog::className(), ['refer' => 'id']);
    }

    public function getCps()
    {
        return $this->hasOne(CpsMember::className(), ['id' => 'cps_id']);
    }
}
