$(function(){
    
// page
$('a.btnGo').click(function(){
    $(this).parents('form').submit();
    return false;
});    
    
});
