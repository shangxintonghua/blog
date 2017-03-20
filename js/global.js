/**
 * Created by Administrator on 2017/3/9.
 */
$(document).ready(function () {
    $("ul.nav-ul>li").each(function () {
        $(this).hover(function () {
            $(this).find("ul").slideDown(300);
            $(this).find("a").first().css("backgroundColor","#1A90e3")

        },
        function () {
            $(this).find("ul").stop(true).slideUp(300);
            $(this).find("a").first().css("backgroundColor","#1AA3FF");

        }
        )

    });




    
})
