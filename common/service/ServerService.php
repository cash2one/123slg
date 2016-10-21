<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 16/8/15
 * Time: 下午9:59
 */

namespace common\service;


use common\models\Server;
use yii\data\Pagination;

class ServerService
{
    /**
     * @param $data
     * @return bool
     */
    public static function addServer($data)
    {
        $server = new Server();
        $server->server_id = $data['server_id'];
        $server->game_id = $data['game_id'];
        $server->server_name = $data['server_name'];
        $server->start_time = strtotime($data['start_time']);
        $server->state = $data['state'];
        $server->ip = $data['ip'];
        $server->domain = $data['domain'];
        $server->server_key = $data['server_key'];
        if ($server->save()) {
            return true;
        } else {
            return $server->getFirstErrors();
        }
    }

    /**
     * @param Server $server
     * @param array $data
     * @return bool
     */
    public static function editServer(Server $server, array $data)
    {
        $server->server_id = $data['server_id'];
        $server->game_id = $data['game_id'];
        $server->server_name = $data['server_name'];
        $server->start_time = strtotime($data['start_time']);
        $server->state = $data['state'];
        $server->ip = $data['ip'];
        $server->domain = $data['domain'];
        $server->server_key = $data['server_key'];
        if ($server->save()) {
            return true;
        } else {
            return $server->getFirstErrors();
        }
    }

    /**
     * 分页
     * @return array
     */
    public static function pagination($game_id)
    {
        $query = Server::find()->where(['game_id' => $game_id]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy(['server_id' => SORT_DESC])
            ->all();

        return [
            'totalCount' => $count,
            'list' => $articles,
            'pagination' => $pagination,
        ];
    }

    /**
     * @param array $conditions
     * @param $game_id
     * @param array $orderBy 排序 ['server_id' => SORT_DESC] SORT_ASC | SORT_DESC
     * @param integer $limit
     * @param integer $state 1为开服的区服 0为全部区服
     * @return array|\common\models\Server[]
     */
    public static function serverList(array $conditions, $game_id = 0, $orderBy = ['server_id' => SORT_DESC], $limit = 0, $state = 1)
    {
        $query = Server::find()->select($conditions)->where(1);
        if ($game_id != 0) {
            $query->andWhere(['game_id' => $game_id]);
        }
        if ($state != 0) {
            $query->andWhere(['state' => $state]);
        }
        $query->orderBy($orderBy);
        if ($limit != 0) {
            $query->limit($limit);
        }
        return $query->all();
    }

    public static function serverOne($game_id, $server_id)
    {
        return Server::find()->where(['game_id' => $game_id, 'server_id' => $server_id, 'state' => 1])->one();
    }

    public static function writeServerList($game_id)
    {
        $list = ServerService::serverList(['server_id', 'game_id', 'server_name', 'start_time'], $game_id);
        $serverList = [];
        foreach ($list as $key => $val) {
            $serverList[$key]['server_id'] = $val['server_id'];
            $serverList[$key]['game_id'] = $val['game_id'];
            $serverList[$key]['server_name'] = $val['server_name'];
            $serverList[$key]['start_time'] = $val['start_time'];
            $serverList[$key]['S'] = 's' . $val['server_id'];
        }
        $path = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR;
        if (!is_dir($path)) {
            mkdir($path, 0777);
        }
        @file_put_contents($path . $game_id . '.json', 'var qfarr' . $game_id . '=' . json_encode($serverList));
    }
}