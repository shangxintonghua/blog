<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/20
 * Time: 21:38
 */
   define("BL_SXTH","blog_shangxintonghua");
?>
<!DOCTYPE>
<html lang="zh" xmlns:wb="http://open.weibo.com/wb">
<head>
    <title>我要投稿--枫叶分享-优质互联网分享</title>
    <?php
      define("SENDMAIL","sendmail");
      include dirname(__FILE__)."/includes/constant.inc.php";
      include ROOT_PATH."/includes/header.inc.php";
    ?>
    <script type="text/javascript" src="./js/layer/layer.min.js"></script>
</head>
<body>
<script type="text/javascript">
    $.layer({
        type:0,
        time:0,
        title:'友情提示',
        dialog:{
            type:1,
            msg:'欢迎来到投稿！！！！！！！'
        }
    })

</script>

<?php
    include ROOT_PATH."/header.php";
    include ROOT_PATH."/nav.php";
    include ROOT_PATH."/includes/BLDB.class.php";
    global $jadb;
    $jadb=new BLDB(BL_DB_HOST,BL_DB_USER,BL_DB_PWD,BL_DB_NAME);
    if (!$jadb->isConnect())
    {
        echo $jadb->getErrorInfo();
    }
    include ROOT_PATH."/includes/func.php";

?>

<div class="mailwrap">
    <div class="mailcontent">
        <header>
            <img src="./images/mail.png">
        </header>
        <aside class="demand">
            <h3>投稿要求</h3>
            <ol>
                <li>与互联网技术相关</li>
                <li>不欢迎标题党，欢迎干货</li>
                <li>不欢迎转载地址，欢迎原始地址</li>
                <li>欢迎推荐，也欢迎自荐</li>
            </ol>
        </aside>
        <form method="post" action="./sendemail/mail.php" id="mailform">
            <ul class="formul">
               <li>
                   <label for="title">标题<span>*</span></label>
                   <input type="text" id="title" name="title" value="">
               </li>
                <li>
                    <label for="link">链接<span>*</span></label>
                    <input type="url" id="link" name="link" value="">
                </li>
                <li>
                    <label for="author">怎么称呼你<span>*</span></label>
                    <input type="text" id="author" name="author" value="">
                </li>

                <li>
                    <label for="contact">请留下微博/QQ/邮箱以便联系：<span>*</span></label>
                    <input type="text" id="contact" name="contact" value="">
                </li>
            </ul>
            <input type="submit" id="sending" value="提交稿件">
        </form>
    </div>
</div>
<?php
 include ROOT_PATH."/footer.php";
?>
</body>
</html>
