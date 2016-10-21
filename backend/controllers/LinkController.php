<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/26
 * Time: 13:38
 */

namespace backend\controllers;

use common\service\LinkService;
use common\utils\Exption;
use Yii;

class LinkController extends BaseController
{

    public function actionIndex()
    {
        $list = LinkService::linkList();
        return $this->render('index', ['list' => $list]);
    }

    public function actionAdd()
    {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $link = LinkService::add($post);

            if (true === $link) {
                echo json_encode(['error' => Exption::ADMIN_OPER_SUCCESS, 'msg' => '操作成功']);
                exit;
            } else {
                echo json_encode(['error' => Exption::ADMIN_OPER_ERROR, 'msg' => Yii::t('app', implode(' ', $link))]);
                exit;
            }
        }
        return $this->render('add');
    }
}