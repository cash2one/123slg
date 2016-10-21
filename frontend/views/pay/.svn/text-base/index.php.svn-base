<?php
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/css/pay.min.css" />
    <script src="/js/jquery-1.9.1.js"></script>
    <script src="/js/json2.js"></script>
    <script src="/js/pay.js"></script>
    <title>123slg充值中心</title>
</head>
<body>
<div class="maskLayer"></div>
<div class="header">
    <div class="logo"></div>
    <div class="slogan"></div>
</div>
<div class="nav">
    <ul class="navlist">
        <li>
        <a href="/" class="">首页</a>
        <a href="<?php echo Url::to(['game/index']) ?>">游戏大厅</a>
        <a href="<?php echo Url::to(['user/index'])?>">用户中心</a>
            <a href="" class="navCurrent">充值中心</a>
            <a href="" target="_blank">玩家论坛</a>
            <a href="" target="_blank" >家长监护</a>
        </li>
    </ul>
</div>
<div class="content">
    <div class="left">
        <div class="payWayWrap">
            <span class="selPayWay"><b></b>请选择充值方式</span>
            <ul class="payWay" id="payWay">
                <?php foreach($paytype as $key=>$val){?>
                <li><span class="onlineZFB" id="<?php echo $val['paytag'];?>" data-fee="<?php echo $val['fee'];?>" data-id="<?php echo $val['id'];?>"><?php echo $val['typename'];?></span></li>
                <?php }?>
            </ul>
        </div>
    </div>
    <div class="right">
        <div class="wrap">
            <!-- Public -->
            <p class="tip" id="tipPayWay">使用 <span></span> 进行充值</p>
            <div class="line"></div>
            <ul class="accounts">
                <li><label for=""><span>*</span>输入帐号：<input type="text" id="userName" value=""><span id="checkName"></span></label></li>
            </ul>
            <div class="line"></div>
            <ul class="gameSerRole">
                <li id="game">1.选择充值游戏</li>
                <li id="server">2.选择游戏服务器</li>
<!--                <li id="role">3.选择充值角色</li>-->
            </ul>
            <div class="game">
                <div class="close"></div>
                <div class="gameTab">
                    <ul>
                        <li class="cur" id="allGame">所有游戏</li>
                    </ul>
                </div>
                <!-- <ul class="hisGame"></ul> -->
                <ul class="allGame">
                    <?php foreach($gameList as $key=>$val){?>
                    <li><label for="as"><input id="as" type="radio" name="game" value="<?php echo $val['id'];?>"><span><?php echo $val['gamename'];?></span></label></li>
                    <?php }?>
                </ul>
            </div>
            <div class="server">
                <div class="close"></div>
                <div class="serTab">
                    <ul>
                        <li class="cur" id="allSer">所有服</li>
                    </ul>
                </div>
                <!-- <ul class="hisSer"></ul> -->
                <ul class="allSer">
                </ul>
            </div>
