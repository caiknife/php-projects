$(function(){
    
// sort
$(".regionList tbody").sortable({
    revert: true,
    update: function(event, ui){
        var ids = new Array();
        $('tr[data]').each(function(){
            ids.push($(this).attr('data'));
        });
        $.post('/admin/article/sort', {'sort': ids});
    }
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
