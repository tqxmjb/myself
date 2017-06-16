<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/2/24
 * Time: 18:14
 */

require_once('mailer/phpmailer/class.phpmailer.php');

$email = '958584313@qq.com';
//$email = 'tonghe.wei@moneplus.cn';
//$email = '15133483887@sina.cn';

$mail = new PHPMailer(); //建立邮件发送类
$mail->IsSMTP(); // 使用SMTP方式发送
$mail->Host = "smtp.qq.com"; // 您的企业邮局域名
//$mail->Host = "smtp.exmail.qq.com"; // 您的企业邮局域名
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->CharSet  = "UTF-8"; //字符集
$mail->Encoding = "base64"; //编码方式
$mail->SMTPAuth = true; // 启用SMTP验证功能
$mail->Username = "958584313@qq.com"; // 邮局用户名(请填写完整的email地址)
//$mail->Username = "tonghe.wei@moneplus.cn"; // 邮局用户名(请填写完整的email地址)
$mail->Password = "yqqgorrethqibdib";  // 邮局密码
//$mail->Password = "ihxarwmmkmkobfbg";  // 邮局密码
//$mail->Password = "Kckck1993"; // 邮局密码
$mail->From = '958584313@qq.com'; //邮件发送者email地址
//$mail->From = 'tonghe.wei@moneplus.cn'; //邮件发送者email地址
$mail->FromName = "sssssss";
$mail->Subject = "ss"; //邮件标题
$mail->Body = "s"; //邮件内容
$address = $email;//收件人email
$mail->AddAddress($address, "我");//添加收件人（地址，昵称）

if(!$mail->Send()){
    var_dump(false);
//    $this->showBox('邮件发送失败,请稍后再试!','','0');
} else {
    var_dump(true);
//    $this->showBox('发送成功,请去邮箱查收','','1');
}
exit;