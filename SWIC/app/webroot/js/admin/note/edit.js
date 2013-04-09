$(function(){

var saveLogoForNote = function(){
    var imgs = new Array();
    var id = $('#TastingNotesId').val();
    $('.photoList li').each(function(){
        imgs.push($(this).attr('data'));
    });
    $.post('/admin/note/save', {'id': id, 'sort': imgs});
};    
    
$(".photoList ul").sortable({ 
    revert:true,
    update: function(event, ui){
        saveLogoForNote();
    }
});

$('a.save').click(function(){
    $('form').submit();
    return false;
}); 

$('a.del').click(function(){
    var count = $(this).attr('data');
    if (count > 0) {
        alert('关联数据存在，不能删除！');
    } else {        
        if (confirm("确定要删除吗？")) {
            var id = $('#TastingNotesId').val();
            var url = '/admin/note/delete/'+id;
            $.get(url, function(text){
                if (text > 0) {
                    self.location = '/admin/note/index';
                }
            }, 'text');
        }
    }
    return false;
});

$('#TastingNotesDateTime').datepicker({
    showOn : 'both',
    showButtonPanel: true,
    numberOfMonths: 3,
    buttonImage: '/img/time.png',
    buttonImageOnly: true
});

$('.photoList a.remove').live('click', function(){
    if (confirm("确定删除吗?")) {
        $(this).parents('li').remove();
        saveLogoForNote();
    }
    return false;
});

$('.upload').click(function(){
    if ($('.photoList li').size() >= 6) {
        alert("只能上传6张图片！");
        return false;
    }
    var pos = $('#note_logo').val().lastIndexOf(".");
    var lastname = $('#note_logo').val().substring(pos, $('#note_logo').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }
    $('#loading').ajaxStart(function(){
        $(this).show();
    }).ajaxComplete(function(){
        $(this).hide();
    });
    
    $.ajaxFileUpload({
        url: '/admin/note/upload',
        secureuri: false,
        fileElementId: 'note_logo',
        dataType: 'json',
        data: {id: $('#TastingNotesId').val()},
        success: function(data, status){
            var img = '/attachments/photos/note/'+data.msg.note_logo_file_path;
            $('.photoList ul').append('<li data="'+data.msg.note_logo_file_path+'"><img title="拖动排序" src="'+img+'" /><input title="图片标题" type="text" name="logo_desc[]"/><a href="#" class="remove">刪除</a></li>');
            saveLogoForNote();
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});
    
});