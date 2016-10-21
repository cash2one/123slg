<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/13
 * Time: 13:35
 */

namespace backend\controllers;

use common\models\Game;
use common\models\GamePic;
use common\service\GameService;
use common\utils\Exption;
use Yii;


class GameController extends BaseController
{
    public function actionIndex()
    {
        $result = GameService::pagination();
        return $this->render('index', ['list' => $result['list'], 'pagination' => $result['pagination'], 'totalCount' => $result['totalCount']]);
    }

    public function actionEdit($id = 0)
    {
        $id = intval($id);

        if (Yii::$app->request->isPost) {
            $id = intval(Yii::$app->request->post('id'));
            $flag = GameService::editGame(Yii::$app->request->post(), $id);
            if (true === $flag) {
                echo json_encode(['error' => Exption::ADMIN_OPER_SUCCESS, 'msg' => '操作成功']);
                exit;
            } else {
                echo json_encode(['error' => Exption::ADMIN_OPER_ERROR, 'msg' => Yii::t('app', implode(' ', $flag))]);
                exit;
            }
        }

        $game = Game::findOne(['id' => $id]);
        return $this->render('edit', ['game' => $game, 'id' => $id]);
    }

    public function actionViews($id)
    {
        $game = Game::findOne(['id' => $id]);
        return $this->render('views', ['game' => $game]);
    }

    public function actionUpload($game_id = 0)
    {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $gamePic = GamePic::findOne(['game_id' => $post['game_id']]);
            if (!$gamePic) {
                $gamePic = new GamePic();
                $gamePic->game_id = $post['game_id'];
            }
            $gamePic->hot_game = $post['hot_game'];
            $gamePic->new_server = $post['new_server'];
            $gamePic->game_center = $post['game_center'];
            if ($gamePic->save()) {
                echo json_encode(['error' => Exption::ADMIN_OPER_SUCCESS, 'msg' => '操作成功']);
                exit;
            } else {
                echo json_encode(['error' => Exption::ADMIN_OPER_ERROR, 'msg' => Yii::t('app', implode(' ', $gamePic->getFirstErrors()))]);
                exit;
            }
        }
        $game = GameService::findGameById($game_id, ['id', 'gamename']);
        $pic = GamePic::findOne(['game_id' => $game_id]);
        return $this->render('upload', ['game' => $game, 'pic' => $pic]);
    }
}