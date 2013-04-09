$(function(){
    
$('.activities_list > li > a.delete').click(function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text) {
                $this.parent('li').remove();
            }
        }, 'text');
    }
    return false;
});
    
});