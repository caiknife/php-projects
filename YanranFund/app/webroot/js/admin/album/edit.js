$(function(){

// delete
$('a.del').click(function(){
    var $this = $(this);
    if (confirm("确定要删除吗？")) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                self.location = '/admin/album/index';
            }
        }, 'text');
    }
    return false;
});

// submit
$('a.save').click(function(){
    $(this).prev('input').click();
    return false;
});  

var sortLogo = function(){
    var ids = new Array();
    $('li[data]').each(function(){
        ids.push($(this).attr('data'));
    });
    $.post('/admin/album/sortphoto', {'sort': ids});
};

// sort    
$(".photoList ul").sortable({ 
    revert:true,
    update: function(event, ui){
        sortLogo();
    } 
});

// upload
$('.button_logo').click(function(){
    var $this = $(this);
    var pos = $('#album_photo').val().lastIndexOf(".");
    var lastname = $('#album_photo').val().substring(pos, $('#album_photo').val().length); 
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
        url: $this.attr('url'),
        secureuri: false,
        fileElementId: 'album_photo',
        dataType: 'json',
        success: function(data, status){
            var img = '/attachments/photos/photo_list/'+data.msg.album_photo_file_path;
            var html = '<li data="'+data.msg.id+'">'+
                        '<div><img title="拖动排序" src="'+img+'" /></div>'+
                        '<input title="中文名称" type="text" name="title_cn['+data.msg.id+']" />'+
                        '<input title="英文名称" type="text" name="title_en['+data.msg.id+']" />'+
                        '<a href="'+data.msg.edit_url+'">详细</a> '+
                        '<a href="'+data.msg.set_url+'" class="setcover">设为封面</a> '+
                        '<a href="'+data.msg.delete_url+'" class="delete">刪除</a></li>';
            $('.logoList').append(html);
            $('input', $('li[data='+data.msg.id+']')).tooltip({track:true, delay:0, showURL:false, showBody:" -/ ", fade:150, top:-10, left:10});
            sortLogo();
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});

// delete logo
$('.logoList a.delete').live('click', function(){
    var $this = $(this);
    if (confirm("确定要删除吗？")) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                $this.parents('li').remove();
            }
        }, 'text');
    }
    return false;
}); 

// set cover
$('.logoList a.setcover').live('click', function(){
    var $this = $(this);
    $.get($this.attr('href'), function(text){
        var src = $('img', $this.parents('li')).attr('src');
        $('#album_logo').attr('src', src);
    }, 'text');
    return false;
}); 

//swfupload
var swfu;
var settings = {
    flash_url : "/swfupload/swfupload.swf",
    upload_url: $('#btnUpload').attr('url'),
    file_size_limit : "5 MB",
    file_types : "*.jpg;*.jpeg;*.gif;*.png",
    file_types_description : "Image Files",
    file_upload_limit : 100,
    file_queue_limit : 0,
    debug: false,

    // Button settings
    button_placeholder_id : "spanButtonPlaceholder",
    button_width: 61,
    button_height: 22,
    button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
    button_cursor: SWFUpload.CURSOR.HAND,
    
    // The event handler functions are defined in handlers.js
    file_queued_handler : fileQueued,
    file_queue_error_handler : fileQueueError,
    file_dialog_complete_handler : fileDialogComplete,
    upload_start_handler : uploadStart,
    upload_progress_handler : uploadProgress,
    upload_error_handler : uploadError,
    upload_success_handler : uploadSuccess,
    upload_complete_handler : uploadComplete,
    queue_complete_handler : queueComplete  // Queue plugin event
};

swfu = new SWFUpload(settings);
    
});
