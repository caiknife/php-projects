$(function(){
    
$(".productTypeList tbody").sortable({
    update: function(event, ui){
        var ids = new Array();
        $('tr[data]').each(function(){
            ids.push($(this).attr('data'));
        });
        $.post('/admin/newstype/sort', {'sort': ids});
    }
});

//delete
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

//cancel
$('a.cancel').live('click', function(){
    var $this = $(this);
    $this.parents('tr').html($this.parents('tr').next('tr.disn').html());
    return false;
});

//add
$('a.add').live('click', function(){
    var pos = $('#newstype_logo').val().lastIndexOf(".");
    var lastname = $('#newstype_logo').val().substring(pos, $('#newstype_logo').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }
    var title = $.trim($('#newstype_title').val());
    if (!title) {
        alert("请输入新闻分类名称！");
        return false;
    }
    
    $('form').submit();
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

//save
$('a.save').live('click', function(){
    var $this = $(this);
    $.post($this.attr('href'), $('form').serialize(), function(text){
        if (text) {
            $this.parents('tr').html($(text).html());
        }
    }, 'text');
    return false;
})

//file upload
$('button.upload').live('click', function(){
    var $this = $(this);
    var $that = $('#'+$(this).attr('data'));
    var pos = $that.val().lastIndexOf(".");
    var lastname = $that.val().substring(pos, $that.val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }     
    $.ajaxFileUpload({
        url: '/admin/newstype/upload',
        secureuri: false,
        fileElementId: $that.attr('id'),
        dataType: 'json',
        data: {id: $that.attr('data')},
        success: function(data, status){
            $('img', $this.parent('td')).attr('src', '/attachments/photos/newstype_logo/'+data.msg.media_url);
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});
    
});