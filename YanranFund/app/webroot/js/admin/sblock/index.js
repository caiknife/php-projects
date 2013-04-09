$(function(){

// sort    
$(".tab tbody").sortable({
    revert:true,
    update: function(event, ui){
        var ids = new Array();
        $('tr[data]').each(function(){
            ids.push($(this).attr('data'));
        });
        $.post('/admin/sblock/sort', {'sort': ids});
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

// hide & show
$('a.hide, a.show').live('click', function(){
    $.get($(this).attr('href'), function(text){
        self.location.reload();
    }, 'text');
    return false;
});  
    
});
