<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/14
 * Time: 9:32
 */
  if(!defined("BL_SXTH")){
      header("location:../index");
  }
?>
<header>
    <ul class="headerul">
        <li>
            <a href="../index.php" target="_self" title="访问站点">枫叶分享</a>
        </li>
        <li>
            <a href="./profile.php" target="_self" title="我的账户" id="edit">您好，<?php echo $_SESSION['fengyeuser'];?></a>
            <ul id="editprofile">
                <li>
                    <a href="./profile.php" target="_self" title="编辑个人资料">编辑个人资料</a>

                </li>
                <li>
                    <a href="./login-out.php?action=logout&uniqid=<?php echo $_SESSION['uniqid']?>" target="_self" title="退出">退出</a>
                </li>
            </ul>
        </li>
    </ul>
</header>
