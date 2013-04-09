$(function(){
    
$('.fontSize big').click(function(){
    $(this).addClass('curr');
    $('.fontSize small').removeClass('curr');
    $('.cms').addClass('big');
    return false;
});

$('.fontSize small').click(function(){
    $(this).addClass('curr');
    $('.fontSize big').removeClass('curr');
    $('.cms').removeClass('big');
    return false;
});
    
});
