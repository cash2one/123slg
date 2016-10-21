<?php
namespace cms\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class Column
 * @package backend\cms\models
 * @property integer $id
 * @property integer $game_id
 * @property string $c_name
 * @property string $s_name
 * @property string $img
 * @property string $directory
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $url
 */
class Column extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'column';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id', 'c_name', 's_name'], 'required'],
            [['id', 'game_id'], 'integer'],
            [['c_name', 's_name', 'img', 'title', 'keywords', 'description', 'url'], 'string'],
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
            'c_name' => 'C Name',
            's_name' => 'S Name',
            'img' => 'Img',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'url' => 'Url'
        ];
    }

    /**
     * @return null|object
     * @throws \yii\base\InvalidConfigException
     */
    public static function getDb()
    {
        return Yii::$app->get('cms');
    }
}