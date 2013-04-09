$(function(){

// page
$('a.btnGo').click(function(){
    $(this).parents('form').submit();
    return false;
});
    
// delete
$('a.delete').live('click', function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text) {
                $this.parents('tr').remove();
            }
        }, 'text');
    }
    return false;    
});    
    
});
