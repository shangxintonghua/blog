<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/16
 * Time: 13:52
 */
  session_start();
  define("BL_SXTH","blog_shangxintonghua");
  if(isset($_GET['artuni']))
  {
      if(!empty($_GET['artuni'])&&intval($_GET['artuni']))
      {
              $artuni=intval($_GET['artuni']);//转换成整数
              define("DETAILS","details");
              include "../includes/constant.inc.php";
              include ROOT_PATH."/includes/header.inc.php";
              include ROOT_PATH."/includes/BLDB.class.php";
              global $jadb;
              $jadb=new BLDB(BL_DB_HOST,BL_DB_USER,BL_DB_PWD,BL_DB_NAME);
              if(!$jadb->isConnect()){
                  echo $jadb->getErrorInfo();
              }
              include ROOT_PATH.'/includes/func.php';

              $detailSql="select * from artitles WHERE articleuniqid=$artuni";
              $detailRow=$jadb->getRow($detailSql);
//              print_r($detailRow);
              if(is_integer($detailRow)||$detailRow===0){
                  header("location:../404");
              }

      }else{
          header("location:../404");
      }
  }else{
      header("location:../404");
  }


?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title><?php echo $detailRow['blogtitle'];?>-枫叶分享</title>
    <!--ue代码高亮-->


</head>
<body>
<?php
  include ROOT_PATH."/header.php";
  include ROOT_PATH."/nav.php";
  //更新阅读次数
  if(!$detailRow['articleview']){
      $newViews=updateShowViews($artuni,0);
  }else{
      $newViews=updateShowViews($artuni,$detailRow['articleview']);
  }
?>
<div class="details">
    <div class="detailcontent">
        <article>
            <header>
                <h3>
                    <?php echo $detailRow['blogtitle']?>
                </h3>
                <aside>
                    <span>
                        来源：<?php if ($detailRow['source']!=""):?>
                                <a target="_blank" href="<?php echo urldecode($detailRow['slink'])?>"title="<?php echo urldecode($detailRow['slink'])?>">
                                    <?php echo ($detailRow['source'])?>
                                </a>
                                <?php else:?>
                                <a target="_blank" href="<?php echo BL_URL."/articles/$artid-$artuni"?>" title="<?php echo urldecode($detailRow['slink'])?>">
                                    <?php echo urldecode($detailRow['source'])?>
                                </a>
                                <?php endif;?>


                    </span>
                    <span>
                        发布时间：<?php echo date("Y-m-d H:i:s",$detailRow['articleuniqid'])?>
                    </span>
                    <span>
                        阅读次数:<?php echo $newViews?>
                    </span>
                    <!--多说显示评论-->
                    <span class="" ></span>
                    <?php
                          if($_SESSION['fengyeuser']):
                    ?>
                    <span>
                        <a href="<?php echo BL_URL."/admin/editpost.php?artuni=$artuni"?>">编辑</a>
                    </span>
                    <?php endif;?>

                </aside>
            </header>
            <div class="articlecontent">
                <?php echo $detailRow['blogcontent']?>
                <div class="declare">
                    <?php if($detailRow['slink']!=""):?>
                    原文：
                    <a target="_blank" href="<?php echo urldecode($detailRow['slink'])?>"title="<?php echo urldecode($detailRow['slink'])?>">
                        <?php echo urldecode($detailRow['slink'])?>
                    </a>
                    <?php elseif ($detailRow['source']==""):?>
                        来源：网络
                    <?php else:;?>
                    来源：
                    <a href="<?php echo BL_URL?>" TITLE="枫叶分享">枫叶分享</a>
                    <span id="forbid">未经许可，不得转载、链接、转帖或以其他方式复制发表</span>
                    <?php endif;?>
                </div>

            </div>

            <footer>
                <!--百度分享-->
                <?php include ROOT_PATH."/includes/detailsbdshare.php";?>
            </footer>


        </article>
    </div>
    <!--前一篇，后一篇-->
    <aside class="prevnext">
        <!--上一篇-->
        <?php
          if ($prevUni=$jadb->getRow("select max(articleuniqid) as prevuniqid from artitles where articleuniqid<$artuni"))
          {
              if($prevUni['prevuniqid'])
              {
                  $preRow=$jadb->getRow("select blogtitle,articleuniqid from artitles WHERE articleuniqid={$prevUni['prevuniqid']}")
        ?>
                  <a class="prev" href="<?php echo "/artiles/".stripslashes($preRow['articleuniqid'])?>" title="<?php echo $preRow['blogtitle']?>"></a>
        <?php
              }
          }
        ?>
        <!--后一篇-->
        <?php
          if($nextUni=$jadb->getRow("select min(articleuniqid) as nextuniqid from artitles where articleuniqid>$artuni"))
          {
              if($nextUni['nextuniqid'])
              {
                  $nextRow=$jadb->getRow("select blogtitle,articleuniqid from artitles WHERE articleuniqid='{$nextUni['nextuniqid']}'")
        ?>
                  <a class="next" href="<?php echo "/artiles/".stripslashes($nextRow['articleuniqid'])?>" title="<?php echo $nextRow['blogtitle']?>"></a>
        <?php
              }
          }
        ?>





    </aside>
    <!--相关文章-->
    <div class="related">
        <h4>相关文章</h4>
        <ul class="retatedul">
            <!--排除文章自身-->
            <?php getRelatedArticles($detailRow['blogcategory'],$artuni) ?>
        </ul>
    </div>

    <!--评论-->
    <div class="articlecomments" id="comments">
        <div class="ds-thread duoshuo"
          data-thread-key="<?php echo $artuni?>"
          data-title="<?php echo $detailRow['blogtitle']?>"
          data-url="<?php echo BL_URL."/articles/details.php?artuni=$artuni" ?>"
        >
        </div>
        <?php include ROOT_PATH."/comments.php";?>
    </div>
    <!--链接到评论-->
    <div class="actToComm">
        <a href="#comments" title="去评论"></a>
    </div>


