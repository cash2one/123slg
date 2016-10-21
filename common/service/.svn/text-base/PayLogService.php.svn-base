<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/18
 * Time: 17:06
 */

namespace common\service;

use common\models\CpsLog;
use common\models\CpsMember;
use common\models\CpsPay;
use common\models\FirstPay;
use common\models\TgGameInfo;
use Yii;
use common\models\PayLog;
use common\models\Paytype;
use common\models\User;
use yii\data\Pagination;

class PayLogService
{
    /**
     * 充值记录分页函数
     * @param $game_id
     * @param $server_id
     * @param $paytype_id
     * @param $username
     * @param $dt1
     * @param $dt2
     * @return array
     */
    public static function pagination($game_id, $server_id, $paytype_id, $username, $dt1, $dt2)
    {
        $query = PayLog::find()->select(['pay_log.*', 'user.refer'])->where(['flag' => 1])->andWhere('paytype!=18')->andWhere('pay_time>=' . $dt1)->andWhere('pay_time<' . $dt2);
        if ($paytype_id) {
            $query->andWhere(['paytype' => $paytype_id]);
        }
        if ($game_id) {
            $query->andWhere(['gid' => $game_id]);
        }
        if ($server_id) {
            $query->andWhere(['sid' => $server_id]);
        }
        if ($username != '') {
            $query->andWhere(['pay_username' => $username]);
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $articles = $query->leftJoin(User::tableName(), '`user`.uid = pay_log.pay_uid')->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy(['order_num' => SORT_DESC])
            ->asArray()->all();

        return [
            'totalCount' => $count,
            'list' => $articles,
            'pagination' => $pagination,
        ];
    }

    public static function paginationself($game_id, $server_id, $paytype_id, $username, $dt1, $dt2)
    {
        $query = PayLog::find()->select(['pay_log.*', 'user.refer'])->where(['flag' => 1, 'paytype' => 18])->andWhere('pay_time>=' . $dt1)->andWhere('pay_time<' . $dt2);
        if ($paytype_id) {
            $query->andWhere(['paytype' => $paytype_id]);
        }
        if ($game_id) {
            $query->andWhere(['gid' => $game_id]);
        }
        if ($server_id) {
            $query->andWhere(['sid' => $server_id]);
        }
        if ($username != '') {
            $query->andWhere(['pay_username' => $username]);
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $articles = $query->leftJoin(User::tableName(), '`user`.uid = pay_log.pay_uid')->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy(['order_num' => SORT_DESC])
            ->asArray()->all();

        return [
            'totalCount' => $count,
            'list' => $articles,
            'pagination' => $pagination,
        ];
    }

    /**
     * cps充值查询
     * @param $cps_id
     * @param $game_id
     * @param $server_id
     * @param $username
     * @param $dt1
     * @param $dt2
     * @return array
     */
    public static function paginationCps($cps_id, $game_id, $server_id, $username, $dt1, $dt2)
    {
        $query = CpsPay::find()->where('flag=1 and flag_game=1 and paytype!=18')->andWhere('pay_time>=' . $dt1)->andWhere('pay_time<' . $dt2);

        if ($game_id) {
            $query->andWhere(['gid' => $game_id]);
        }
        if ($server_id) {
            $query->andWhere(['sid' => $server_id]);
        }
        if ($username != '') {
            $query->andWhere(['pay_username' => $username]);
        }


        if ($cps_id == 0) {
            $childList = CpsMember::find()->where(['pid' => $_SESSION['cps']['id']])->all();
            $childId = [];
            foreach ($childList as $key => $val) {
                foreach ($val->cpsLog as $k => $v) {
                    $childId[] = $v['refer'];
                }
            }
            $query->andWhere('refer in(' . implode(',', $childId) . ')');
        } else {
            $child = CpsMember::find()->where(['id' => $cps_id])->one();
            foreach ($child->cpsLog as $k => $v) {
                $childId[] = $v['refer'];
            }
            $query->andWhere('refer in(' . implode(',', $childId) . ')');
        }

        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy(['order_num' => SORT_DESC])->asArray()->all();

        return [
            'totalCount' => $count,
            'list' => $articles,
            'pagination' => $pagination,
        ];
    }

    /**
     * @param $cps_id
     * @param $game_id
     * @param $server_id
     * @param $username
     * @param $dt1
     * @param $dt2
     * @return array
     */
    public static function paginationFirst($cps_id, $game_id, $server_id, $username, $dt1, $dt2)
    {
        $query = FirstPay::find()->where("pay_time>='" . $dt1 . "' and pay_time<'" . $dt2 . "'");

        if ($game_id) {
            $query->andWhere(['game_id' => $game_id]);
        }
        if ($server_id) {
            $query->andWhere(['server_id' => $server_id]);
        }
        if ($username != '') {
            $query->andWhere(['username' => $username]);
        }


//        if ($cps_id == 0) {
//            $childList = CpsMember::find()->where(['pid' => $_SESSION['cps']['id']])->all();
//            $childId = [];
//            foreach ($childList as $key => $val) {
//                foreach ($val->cpsLog as $k => $v) {
//                    $childId[] = $v['refer'];
//                }
//            }
//            $query->andWhere('refer in(' . implode(',', $childId) . ')');
//        } else {
//            $child = CpsMember::find()->where(['id' => $cps_id])->one();
//            foreach ($child->cpsLog as $k => $v) {
//                $childId[] = $v['refer'];
//            }
//            $query->andWhere('refer in(' . implode(',', $childId) . ')');
//        }

        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)->orderBy(['order_num' => SORT_DESC])->all();

        return [
            'totalCount' => $count,
            'list' => $articles,
            'pagination' => $pagination,
        ];
    }

    public static function addLog(array $data)
    {
        $log = new PayLog();
        $log->order_num = $data['order_num'];
        $log->pay_uid = $data['uid'];
        $log->pay_username = $data['username'];
        $log->paytypename = $data['payTag_name'];
        $log->paytype = $data['payId'];
        $log->pay_cny = $data['money'];
        $log->fee_cny = $data['fee_cny'];
        $log->pay_time = time();
        $log->flag = 0;
        $log->flag_game = 0;
        $log->pay_ip = Yii::$app->request->getUserIP();
        $log->gid = $data['game_id'];
        $log->sid = $data['server_id'];
        $log->discript = $data['discript'];
        if ($log->save()) {
            return true;
        } else {
            Yii::info(var_export($log->getFirstErrors(), true), 'pay');
            return false;
        }
    }

    /**
     * @param $paytype
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function payFee($paytype)
    {
        return Paytype::find()->where(['id' => $paytype])->asArray()->one();
    }
}