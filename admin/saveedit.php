<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/15
 * Time: 14:27
 */
    /*设置编码*/
    header("content-type:text/html;charset=utf-8");
    define("BL_SXTH","blog_shangxintonghua");
    include "../includes/constant.inc.php";
    include ROOT_PATH."./includes/BLDB.class.php";

    global  $jadb;//全局变量
    $jadb =new BLDB(BL_DB_HOST,BL_DB_USER,BL_DB_PWD,BL_DB_NAME);
    if($jadb->isConnect()){
        echo $jadb->getErrorInfo();
    }
    include ROOT_PATH."/includes/func.php";
    $dataArr=array();
    if(isset($_GET["act"])&&isset($_GET["do"])){
        if (!empty($_GET["act"])&&!empty($_GET["do"])){
            $dataArr["blogtitle"]=addslashes($_POST["blogtitle"]);
            $dataArr["source"]=addslashes($_POST["source"]);/*在“”前加反斜杠*/
            $dataArr["slink"]=urlencode(addslashes($_POST["slink"]));
            $dataArr["blogcategory"]=$_POST["blogcategory"];
            $dataArr["blogtags"]=addslashes(strtolower($_POST["blogtags"]));
            $dataArr["blogcontent"]=addslashes($_POST["blogcontent"]);
            $dataArr["blogimg"]=$_FILES["blogimg"];
            $dataArr["imagsize"]=$_POST["MAX_FILE_SIZE"];

            $uni=time();/*时间戳*/
            $dataArr["articleuniqid"]=addslashes($uni);
            $dataArr["articlelink"]=urlencode(addslashes(BL_URL."/articles/details.php?artuni=$uni"));//编码url
            $length=count($dataArr["blogcategory"]);
            for($i=0;$i<$length;$i++){
                $dataArr["blogcategory"][$i]=addslashes($dataArr["blogcategory"][$i]);
            }
            $dataArr["blogcategory"]=implode("&",$dataArr["blogcategory"]);/*数组变成字符串，用，隔开各个数组元素*/
            $imgURL="";


            if(!empty($dataArr["blogimg"]["name"])){
                $imgURL=substr(checkImgFile($dataArr['blogimg']),2);
            }else{
                $imgURL="../images/blog/c9f0f895fb98ab9159f51fd0297e236d.jpg";

            }
            $dataArr['articleimg']=urlencode(addslashes($imgURL));

            $jadb->closeAuto();
            $jadb->beginTransation();

            $updateArticleSql="insert into artitles(blogtitle,source,slink,blogcategory,blogtags,blogcontent,
             imagsize,articleuniqid,articlelink,articleimg) VALUE ('{$dataArr['blogtitle']}','{$dataArr['source']}'
             ,'{$dataArr['slink']}','{$dataArr['blogcategory']}','{$dataArr['blogtags']}','{$dataArr['blogcontent']}'
             ,'{$dataArr['imagsize']}','{$dataArr['articleuniqid']}','{$dataArr['articlelink']}','{$dataArr['articleimg']}')";

            $insertId=$jadb->saveQueryOperation($updateArticleSql);
            $articleAffectedRows=$jadb->operationAffectedRows();
            if(!$articleAffectedRows&&!$insertId){
                $jadb->rooBackTransaction();
            }
            //更新category表
            $catArr=explode("&",$dataArr['blogcategory']);
            $catArrlen=count($catArr);
            $oldcatArr=explode(",",$_COOKIE['cat']);
            $catArrLen2=count($oldcatArr);
            /*存放更新后的cat*/
            $newCatArr=array();
            $rows=array();
            if(array_diff($catArr,$oldcatArr)){
                //array_diff比较两个数字键值，返回差值
                $newCatArr=array_values(array_diff($catArr,$oldcatArr));
                $oldArr=array_values(array_diff($oldcatArr,$catArr));

                $catArrlen=count($newCatArr);
                $oldLen=count($oldArr);
                print_r($newCatArr);
                echo "<br/>";
                print_r($oldArr);

                switch ($catArrlen){
                    case 1:
                        $sql="insert into category(blogcategory) VALUE ('{$newCatArr[0]}')";
                        $jadb->saveQueryOperation($sql);
                        $catAffectedRows=$jadb->operationAffectedRows();
                        array_push($rows,$catAffectedRows);
                        break;
                    case 2:
                        $sql="insert into category(blogcategory) VALUE ('{$newCatArr[0]}')";
                        $jadb->saveQueryOperation($sql);
                        $catAffectedRows=$jadb->operationAffectedRows();
                        array_push($rows,$catAffectedRows);

                        $sql="insert into category(blogcategory) VALUE ('{$newCatArr[1]}')";
                        $jadb->saveQueryOperation($sql);
                        $catAffectedRows=$jadb->operationAffectedRows();
                        array_push($rows,$catAffectedRows);
                        break;
                    case 3:
                        $sql="insert into category(blogcategory) VALUE ('{$newCatArr[0]}')";
                        $jadb->saveQueryOperation($sql);
                        $catAffectedRows=$jadb->operationAffectedRows();
                        array_push($rows,$catAffectedRows);

                        $sql="insert into category(blogcategory) VALUE ('{$newCatArr[1]}')";
                        $jadb->saveQueryOperation($sql);
                        $catAffectedRows=$jadb->operationAffectedRows();
                        array_push($rows,$catAffectedRows);

                        $sql="insert into category(blogcategory) VALUE ('{$newCatArr[2]}')";
                        $jadb->saveQueryOperation($sql);
                        $catAffectedRows=$jadb->operationAffectedRows();
                        array_push($rows,$catAffectedRows);
                        break;
                }

                if(!$rows){
                    $jadb->rooBackTransaction();
                }

                if($articleAffectedRows>0){
                    $jadb->commitTransaction();
                    header("location:./editpost.php?artuni=$uni&ud=ok");
                }else{
                    $jadb->rooBackTransaction();
                    $jadb->closeDB();
                    echo "<script>alert('保存失败'),history.back()</script>";
                }




            }



        }
        else{
            header("location:../index");
        }
    }else{
        header("location:../index");
    }
?>