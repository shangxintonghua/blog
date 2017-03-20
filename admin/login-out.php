<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/15
 * Time: 10:36
 */
  session_start();
  if(!empty($_GET['action'])&&$_GET['action']==="logout")
  {
      if($_GET['uniqid']===$_SESSION['uniqid'])
      {
          unset($_SESSION['fengyeuser']);
          session_destroy();
          header("location:../index.php");
      }
  }

?>