</div>

<div class="res-details">
    <div class="res-detailcontent">
        <article>
            <header>
            <h3>
                <?php echo $detailRow['blogtitle'];?>
            </h3>
            <aside>
                <span>
                    来源:<?php if ($detailRow['slink']!=""):?>
                    <a target="_blank" href="<?php echo urldecode($detailRow['slink'])?>" title="<?php echo $detailRow['blogtitle']?>">
                        <?php echo $detailRow['source']?>
                    </a>
                    <?php else:?>
                        <a target="_blank" href="<?php echo BL_URL."/articles/$artid-$artuni"?>" title="<?php echo $detailRow['blogtitle']?>">
                            <?php echo $detailRow['source']?>
                        </a>
                    <?php endif;?>


                </span>

                <span>
                    发布时间：<?php echo date("Y-m-d H:m:s",$detailRow['articleuniqid'])?>
                </span>
                <span>
                    阅读次数： <?php echo $newViews?>
                </span>
                <!--多说显示评论-->
                <span class=""></span>

                <?php
                   if($_SESSION['fengyeuser']):
                ?>
                <span>
                    <a href="<?php echo BL_URL."/admin/editpost.php?artuni=$artuni"?>">编辑</a>
                </span>
                <?php endif;?>
            </aside>
            </header>
            <div class="res-articlecontent">
                <?php echo $detailRow['blogcontent']?>
                <div class="res-declare">
                    <?php if ($detailRow['slink']!=""):?>
                    原文：
                    <a target="_blank" href="<?php urldecode($detailRow['slink'])?>" title="<?php echo $detailRow['blogtitle']?>">
                        <?php echo urldecode($detailRow['slink'])?>
                    </a>
                    <?php elseif ($detailRow['source']==""):?>
                        来源：网络
                    <?php else:?>
                        来源：
                        <a href="<?php echo BL_URL?>" title="枫叶分享网">枫叶分享</a>
                        <span id="forbid">未经许可，不得转载、链接、转帖或以其他方式复制发表</span>
                    <?php endif;?>
                </div>
            </div>
            <footer>
                <!--百度分享-->
                <?php include ROOT_PATH."/includes/detailsbdshare.php"?>
            </footer>

        </article>
    </div>
</div>
<?php
    include ROOT_PATH."/footer.php";
?>
</body>
<?php include ROOT_PATH."/includes/fonts.php";?>
</html>
