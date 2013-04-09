$(function(){
    
$(".estatesList tbody").sortable({
    update: function(event, ui){
        var ids = new Array();
        $('tr[data]').each(function(){
            ids.push($(this).attr('data'));
        });
        $.post('/admin/winery/sort', {'sort': ids});
    }
});

$('a.delete').live('click', function(){
    var $this = $(this);
    var $data = $(this).attr('data');
    $.get($data, function(text){        
        if (text > 0) {
            alert("关联数据存在，不能删除");
        } else {            
            if (confirm('确认删除吗？')) {
                $.get($this.attr('href'), function(text){
                    if (text) {
                        $this.parents('tr').remove();
                    }
                }, 'text');
            }
        }        
    }, 'text');
    return false;
});

// add region
$('a.add').live('click', function(){
    var $this = $(this);
	$.post('/admin/winery/add', $('form').serialize(), function(text){
        if (text) {
            $('.estatesList tbody').prepend(text);
            $(':input', $this.parents('tr')).val('');
        }
    }, 'text');
    return false;
});

// edit region
$('a.edit').live('click', function(){
    var $this = $(this);
    $.get($this.attr('href'), function(text){
        if (text) {
            $this.parents('tr').after('<tr class="disn">'+$this.parents('tr').html()+'</tr>');
            $this.parents('tr').html(text);
        }
    }, 'text');
    return false;
});

// save region
$('a.save').live('click', function(){
    var $this = $(this);
    $.post($this.attr('href'), $('form').serialize(), function(text){
        if (text) {
            $this.parents('tr').html($(text).html());
        }
    }, 'text');
    return false;
});

// cancel
$('a.cancel').live('click', function(){
    var $this = $(this);
    $this.parents('tr').html($this.parents('tr').next('tr.disn').html());
    return false;
});

});