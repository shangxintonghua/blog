<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 13:59
 */
  //首页文章详情
  if(!defined("BL_SXTH"))
  {
      header("location:./index.php");
  }
?>
<?php
  if(defined("INDEX")):
?>
      <div class="content">

          <div class="recommend">
              <span class="content-span">枫叶推荐</span>
              <ul class="article-list">
                  <?php
                        $articleViewSql="select * from artitles limit ".NUMBER;
                        getArticles($articleViewSql);

                  ?>
              </ul>
          </div>

          <div class="frontend">
              <span class="content-span">前端开发</span>
              <ul class="article-list">
                  <?php
                  $articleViewSql="select * from artitles WHERE blogcategory LIKE '%910%' limit ".NUMBER;
                  getArticles($articleViewSql);

                  ?>
              </ul>
              <a target="_blank" class="more-article" href="<?php echo BL_URL?>/category/articles.php?category=前端开发"><span>更多</span></a>
          </div>

          <div class="afterend">
              <span class="content-span">后台开发</span>
              <ul class="article-list">
                  <?php
                  $articleViewSql="select * from artitles WHERE blogcategory LIKE '%520%' limit ".NUMBER;
                  getArticles($articleViewSql);

                  ?>
              </ul>
              <a target="_blank" class="more-article" href="<?php echo BL_URL?>/category/articles.php?category=后台开发"><span>更多</span></a>
          </div>

          <div class="db">
              <span class="content-span">数据库</span>
              <ul class="article-list">
                  <?php
                  $articleViewSql="select * from artitles WHERE blogcategory LIKE '%920%' limit ".NUMBER;
                  getArticles($articleViewSql);

                  ?>
              </ul>
              <a target="_blank" class="more-article" href="<?php echo BL_URL?>/category/articles.php?category=数据库"><span>更多</span></a>
          </div>

          <div class="mobiledev">
              <span class="content-span">移动开发</span>
              <ul class="article-list">
                  <?php
                  $articleViewSql="select * from artitles WHERE blogcategory LIKE '%1128%' limit ".NUMBER;
                  getArticles($articleViewSql);

                  ?>
              </ul>
              <a target="_blank" class="more-article" href="<?php echo BL_URL?>/category/articles.php?category=移动开发"><span>更多</span></a>
          </div>


          <div class="programming">
              <span class="content-span">编程语言</span>
              <ul class="article-list">
                  <?php
                  $articleViewSql="select * from artitles WHERE blogcategory LIKE '%401%' limit ".NUMBER;
                  getArticles($articleViewSql);

                  ?>
              </ul>
              <a target="_blank" class="more-article" href="<?php echo BL_URL?>/category/articles.php?category=编程语言"><span>更多</span></a>
          </div>


          <div class="circle">
              <span class="content-span">业界分享</span>
              <ul class="article-list">
                  <?php
                  $articleViewSql="select * from artitles WHERE blogcategory LIKE '%708%' limit ".NUMBER;
                  getArticles($articleViewSql);

                  ?>
              </ul>
              <a target="_blank" class="more-article" href="<?php echo BL_URL?>/category/articles.php?category=业界分享"><span>更多</span></a>
          </div>
          <div class="devflat">
              <span class="content-span">开发平台</span>
              <ul class="article-list">
                  <?php
                  $articleViewSql="select * from artitles WHERE blogcategory LIKE '%1025%' limit ".NUMBER;
                  getArticles($articleViewSql);

                  ?>
              </ul>
              <a target="_blank" class="more-article" href="<?php echo BL_URL?>/category/articles.php?category=开发平台"><span>更多</span></a>
          </div>

      </div>
<?php else:?>
<div class="content">
    <div id="error404">
        <h3>没有你找的东西喔</h3>
        <div class="randRecError">
            <ul>
                <?php getRandArticles()?>
            </ul>
        </div>

        <iframe scrolling='no' frameborder='0' src='http://yibo.iyiyun.com/Home/Distribute/ad404/key/14234' width='654' height='470' style='display:block;margin-left:10px'></iframe>
    </div>
</div>

<?php endif;?>

