$(function(){
    
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

// edit
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

// add
$('a.add').live('click', function(){
    var $this = $(this);
    var dateError = false;
    $('td:eq(0) select', $this.parents('tr')).each(function(i){
        if (!$(this).val()) {
            dateError = true;
            return false;
        }
    });
    if (dateError) {
        alert('请输入日期！');
        return false;
    }
    var titleError = false;
    $('td:eq(1) input', $this.parents('tr')).each(function(i){
        if (!$(this).val()) {
            titleError = true;
            return false;
        }
    });
    if (titleError) {
        alert('请输入名称！');
        return false;
    }
    $('form').submit();
});

// cancel
$('a.cancel').live('click', function(){
    var $this = $(this);
    $this.parents('tr').html($this.parents('tr').next('tr.disn').html());
    return false;
});

// save
$('a.save').live('click', function(){
    var $this = $(this);
    var dateError = false;
    $('td:eq(0) select', $this.parents('tr')).each(function(i){
        if (!$(this).val()) {
            dateError = true;
            return false;
        }
    });
    if (dateError) {
        alert('请输入日期！');
        return false;
    }
    var titleError = false;
    $('td:eq(1) input', $this.parents('tr')).each(function(i){
        if (!$(this).val()) {
            titleError = true;
            return false;
        }
    });
    if (titleError) {
        alert('请输入名称！');
        return false;
    }
    $.post($this.attr('href'), $('form').serialize(), function(text){
        if (text) {
            $this.parents('tr').html($(text).html());
        }
    }, 'text');
    return false;
});
    
});
