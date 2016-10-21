<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 16/8/15
 * Time: 下午8:48
 */

namespace backend\controllers;

use common\models\Server;
use common\service\ServerService;
use common\utils\Exption;
use Yii;

class ServerController extends BaseController
{
    public function actionIndex($game_id)
    {
        $result = ServerService::pagination($game_id);
        return $this->render('index', ['game_id' => $game_id, 'list' => $result['list'], 'pagination' => $result['pagination'], 'totalCount' => $result['totalCount']]);
    }

    public function actionAdd()
    {
        $game_id = Yii::$app->request->get('game_id') ? intval(Yii::$app->request->get('game_id')) : 0;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $flag = ServerService::addServer($post);
            if (true === $flag) {
                ServerService::writeServerList($post['game_id']);
                echo json_encode(['error' => Exption::ADMIN_OPER_SUCCESS, 'msg' => '操作成功']);
                exit;
            } else {
                echo json_encode(['error' => Exption::ADMIN_OPER_ERROR, 'msg' => Yii::t('app', implode(' ', $flag))]);
                exit;
            }
        }
        return $this->render('add', ['game_id' => $game_id, 'date' => date("Y-m-d H:i:s")]);
    }

    public function actionEdit($game_id, $server_id)
    {
        $server = Server::findOne(['game_id' => $game_id, 'server_id' => $server_id]);
        if (Yii::$app->request->isPost) {
            $flag = ServerService::editServer($server, Yii::$app->request->post());
            if (true === $flag) {
                ServerService::writeServerList(Yii::$app->request->post('game_id'));
                echo json_encode(['error' => Exption::ADMIN_OPER_SUCCESS, 'msg' => '操作成功']);
                exit;
            } else {
                echo json_encode(['error' => Exption::ADMIN_OPER_ERROR, 'msg' => Yii::t('app', implode(' ', $flag))]);
                exit;
            }
        }

        return $this->render('edit', ['server' => $server, 'game_id' => $game_id, 'server_id' => $server_id]);
    }

    public function actionServerList($game_id = 0)
    {
        $result = ServerService::serverList(['server_id', 'server_name'], $game_id);
        $server = [];
        foreach ($result as $key => $val) {
            $server[$key]['server_id'] = $val['server_id'];
            $server[$key]['server_name'] = $val['server_name'];
        }
        unset($result);
        echo json_encode($server);
    }
}