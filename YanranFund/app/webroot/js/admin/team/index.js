$(function(){

// sort    
$(".conList ul").sortable({ 
    revert:true,
    update: function(event, ui){
        var ids = new Array();
        $('li[data]').each(function(){
            ids.push($(this).attr('data'));
        });
        $.post('/admin/team/sort', {'sort': ids});
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
    var pos = $('#banner_pic').val().lastIndexOf(".");
    var lastname = $('#banner_pic').val().substring(pos, $('#banner_pic').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }
    var title_cn = $.trim($('#banner_title_cn').val());
    if (!title_cn) {
        alert("请输入名称中文！");
        return false;
    }
    var title_en = $.trim($('#banner_title_en').val());
    if (!title_en) {
        alert("请输入名称英文！");
        return false;
    }
    var title_cn = $.trim($('#banner_slogan_cn').val());
    if (!title_cn) {
        alert("请输入口号中文！");
        return false;
    }
    var title_en = $.trim($('#banner_slogan_en').val());
    if (!title_en) {
        alert("请输入口号英文！");
        return false;
    }
    $('form').submit();
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
            $('input', parent).tooltip({track:true,delay:0,showURL:false,showBody:" -/ ",fade:150,top:-10,left:10});
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
    $('form').attr('action', $(this).attr('href')).submit();
    return false;
});

//cancel
$('a.cancel').live('click', function(){
    var $this = $(this);
    $this.parents('li').removeClass('edit').html($this.parents('li').next('li.disn').html());
    return false;
});

// text box
$('#banner_title_cn').focus(function(){
    if ($(this).val()=='中文姓名') {
        $(this).val('')
    }
});
$('#banner_title_en').focus(function(){
    if ($(this).val()=='英文姓名') {
        $(this).val('')
    }
});
    
});
