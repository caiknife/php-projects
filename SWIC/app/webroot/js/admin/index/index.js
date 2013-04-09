$(function(){
    
// sub index select box
$('#IndexCenterIndexSubId').change(function(){
    $('form').submit();
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

// add
$('a.add').live('click', function(){
    $.post('/admin/index/add', $('form').serialize(), function(text){
        if (text) {
            $('.exponentList tbody').append(text);
        }
    }, 'text');
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

// save
$('a.save').live('click', function(){
    var $this = $(this);
    $.post($this.attr('href'), $('form').serialize(), function(text){
        if (text) {
            $this.parents('tr').html($(text).html());
        }
    }, 'text');
    return false;
});
// calculate
$('a.calculate').live('click', function(){
    var $this = $(this);
    var data = {
        'index_type': $('#IndexCenterIndexType').val(),
        'index_sub_id': $('#IndexCenterIndexSubId').val(),
        'year': $('td:eq(0) select:eq(0)', $this.parents('tr')).val(),
        'month': $('td:eq(0) select:eq(1)', $this.parents('tr')).val()
    };
    $.post('/admin/index/calculate', data, function(json){
        $('td:eq(1) label', $this.parents('tr')).html(json['price_monthly']);
        $('td:eq(2) label', $this.parents('tr')).html(json['price_benchmark']);
    }, 'json'); 
});

// cancel
$('a.cancel').live('click', function(){
    var $this = $(this);
    $this.parents('tr').html($this.parents('tr').next('tr.disn').html());
    return false;
});
});