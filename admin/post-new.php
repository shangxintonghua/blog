<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/15
 * Time: 10:39
 */
    define("BL_SXTH","blog_shangxintonghua");
    session_start()/*开启seession*/

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>发表新文章-枫叶分享</title>
    <?php
        define("MANAGE","manage");
        include "../includes/constant.inc.php";
        include ROOT_PATH."/includes/header.inc.php";
    ?>
    <script type="text/javascript" src="../js/layer/layer.min.js"></script>
</head>
<body>
<div class="manage">
    <?php include "./manageheader.php"; ?>
    <div class="main">
        <?php
        include "./manageside.php";
        ?>
        <div class="maincontent">
            <div class="postnew">
                <form action="./saveedit.php?act=postok&do=save" method="post" id="postForm" enctype="multipart/form-data">
                    <div class="titlediv">
                        <label for="blogtitle">博文标题(不超过255个字符)</label>
                        <input type="text" placeholder="文章标题" id="blogtitle" name="blogtitle" value="<?php echo $editRow['article_title'] ?>">
                    </div>
                    <p id="empty">
                        <?php
                        if(isset($_GET['artuni']) && isset($_GET['ud']))
                        {
                            if(!empty($_GET['artuni']))
                            {
                                ?>
                                <a href="../articles/details.php?artuni=<?php echo $_GET['artuni'] ?>">查看文章</a>
                                <a href="./post-new.php">再写一篇</a>
                                <script type="text/javascript">
                                    $.layer(
                                        {
                                            type:0,
                                            title:"提示",
                                            dialog:{type:1,msg:"保存成功"}
                                        }
                                    );
                                    layer.close(loadinglayer);


                                </script>
                                <?php
                            }
                        }
                        ?>
                    </p>
                    <div class="sourcediv">
                        <label for="source">博文来源(不超过15个字符)：</label>
                        <input type="text" placeholder="博文来源" id="source" name="source" value="<?php echo $editRow['article_source'] ?>">
                    </div>
                    <div class="slinkdiv">
                        <label for="slink">原文链接(不超过255个字符)：</label>
                        <input type="url" placeholder="原文链接" id="slink" name="slink" value="<?php echo $editRow['article_source_link'] ?>">
                    </div>
                    <div class="catdiv">
                        <label for="blogtcat">选择类别（不超过三个）：</label>
                        <div id="blogtcat">
                            <label><input type="checkbox" value="910" name="blogcategory[]">前端开发</label>
                            <label><input type="checkbox" value="9101" name="blogcategory[]">HTML/CSS</label>
                            <label><input type="checkbox" value="9102" name="blogcategory[]">JavaScript</label>
                            <label><input type="checkbox" value="9103" name="blogcategory[]">JQuery</label>
                            <label><input type="checkbox" value="520" name="blogcategory[]">后台开发</label>
                            <label><input type="checkbox" value="5201" name="blogcategory[]">PHP</label>
                            <label><input type="checkbox" value="5202" name="blogcategory[]">Ruby</label>
                            <label><input type="checkbox" value="5203" name="blogcategory[]">Python</label>
                            <label><input type="checkbox" value="920" name="blogcategory[]">数据库</label>
                            <label><input type="checkbox" value="9201" name="blogcategory[]">MySQL</label>
                            <label><input type="checkbox" value="9202" name="blogcategory[]">NoSQL</label>
                            <p></p>
                            <label><input type="checkbox" value="1128" name="blogcategory[]">移动开发</label>
                            <label><input type="checkbox" value="11281" name="blogcategory[]">Android</label>
                            <label><input type="checkbox" value="11282" name="blogcategory[]">IOS</label>
                            <label><input type="checkbox" value="401" name="blogcategory[]">编程语言</label>
                            <label><input type="checkbox" value="4011" name="blogcategory[]">C/C++</label>
                            <label><input type="checkbox" value="4012" name="blogcategory[]">Java</label>
                            <label><input type="checkbox" value="708" name="blogcategory[]">业界分享</label>
                            <label><input type="checkbox" value="1025" name="blogcategory[]">开发平台</label>
                            <label><input type="checkbox" value="10251" name="blogcategory[]">Linux/Vim</label>
                            <label><input type="checkbox" value="10252" name="blogcategory[]">Git</label>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            catValue = [];
                            var catValue=document.cookie.split(";")[0].split("=")[1].split('%2C');
                            $("#blogtcat input").each(function()
                            {
                                if($(this).val()==catValue[0] || $(this).val()==catValue[1] || $(this).val()==catValue[2])
                                {
                                    $(this).attr("checked","checked");
                                }
                            });
                        })
                    </script>
                    <div class="tagdiv">
                        <label for="blogtags">添加标签(不超过15个字符)：</label>
                        <input type="text" id="blogtags" placeholder="添加标签" name="blogtags" value="<?php echo $editRow['article_tags'] ?>">
                    </div>
                    <div class="contentdiv">
                        <script id="blogcontent" type="text/plain"  name="blogcontent">
									<?php
                            echo $editRow['article_content'];
                            ?>
						</script>

                    </div>
                    <div class="imgdiv">
                        <label for="blogimg">特色图像(不超过2M)：</label>
                        <input type="file" id="blogimg" value="上传图像" name="blogimg" >
                        <!-- 最大为2M -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                    </div>
                    <div class="btncontrol">
                        <input type="submit" value="发布" id="publish">
                        <input type="button" value="返回" id="return">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--ue编辑器-->
<script type="text/javascript" charset="utf-8" src="./ue/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./ue/ueditor.all.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项
目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="./ue/lang/zh-cn/zh-cn.js"></script>
</body>
</html>
