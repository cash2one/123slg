<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/18
 * Time: 17:28
 */

namespace backend\controllers;

use common\models\Server;
use common\service\ServerService;
use common\service\UserService;
use frontend\game\GameApi;
use Yii;
use common\service\GameService;
use yii\helpers\Url;

class MemberController extends BaseController
{

    public function actionIndex()
    {
        $gameList = GameService::gameList(['id', 'gamename']);
        $game_id = Yii::$app->request->get('game_id') ? Yii::$app->request->get('game_id') : '';
        $server_id = Yii::$app->request->get('server_id') ? Yii::$app->request->get('server_id') : '';
        $username = Yii::$app->request->get('username') ? Yii::$app->request->get('username') : '';
        $dt1 = Yii::$app->request->get('dt1') ? strtotime(Yii::$app->request->get('dt1')) : strtotime(date('Y-m-d'));
        $dt2 = Yii::$app->request->get('dt2') ? strtotime(Yii::$app->request->get('dt2')) : strtotime(date('Y-m-d')) + 86400;


        $result = UserService::backMember($game_id, $server_id, $username, $dt1, $dt2);

        $serverList = [];
        if ($game_id) {
            $serverList = ServerService::serverList(['server_id', 'server_name'], $game_id);
        }

        $server = [];
        if ($server_id) {
            $server = Server::findOne(['game_id' => $game_id, 'server_id' => $server_id]);
        }

        return $this->render('index', [
            'gameList' => $gameList,
            'username' => $username,
            'dt1' => $dt1,
            'dt2' => $dt2,
            'game_id' => $game_id,
            'server_id' => $server_id,
            'server' => $server,
            'serverList' => $serverList,
            'result' => $result
        ]);
    }

    public function actionTogame($uid, $game_id, $server_id)
    {
        $server = ServerService::serverOne($game_id, $server_id);
        if (!$server) {
            $this->layout = '@frontend/views/layouts/sub.php';
            return $this->render('error', ['title' => '游戏或区服不存在！', 'content' => '秒后返回平台首页！', 'url' => Url::to(['index/index'])]);
        }
        if ($server['start_time'] > time()) {
            $this->layout = '@frontend/views/layouts/sub.php';
            return $this->render('error', [
                'title' => $server->game->gamename . $server->server_name . '将于' . date("Y-m-d H:i:s", $server->start_time) . '准时开启。请先去官网浏览！',
                'content' => '秒后返回网官！',
                'url' => $server->game->main_site]);
        }

        $gameTag = ucfirst($server->game->enname);

        //构造一个反射类
        if (!class_exists('\\frontend\\game\\' . $gameTag)) {
            echo '游戏接口不存在！';
            exit;
//            $this->layout = '@frontend/views/layouts/sub.php';
//            return $this->render('error', [
//                'title' => '游戏接口不存在！',
//                'content' => '秒后返回首页！',
//                'url' => Url::to(['index/index'])]);
        }
        Yii::$app->session->open();
        $user = UserService::getInstance()->getUserById($uid);
        $data = $user;
        $data['server_id'] = $server_id;
        $reflection = new \ReflectionClass('\\frontend\\game\\' . $gameTag);
        //实例化这个类
        $instance = $reflection->newInstance();
        if ($instance instanceof GameApi) {
            $result = $instance->login($data);
            UserService::getInstance()->addGameLoginLog($game_id, $server_id);
            return $this->render('togame', ['url' => $result, 'server' => $server, 'user' => $user]);
        }
    }
}