<?php
namespace common\utils;

use Yii;
use yii\helpers\Url;

class Email
{
    public static function body($username, $url)
    {
        $html = '<table style="background: #f2f5f9;width:100%"><tbody>';
        $html .= '<tr><td>亲爱的' . $username . '：</td></tr>';
        $html .= '<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 您好，欢迎使用123SLG邮箱绑定服务，在您忘记密码时，可通过邮箱快速找回密码。</td></tr>';
        $html .= '<tr><td>请点击下面的链接绑定您的邮箱<span style="font-size:13px;color:#996666;">（该链接30分钟内有效）：</span></td></tr>';
        $html .= '<tr><td><a target="_blank" href="' . $url . '">' . $url . '</a></td></tr>';
        $html .= '<tr><td><span style="font-size:13px;color:#996666;">（友情提示：如果上面不是链接形式，请将该地址手动黏贴到浏览器地址再访问。）</span></td></tr></tbody></table>';

        return $html;
    }

    public static function template($username, $url)
    {
        $html = '<table style="background: #f2f5f9;width:100%"><tbody>';
        $html .= '<tr><td>亲爱的' . $username . '：</td></tr>';
        $html .= '<tr ><td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 您好，欢迎使用123SLG邮箱找回密码的功能，</td ></tr >';
        $html .= '<tr ><td >请点击下面的链接重置您的密码：</td ></tr >';
        $html .= '<tr ><td ><a href = "' . $url . '" target = "_blank" >' . $url . '</a></td ></tr >';
        $html .= '<tr ><td ><span style = "font-size:13px;color:#996666;" >（友情提示：如果上面不是链接形式，请将该地址手动黏贴到浏览器地址再访问。）</span ></td ></tr ></tbody ></table >';

        return $html;
    }

    public static function send($username, $url, $email, $body = '')
    {
        $mail = Yii::$app->mailer->compose();
        $template = $body == '' ? self::body($username, $url) : $body;
        $mail->setTo($email)
            ->setSubject('策略一二三网络通行证邮箱验证系统邮件')
            ->setTextBody('Plain text content')
            ->setHtmlBody($template);

        return $mail->send();
    }

    public static function bindComplete()
    {
        $html = '<table style="margin:0 auto" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody>';
        $html .= '<tr><th class="congTitle" colspan="3" height="60"><b class="ml314">请登录邮箱进行绑定</b></th></tr>';
        $html .= '<tr><td style="text-align:center;" height="40" width="500"><span class="ml312">您好，邮箱绑定信息已经发送到您的邮箱,请登录邮箱，完成邮箱绑定！</span></td></tr>';
        $html .= '<tr><td class="mailBtn" align="center"><a class="allSubmitBtn congSubmit" style="color:white;" href="' . Url::to(['user/index']) . '">绑定完成</a></td></tr></tbody></table>';

        return $html;
    }

    public static function bindError()
    {
        $html = '<table style="margin:0 auto" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody>';
        $html .= '<tr><th class="congTitle" colspan="3" height="60"><b class="ml314">邮箱绑定失败</b></th></tr>';
        $html .= '<tr><td style="text-align:center;" height="40" width="500"><span class="ml312">邮箱绑定失败，请稍后在试！</span></td></tr>';
        $html .= '<tr><td class="mailBtn" align="center"><a class="allSubmitBtn congSubmit" style="color:white;" href="' . Url::to(['user/index']) . '">重新绑定</a></td></tr></tbody></table>';

        return $html;
    }

    public static function unbindComplete()
    {
        $html = '<table style="margin:0 auto" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody>';
        $html .= '<tr><th class="congTitle" colspan="3" height="60"><b class="ml314">请登录邮箱解除绑定</b></th></tr>';
        $html .= '<tr><td style="text-align:center;" height="40" width="500"><span class="ml312">您好，邮箱解除绑定信息已经发送到您的邮箱,请登录邮箱，完成解除绑定！</span></td></tr>';
        $html .= '<tr><td class="mailBtn" align="center"><a class="allSubmitBtn congSubmit" style="color:white;width:100%;margin-top:21px;" href="<?php echo Url::to([\'user/index\']) ?>">解绑完成</a></td></tr></tbody></table>';
        return $html;
    }

    public static function unbindError()
    {
        $html = '<table style="margin:0 auto" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody>';
        $html .= '<tr><th class="congTitle" colspan="3" height="60"><b class="ml314"></b></th></tr>';
        $html .= '<tr><td style="text-align:center;" height="40" width="500"><span class="ml312">网络忙请稍后在试！</span></td></tr>';
        $html .= '<tr><td class="mailBtn" align="center"><a class="allSubmitBtn congSubmit" style="color:white;width:100%;margin-top:21px;" href="<?php echo Url::to([\'user/index\']) ?>">重新解绑</a></td></tr></tbody></table>';
        return $html;
    }
//    public static function complete()
//    {
//        $html = '<table width="50%" style="margin:0 auto;" border="0" cellspacing="0" cellpadding="0"><tr><th class="congTitle" colspan="3" height="60"><b>恭喜您，邮箱绑定成功！</b></th></tr>';
//        $html .= '<tr><td class="mailBtn" align="center"><a class="allSubmitBtn congSubmit" style="color:white;width:100%;margin-top:21px;"   href="update.action?redirectUrl=index.jsp" >绑定完成</a></td></tr></table>';
//    }


}