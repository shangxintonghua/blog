<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 10:53
 */
if(!defined("BL_SXTH"))
{
    header("location:../index");
}
?>
<nav id="nav" class="">
    <ul class="nav-ul">
        <li id="frontend">
            <a href="<?php echo BL_URL?>/category/articles.php?category=前端开发" title="前端开发">前端开发</a>
            <ul id="frontendul">
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=HTML-CSS" title="HTML-CSS">HTML-CSS</a></li>
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=JavaScript" title="JAVASCRIPT">JAVASCRIPT</a></li>
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=JQuery" title="JQUERY">JQUERY</a></li>
            </ul>
        </li>
        <li id="afterend">
            <a href="<?php echo BL_URL?>/category/articles.php?category=后台开发" title="后台开发">后台开发</a>
            <ul id="afterendul">
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=PHP" title="PHP">PHP</a></li>
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=Ruby" title="RUBY">RUBY</a></li>
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=Python" title="JQUERY">PYTHON</a></li>
            </ul>
        </li>
        <li id="db">
            <a href="<?php echo BL_URL?>/category/articles.php?category=数据库" title="数据库">数据库</a>
            <ul id="dbul">
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=MySQL" title="MYSQL">MYSQL</a></li>
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=NoSQL" title="NOSQL">NOSQL</a></li>
            </ul>
        </li>
        <li id="mobiledev">
            <a href="<?php echo BL_URL?>/category/articles.php?category=移动开发" title="移动开发">移动开发</a>
            <ul id="mobiledevul">
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=Android" title="Android">Android</a></li>
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=IOS" title="IOS">IOS</a></li>

            </ul>
        </li>
        <li id="progmming">
            <a href="<?php echo BL_URL?>/category/articles.php?category=编程语言" title="编程语言">编程语言</a>
            <ul id="languageul">
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=C-Cpp" title="C-CPP">C-CPP</a></li>
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=Java" title="JAVA">JAVA</a></li>
            </ul>
        </li>
        <li id="circle">
            <a href="<?php echo BL_URL?>/category/articles.php?category=业界分享" title="业界分享">业界分析</a>
        </li>
        <li id="devflat">
            <a href="<?php echo BL_URL?>/category/articles.php?category=开发平台"title="开发平台">开发平台</a>
            <ul id="devflatul">
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=Linux-Vim" title="LINUX">linux</a></li>
                <li><a href="<?php echo BL_URL?>/category/articles.php?category=Git">git</a></li>
            </ul>
        </li>
    </ul>

</nav>

<div class="notice">
    <span>
             枫叶分享官方群:  <a class="" target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=84aa61253f74b810ff1861cb2327933b4b5dafc9130141b7d0c6e7dabd23a6f6"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="一键加群" title="一键加群"></a>
    </span>
</div>
<!--响应式导航-->
<div id="response-nav" class="">
    <ul class="response-nav-ul">
        <li id="response-frontend">
            暂不提供导航 <a href="index.php">访问首页</a>
        </li>
    </ul>
</div>


