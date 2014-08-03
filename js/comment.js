$(function(){
    $.Blog={
       commentAdd:function(content_id){
           var name_surname=$("input[name=name_surname]").val();
           name_surname= $.trim(name_surname);
           var mail=$("input[name=mail]").val();
           mail= $.trim(mail);
           var comment=$("textarea").val();
           comment= $.trim(comment);
           if(!comment){
               alert("Yorum Alanı Boş Bırakılamaz");
           }else{
               $.ajax({
                   type:"post",
                   url:"http://localhost/Blog/content/ajax.php",
                   data:{"content_id":content_id,"name_surname":name_surname,"mail":mail,"comment":comment,"type":"comment_add"},
                   dataType:"json",
                   success:function(response){
                       if(response.comment_error){
                           alert(response.comment_error);
                       }else{
                           $("input[name=name_surname]").val("");
                           $("input[name=mail]").val("");
                           $("textarea").val("");
                           alert(response.success);
                       }
                   }
               });
           }
       }
    }
});