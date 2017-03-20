<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/10
 * Time: 13:31
 */
  define("BL_SXTH","blogshangxintonghua");
  header("content-type:text/html;charset=utf-8");


  if(isset($_GET['category']))
  {
      if(!empty($_GET['category']))
      {
          $catName = array('久艾推荐','前端开发','HTML-CSS','JavaScript','JQuery','后台开发','PHP','Ruby','Python',
              '数据库','MySQL','NoSQL','移动开发','Android','IOS','编程语言','C-Cpp','Java','业界分享','开发平台','Linux-Vim','Git',);

          $catId = array('1314','910','9101','9102','9103','520','5201','5202','5203',
              '920','9201','9202','1128','11281','11282','401','4011','4012','708','1025','10251','10252');

          $getTagName=$_GET['category'];
          if(in_array($getTagName,$catName))
          {
              define("CATAGORY","cat");
              include "../includes/constant.inc.php";
              include ROOT_PATH."/includes/header.inc.php";
              include ROOT_PATH."/includes/BLDB.class.php";
              global $jadb;
              $jadb=new BLDB(BL_DB_HOST,BL_DB_USER,BL_DB_PWD,BL_DB_NAME);
              if(!$jadb->isConnect())
              {
                  echo $jadb->getErrorInfo();
              }

              include ROOT_PATH."/includes/func.php";
              $gatCatId=$catId[array_search($getTagName,$catName)];
              if(in_array($gatCatId,$catId))
              {
                  $catSql="select blogcontent,blogtitle,articleuniqid,articleimg,source,articleview from artitles WHERE blogcategory like '%$gatCatId%' limit ".CATEGORYNUMBER;
                  $catResults=$jadb->getQuery($catSql);
              }
              else
              {
                  header("location:../404.php");
              }

          }
          else
          {
              header("location:../404.php");
          }

      }
      else
      {
          header("location:../404.php");
      }
  }
  else
  {
      header("location:../404.php");
  }
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>
        <?php echo $getTagName?>-枫叶分享-优质互联网分享
    </title>
</head>
<body>
<?php
 include ROOT_PATH."/header.php";
 include ROOT_PATH."/nav.php";
?>
    <div class="cat">
    <div class="catcontent">
        <header class="catheader">
            <span><img src="<?php echo BL_URL.'/images/category.png'?>"></span>
            <span>分类：<?php echo $getTagName?></span>
        </header>

        <div class="catarticles">
            <?php if($catResults):?>
                <?php
                    while ($catRow=$jadb->getRowsAssoc($catResults)):
                ?>
                        <div class="articlelist">
                            <header class="articletitle">
                                <a href="<?php echo BL_URL.'/articles/details.php?artuni='.stripslashes($catRow['articleuniqid'])?>" title="<?php echo $catRow['blogtitle']?>" target="_blank">
                                    <?php echo stripslashes($catRow['blogtitle'])?>
                                </a>
                            </header>
                            <div class="articleimg">
                                <a href="<?php echo BL_URL.'/articles/details.php?artuni='.stripslashes($catRow['articleuniqid'])?>" title="<?php echo $catRow['blogtitle']?>" target="_blank">
                                 <img src="<?php echo urldecode(stripslashes($catRow['articleimg']))?>" title="<?php echo stripslashes($catRow['blogtitle'])?>">
                                </a>
                            </div>
                            <div class="articledata">
                                <div class="articlemeta">
                                    <img src="<?php echo BL_URL.'/images/author.png'?>"><?php echo stripslashes($catRow['source'])?>
                                    <img src="<?php echo BL_URL.'/images/time.png'?>"><?php echo date("Y-m-d H:i:s",$detailRow['articleuniqid'])?>
                                    <img src="<?php echo BL_URL.'/images/see.png'?>"><?php echo stripslashes($catRow['articleview'])?>
                                </div>
                                <div class="articlesumary">
                                    <?php echo ($catRow['blogcontent'])?><!--去掉html标签-->
                                </div>
                                <div class="articleread">
                                    <a href="<?php echo BL_URL.'/articles/details.php?artuni='.stripslashes($catRow['articleuniqid'])?>" title="<?php echo $catRow['blogtitle']?>" target="_blank">阅读全文</a>
                                </div>
                            </div>


                        </div>



                <?php
                    endwhile;
                ?>

                <div class="pages">
                    <?php
                      $pageRes=$jadb->getQuery(explode('limit',$catSql)[0]);
                       include ROOT_PATH."/includes/PAGE.class.php";
                       $curPath=BL_URL."/category";


                       session_start();
                       $_SESSION['totalData']=$jadb->affectedRows($pageRes);
                       $page=new PAGE(CATEGORYNUMBER,$_GET['category'],$curPath);
                       $page->setTotalData($_SESSION['totalData']);

                    ?>
                    <ul class="pageul">
                        <li id="showpagedata">
                            <?php echo $_SESSION['totalData'];?>条数据 共<?php echo $page->getTotalPage();?>页
                        </li>
                        <?php
                         $page->getPages()
                        ?>
                    </ul>
                </div>
                <?php
                 else:
                     echo "没有找到相关内容";
                     //随机抽取文章
                     endif;
                ?>
        </div>

    </div>
            <div class="catside">
                <?php
                  include ROOT_PATH."/includes/catside.php";
                ?>
            </div>

    </div>
    <?php
      include ROOT_PATH.'/footer.php';
    ?>
</body>

</html>

