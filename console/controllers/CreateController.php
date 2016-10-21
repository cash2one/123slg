<?php
namespace console\controllers;

use common\service\GameService;
use Yii;
use yii\console\Controller;

/**
 * Created Game Website
 * User: Administrator
 * Date: 2016/10/8
 * Time: 10:47
 */
class CreateController extends Controller
{
    /**
     * @param $game_id
     */
    public function actionIndex($game_id)
    {
        $game = GameService::findGameById($game_id);
        $path = dirname(dirname(__DIR__)) . '/html/' . $game['enname'];
        if (is_dir($path)) {
            $tplPath = dirname(dirname(__DIR__)) . '/cms/web/game';
            self::openDir($tplPath, $game['enname']);
        } else {
            if (mkdir($path, 0777)) {
                $tplPath = dirname(dirname(__DIR__)) . '/cms/web/game';
                self::openDir($tplPath, $game['enname']);
            } else {
                echo "error";
            }
        }
    }

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