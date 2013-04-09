$(function(){
    
$(".newsRecommend tbody").sortable({
    update: function(event, ui){
        var ids = new Array();
        $('tr[data]').each(function(){
            ids.push($(this).attr('data'));
        });
        $.post('/admin/news/sort', {'sort': ids});
    }
});    

$('a.unfeature').live('click', function(){
    var $this = $(this);
    if (confirm('确定取消推荐吗？')) {        
        $.get($this.attr('href'), function(html){
            $this.parents('tr').remove();
        }, 'html')
    }
    return false;
});

});