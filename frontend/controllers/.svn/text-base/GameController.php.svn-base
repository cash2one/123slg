<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/26
 * Time: 9:43
 */

namespace frontend\controllers;

use common\service\ServerService;
use frontend\game\GameApi;
use Yii;
use common\service\GameService;
use common\service\UserService;
use yii\web\Controller;
use yii\helpers\Url;

class GameController extends Controller
{
    public function actionIndex()
    {
        $list = GameService::gameList(['*']);
        return $this->render('index', ['list' => $list]);
    }

    /**
     * @param $game_id
     * @param $server_id
     * @param int $isClient 是否是微端登录
     * @return string
     */
    public function actionEnter($game_id, $server_id, $isClient = 0)
    {
        if (!UserService::getInstance()->checkLogin()) {
            $get = Yii::$app->request->get();
            $this->redirect(['site/callback', 'url' => Url::to(['game/enter']) . '?' . http_build_query($get)]);
        } else {
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
                $this->layout = '@frontend/views/layouts/sub.php';
                return $this->render('error', [
                    'title' => '游戏接口不存在！',
                    'content' => '秒后返回首页！',
                    'url' => Url::to(['index/index'])]);
            }
            Yii::$app->session->open();
            $data = $_SESSION['user'];
            $data['server_id'] = $server_id;
            $reflection = new \ReflectionClass('\\frontend\\game\\' . $gameTag);
            //实例化这个类
            $instance = $reflection->newInstance();
            if ($instance instanceof GameApi) {
                $result = $instance->login($data);
                UserService::getInstance()->addGameLoginLog($game_id, $server_id);
                header('Location:' . $result);
            }
        }

    }

}