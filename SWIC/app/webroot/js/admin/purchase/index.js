$(function(){
    
//add
$('a.add').live('click', function(){
    var $this = $(this);
    var country = $.trim($('#AddIndexCountry').val());
    var ratio = $.trim($('#AddIndexRatio').val());
    if (!country) {
        alert('请输入国家！');
        return false;
    }
    if (!ratio) {
        alert('请输入比率！');
        return false;
    }
    var total = 0.0;
    $this.parents('tr').siblings('tr:visible[data]').each(function(){
        total += parseFloat($(this).attr('data'));
    });
    total += parseFloat($this.parent('td').prev('td').find('input').val());
    if (total > 100) {
        alert('比率总和不能超过100！现在总和是'+total);        
        return false;
    }
    $.post('/admin/purchase/add', $('form').serialize(), function(text){
        if (text) {
            $('.exponentList tbody').prepend(text);
        }
    }, 'text');
    return false;
});
    
//edit
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

//cancel
$('a.cancel').live('click', function(){
    var $this = $(this);
    $this.parents('tr').html($this.parents('tr').next('tr.disn').html());
    return false;
});

//save
$('a.save').live('click', function(){
    var $this = $(this);
    var country = $.trim($('td:eq(0) input', $this.parents('tr')).val());
    var ratio = $.trim($('td:eq(1) input', $this.parents('tr')).val());
    if (!country) {
        alert('请输入国家！');
        return false;
    }
    if (!ratio) {
        alert('请输入比率！');
        return false;
    }
    var total = 0.0;
    $this.parents('tr').siblings('tr:visible[data]').each(function(){
        total += parseFloat($(this).attr('data'));
    });
    total += parseFloat($this.parent('td').prev('td').find('input').val());
    if (total > 100) {
        alert('比率总和不能超过100！现在总和是'+total);        
        return false;
    }
    $.post($this.attr('href'), $('form').serialize(), function(text){
        if (text) {
            $this.parents('tr').html($(text).html());
        }
    }, 'text');
    return false;
});

//delete
$('a.delete').live('click', function(){
    var $this = $(this);
    if (confirm("确认删除吗？")) {        
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                $this.parents('tr').remove();
            }
        }, 'text');
    }
    return false;
});

});