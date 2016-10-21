<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "game_login_log".
 *
 * @property string $uid
 * @property string $username
 * @property integer $game_id
 * @property integer $server_id
 * @property string $login_times
 * @property string $rolename
 * @property string $rolelevel
 * @property string $last_ip
 * @property string $first_ip
 * @property integer $first_time
 * @property integer $last_time
 * @property integer $refer
 */
class GameLoginLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_login_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'username', 'game_id', 'server_id', 'first_ip', 'first_time', 'refer'], 'required'],
            [['uid', 'game_id', 'server_id', 'login_times', 'rolelevel', 'first_time', 'last_time', 'refer'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['rolename', 'last_ip'], 'string', 'max' => 20],
            [['first_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'username' => 'Username',
            'game_id' => 'Game ID',
            'server_id' => 'Server ID',
            'login_times' => 'Login Times',
            'rolename' => 'Rolename',
            'rolelevel' => 'Rolelevel',
            'last_ip' => 'Last Ip',
            'first_ip' => 'First Ip',
            'first_time' => 'First Time',
            'last_time' => 'Last Time',
            'refer' => 'Refer',
        ];
    }

    public function getGame()
    {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }

    public function getServer()
    {
        return $this->hasOne(Server::className(), ['game_id' => 'game_id', 'server_id' => 'server_id']);
    }

    public function getCpsLog()
    {
        return $this->hasOne(CpsLog::className(), ['refer' => 'refer']);
    }
}
