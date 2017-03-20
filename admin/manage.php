<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/14
 * Time: 23:07
 */
    define("BL_SXTH","blog_shangxintonghua");
    session_start();//开启session

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>后台管理-枫叶分享</title>
    <?php
        define("MANAGE","manage");
        include "../includes/constant.inc.php";
        include ROOT_PATH."/includes/header.inc.php";
    ?>
</head>
<body>
<div class="manage">
    <?php include "./manageheader.php"?>
    <div class="main">
        <?php
            include "./manageside.php";
        ?>
        <div class="maincontent">
            <h3>欢迎来到枫叶分享的后台管理</h3>
        </div>
    </div>
</div>
</body>
</html>
