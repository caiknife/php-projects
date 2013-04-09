$(function(){
    
$('.cooperationList').each(function(){    
    var $this = $(this);
    $('ul', $(this)).sortable({ 
        revert: true,
        update: function(event, ui){
            var ids = new Array();
            $('li[data]', $this).each(function(){
                ids.push($(this).attr('data'));
            });
            $.post('/admin/partners/sort', {'sort': ids});
        }
    });
});

// change type
$('#type').change(function(){
    $('form').submit();
});

// delete
$('a.delete').live('click', function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                $this.parents('li').remove();
            }
        }, 'text');
    }
    return false;
});    
    
});