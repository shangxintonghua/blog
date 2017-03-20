
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 10:28
 * Description:常量定义
 */
    if(!defined("BL_SXTH"))
    {
        echo "test1";
        header("location:../index");
    }
    error_reporting(E_ALL^E_WARNING^E_NOTICE);//关闭通知和警告
    /*转换硬路径，引入文件速度比require块*/
    define('ROOT_PATH',substr(dirname(__FILE__),0,-9));


    //数据库常量
    define("BL_DB_HOST",'127.0.0.1');
    define("BL_DB_USER",'guosheng');
    define("BL_DB_PWD",'sheng199021guo');
    define("BL_DB_NAME",'blog');


    //样式有关的常量
    define("ALL",'global');


    //URL
    define("BL_URL","http://localhost");

    //首页模板显示条数
    define("NUMBER",11);
    define("CATEGORYNUMBER",15);


?>