$(function(){

// sort    
$(".conList ul").each(function(i){
    var $this = $(this);
    $(this).sortable({
        revert: true,
        update: function(event, ui){
            var ids = new Array();
            $('li[data]', $this).each(function(){
                ids.push($(this).attr('data'));
            });
            $.post('/admin/volunteer/sort', {'sort': ids, 'type': $this.attr('type')});
        }
    });  
});  

// delete
$('a.delete').live('click', function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text) {
                var data = $this.parents('li').attr('data');
                $('li[data='+data+']').remove();
            }
        }, 'text');
    }
    return false;    
});
    
});
