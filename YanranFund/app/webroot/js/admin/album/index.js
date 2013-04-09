$(function(){

// sort
$(".conList ul").sortable({ 
    revert:true,
    update: function(event, ui){
        var ids = new Array();
        $('li[data]').each(function(){
            ids.push($(this).attr('data'));
        });
        $.post('/admin/album/sort', {'sort': ids});
    } 
});

// delete
$('a.delete').live('click', function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text) {
                $this.parents('li').remove();
            }
        }, 'text');
    }
    return false;    
});
    
});
