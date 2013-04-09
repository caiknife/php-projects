$(function(){

var index = 0;
$('a.btnLeft').click(function(){
    if ($('.hotNews li').length <= 0) {
        return false;
    }
    $('.hotNews li:eq('+index+')').hide();
    index -= 1;
    if (index < 0) {
        index = $('.hotNews li').length - 1;
    }
    $('.hotNews li:eq('+index+')').show();
    return false;
});
$('a.btnRight').click(function(){
    if ($('.hotNews li').length <= 0) {
        return false;
    }
    $('.hotNews li:eq('+index+')').hide();
    index += 1;
    if (index >= $('.hotNews li').length) {
        index = 0;
    }
    $('.hotNews li:eq('+index+')').show();
    return false;
});
    
});
