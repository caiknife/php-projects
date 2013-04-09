$(function(){

var currentIndex = 0;

$('.hotNewsText li').each(function(i){    
    $(this).hover(function(){
        if ($(this).hasClass('curr')) {
            return;
        }
        $(this).addClass('curr').siblings('li').removeClass('curr');
        
        $('.hotNewsImg li:eq('+i+')').prevAll().stop(true,true).animate({marginTop:'-360px'});
        $('.hotNewsImg li:eq('+i+')').stop(true,true).animate({marginTop:'0px'});
        $('.hotNewsImg li:eq('+i+')').nextAll().stop(true,true).animate({marginTop:'0px'});
    }, function(){
        
    });
});
    
});