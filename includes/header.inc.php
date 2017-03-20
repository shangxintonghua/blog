<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 15:07
 */
    if(!defined("BL_SXTH"))
    {
        header("location:../index");
    }
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1">
<meta name="keywords" content="前端开发,后台开发,编程语言,数据库,移动开发,业界资讯,
开发平台,html,html5,css,css3,js,jq,php,ruby,python,mysql,nosql,android,ios,it,c,c++,java,javaweb">
<meta name="description" content="枫叶分享，互联网优质资源">
<meta name="robots" content="all">
<meta name="author",content="Pite,794473858@qq.com">
<!--微博组件-->
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>

<?php if(defined("WRAP")):?>
    <link rel="shortcut icon" type="image/x-icon" href="../images/admin.jpg"/>
    <link rel="stylesheet" type="text/css" href="./css/<?php echo ALL?>.css">
    <link rel="stylesheet" type="text/css" href="./css/<?php echo WRAP?>.css">
    <script type="text/javascript" src="./js/jquery.min.js"></script>

    <!--响应式css开始-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/response.js"></script>
    <link rel="stylesheet" media="screen and (max-width:415px)" type="text/css" href="../css/responseip.css">
    <link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../css/responsepc.css">

    <!--响应式css结束-->
    <script type="text/javascript" src="./js/<?php echo ALL?>.js"></script>
    <!--百度浮窗分享-->
    <script>window._bd_share_config={"common":{"bdSnsKey":{"tsina":"3555695096"},"bdText":"","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"5","bdPos":"left","bdTop":"100"},"image":{"viewList":["tsina","qzone","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php elseif (defined("LOGIN")):?><!--登陆-->
    <link rel="shortcut icon" type="image/x-icon" href="../images/admin.jpg">
    <link rel="stylesheet" type="text/css" href="../css/<?php echo LOGIN;?>.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/<?php echo LOGIN?>.js"></script>
<?php elseif (defined("MANAGE")):?><!--后台管理-->

    <link rel="shortcut icon" type="image/x-icon" href="../images/admin.jpg">
    <link rel="stylesheet" type="text/css" href="../css/<?php echo MANAGE;?>.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/<?php echo MANAGE;?>.js"></script>
<?php elseif (defined("DETAILS")):?><!--文章详情-->
    <link rel="shortcut icon" type="image/x-icon" href="../images/admin.jpg">
    <link rel="stylesheet" type="text/css" href="../css/<?php echo ALL;?>.css">
    <link rel="stylesheet" type="text/css" href="../css/<?php echo DETAILS?>.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <!--响应式css开始-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/response.js"></script>
    <link rel="stylesheet" media="screen and (max-width:415px)" type="text/css" href="../css/responseip.css">
    <link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../css/responsepc.css">
    <!--响应式css结束-->
    <script type="text/javascript" src="../js/<?php echo DETAILS?>.js"></script>
    <script type="text/javascript" src="../js/<?php echo ALL?>.js"></script>
<?php elseif (defined("MSG")): ?>
    <link rel="shortcut icon" type="image/x-icon" href="../images/admin.jpg">
    <link rel="stylesheet" type="text/css" href="../css/<?php echo ALL?>.css">
    <link rel="stylesheet" type="text/css" href="../css/<?php echo MSG?>.css">
    <link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../css/responsepc.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/<?php echo ALL?>.js"></script>

<?php elseif (defined("CATAGORY")):?>
    <link rel="shortcut icon" type="image/x-icon" href="../../images/admin.jpg">
    <link rel="stylesheet" type="text/css" href="../../css/<?php echo ALL?>.css">
    <link rel="stylesheet" type="text/css" href="../../css/<?php echo CATAGORY?>.css">

    <link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../../css/responsepc.css">
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/<?php echo CATAGORY?>.js"></script>
    <script type="text/javascript" src="../../js/<?php echo ALL?>.js"></script>

<?php elseif (defined("SENDMAIL")):?>
    <link rel="shortcut icon " type="image/x-icon" href="<?php echo BL_URL?>/images/admin.jpg">

    <link rel="stylesheet" type="text/css" href="../../css/<?php echo ALL?>.css">
    <link rel="stylesheet" type="text/css" href="../../css/<?php echo SENDMAIL?>.css">
    <link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../../css/responsepc.css">
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/<?php echo ALL?>.js"></script>
    <script type="text/javascript" src="../../js/<?php echo SENDMAIL?>.js"></script>

<?php endif; ?>



