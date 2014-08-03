/**
 * Created by HEVALL on 26.07.2014.
 */
$(function(){
    $(".navbar input").focus(function(){
        if($(this).val()=="Search"){
            $(this).val(" ");
        }
        $(this).animate({"width":"200px"});
    }).focusout(function(){
        $(".navbar input").val("Search");
        $(this).animate({"width":"100px"});
    });
});