<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/9
 * Time: 15:31
 */

namespace common\utils;

use Yii;

class Identity
{
    public static function IdCard($name, $idCard)
    {
        $opts = array(
            'ssl' => array('ciphers' => 'RC4-SHA', 'verify_peer' => false, 'verify_peer_name' => false)
        );

        $params = array('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_1, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($opts));
        $url = __DIR__ . DIRECTORY_SEPARATOR . "NciicServices.wsdl";
        libxml_disable_entity_loader(false); //adding this worked for me
        try {
            $client = new \SoapClient($url, $params);
            $p = [
                'inLicense' => '?v.kFHH4ch+sV]I-H:`;<*O]ZB5.?o*u?k?h?o?[]>Y<\GO]=$E-<_VX?c?oWjK/]w;t<v5sAI?v]kLnFna3\lNoSw2d?vKpQcGcZ.ToRiN.Qp?x?vb8QtKcBm(w;c?f?a0m?s/;&/MmLbFhRw3f?vc:FgEdIf?x?m?f?/?h?/+e7rHkPrMbb5;n?vXcHzMbOs?xK>DHbxM\0A++_KPK`&-r?.?d%i6a?jPaKvA.Jg(w?vaX`\Z/PvElQpJra4?x^j`+?g?g?g4n%t?jAkNh^fUmJoKbaV]t?x?v\qcV-c.j4.?jWcXsWlYsToQ[Tl]l?x?vMpNsbZXg^eJ/Xo`8SoFzUy?x?v\y@eEdGv?x8s<d?a&l?v?jVjElYjVl?x?v+b\h_ycXa<c9SjFvEdJbc4\;?x?v?jD.HxUwa3a _dFv5s',
                'inConditions' => self::buildXml($name, $idCard)
            ];
            $result = $client->nciicCheck($p);
            $result = self::fromXml($result->out);
            if (isset($result['@attributes'])) {
                Yii::info(var_export($result, true), 'idCard');
                return false;
            } else {

                $real_name = $result['ROW']['OUTPUT']['ITEM'][0]['result_gmsfhm'];
                $idNum = $result['ROW']['OUTPUT']['ITEM'][1]['result_xm'];
                if ($real_name == '一致' && $idNum == '一致') {
                    return true;
                } else {
                    Yii::info(var_export($result, true), 'idCard');
                    return false;
                }

            }
        } catch (\Exception $ex) {
            Yii::info(var_export($ex, true), 'idCard');
            return false;
        }
    }

    public static function buildXml($name, $idCard)
    {
        return '<?xml version="1.0" encoding="UTF-8" ?><ROWS><INFO><SBM>深圳策略一二三网络有限公司</SBM></INFO><ROW><GMSFHM>公民身份号码</GMSFHM><XM>姓名</XM></ROW><ROW FSD="518000" YWLX="防沉迷认证"><GMSFHM>' . $idCard . '</GMSFHM><XM>' . $name . '</XM></ROW></ROWS>';
    }

    public static function fromXml($xml)
    {
        //将XML转为array
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

    }
}