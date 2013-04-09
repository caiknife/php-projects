$(function(){
    
$('a.btnGo').click(function(){
    $(this).parents('form').submit();
    return false;
});

$('a.delete').click(function(){
    var $this = $(this);
    var count = $(this).attr('data');
    if (count > 0) {
        alert('关联数据存在，不能删除！');
    } else {        
        if (confirm('确认删除吗？')) {
            $.get($this.attr('href'), function(text){
                if (text > 0) {
                    $this.parents('tr').remove();
                }
            }, 'text');
        }
    }
    return false;
});    
  
});