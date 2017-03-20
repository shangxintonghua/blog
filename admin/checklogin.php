<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/14
 * Time: 20:13
 */
  //开启session
  session_start();
  define("BL_SXTH","blog_shangxintonghua");
  include "../includes/constant.inc.php";
  include ROOT_PATH."/includes/BLDB.class.php";
  global $jadb;
  $dataArr=array();//收集数据变量
  $jadb=new BLDB(BL_DB_HOST,BL_DB_USER,BL_DB_PWD,BL_DB_NAME);
  if(!$jadb->isConnect()){
      echo $jadb->getErrorInfo();
  }

  echo $_POST["uniqid"];


  if(isset($_GET['action'])&&isset($_GET['jar']))
  {
      if(!empty($_GET['action'])&&!empty($_GET['jar'])&&$_GET['action']==="login"
      &&$_GET["jar"]==sha1(BL_SXTH))
      {
          $dataArr['uniqid']=addslashes($_POST['uniqid']);
          $dataArr['username']=addslashes($_POST['user']);
          $dataArr['pwd']=md5(addslashes($_POST['pwd']));/*md5加密*/
          if($dataArr['uniqid']===$_SESSION['uniqid']){
              if(!$jadb->isConnect()){
                  echo $jadb->getErrorInfo();
              }

              include ROOT_PATH."/includes/func.php";
              //判断是否正确登陆

              if (checkLogin($dataArr)){
                      define("MANAGE","manage");
                      $_SESSION["fengyeuser"]=$dataArr['username'];
                      header("location:./manage.php");
              }else{
                      header("location:../index");
              }
          }else{
              header("location:../index");
          }


      }else{
          header("location:../index");
      }
  }else{
      header("location:../inces");
  }
?>