$(function(){

$('a.jNiceCheckbox').live('click', function(){
    var $a = $(this);
    var input = $a.siblings('input')[0];
    if (input.checked===true){
        input.checked = false;
        $a.removeClass('jNiceChecked');
    }
    else {
        input.checked = true;
        $a.addClass('jNiceChecked');
    }
    return false;
});    
    
$('button[name=search]').click(function(){
    $.post('/admin/events/searchbrands', $('form[name=search]').serialize(), function(data){
        $('ul#result').html(data);
    }, 'html');
});

$('button[name=add]').click(function(){
    var brands = {};
    $(':checkbox:checked').each(function(i){
        brands[i] = $(this).attr('name');
    });
    var params = {'event':$('#EventId').val(), 'brands':brands};
    $.post('/admin/events/connect', $.param(params), function(data){
        $('ul#relation').html(data);
    }, 'html');
});

$('ul#relation > li > a.delete').live('click', function(){
    if (confirm('确认删除吗？')) {
        var $this = $(this);
        $.get($this.attr('href'), function(text){
            if (text) {
                $this.parent('li').remove();
            }
        }, 'text');
    }
    return false;
});
    
});