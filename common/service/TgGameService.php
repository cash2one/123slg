<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/23
 * Time: 10:21
 */

namespace common\service;


use common\models\CpsLog;
use common\models\TgGameInfo;
use cps\service\CpsMemberService;
use yii\data\Pagination;

class TgGameService
{
    public static function pagination($game_id, $server_id, $cps_id)
    {
        $query = TgGameInfo::find()->where("1");
        if ($game_id) {
            $query->andWhere(['game_id' => $game_id]);
        }
        if ($server_id) {
            $query->andWhere(['area_num' => $server_id]);
        }
        if ($cps_id) {
            $query->innerJoin(CpsLog::tableName(), 'cps_log.refer = tg_game_info.id')->andWhere(['cps_log.cps_id' => $cps_id]);
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy(['id' => SORT_DESC])->all();

        return [
            'totalCount' => $count,
            'list' => $articles,
            'pagination' => $pagination,
        ];
    }

    public static function checkInfo($game_id, $server_id, $cps_id)
    {
        $tgGame = TgGameInfo::find()->where(['game_id' => $game_id, 'area_num' => $server_id])->innerJoinWith([
            'cpsLog' => function (\yii\db\ActiveQuery $query) use ($cps_id) {
                $query->where(['cps_id' => $cps_id]);
            }
        ])->one();

        if ($tgGame) {
            return false;
        } else {
            return CpsMemberService::getInstance()->findById($cps_id);
        }
    }

    public static function tgGameList($cps_id, $pid = 0)
    {
        $result = [];
        if ($pid == 0) {
            $result = TgGameInfo::find()->all();
        } else {
            $result = CpsLog::find()->where(['cps_id' => $cps_id])->all();
        }
        return $result;
    }
}