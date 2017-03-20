<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/14
 * Time: 9:33
 */
  if(!defined("BL_SXTH")){
      header("location:../index");
  }

?>
<div class="mainside">
    <ul class="sideul">
        <li>
            <a href="./edit-tags.php?action=tags" target="_self" title="标签">标签</a>
        </li>
        <li>
            <a href="./post-new.php" target="_self" title="写文章">写文章</a>
        </li>
        <li>
            <a href="./tags.php" target="_self" title="所有文章">所有文章</a>
        </li>
        <li>
            <a href="./edit-tags.php?action=category" target="_self" title="分类目录">分类目录</a>
        </li>
        <li>
            <a href="./addlink.php" target="_self" title="添加链接">添加友情链接</a>
        </li>
    </ul>

</div>
