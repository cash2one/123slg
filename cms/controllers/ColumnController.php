<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/28
 * Time: 14:19
 */

namespace cms\controllers;

use cms\models\Column;
use Yii;
use common\service\GameService;

class ColumnController extends BaseController
{

    public function actionIndex()
    {
        $game_id = Yii::$app->request->get('game_id');
        $gameList = GameService::gameList(['id', 'gamename']);
        $result = Column::findAll(['game_id' => $game_id]);
        return $this->render('index', [
            'gameList' => $gameList,
            'game_id' => $game_id,
            'result' => $result
        ]);
    }

    public function actionCreate($game_id)
    {
        $game = GameService::findGameById($game_id);
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $column = new Column();
            $column->game_id = $game_id;
            $column->c_name = $post['columnName'];
            $column->s_name = $post['sName'];
            $column->directory = $post['directory'];
            $column->img = $post['img'] ? $post['img'] : '';
            $column->save();
            $this->redirect(['/cms/column/index', 'game_id' => $game_id]);
        }
        return $this->render('create', [
            'game' => $game
        ]);
    }

    public function actionEdit($id)
    {
        $column = Column::findOne($id);
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $column->c_name = $post['columnName'];
            $column->s_name = $post['sName'];
            $column->save();
            $this->redirect(['/cms/column/index', 'game_id' => $post['game_id']]);
        }
        return $this->render('edit', ['column' => $column]);
    }

    public function actionDelColumn($id)
    {
        if (Column::deleteAll(['id' => $id])) {
            echo json_encode(['error' => 0]);
            exit;
        } else {
            echo json_encode(['error' => 1, 'msg' => '删除失败']);
            exit;
        }
    }

    public function actionViewIndex()
    {
        $this->layout = false;
        return $this->render('@app/views/tpl/index');
    }
}