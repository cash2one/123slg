<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/20
 * Time: 13:08
 */

namespace cps\controllers;

use common\models\CpsLog;
use common\models\TgGameInfo;
use common\service\CpsService;
use common\service\GameService;
use common\service\ServerService;
use common\service\TgGameService;
use common\utils\Exption;
use common\utils\MyLog;
use Yii;
use yii\log\Logger;

class CpsController extends BaseController
{

    public function actionIndex()
    {
        $cpsList = CpsService::childList($_SESSION['cps']['id']);
        return $this->render('index', ['cpsList' => $cpsList]);
    }

    public function actionAdd()
    {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $post['id'] = $_SESSION['cps']['id'];
            $result = CpsService::addChild($post);
            if (true === $result) {
                echo json_encode(['error' => Exption::ADMIN_OPER_SUCCESS, 'msg' => '添加成功']);
                exit;
            } else {
                echo json_encode(['error' => Exption::ADMIN_OPER_ERROR, 'msg' => implode(',', $result)]);
                exit;
            }
        }
        return $this->render('add');
    }

    public function actionLink()
    {
        $tgGame = TgGameService::tgGameList($_SESSION['cps']['id'], $_SESSION['cps']['pid']);
        return $this->render('link', ['tgGame' => $tgGame, 'pid' => $_SESSION['cps']['pid']]);
    }

    public function actionTqlink()
    {
        $serverList = ServerService::serverList(['*']);
        $cpsList = CpsService::childList($_SESSION['cps']['id']);
        return $this->render('tqlink', ['serverList' => $serverList, 'cpsList' => $cpsList]);
    }

    public function actionCreateLink($game_id, $server_id, $cps_id)
    {
        if ($_SESSION['cps']['pid'] == 0 && $cps_id == 0) {
            echo json_encode([
                'error' => 1,
                'msg' => '<font color="red">管理员不能自己提取链接</font><br>请指定渠道提取'
            ]);
            exit;
        }
        $game = GameService::findGameById($game_id, ['enname']);
        $url = "http://tg.123slg.com/" . $game['enname'] . "/?game_id=" . $game_id . "&server_id=" . $server_id;
        $cps_id = $_SESSION['cps']['pid'] != 0 ? $_SESSION['cps']['id'] : $cps_id;
        $result = TgGameService::checkInfo($game_id, $server_id, $cps_id);
        if (false === $result) {
            echo json_encode([
                'error' => 1,
                'msg' => '你已经提取过应该游戏链接'
            ]);
            exit;
        }

        $tgGame = new TgGameInfo();
        $tgGame->refname = $result['username'];
        $tgGame->refurl = '';
        $tgGame->game_id = $game_id;
        $tgGame->area_num = $server_id;
        if ($tgGame->save()) {
            unset($tgGame);
            $insertId = Yii::$app->db->getLastInsertID();
            $tgGame = TgGameInfo::findOne(['id' => $insertId]);
            $tgGame->refurl = $url . "&refer=" . $insertId;
            $tgGame->save();
            $cpsLog = new CpsLog();
            $cpsLog->cps_id = $_SESSION['cps']['pid'] != 0 ? $_SESSION['cps']['id'] : $cps_id;
            $cpsLog->refer = $insertId;
            if (!$cpsLog->save()) {
                MyLog::write(['tglink' => $url, 'id' => $_SESSION['cps']['id']], Logger::LEVEL_ERROR, 'CreateLink', time());
            }
            echo json_encode([
                'error' => 0,
                'msg' => '链接提取成功！'
            ]);
            exit;
        } else {
            echo json_encode([
                'error' => 2,
                'msg' => '游戏链接提取错误，请销后在试'
            ]);
            exit;
        }
    }

    public function actionCreateShort($id, $url)
    {
        $apiKey = '569452181';//要修改这里的key再测试哦
        $apiUrl = 'https://api.weibo.com/2/short_url/shorten.json?source=' . $apiKey . '&url_long=' . urlencode($url);
        $response = file_get_contents($apiUrl);
        $json = json_decode($response);
        $shoturls = $json->urls;
        if ($shoturls) {
            $tgGame = TgGameInfo::findOne(['id' => $id]);
            $tgGame->shorturl = $shoturls[0]->url_short;
            if (!$tgGame->save()) {
                MyLog::write(['shorturl' => $shoturls[0]->url_short, 'ref_id' => $id], Logger::LEVEL_ERROR, 'CreateShort', time());
            }
            echo json_encode([
                'error' => 0,
                'msg' => '生成成功！'
            ]);
            exit;
        } else {
            echo json_encode([
                'error' => 0,
                'msg' => '网络忙，请稍后在试！'
            ]);
            exit;
        }
    }
}