<?php
namespace cms\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class Seo
 * @package backend\cms\models
 * @property integer $id
 * @property integer $game_id
 * @property string $title
 * @property string $keywords
 * @property string $description
 */
class Seo extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id', 'title', 'keywords', 'description'], 'required'],
            [['id', 'game_id'], 'integer'],
            [['title', 'keywords', 'description'], 'string'],
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
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description'
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