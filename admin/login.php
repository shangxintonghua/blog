<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/14
 * Time: 10:51
 */
define("BL_SXTH","blog_shangxintonghua");
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>登陆-枫叶分享</title>
    <?php
        session_start();
        if(isset($_SESSION['fengyeuser']))
        {
            if($_SESSION['fengyeuser']){
                header("location:./manage.php");
            }
        }

        define("LOGIN","login");
        include "../includes/constant.inc.php";
        include ROOT_PATH."/includes/header.inc.php";
        $_SESSION['uniqid']=sha1(uniqid(mt_rand(),true));

    ?>
</head>
<body>
    <div class="login">
        <header>
            <img src="../images/admin.jpg" title="logo">
        </header>

        <div class="logindiv">
            <form action="./checklogin.php?action=login&jar=<?php echo sha1(BL_SXTH)?>" method="post" id="loginform">
                <input type="hidden" name="uniqid" value="<?php echo $_SESSION['uniqid'];?>">
                 <ul>
                     <li id='loginerror'></li>
                     <li>
                         管理员登陆
                     </li>
                     <li>
                         <input type='text' placeholder='输入用户名' id='user' name='user'>
                     </li>
                     <li>
                         <input type='password' placeholder='输入密码'id='pwd' name='pwd'>
                     </li>
                     <li>
                         <input type='submit' value='登陆' id='loginbtn'>
                     </li>
                </ul>
                </form>
        </div>
    </div>
</body>
</html>