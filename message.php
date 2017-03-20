<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 17:01
 */
  define("BL_SXTH","blog_shangxintonghua");

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>留言板--枫叶分享</title>
    <?php
        define("MSG","msg");
        include dirname(__FILE__)."/includes/constant.inc.php";
        include ROOT_PATH."/includes/header.inc.php";
    ?>
</head>
<body>
<?php
    include ROOT_PATH."/header.php";
    include ROOT_PATH."/nav.php";
    include ROOT_PATH."/includes/BLDB.class.php";
    global $jadb;
    $jadb=new BLDB(BL_DB_HOST,BL_DB_USER,BL_DB_PWD,BL_DB_NAME);
    if(!$jadb->isConnect())
    {
        echo $jadb->getErrorInfo();
    }
?>
<div class="msgwrap">
    <header class="">
        枫叶留言--欢迎各路好友的灌水、建议和Bug
    </header>

    <!-- 多说评论框 start -->
    <div class="ds-thread"
         data-thread-key="sharemessage"
         data-title="关于枫叶--枫叶分享"
         data-url="./message">

    </div>
</div>
<?php
  include ROOT_PATH."/comments.php";
  include ROOT_PATH."/footer.php";
?>
</body>
</html>
