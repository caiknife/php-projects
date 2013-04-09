Array.prototype.remove = function(dx) {
    if(isNaN(dx) || dx>this.length) {
        return false;
    }
    for (var i=0,n=0;i<this.length;i++) {
        if(this[i]!=this[dx]) {
            this[n++]=this[i]
        }
    }
    this.length -= 1;
  }

var cookieOptions = {'expires': 0, path: '/'};

$(function(){
    
$.cookie('units', $.cookie('units') || '', cookieOptions);
    
$('#typeEdit li a').live('click', function(){
    if (confirm('确认删除吗？')) {
        var $this = $(this);
        $.get($this.attr('href'), function(text){
            if (text) {
                var data = $this.attr('data');
                $('input[data='+data+']').parents('li').remove();
                $this.parent('li').remove();
            }
        }, 'text');
    }
    return false;
});

$('#typeEdit button').click(function(){
    $.post('/admin/brands/addcategory', $('input[name=addCategory]').serialize(), function(text){
        if (text) {
            var newCategory = $('input[name=addCategory]').val();
            $('#typeEdit ul').append('<li><a title="删除" href="/admin/brands/deletecategory/'+text+'" data="'+text+'">'+newCategory+'</a></li>');
            $('ul.checkboxList').append('<li><label><strong>'+newCategory+'</strong> <span><a class="jNiceCheckbox" href="#"></a><input type="checkbox" data="'+text+'" class="jNiceHidden" name="categories['+text+']"></span></label></li>');
            /* Click Handler */
            $(':checkbox[data='+text+']').siblings('a.jNiceCheckbox').click(function(){
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
        }
    }, 'text');
});

$('.numberEidt input').keyup(function(){
    var $this = $(this);
    var keyword = $.trim($this.val());
    if (keyword != '') {
        $.post('/admin/brands/searchunits', $(this).serialize(), function(html){
            $('#unit_result').html(html).show();
        }, 'html');
    }
});

$(window).click(function(){
    $('#unit_result').hide();
});

$('#unit_result li').live('click', function(){
    if ($.cookie('units')) {        
        var unitsCookie = $.cookie('units').split(',');
    } else {
        var unitsCookie = [];
    }
    var data = $(this).find('a').attr('data');
    if ($.inArray(data, unitsCookie) < 0) {
        unitsCookie.push(data);
        $('#units').append($(this).find('a').attr('title', '删除').end().html());
        $.cookie('units', unitsCookie.join(','), cookieOptions);
    }
    return false;
});

$('#units a').live('click', function(){
    var unitsCookie = $.cookie('units').split(',');
    var data = $(this).attr('data');
    if ($.inArray(data, unitsCookie) >= 0) {
        unitsCookie.remove($.inArray(data, unitsCookie));
        $(this).remove();
        $.cookie('units', unitsCookie.join(','), cookieOptions);
    }
    return false;
});

var currentUnits = $.cookie('units');
$.post('/admin/brands/currentunits', {'units': currentUnits}, function(html){
    $('#units').html(html);
}, 'html');

});