$(function(){
    
$('.brandSwitch> li > a').click(function(){
    var $this = $(this);
    if ($this.parent('li').hasClass('curr')) {
        return false;
    }
    $this.parent('li').addClass('curr').siblings('li').removeClass('curr');
    $.get('/admin/top/featuredbrands/'+$this.attr('name'), function(data){
        $('ul#featured').html(data);
    }, 'html');
});    

$('.brand_list > li > a.delete').live('click', function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {        
        $.get($this.attr('href'), function(text){
            if (text) {
                $this.parent('li').remove();
            }
        }, 'text');
    }
    return false;
});

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
    $.post('/admin/top/searchbrands', $('form[name=search]').serialize(), function(data){
        $('ul#result').html(data);
    }, 'html');
});

$('button[name=add]').click(function(){
    var brands = {};
    $(':checkbox:checked').each(function(i){
        brands[i] = $(this).attr('name');
    });
    var params = {'brands':brands};
    $.post('/admin/top/feature', $.param(params), function(data){
        if (data) {
            $('.brandSwitch > li:first').removeClass('curr').find('a').click();
        }
    }, 'text');
});

});