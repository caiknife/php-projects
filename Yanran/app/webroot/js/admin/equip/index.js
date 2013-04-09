$(function(){

// sort
$(".separtmentList ul").sortable({ 
    revert:true,
    update: function(event, ui){
        var ids = new Array();
        $('li[data]').each(function(){
            ids.push($(this).attr('data'));
        });
        $.post('/admin/equip/sort', {'sort': ids});
    }
});

// delete
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

// add
$('a.add').live('click', function(){
    var file = $('input', $(this).parents('li'));
    var pos = file.val().lastIndexOf(".");
    var lastname = file.val().substring(pos, file.val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }
    var title_cn = $.trim($('textarea:eq(0)', $(this).parents('li')).val());
    if (!title_cn) {
        alert("请输入中文描述！");
        return false;
    }
    var title_en = $.trim($('textarea:eq(1)', $(this).parents('li')).val());
    if (!title_en) {
        alert("请输入英文描述！");
        return false;
    }
    $(this).parents('form').submit();
    return false;
});

//edit
$('a.edit').live('click', function(){
    var $this = $(this);
    var parent = $this.parents('li');
    parent.addClass('edit');
    $.get($this.attr('href'), function(text){
        if (text) {
            $this.parents('li').after('<li class="disn">'+$this.parents('li').html()+'</tr>');
            $this.parents('li').html(text);
            $(':input', parent).tooltip({track:true,delay:0,showURL:false,showBody:" -/ ",fade:150,top:-10,left:10});
        }
    }, 'text');
    return false;
});

// save
$('a.save').live('click', function(){
    var $this = $(this);
    var parent = $this.parents('li');
    var $that = $('#'+$('button.upload', parent).attr('data'));
    if ($that.val()!='') {
        var pos = $that.val().lastIndexOf(".");
        var lastname = $that.val().substring(pos, $that.val().length); 
        if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
            alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
            return false;
        }
    }
    $(this).parents('form').attr('action', $(this).attr('href')).submit();
    return false;
});

//cancel
$('a.cancel').live('click', function(){
    var $this = $(this);
    $this.parents('li').removeClass('edit').html($this.parents('li').next('li.disn').html());
    return false;
});
    
});
