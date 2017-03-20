/**
 * Created by Administrator on 2017/3/18.
 */
$(document).ready(function () {
    $('.articlesumary').each(function () {
        var maxlength=120;
        if($(this).text().length>maxlength){
            $(this).text($(this).text().substring(0,maxlength));
            $(this).text($(this).text()+"......");
        }
    });







})
