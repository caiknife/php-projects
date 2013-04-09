$(function(){
    
$('a.save').click(function(){
    $('form').submit();
    return false;
});    

$('a.del').click(function(){
    if (confirm("确定要删除吗？")) {
        var id = $('#WineId').val();
        var url = '/admin/products/delete/'+id;
        $.get(url, function(text){
            if (text > 0) {
                self.location = '/admin/products/index';
            }
        }, 'text');
    }
    return false;
});

// index & subindex
$('#WineIndexType').change(function(){
    $.post('/admin/products/change_subindex', $('form').serialize(), function(text){
        $('#subindexes').html(text);
    }, 'text')
});

// wine & grape varieties
$('div.grape_variety a').live('click', function(){
    if (confirm("确定删除吗？")) {
        var $this = $(this);
        $.get($this.attr('href'), function(text){
            if (text) {
                $this.remove();
            }
        }, 'text');
    }
    return false;
});

$('a.add_grape').click(function(){
    $.post('/admin/products/connect_wine_grape', $('form').serialize(), function(text){
        if (text) {            
            $('div.grape_variety').append(text);
        }
    }, 'text');
});


// wine & price
$('a.delete_price_monthly').live('click', function(){
    if (confirm("确定删除吗？")) {
        var $this = $(this);
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                $this.parents('li').remove();
            }
        }, 'text');
    }
    return false;
});

$('a.cancel_price_monthly').live('click', function(){
    var $this = $(this);
    $this.parents('li').html($this.parents('li').next('li.disn').html());
    return false;
});

$('a.add_price_monthly').live('click', function(){
    var $this = $(this);
    var error = false;
    var date = false;
    $(this).prevAll('input').each(function(){
        var value = $.trim($(this).val());
        if (!value) {
            error = true;
            return false;
        }
    });
    if (error) {
        alert('请输入价格！');
        return false;
    }
    $(this).prevAll('select').each(function(){
        var value = $.trim($(this).val());
        if (!value) {
            date = true;
            return false;
        }
    });
    if (date) {
        alert('请输入日期！');
        return false;
    }
	$.post('/admin/products/add_price_monthly', $('form').serialize(), function(text){
        if (text) {
            $('.price_history').prepend(text);
        } else {
        	alert('关联数据已存在！');
        }
        $this.prevAll('input').val('');
    }, 'text');
    return false;
});

$('a.edit_price_monthly').live('click', function(){
    var $this = $(this);
    var parent = $this.parents('li');
    $.get($this.attr('href'), function(text){
        if (text) {
            $this.parents('li').after('<li class="disn">'+$this.parents('li').html()+'</li>');
            $this.parents('li').html(text);
            $('input', parent).tooltip({track:true,delay:0,showURL:false,showBody:" -/ ",fade:150,top:-10,left:10});
        }
    }, 'text');
    return false;
});

$('a.save_price_monthly').live('click', function(){
    var $this = $(this);
    var error = false;
    var date = false;
    $(this).prevAll('input').each(function(){
        var value = $.trim($(this).val());
        if (!value) {
            error = true;
            return false;
        }
    });
    if (error) {
        alert('请输入价格！');
        return false;
    }
    $(this).prevAll('select').each(function(){
        var value = $.trim($(this).val());
        if (!value) {
            date = true;
            return false;
        }
    });
    if (date) {
        alert('请输入日期！');
        return false;
    }
    $.post($this.attr('href'), $('form').serialize(), function(text){
        if (text) {
            $this.parents('li').html($(text).html());
        } else {
        	alert('关联数据已存在！');
        }
    }, 'text');
    return false;
});

// wine & tasting score
// year filter
$('select[id$=TastingScoreYear]').live('change', function(){
    var $this = $(this);
    $.post('/admin/products/filter_tasting_notes', {year: $(this).val()}, function(html){
        $this.next('select').html(html);
    }, 'html');
});

$('a.delete_tasting_score').live('click', function(){
    if (confirm("确定删除吗？")) {
        var $this = $(this);
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                $this.parents('li').remove();
            }
        }, 'text');
    }
    return false;
});

$('a.cancel_tasting_score').live('click', function(){
    var $this = $(this);
    $this.parents('li').html($this.parents('li').next('li.disn').html());
    return false;
});

