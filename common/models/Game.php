<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property integer $id
 * @property string $gamename
 * @property string $enname
 * @property integer $orders
 * @property string $main_site
 * @property string $bbs_site
 * @property string $gold_name
 * @property double $cny_rate
 * @property string $percent
 * @property string $descript
 * @property integer $display
 * @property integer $ishot
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gamename', 'orders', 'cny_rate', 'gold_name'], 'required'],
            [['orders', 'display', 'ishot'], 'integer'],
            [['cny_rate', 'percent'], 'number'],
            [['gamename'], 'string', 'max' => 100],
            [['enname', 'main_site', 'bbs_site', 'descript'], 'string', 'max' => 255],
            [['gold_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gamename' => '游戏名',
            'enname' => '游戏标签',
            'orders' => '游戏排序',
            'main_site' => '游戏官网',
            'bbs_site' => '游戏论坛',
            'gold_name' => '游戏币名',
            'cny_rate' => '兑换比例',
            'percent' => '分成比例',
            'descript' => '游戏描述',
            'display' => '是否显示',
            'ishot' => '热门游戏',
        ];
    }

    /**
     * @inheritdoc
     * @return GameQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GameQuery(get_called_class());
    }

    public function getServer()
    {
        return $this->hasOne(Server::className(), ['game_id' => 'id'])->orderBy(['start_time' => SORT_DESC]);
    }

    public function getGamePic()
    {
        return $this->hasOne(GamePic::className(), ['game_id' => 'id']);
    }
}
