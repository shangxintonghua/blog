<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/20
 * Time: 11:27
 */
  if(!defined("BL_SXTH"))
  {
      header("location:../index.php");
  }

?>
<div class="commsort">
    <span class="content-span">周评论排行</span>
    <ul  class="ds-top-threads" data-range="weekly" data-num-items="7"></ul>
    <!--加载多说js-->
    <?php include "../comments.php"?>
</div>

<div class="readsort">
    <span class="content-span">阅读排行</span>
    <ul class="article-list" id="newAndRand">
        <?php
          $articleNewPostSql="select blogtitle,articleuniqid from artitles order by articleview desc limit 7";
          getNewArticles($articleNewPostSql)
        ?>
    </ul>
</div>


<div class="newcomm">
    <span class="content-span">最新评论</span>
    <!-- 多说最新评论 start -->
    <div class="ds-recent-comments" data-num-items="5" data-show-avatars="1" data-show-time="1" data-show-title="1" data-show-admin="1" data-excerpt-length="70"></div>
    <!-- 多说最新评论 end -->
</div>