$('a.edit_tasting_score').live('click', function(){
    var $this = $(this);
    var parent = $this.parents('li');
    $.get($this.attr('href'), function(text){
        if (text) {
            $this.parents('li').after('<li class="disn">'+$this.parents('li').html()+'</li>');
            $this.parents('li').html(text);
            $('input', parent).tooltip({track:true,delay:0,showURL:false,showBody:" -/ ",fade:150,top:-10,left:10});
        }
    }, 'text');
    return false;
});

$('a.add_tasting_score').live('click', function(){
    var $this = $(this);
    var note = $('select:eq(1)', $(this).parents('li')).val();
    if (!note) {
        alert('请选择酒评！');
        return false;
    }
    var error = false;
    $(this).prevAll('input').each(function(){
        var value = $.trim($(this).val());
        if (!value) {
            error = true;
            return false;
        }
    });
    if (error) {
        alert('请输入分数！');
        return false;
    }
	$.post('/admin/products/add_tasting_score', $('form').serialize(), function(text){
        if (text) {
            $('.spectatorList').prepend(text);
        } else {
        	alert('关联数据已存在！');
        }
        $this.prevAll('input').val('');
    }, 'text');
    return false;
});

$('a.save_tasting_score').live('click', function(){
    var $this = $(this);
    var note = $('select:eq(1)', $(this).parents('li')).val();
    if (!note) {
        alert('请选择酒评！');
        return false;
    }
    var error = false;
    $(this).prevAll('input').each(function(){
        var value = $.trim($(this).val());
        if (!value) {
            error = true;
            return false;
        }
    });
    if (error) {
        alert('请输入分数！');
        return false;
    }
    $.post($this.attr('href'), $('form').serialize(), function(text){
        if (text) {
            $this.parents('li').html($(text).html());
        } else {
        	alert('关联数据已存在！');
        }
    }, 'text');
    return false;
});

// wine & importer
$('#importer').keyup(function(){
    var $this = $(this);
    var keyword = $.trim($this.val());
    if (keyword != '') {
        $.post('/admin/products/search_importer', $(this).serialize(), function(html){
            $('#importer_list').html(html).show();
        }, 'html');
    }
});

$(window).click(function(){
    $('#importer_list').hide();
});

$('#importer_list li').live('click', function(){
    var $this = $(this);
    $.post($('a', $this).attr('href'), $('#WineId').serialize(), function(text){
        if (text) {
            $('#importer_list').hide();
            $('div.importer').html($('a', $this).attr('href', '#'));
        }
    }, 'text');
    return false;
});

$('div.importer a').live('click', function(){
    return false;
});

// upload logo
var saveLogoForWine = function(){
    var imgs = new Array();
    var id = $('#WineId').val();
    $('.logo_list li').each(function(){
        imgs.push($(this).attr('data'));
    });
    $.post('/admin/products/save', {'id': id, 'sort': imgs});
};

$('.logo_list a').live('click', function(){
    if (confirm("确定删除吗?")) {
        $(this).parents('li').remove();
        saveLogoForWine();
    }
    return false;
});
$(".photoList ul").sortable({
    revert: true,
    update: function(event, ui){
        saveLogoForWine();
    }
});
$('.button_logo').click(function(){
    if ($('.logo_list li').size() >= 5) {
        alert("只能上传5张图片！");
        return false;
    }
    var pos = $('#wine_logo').val().lastIndexOf(".");
    var lastname = $('#wine_logo').val().substring(pos, $('#wine_logo').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }
    $('#loading_logo').ajaxStart(function(){
        $(this).show();
    }).ajaxComplete(function(){
        $(this).hide();
    });
    
    $.ajaxFileUpload({
        url: '/admin/products/upload',
        secureuri: false,
        fileElementId: 'wine_logo',
        dataType: 'json',
        data: {id: $('#WineId').val()},
        success: function(data, status){
            var img = '/attachments/photos/wine_logo/'+data.msg.wine_logo_file_path;
            $('.logo_list').append('<li data="'+data.msg.wine_logo_file_path+'"><img title="拖动排序" src="'+img+'" /><a href="#">刪除</a></li>');
            saveLogoForWine();
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});

});