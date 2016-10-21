<?php
namespace common\service;

use common\models\Game;
use yii\data\Pagination;

/**
 * Created by PhpStorm.
 * User: steven
 * Date: 16/8/13
 * Time: 下午10:58
 */
class GameService
{
    /**
     * @param array $data
     * @param $id
     * @return bool
     */
    public static function editGame(array $data, $id)
    {
        $flag = false;
        if ($id) {
            $game = Game::findOne(['id' => $id]);
            $game->gamename = $data['gamename'];
            $game->enname = $data['tag'];
            $game->orders = $data['orders'];
            $game->main_site = $data['main_site'];
            $game->bbs_site = $data['bbs_site'];
            $game->gold_name = $data['gold_name'];
            $game->cny_rate = $data['cny_rate'];
            $game->percent = $data['percent'];
            $game->descript = $data['descript'];
            $game->ishot = $data['ishot'];
//            $game->image_url = $data['image_url'];
            $game->display = $data['display'];
            $flag = $game->save();
        } else {
            $game = new Game();
            $game->gamename = $data['gamename'];
            $game->enname = $data['tag'];
            $game->orders = $data['orders'];
            $game->main_site = $data['main_site'];
            $game->bbs_site = $data['bbs_site'];
            $game->gold_name = $data['gold_name'];
            $game->cny_rate = $data['cny_rate'];
            $game->percent = $data['percent'];
            $game->descript = $data['descript'];
            $game->ishot = $data['ishot'];
//            $game->image_url = $data['image_url'];
            $game->display = $data['display'];
            $flag = $game->save();
        }
        if (true === $flag) {
            return true;
        } else {
            return $game->getFirstErrors();
        }
    }

    /**
     * 分页
     * @return array
     */
    public static function pagination()
    {
        $query = Game::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy(['id' => SORT_DESC])
            ->all();

        return [
            'totalCount' => $count,
            'list' => $articles,
            'pagination' => $pagination,
        ];
    }

    /**
     * @param array $conditions ['id','gamename']
     * @param int $sort SORT_ASC | SORT_DESC
     * @param string | array $where
     * @return array|\common\models\Game[]
     */
    public static function gameList(array $conditions, $where = '', $sort = SORT_DESC)
    {
        $query = Game::find()->select($conditions);
        if ($where != '' && !empty($where)) {
            $query->where($where);
        }
        return $query->orderBy(['id' => $sort])->all();
    }

    public static function findGameById($id, $conditions = ['*'])
    {
        return Game::find()->select($conditions)->where(['id' => $id])->asArray()->one();
    }

//    public static function hotGame($conditions = ['*'])
//    {
//        return Game::find()->select($conditions = ['*'])->where(['ishot' => 1])->all();
//    }
}