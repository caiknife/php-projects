$(function(){
    
$(".kvList ul").sortable({ 
    revert:true, 
    update: function(event, ui){
        var ids = new Array();
        $('li[data]').each(function(){
            ids.push($(this).attr('data'));
        });
        $.post('/admin/banner/sort', {'sort': ids});
    }
});    
  
//delete
$('a.delete').live('click', function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text) {
                $this.parents('li').remove();
            }
        }, 'text');
    }
    return false;
});

//add
$('a.add').live('click', function(){
    var pos = $('#banner_pic').val().lastIndexOf(".");
    var lastname = $('#banner_pic').val().substring(pos, $('#banner_pic').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }
    var title = $.trim($('#banner_title').val());
    if (!title) {
        alert("请输入标题！");
        return false;
    }
    
    $('form').submit();
});

//edit
$('a.edit').live('click', function(){
    var $this = $(this);
    $.get($this.attr('href'), function(text){
        if (text) {
            $this.parents('li').after('<li class="disn">'+$this.parents('li').html()+'</tr>');
            $this.parents('li').html(text);
        }
    }, 'text');
    return false;
});

//save
$('a.save').live('click', function(){
    var $this = $(this);
    $.post($this.attr('href'), $('form').serialize(), function(text){
        if (text) {
            $this.parents('li').html($(text).html());
        }
    }, 'text');
    return false;
});

//cancel
$('a.cancel').live('click', function(){
    var $this = $(this);
    $this.parents('li').html($this.parents('li').next('li.disn').html());
    return false;
});

//upload
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
        url: '/admin/banner/upload',
        secureuri: false,
        fileElementId: $that.attr('id'),
        dataType: 'json',
        data: {id: $that.attr('data')},
        success: function(data, status){
            $('img', $this.parent('li')).attr('src', '/attachments/photos/banner/'+data.msg.banner_file_path);
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});

});