$(function(){
    
$('.weibo .switch a').click(function(){
    var klass = $(this).attr('class');
    $(this).find('span').addClass('curr').end().siblings('a').find('span').removeClass('curr');
    $('.weiboWrap iframe#'+klass).siblings('iframe').hide().end().css({display: 'block'});
    return false;
});

var count = $('.newPhoto li').length;
var index = 0;
$('a.leftBtn').click(function(){
    if (index==0) {
        index = count -1;
    } else {
        index -= 1;
    }
    $('.newPhoto li:eq('+index+')').show().siblings('li').hide();
    return false;
});    

$('a.rightBtn').click(function(){
    if (index==count-1) {
        index = 0;
    } else {
        index += 1;
    }
    $('.newPhoto li:eq('+index+')').show().siblings('li').hide();
    return false;
}); 
    
});
