<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/22
 * Time: 15:51
 */

namespace common\service;

use common\models\CpsLog;
use Yii;
use common\models\CpsMember;

class CpsService
{

    /**
     * 根据用户的refer查询渠道名
     * @param $refer
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function referName($refer)
    {
        $cpsLog = CpsLog::find()->where(['refer' => $refer])->one();
        return $cpsLog->cpsMember;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function cpsList()
    {
        return CpsMember::find()->where(['pid' => 0])->asArray()->all();
    }

    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function childList($id)
    {
        return CpsMember::find()->where(['pid' => $id])->asArray()->all();
    }

    public static function allChild()
    {
        return CpsMember::find()->where('pid!=0')->asArray()->all();
    }

    /**
     * @param array $data
     * @return array|bool
     */
    public static function addCps(array $data)
    {
        $cps = new CpsMember();
        $cps->username = $data['username'];
        $cps->password = Yii::$app->getSecurity()->generatePasswordHash($data['password']);
        if ($cps->save()) {
            return true;
        } else {
            return $cps->getFirstErrors();
        }
    }

    public static function editCps(array $data)
    {
        $cps = CpsMember::findOne(['id' => $data['id']]);
        if ($data['password'] != '') {
            $cps->password = Yii::$app->getSecurity()->generatePasswordHash($data['password']);
        }
        $cps->active = $data['active'];
        if ($cps->save()) {
            return true;
        } else {
            return $cps->getFirstErrors();
        }
    }

    public static function addChild(array $data)
    {
        $cps = new CpsMember();
        $cps->username = $data['username'];
        $cps->password = Yii::$app->getSecurity()->generatePasswordHash($data['password']);
        $cps->pid = $data['id'];
        if ($cps->save()) {
            return true;
        } else {
            return $cps->getFirstErrors();
        }
    }
}