<!--            <div class="role">-->
<!--                <div class="close"></div>-->
<!--                <div class="roleTab">-->
<!--                    <ul>-->
<!--                        <li class="cur" id="hisRole">所有角色</li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <ul class="hisRole">-->
<!--                </ul>-->
<!--            </div>-->
            <div class="line"></div>
            <div class="payWayDetail">
                <!-- 支付宝支付 -->
                <div class="alipay">
                    <div class="money">
                        <div>请选择充值金额：</div>
                        <ul>
                            <li>
                                <label for=""><input type="radio" value="1" name="gold"><span>1元</span></label>
                                <label for=""><input type="radio" value="10" name="gold"><span>10元</span></label>
                                <label for=""><input type="radio" value="30" name="gold"><span>30元</span></label>
                                <label for=""><input type="radio" value="50" name="gold"><span>50元</span></label>
                                <label for=""><input type="radio" value="100" name="gold"><span>100元</span></label>
                                <label for=""><input type="radio" value="200" name="gold"><span>200元</span></label>
                                <label for=""><input type="radio" value="500" name="gold"><span>500元</span></label>
                                <label for=""><input type="radio" value="1000" name="gold"><span>1000元</span></label>
                                <label for=""><input type="radio" value="2000" name="gold"><span>2000元</span></label>
                                <label for=""><input type="radio" value="3000" name="gold"><span>3000元</span></label>
                                <label for=""><input type="radio" value="5000" name="gold"><span>5000元</span></label>
                                <label for=""><input type="radio" value="10000" name="gold"><span>10000元</span></label>
                                <label for=""><input type="radio" value="20000" name="gold"><span>20000元</span></label>
                                <label for=""><input type="radio" value="50000" name="gold"><span>50000元</span></label>
                                <label for=""><input type="radio" value="100000" name="gold"><span>100000元</span></label>
                            </li>
                        </ul>
                    </div>
                    <div class="line"></div>
                    <div class="payBtn">
                        <input type="button" value="立即充值" class="submit">
                    </div>
                    <div class="declare">
                        阿里巴巴旗下专业支付平台。凡是拥有支付宝帐号的用户，都可以进行网上直充，方便快捷，同时支持网银。即充即玩1分钟完成！
                    </div>
                </div>
                <!-- 微信支付 -->
                <div class="wxpay" style="display: none">
                    <div class="money">
                        <div>请选择充值金额：</div>
                        <ul>
                            <li>
                                <label for=""><input type="radio" value="1" name="gold"><span>1元</span></label>
                                <label for=""><input type="radio" value="10" name="gold"><span>10元</span></label>
                                <label for=""><input type="radio" value="30" name="gold"><span>30元</span></label>
                                <label for=""><input type="radio" value="50" name="gold"><span>50元</span></label>
                                <label for=""><input type="radio" value="100" name="gold"><span>100元</span></label>
                                <label for=""><input type="radio" value="200" name="gold"><span>200元</span></label>
                                <label for=""><input type="radio" value="500" name="gold"><span>500元</span></label>
                                <label for=""><input type="radio" value="1000" name="gold"><span>1000元</span></label>
                                <label for=""><input type="radio" value="2000" name="gold"><span>2000元</span></label>
                                <label for=""><input type="radio" value="3000" name="gold"><span>3000元</span></label>
                                <label for=""><input type="radio" value="5000" name="gold"><span>5000元</span></label>
                                <label for=""><input type="radio" value="10000" name="gold"><span>10000元</span></label>
                                <label for=""><input type="radio" value="20000" name="gold"><span>20000元</span></label>
                                <label for=""><input type="radio" value="50000" name="gold"><span>50000元</span></label>
                                <label for=""><input type="radio" value="100000" name="gold"><span>100000元</span></label>
                            </li>
                        </ul>
                    </div>
                    <div class="line"></div>
                    <div class="payBtn">
                        <input type="button" value="立即充值" class="submit">
                    </div>
                    <div class="declare">
                        微信支付说明：<br/>
                        1、需开通微信支付，开通后用微信的“扫一扫”功能扫描二维码即可进行支付。
                    </div>
                </div>
                <!-- 盛付通网银 -->
                <div class="sheng" style="display: none">
                    <div class="money">
                        <div>请选择充值金额：</div>
                        <ul>
                            <li>
                                <label for=""><input type="radio" value="1" name="gold"><span>1元</span></label>
                                <label for=""><input type="radio" value="10" name="gold"><span>10元</span></label>
                                <label for=""><input type="radio" value="30" name="gold"><span>30元</span></label>
                                <label for=""><input type="radio" value="50" name="gold"><span>50元</span></label>
                                <label for=""><input type="radio" value="100" name="gold"><span>100元</span></label>
                                <label for=""><input type="radio" value="200" name="gold"><span>200元</span></label>
                                <label for=""><input type="radio" value="500" name="gold"><span>500元</span></label>
                                <label for=""><input type="radio" value="1000" name="gold"><span>1000元</span></label>
                                <label for=""><input type="radio" value="2000" name="gold"><span>2000元</span></label>
                                <label for=""><input type="radio" value="3000" name="gold"><span>3000元</span></label>
                                <label for=""><input type="radio" value="5000" name="gold"><span>5000元</span></label>
                                <label for=""><input type="radio" value="10000" name="gold"><span>10000元</span></label>
                                <label for=""><input type="radio" value="20000" name="gold"><span>20000元</span></label>
                                <label for=""><input type="radio" value="50000" name="gold"><span>50000元</span></label>
                                <label for=""><input type="radio" value="100000" name="gold"><span>100000元</span></label>
                            </li>
                        </ul>
                    </div>
                    <div class="line"></div>
                    <div class="bank">
                        <div>请选择银行：</div>
                        <ul>
                            <li>
                                <label for=""><input value="BOC" name="bank" type="radio"><span><img src="/images/pay/bankbc.jpg" alt=""></span></label>
                                <label for=""><input value="ABC" name="bank" type="radio"><span><img src="/images/pay/bankabc.jpg" alt=""></span></label>
                                <label for=""><input value="COMM" name="bank" type="radio"><span><img src="/images/pay/bankbcc.jpg" alt=""></span></label>
                                <label for=""><input value="CCB" name="bank" type="radio"><span><img src="/images/pay/bankccb.jpg" alt=""></span></label>
                                <label for=""><input value="CMB" name="bank" type="radio"><span><img src="/images/pay/bankcmb.jpg" alt=""></span></label>
                                <label for=""><input value="ICBC" name="bank" type="radio"><span><img src="/images/pay/bankicbc.jpg" alt=""></span></label>
                                <label for=""><input value="PSBC" name="bank" type="radio"><span><img src="/images/pay/bankpost.jpg" alt=""></span></label>
                                <label for=""><input value="SPDB" name="bank" type="radio"><span><img src="/images/pay/bankshpd.jpg" alt=""></span></label>
                                <label for=""><input value="CEB" name="bank" type="radio"><span><img src="/images/pay/CEB-NET.jpg" alt=""></span></label>
                                <label for=""><input value="" name="bank" type="radio"><span>其它</span></label>
                            </li>
                        </ul>
                    </div>
                    <div class="line"></div>
                    <div class="payBtn">
                        <input type="button" value="立即充值" class="submit">
                    </div>
                    <div class="declare">
                        只要开通网上银行服务，您都可以通过支付宝网银或易宝平台提供的网上银行入口享受安全、快捷的在线充值服务，即充即玩1分钟完成！
                    </div>
                </div>
                <!--各种卡-->
                <div class="shenCard" style="display: none">
                    <div class="money">
                        <div>请选择充值金额：</div>
                        <ul>
                            <li>
                                <label for=""><input value="10" name="gold" type="radio"><span>10元</span></label>
                                <label for=""><input value="30" name="gold" type="radio"><span>30元</span></label>
                                <label for=""><input value="50" name="gold" type="radio"><span>50元</span></label>
                                <label for=""><input value="100" name="gold" type="radio"><span>100元</span></label>
                                <label for=""><input value="500" name="gold" type="radio"><span>500元</span></label>
                            </li>
                        </ul>
                    </div>
                    <div class="line"></div>
                    <div class="payBtn">
                        <input value="立即充值" class="submit" type="button">
                    </div>
                    <div class="declare">
                        <p>
                            1、请务必正确选择您所使用的卡面额，以免引起不必要的交易失败或交易余额丢失。<br>
                            2、盛付通客服电话:400-720-8888（7X24小时在线客服）,QQ:1622912719（7X24小时在线客服）。</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="payInfo">
    <div class="close"></div>
    <h1>充值信息确认</h1>
    <div class="payInfoDetail">
        <h2>请确认您的充值信息：</h2>
        <ul>

        </ul>
        <div class="subPayInfo">
            <input type="button" value="确认提交" id="togateway">
            <input type="button" value="返回修改" id="back">
        </div>
    </div>
