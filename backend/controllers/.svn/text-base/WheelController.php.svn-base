<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/24
 * Time: 15:03
 */

namespace backend\controllers;

use common\utils\Exption;
use Yii;
use common\models\Wheel;
use common\service\GameService;

class WheelController extends BaseController
{

    public function actionIndex()
    {
        $wheel = Wheel::find()->orderBy(['id' => SORT_DESC])->limit(6)->all();
        return $this->render('index', ['wheel' => $wheel]);
    }

    public function actionAdd()
    {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $wheel = new Wheel();
            $wheel->game_id = $post['game_id'];
            $wheel->img_url = $post['image_url'];
            if ($wheel->save()) {
                echo json_encode(['error' => Exption::ADMIN_OPER_SUCCESS, 'msg' => '操作成功']);
                exit;
            } else {
                echo json_encode(['error' => Exption::ADMIN_OPER_ERROR, 'msg' => Yii::t('app', implode(' ', $wheel->getFirstErrors()))]);
                exit;
            }
        }
        $gameList = GameService::gameList(['id', 'gamename']);
        return $this->render('add', ['gameList' => $gameList]);
    }
}