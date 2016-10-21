<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 16/5/18
 * Time: 下午8:25
 */

namespace common\utils;

use Yii;
use yii\helpers\FileHelper;
use yii\log\FileTarget;

class FileLog extends FileTarget
{
    public $file_path = 'pay';

    public function init()
    {
        parent::init();
        $this->logFile = Yii::$app->getRuntimePath() . '/logs/' . $this->file_path . '/' . date('Y-m-d') . '.log';
        $logPath = dirname($this->logFile);
        if (!is_dir($logPath)) {
            FileHelper::createDirectory($logPath, $this->dirMode, true);
        }
        if ($this->maxLogFiles < 1) {
            $this->maxLogFiles = 1;
        }
        if ($this->maxFileSize < 1) {
            $this->maxFileSize = 1;
        }
    }
}