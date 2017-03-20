<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/20
 * Time: 22:20
 */

//使用该功能需要开启域名邮箱
header("Content-type:text/html;charset=utf-8");
require ("class.phpmailer.php");
require ("class.smtp.php");//使用phpmailer不要导入
date_default_timezone_set('Asia/Shanghai');//设置时区
$mail=new PHPMailer();//建立邮件发送

$title=$_POST['title'];
$link=$_POST['link'];
$author=$_POST['author'];
$contact=$_POST['contact'];

$address="";
$mail->isSMTP();
$mail->CharSet="UTF-8";
$mail->Host="smtp.qq.com";
$mail->SMTPAuth=true;
$mail->Username="";
$mail->Password="";



$mail->From="";
$mail->FromName="";
$mail->AddAddress($address,"");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
$mail->Subject="枫叶分享";//邮件标题
$mail->Body="文章标题:".$title."\n文章链接：".$link."\n投稿人:".$author."\n联系方式：".$contact;//邮件内容
$mail->send();
header("location:../sendmail.php");
?>