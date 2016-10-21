<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/26
 * Time: 14:22
 */

namespace common\service;


use common\models\Link;

/**
 * Class LinkService
 * @package common\service
 */
class LinkService
{

    /**
     * @param array $data
     * @return bool
     */
    public static function add(array $data)
    {
        $link = new Link();
        $link->link_name = $data['link_name'];
        $link->link_url = $data['link_url'];
        return $link->save();
    }

    /**
     * @param int $sort
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function linkList($sort = SORT_DESC)
    {
        return Link::find()->asArray()->orderBy(['id' => $sort])->all();
    }
}