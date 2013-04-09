$(function(){
    
// sort    
$(".productTypeList tbody").sortable({
    revert:true, 
    update: function(event, ui){
        var ids = new Array();
        $('tr[data]').each(function(){
            ids.push($(this).attr('data'));
        });
        $.post('/admin/newstype/sort', {'sort': ids});
    }
});    

// delete
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

// add
$('a.add').live('click', function(){
    var title_cn = $.trim($('#NewsTypeTitleCn').val());
    if (!title_cn) {
        alert('请输入中文标题！');
        return false;
    }
    var title_en = $.trim($('#NewsTypeTitleEn').val());
    if (!title_en) {
        alert('请输入英文标题！');
        return false;
    }
    $('form').submit();
    return false;
});

//edit
$('a.edit').live('click', function(){
    var $this = $(this);
    var parent = $this.parents('tr');
    $.get($this.attr('href'), function(text){
        if (text) {
            $this.parents('tr').after('<tr class="disn">'+$this.parents('tr').html()+'</tr>');
            $this.parents('tr').html(text);
            $('input', parent).tooltip({track:true,delay:0,showURL:false,showBody:" -/ ",fade:150,top:-10,left:10});
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
    
});
