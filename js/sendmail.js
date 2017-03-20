/**
 * Created by Administrator on 2017/3/20.
 */
$(document).ready(function () {
  $('#mailform').submit(function () {
      if($('#title').val()==""){
          layer.tips("文章标题不能为空","#title",{
              guide:1,
              time:0
          })
          $('#title').focus();
          return false;
      };
      if($('#link').val()==""){
          layer.tips("链接地址不能为空","#link",{
              guide:1,
              time:0
          })
          $('#link').focus();
          return false;
      };
      if($('#author').val()==""){
          layer.tips("作者不能为空","#author",{
              guide:1,
              time:0
          })
          $('#author').focus();
          return false;
      };
      if($('#contact').val()==""){
          layer.tips("联系方式不能为空","#contact",{
              guide:1,
              time:0
          })
          $('#contact').focus();
          return false;
      };

  })
})
