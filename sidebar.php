<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 13:59
 */
   if(!defined("BL_SXTH"))
   {
       header("location:./index.php");
   }
?>
<?php
    if(defined("INDEX")):
?>
        <div class="side">
            <div class="new-post">
                <span class="content-span">最新发布</span>
                <ul class="article-list" id="newAndRand">
                    <?php
                         $articleNewPostSql="select blogtitle,articleimg,articleuniqid from artitles ORDER by articleuniqid DESC limit 7";
                         getNewArticles($articleNewPostSql);

                    ?>
                </ul>
            </div>

            <div class="hot-tags">
                <span class="content-span">热门标签</span>
                <ul class="tag-list">
                    <?php
                        getHotTags();
                    ?>
                </ul>
            </div>


            <div class="rand-article">
                <span class="content-span">随机文章</span>
                <ul class="article-list" id="newAndRand">
                    <?php
                       getRandArticles();
                    ?>
                </ul>
            </div>
        </div>

<?php else:?>
        <div class="side">

            <div class="rand-article">
                <span class="content-span">随机文章</span>
                <ul class="article-list" id="newAndRand">
                    <?php
                     getRandArticles();

                    ?>
                </ul>
            </div>


            <div class="hot-tags">
                <span class="content-span">热门标签</span>
                <ul class="tag-list">
                    <?php
                        getHotTags();
                    ?>
                </ul>
            </div>
        </div>

<?php endif;?>
