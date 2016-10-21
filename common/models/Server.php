<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "server".
 *
 * @property integer $server_id
 * @property integer $game_id
 * @property string $server_name
 * @property string $start_time
 * @property integer $state
 * @property string $ip
 * @property string $domain
 * @property string $server_key
 */
class Server extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'server';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['server_id', 'game_id', 'server_name', 'start_time', 'state'], 'required'],
            [['server_id', 'game_id', 'start_time', 'state'], 'integer'],
            [['server_name'], 'string', 'max' => 100],
            [['ip'], 'string', 'max' => 45],
            [['domain'], 'string', 'max' => 255],
            [['server_key'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'server_id' => '服务器ID',
            'game_id' => '游戏ID',
            'server_name' => '服务器名',
            'start_time' => '开服时间',
            'state' => '服务器状态',
            'ip' => '服务器IP',
            'domain' => '服务器域名',
            'server_key' => '服务器密钥',
        ];
    }

    /**
     * @inheritdoc
     * @return ServerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServerQuery(get_called_class());
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * 关联模型
     * 用法：$server = Server::findOne(['id'=>$id]);
     *       $server->game;获得的就是当前server所对应的游戏信息
     * @return \yii\db\ActiveQuery
     */
    public function getGame()
    {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }
}
