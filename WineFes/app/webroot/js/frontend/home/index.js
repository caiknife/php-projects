$(function(){
    
$(window).scroll(function(){
    var top = $(document).scrollTop();
    var div = $('div[name=overview]');
    if (top > 300 && div.hasClass('sub-up')) {
        div.removeClass('sub-up').addClass('sub-down');
    }
    if (top < 300 && div.hasClass('sub-down')) {
        div.removeClass('sub-down').addClass('sub-up');
    }
});    
    
});
