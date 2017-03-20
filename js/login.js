/**
 * Created by Administrator on 2017/3/14.
 */
$(document).ready(function () {
    $("#user,#pwd").bind("focus mouseover",
    function () {
       $(this).css("borderColor","#1AA3FF");
    });
    $("#user,#pwd").bind("blur mouseout",
        function () {
            $(this).css("borderColor","#e1e1e1");
    });
    $("#loginform").submit(function () {
        if($("#user").val()===""||$("#pwd").val()===""){
            $("#loginerror").css({
                display:"block",
                color:"#FF0000"
            }).text("请填写用户名和密码");
            return false
        }
        if($("#user").val().length>10||$("#pwd").val().length>10){
            $("#loginerror").css({
                display:"block",
                color:"#ff0000"
            }).text("用户名和密码信息有误");
            return false;
        }
        var pattenr=/[\'\"<>\\ \/]/;
        if(pattenr.test($("#user").val())||pattenr.test($("#pwd").val())){
            $("#loginerror").css({
                display:"block",
                color:"#FF0000"
            }).text("用户名和密码信息有误")
            return false
        }
        $("#loginerror").css({
            display:"none"
        }).text("")
        return true;

    })

});