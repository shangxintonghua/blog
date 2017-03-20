/**
 * Created by Administrator on 2017/3/14.
 */
$(document).ready(function () {
    $(".headerul>li:last-child").hover(function () {
        $(this).css("backgroundColor", "#333");
        $("#edit").css("color", "#0074A2");
        $("#editprofile").slideDown(300);

    }, function () {
        $(this).css("backgroundColor", "#222");
        $("#edit").css("color", "#fff");
        $("#editprofile").slideUp(300);
    });
    /*ue编辑器初始化*/
    var ue = UE.getEditor("blogcontent", {
        autoHeightEnabled: false,
        initialFrameHeight: 500,
        toolbars: [["undo", "redo", "indent", "fontfamily", "fontsize", "bold", "italic", "underline", "strikethrougn", "forecolor", "backcolor", "justifyleft", "justifytight", "justifycenter", "justifyjustify", "insertorderedlist", "insertunorderedlist", "link", "unlink", "simpleupload", "insertimage", "blockquote", "inserttable", "insertcode", "source", "preview", "cleardoc", "spechars", "help", "fullscreen"]]
    });

    $("#blogtitle,#blogtags,#source,#slink").bind("focus mouseover", function () {
        $(this).css("borderColor", "#1AA3FF")

    });
    $("#blogtitle,#blogtags,#source,#slink").bind("blur mouseout", function () {
        $(this).css("borderColor", "#e1e1e1")
    });

    $("#postForm").submit(function () {
        if($("#blogtitle").val()==""){
            layer.tips("文章标题不能为空","#blogtitle",{
                guide:1,
                time:3
            });
            $("#blogtitle").focus();
            return false

        }
        if($("#blogtitle").val().length>255){
            layer.tips("文章标题过长","#blogtitle",{
                guide:1,
                time:3
            });
            $("#blogtitle").focus();
            return false
        }
        if($("#source").val()!=""){
            if($("#source").val().length>15){
                layer.tips("博文来源太长","#source",{
                    guide:1,
                    time:3
                });
                $("#source").focus();
                return false;

            }
        }
        if($("#slink").val()!=""){
            if($("#slink").val().length>255){
                layer.tips("博文链接不能过长","#slink",{
                    guide:1,
                    time:3
                });
                $("#slink").focus();
                return false
            }
        }
        if($("input[type=checkbox]:checked").size()>3){
            layer.tips("文章类别不要超过3个","#blogtcat",{
                guide:1,
                time:3
            });
            $("input[type=checkbox]").eq(0).focus();
            return false;
        }
        if($("#blogtags").val().length>15){
            layer.tips("博文标签太长","#blogtags",{
                guide:1,
                time:3
            });
            $("#blogtags").focus();
            return false
        }
        if(ue.getContent()==""){
            layer.tips("博文内容不能为空","#blogcontent",{
                guide:1,
                time:3
            });
            $("#blogcontent").focus();
            return false

        }
        var loadinglayer=layer.load("正在保存");
        return true
    });

    $("#return").click(function () {
        location.href=document.referrer;
    });

})