</div>

<div class="payResult">
    <div class="close"></div>
    <h1>提示</h1>
    <div class="closeOrrefresh">
        <h2>请确认您的充值信息：</h2>
        <p>付款完成前请不要关闭或刷新此窗口<br>
            <span>完成付款后根据您的情况点击下面的按钮。</span></p>
    </div>
    <div class="checkPayResult">
        <a href="" id="result" target="_blank">查看充值结果</a>
        <a href="" id="help" target="_blank">付款遇到问题</a>
        <input type="button" value="返回" id="back">
    </div>
</div>

<div class="weixinqrc">
    <div class="close"></div>
    <h1>微信扫码支付</h1>
    <div class="wxInfo">

    </div>
</div>

<!--[if IE 6]>
<script type="text/javascript" src="/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">
    DD_belatedPNG.fix('.slogan,.gameSerRole li,.game,.server,.role,.payInfo,#togateway,#back,.payResult,#result,#help,.toPay,.gameCenter,.customer,.help,.logo,img,.failure,.success');
</script>
<![endif]-->
<div class="company">
    <a href="" title="123slg" class="logo"></a>
    <div class="ruizhan">
        <a href="" target="_blank">版权所有:深圳策略一二三网络有限公司</a>
        <a href="" target="_blank">网络文化经营许可证:粤网文[2015]1888-366号</a>
        <a href="" target="_blank">增值电信业务经营许可证:粤B2-20160087</a>
    </div>
    <div class="public">
        <a href="" class="shgs" target="_blank"><img src="/images/icon.gif" width="47" height="47" /></a>
        <a href="" class="jingwu" target="_blank"><img src="/images/jingwu.png" width="52" height="52" /></a>
        <a href="" class="policeicon" target="_blank"><img src="/images/policeicon.png" width="119" height="41" /></a>
        <a href="" class="zx110" target="_blank"><img src="/images/zx110.png" width="93" height="41" /></a>
        <a href="" class="wenww" target="_blank"><img src="/images/gameRFID.png" width="50" height="50"></a>
    </div>
</div>
</body>
</html>
