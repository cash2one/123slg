<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/29
 * Time: 16:26
 */

namespace cms\controllers;

use cms\models\Seo;
use common\service\LinkService;
use Yii;
use cms\models\Column;
use common\service\GameService;
use yii\helpers\ArrayHelper;

class GameController extends BaseController
{
    public function actionIndex()
    {
        $gameList = GameService::gameList(['id', 'gamename', 'enname', 'main_site']);
        $gameList = ArrayHelper::toArray($gameList);

        foreach ($gameList as $key => &$val) {
            if (is_dir(\Yii::$app->params['baseRoot'] . '/web/html/' . $val['enname'])) {
                $val['state'] = 1;
            } else {
                $val['state'] = 0;
            }
        }
        return $this->render('index', [
            'gameList' => $gameList
        ]);
    }

    /**
     * create game website
     * @param $game_id
     */
    public function actionCreate($game_id)
    {
        $game = GameService::findGameById($game_id);
        if (mkdir(\Yii::$app->params['baseRoot'] . '/web/html/' . $game['enname'], 0777)) {
            mkdir(\Yii::$app->params['baseRoot'] . '/web/html/' . $game['enname'] . "/images", 0777);
//            $path = dirname(dirname(__DIR__)) . '/web/html/' . $game['enname'];
//            if (is_dir($path)) {
//                $tplPath = dirname(dirname(__DIR__)) . '/cms/web/game';
//                self::openDir($tplPath, $game['enname']);
//            } else {
//                if (mkdir($path, 0777)) {
//                    $tplPath = dirname(dirname(__DIR__)) . '/cms/web/game';
//                    self::openDir($tplPath, $game['enname']);
//                }
//            }
            $this->layout = false;
            $seo = Seo::find()->where(['game_id' => $game_id])->one();
            if (empty($seo)) {
                $game = GameService::findGameById($game_id);
                $seo['title'] = '123SLG' . $game['gamename'] . '官网_攻略_礼包_激活码_资料';
                $seo['keywords'] = $game['gamename'] . '官网、' . $game['gamename'] . '攻略、' . $game['gamename'] . '礼包、' . $game['gamename'] . '新手卡、' . $game['gamename'] . '激活码、' . $game['gamename'] . '开服表';
                $seo['description'] = '123SLG' . $game['gamename'] . '网页游戏官网合作站为您提供最新最全的' . $game['gamename'] . '资讯，包括：' . $game['gamename'] . '官网资讯、' . $game['gamename'] . '新手卡、' . $game['gamename'] . '礼包等等，找' . $game['gamename'] . '攻略、资讯就上123SLG！';
            }
            $link = LinkService::linkList();
            $html = $this->render('@app/views/tpl/index', ['seo' => $seo, 'game_id' => $game_id, 'link' => $link]);
            file_put_contents(\Yii::$app->params['baseRoot'] . '/web/html/' . $game['enname'] . '/index.html', $html);
            echo json_encode(['error' => 0]);
            exit;
        } else {
            echo json_encode(['error' => 1, 'msg' => '创建目录失败！']);
            exit;
        }
    }

    /**
     * @return string
     */
    public function actionViewIndex($game_id)
    {
        $this->layout = false;
        $seo = Seo::find()->where(['game_id' => $game_id])->one();
        $game = GameService::findGameById($game_id);
        if (empty($seo)) {
            $seo['title'] = '123SLG' . $game['gamename'] . '官网_攻略_礼包_激活码_资料';
            $seo['keywords'] = $game['gamename'] . '官网、' . $game['gamename'] . '攻略、' . $game['gamename'] . '礼包、' . $game['gamename'] . '新手卡、' . $game['gamename'] . '激活码、' . $game['gamename'] . '开服表';
            $seo['description'] = '123SLG' . $game['gamename'] . '网页游戏官网合作站为您提供最新最全的' . $game['gamename'] . '资讯，包括：' . $game['gamename'] . '官网资讯、' . $game['gamename'] . '新手卡、' . $game['gamename'] . '礼包等等，找' . $game['gamename'] . '攻略、资讯就上123SLG！';
        }
        $link = LinkService::linkList();
        return $this->render('@app/views/tpl/index', ['seo' => $seo, 'game_id' => $game_id, 'link' => $link, 'game' => $game]);
    }

    public function actionSeoIndex($game_id)
    {
        $seo = Seo::find()->where([
            'game_id' => $game_id,
        ])->one();

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            if ($seo) {
                $seo->title = $post['title'];
                $seo->keywords = $post['keywords'];
                $seo->description = $post['description'];
            } else {
                $seo = new Seo();
                $seo->game_id = $game_id;
                $seo->title = $post['title'];
                $seo->keywords = $post['keywords'];
                $seo->description = $post['description'];
            }

            if ($seo->save()) {
                echo json_encode(['error' => 0, 'msg' => '操作成功']);
                exit;
            } else {
                echo json_encode(['error' => 1, 'msg' => implode(',', $seo->getFirstErrors())]);
                exit;
            }
        }

        return $this->render('seoindex', ['game_id' => $game_id, 'seo' => $seo]);
    }

    /**
     * @param $path
     * @param $tag game tag [sxd]
     * @param string $title css|js|images
     */
    private static function openDir($path, $tag, $title = '')
    {
        $dir = dir($path);
        while (false !== ($entry = $dir->read())) {
            //echo $entry . PHP_EOL;
            if ($entry != "." && $entry != "..") {
                if (is_dir(dirname(dirname(__DIR__)) . '/cms/web/game/' . $entry)) {
                    if (!is_dir(dirname(dirname(__DIR__)) . '/html/' . $tag . '/game/')) {
                        mkdir(dirname(dirname(__DIR__)) . '/html/' . $tag . '/game/', 0777);
                    }
                    mkdir(dirname(dirname(__DIR__)) . '/html/' . $tag . '/game/' . $entry, 0777);

                    self::openDir(dirname(dirname(__DIR__)) . '/cms/web/game/' . $entry, $tag, $entry);
                } else {
                    copy($path . '\\' . $entry, dirname(dirname(__DIR__)) . '/html/' . $tag . '/game/' . $title . '\\' . $entry);
                }
            }
        }
        $dir->close();
    }
}