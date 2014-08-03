/**
 * Created by HEVALL on 26.07.2014.
 */
// JavaScript Document
$(function(){
    var i=0;
    var sure=4000;//Slider değişme süresi
    var toplamLi=$(".slider ul li").length;
    var liWidth=600;
    var toplamWidth=liWidth*toplamLi;
    $(".slider ul").css("width",toplamWidth+"px");
    var liDeger=0;
    //Otomatik Değişme
    $.Slider=function(){
        i++;
        if(liDeger<toplamLi-1){
            liDeger++;
            var yeniWidth=liWidth*liDeger;
            $(".slider ul").animate({marginLeft: "-"+yeniWidth+"px"},1500);
        }else{
            liDeger=0;
            $(".slider ul").animate({marginLeft: "0px"},1500);
        }
    }

    var don=setInterval("$.Slider()",sure);

    $("#sliderall").hover(function(){
            clearInterval(don);
    },
    function(){
            don=setInterval("$.Slider()",sure);
    });
});
