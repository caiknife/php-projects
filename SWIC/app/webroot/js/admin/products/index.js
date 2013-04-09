$(function(){
    
$('a.delete').click(function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                $this.parents('tr').remove();
            }
        }, 'text');
    }
    return false;
});

$('a.btnGo').click(function(){
    $(this).parents('form').submit();
    return false;
});
    
});