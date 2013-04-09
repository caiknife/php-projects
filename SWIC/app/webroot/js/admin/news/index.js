$(function(){
    
$('a.btnGo').click(function(){
    $(this).parents('form').submit();
    return false;
});

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

$('a.feature, a.unfeature').live('click', function(){
    var $this = $(this);
    $.get($this.attr('href'), function(html){
        $this.replaceWith(html);
    }, 'html')
    return false;
});
    
});