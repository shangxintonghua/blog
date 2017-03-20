<?php
define("BL_SXTH","blog_shangxintonghua");//调用includes下文件
?>
<!DOCTYPE html>
<html lang="zh" xmlns:wb="http://open.weibo.com/wb">
<head>
    <title>枫叶分享-优质互联网资源分享</title>
    <?php
    define("WRAP","wrap");//引入首页的wrap.css文件
    include dirname(__FILE__)."/includes/constant.inc.php";
    include  ROOT_PATH."/includes/header.inc.php";

    ?>
</head>

<body>
<?php
include ROOT_PATH."/header.php";
include ROOT_PATH."/nav.php";
include ROOT_PATH."/includes/BLDB.class.php";
global  $jadb;//全局变量


$jadb=new BLDB(BL_DB_HOST,BL_DB_USER,BL_DB_PWD,BL_DB_NAME);
if(!$jadb->isConnect())
{
    echo $jadb->getErrorInfo();
}
include ROOT_PATH.'/includes/func.php';

?>
<div class="wrap">
    <?php
    include ROOT_PATH."/content.php";
    include ROOT_PATH."/sidebar.php";
    ?>
</div>

<!--响应式主体-->
<div class="response-wrap">
    <?php
    include ROOT_PATH."/response-content.php";
    ?>
</div>

<?php
include ROOT_PATH."/footer.php";
?>
</body>


<?php include ROOT_PATH."/includes/fonts.php";?>
</html>
