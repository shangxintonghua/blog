<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 12:22
 */
    if(!defined("BL_SXTH"))
    {
        header("location:../index");
    }

    //用来存放功能函数

   //获取最新发布的文章
    function getNewArticles($newSql)
    {
        global $jadb;//声明全局变量
        $articleNewResults=$jadb->getQuery($newSql);
        if($jadb->affectedRows($articleNewResults))
        {
            while ($articleNewRow=$jadb->getRowsAssoc($articleNewResults))
            {
              echo '<li>';
              echo '<a class="atext" target="_blank" href="'.'/articles/details.php?artuni='.stripslashes($articleNewRow['articleuniqid']).'">';
              echo stripslashes($articleNewRow['blogtitle']);
              echo '</a>';
              echo '</li>';
            }
            $jadb->fressResult($articleNewResults);

        }
        else
        {
            echo "没有数据";
        }


    }

    //验证登陆
    function checkLogin($checkArr)
    {
        global $jadb;
        $checkLoginSql="select username from user where username='".$checkArr["username"]."'and pwd='".$checkArr["pwd"]."'";

        if($jadb->getQuery($checkLoginSql)){
            return true;
        }else{
            return false;
        }
    }

    /*验证上传的图片*/
    function checkImgFile($uploadImg)
    {
        $allowType=array('gif','png','jpeg','jpg');/*允许类型*/
        $size=2000000;/*大小*/
        $path="../images/uploads";
        $errorInfo="";
        /*创建根目录*/
        if(!file_exists($path)){
            mkdir($path);
        }
        //当前年月
        $curYearMonth=date("Ym");
        $newpath=$path.'/'.$curYearMonth;
        //新目录
        if(!file_exists($newpath)){
            mkdir($newpath);
        }
        if($uploadImg['error']>0){
            $errorInfo="图片上传失败";
            header("location:./post-new.php?info=$errorInfo");
        }
        /*判断类型*/
        $typeArr=explode(".",$uploadImg['name']);
        $hz=array_pop($typeArr);
        if(!in_array($hz,$allowType)){
            $errorInfo="图片类型不允许";
            header("location:./post-new.php?info=$errorInfo");
        }
        if($uploadImg['size']>$size){
            $errorInfo="图片大小超出允许范围";
            header("location:./post-new.php?info=$errorInfo");

        }

        /*重定义文件名*/
        $filename=md5(date("YmdHis").rand(100,999)).".".$hz;

        if(is_uploaded_file($uploadImg['tmp_name']))
        {
            if(!move_uploaded_file($uploadImg['tmp_name'],$newpath.'/'.$filename))
            {
                $errorInfo="图片移动失败";
                header("location:./post-new.php?info=$errorInfo");
            }
        }
        else{
            $errorInfo="图片来源方式不合法";
            header("location:./post-new.php?info=$errorInfo");
        }

        return $newpath.'/'.$filename;



    }

    //更新文章阅读次数
    function updateShowViews($artuni,$oldviews){
        global $jadb;
        $newViews=$oldviews+1;
        $updateSql="update artitles set articleview=$newViews WHERE articleuniqid=$artuni";
        $jadb->getQuery($updateSql);
        return $newViews;
    }

    //获取相关文章
    function getRelatedArticles($category,$artuni)
    {
        global $jadb;
        $catArr = explode("&", $category);
        switch (count($catArr)) {
            case 1:
                $category = substr($catArr[0], 0, -1);//substr长度为负数时，后面点回来就是终点位置
                $relateSql = "select * from artitles where blogcategory like '%$category%'";
                break;
            case 2:
                $category1 = substr($catArr[0], 0, -1);//substr长度为负数时，后面点回来就是终点位置
                $category2 = substr($catArr[1], 0, -1);//substr长度为负数时，后面点回来就是终点位置
                $relateSql = "select * from artitles where blogcategory like '%$category1%' OR blogcategory like '%$category2%'";
                break;
            case 3:
                $category1 = substr($catArr[0], 0, -1);//substr长度为负数时，后面点回来就是终点位置
                $category2 = substr($catArr[1], 0, -1);//substr长度为负数时，后面点回来就是终点位置
                $category3 = substr($catArr[2], 0, -1);//substr长度为负数时，后面点回来就是终点位置
                $relateSql = "select * from artitles where blogcategory like '%$category1%' OR blogcategory like '%$category2%' OR blogcategory like '%$category3%'";
                break;

        }
        $relateResults=$jadb->getQuery($relateSql);

        //对结果随机排序
        if($jadb->affectedRows($relateResults))
        {
            $len=$jadb->affectedRows($relateResults);//行数
            $count=0;//计数
            $arr=array();//保存已经输出的artuni
            if ($len>=7)
            {
                for (;$count<6;)
                {
                    //移动指针
                    $relateResults->data_seek(mt_rand(0,$len));
                    $relateRow=$relateResults->fetch_assoc();
                    if($relateRow['articleuniqid']!=intval($artuni))
                    {
                        if(!in_array($relateRow['articleuniqid'],$arr))
                        {

                            echo '<a target="_blank" title="'.stripslashes($relateRow['blogtitle']).'" href="'.BL_URL.'/articles/details.php?artuni='.stripslashes($relateRow['articleuniqid']).'">';
                            echo '<li>';
                            echo '<img title="'.stripslashes($relateRow['blogtitle']).'" src="'.urldecode(stripslashes($relateRow['articleimg'])).'">';
                            echo '<span>';
                            echo stripslashes($relateRow['blogtitle']);
                            echo '<span>';
                            echo '</li>';
                            echo '</a>';
                            $count++;
                            array_push($arr,$relateRow['articleuniqid']);
                        }
                    }
                }

            }
            else
            {
                for (;$count<$len-1;)
                {
                    //移动指针
                    $relateResults->data_seek(mt_rand(0,$len-1));
                    $relateRow=$relateResults->fetch_assoc();
                    if($relateRow['articleuniqid']!=intval($artuni))
                    {
                        if(!in_array($relateRow['articleuniqid'],$arr))
                        {

                            echo '<a target="_blank" title="'.stripslashes($relateRow['blogtitle']).'" href="'.BL_URL.'/articles/details.php?artuni='.stripslashes($relateRow['articleuniqid']).'">';
                            echo '<li>';
                            echo '<img title="'.stripslashes($relateRow['blogtitle']).'" src="'.urldecode(stripslashes($relateRow['articleimg'])).'">';
                            echo '<span>';
                            echo stripslashes($relateRow['blogtitle']);
                            echo '<span>';
                            echo '</li>';
                            echo '</a>';
                            $count++;
                            array_push($arr,$relateRow['articleuniqid']);
                        }
                    }
                }
            }
            $jadb->fressResult($relateResults);


        }
        else{
            echo "没有相关文章";
        }
    }

    //首页各类型文章函数
    function getArticles($sql)
    {
        global $jadb;
        $count=-1;

        $articleSortResults=$jadb->getQuery($sql);
        if($jadb->affectedRows($articleSortResults))
        {
            while ($articleRow=$jadb->getRowsAssoc($articleSortResults))
            {
                if($count==-1)
                {

                    echo '<li id="first-article">';
                    echo '<a class="aimg" target="_blank" href="'.'/articles/details.php?artuni='.stripslashes().$articleRow['articleuniqid'].'">';
                    echo '<img title="'.stripslashes($articleRow['blogtitle']).'" src="'.urldecode(stripslashes($articleRow['articleimg'])).'" />';
                    echo '</a>';
                    echo '<a class="atext" title="'.stripslashes($articleRow['blogtitle']).'" target="_blank" href="'.'/articles/details.php?artuni='.stripslashes($articleRow['articleuniqid']).'">';
                    echo stripslashes($articleRow['blogtitle']);
                    echo '</a>';
                    echo '</li>';
                    $count++;

                }
                else
                {
                    echo '<li>';
                    echo '<span>'.++$count.'</span>';
                    echo '<a title="'.stripslashes($articleRow['blogtitle']).'" target="_blank" href="'.'/articles/details.php?artuni='.stripslashes($articleRow['articleuniqid']).'">';
                    echo stripslashes($articleRow['blogtitle']);
                    echo '</a>';
                    echo '</li>';

                }

            }
            $jadb->fressResult($articleSortResults);
        }
        else
        {
            echo "没有数据";
        }
    }

    //获取热门标签
    function getHotTags()
    {
        global $jadb;
        $tagsSortSql="SELECT count(blogtags) as blogtagsnum ,blogtitle,articleuniqid,articleimg,blogtags from artitles GROUP BY blogtags ORDER BY blogtagsnum DESC";
        $tagSortResults=$jadb->getQuery($tagsSortSql);
        if ($jadb->affectedRows($tagSortResults))
        {
            while ($tagSortRow=$jadb->getRowsAssoc($tagSortResults))
            {
                if(!empty($tagSortRow['blogtags']))
                {
                    echo '<a href="'.BL_URL.'/tags/showtag.php?tagname='.stripslashes($tagSortRow['blogtags']).'" title="'.stripslashes($tagSortRow['blogtags']).'">';
                    echo '<li style="background-color: '.randColor().'">';
                    echo stripslashes($tagSortRow['blogtags']).'('.stripslashes($tagSortRow['blogtagsnum']).')';
                    echo '</li>';
                    echo '</a>';
                }

            }
            $jadb->fressResult($tagSortResults);
        }
        else
        {
            echo "没有数据";
        }
    }

    //随机函数生成器
    function randColor()
    {
        $str='#';
        for($i=0;$i<6;$i++)
        {
            $randNum=rand(0,15);
            switch ($randNum)
            {
                case 10:
                    $randNum='A';
                    break;
                case 11:
                    $randNum='B';
                    break;
                case 12:
                    $randNum='C';
                    break;
                case 13:
                    $randNum='D';
                    break;
                case 14:
                    $randNum='E';
                    break;
                case 15:
                    $randNum='F';
                    break;

            }
            $str.=$randNum;
        }
        return $str;
    }

    //获取随机文章函数
    function getRandArticles()
    {
        global $jadb;
        $idArr=array();
        $idSql='select id from artitles';
        $idSqlResults=$jadb->getQuery($idSql);
        if($jadb->affectedRows($idSqlResults))
        {
            while ($idRow=$jadb->getRowsAssoc($idSqlResults))
            {
                array_push($idArr,$idRow['id']);
            }
            shuffle($idArr);//随机排序函数
            $randIdArrLen=count($idArr);
            if($randIdArrLen>5)
            {
                $randIdArr=array_slice($idArr,0,5);
                for ($i=0;$i<5;$i++)
                {
                 $randSql="select blogtitle,articleuniqid from artitles WHERE id=$randIdArr[$i]";
                 $randRow=$jadb->getRow($randSql);
                 echo '<li>';
                 echo '<a class="atext" target="_blank" href="'.'/articles/details.php?artuni='.stripslashes($randRow['articleuniqid']).'" title="'.stripslashes($randRow['blogtitle']).'">';
                 echo stripslashes($randRow['blogtitle']);
                 echo '</a>';
                 echo '</li>';
                }
            }
            else
            {
                for ($i=0;$i<$randIdArrLen;$i++)
                {
                    $randSql="select blogtitle,articleuniqid from artitles WHERE id=$idArr[$i]";
                    $randRow=$jadb->getRow($randSql);
                    echo '<li>';
                    echo '<a class="atext" target="_blank" href="'.'/articles/details.php?artuni='.stripslashes($randRow['articleuniqid']).'" title="'.stripslashes($randRow['blogtitle']).'">';
                    echo stripslashes($randRow['blogtitle']);
                    echo '</a>';
                    echo '</li>';
                }
            }


        }
        else
        {
            echo '没有数据';
        }
    }





?>