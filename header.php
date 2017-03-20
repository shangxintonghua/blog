<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 15:07
 */
    if(!defined("BL_SXTH"))
    {
        header("location:./index");
    }
?>

<header>
    <div class="top-header">
        <span class="">
            枫叶分享-优质互联网资源。官方QQ群：
            <a class="" target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=84aa61253f74b810ff1861cb2327933b4b5dafc9130141b7d0c6e7dabd23a6f6"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="一键加群" title="一键加群">550243602</a>

            </span>
            <ul class="top-ul">
                <li><a href="#" title="关于枫叶" >关于枫叶</a></li>
                <li><a href="#" title="免责声明" >免责声明</a></li>
                <li><a href="#" title="版权声明" >版权声明</a></li>
                <li><a href="<?php echo BL_URL?>/message.php"  target="_blank">留言</a></li>

            </ul>
    </div>

    <div class="middle-header">
        <div class="middle-header-logo ">
            <a href="./index.php" target="_self" title="枫叶分享-优质互联网资料">枫叶分享</a>

        </div>
        <div class="middle-header-form">
            <form target="_blank" action="<?php echo BL_URL?>/search/search.php?" method="get" id="search">
                <input type="text" placeholder="输入关键字" name="search" class="searchekeys">
                <input type="submit" value="搜索" class="searchsubmit">
            </form>
            <a target="_blank" href="<?php BL_URL?>/sendmail.php" id="contribute" class="" title="我要爆料">我要爆料</a>

        </div>
    </div>

    <div class="button-header">
        <a href="./index.php" target="_self" title="枫叶分享">互联网优质资源</a>
    </div>
</header>


<!--响应式-->
<div id="top-header" class="">
    <span class="icon-menu" id="icon"></span>
    <h2><a href="<?php echo ROOT_PATH?>" TARGET="_self" TITLE="枫叶分享">枫叶分享</a> </h2>
    <a href="<?php echo ROOT_PATH?>" target="_self" title="枫叶分享-优质互联网资源">优质互联网资源</a>
</div>
