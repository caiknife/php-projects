$(function(){

if ($('#ProjectIsDisplay').val()=='0') {
    $('.tabLeft :input[data]').each(function(){       
        $(this).val($(this).attr('data'));
    });
}

$('.tabLeft :input[data]').each(function(){
    $(this).focus(function(){
        if ($(this).val()==$(this).attr('data')) {
            $(this).val('');
        }
    });
});

// delete
$('a.del').click(function(){
    var $this = $(this);
    if (confirm("确定要删除吗？")) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                self.location = '/admin/project/index';
            }
        }, 'text');
    }
    return false;
});

     
// editor
KindEditor.ready(function(K) {
    var editorCn = K.create('#ProjectContentCn', {
        filterMode : false,
        allowFileManager : true
    });
    var editorEn = K.create('#ProjectContentEn', {
        filterMode : false,
        allowFileManager : true
    });
    
    $('a.en').click(function(){
        $('a.cn').removeClass('curr');      
        $('div.cn').hide();
        $(this).addClass('curr');
        $('div.en').show();
        return false;
    });
    $('a.cn').click(function(){
        $('a.en').removeClass('curr');
        $('div.en').hide();
        $(this).addClass('curr');
        $('div.cn').show();
        return false;
    }).click();
    
    var validateForm = function() {
        var result = true;
        // text box
        $('input[require=1]').each(function(){
            if (!$.trim($(this).val())) {
                result = false;
                alert($(this).attr('message'));
                return false;
            }
        });
        
        // text area
        if (!editorCn.html()) {
            result = false;
            alert('请填写中文内容！');
        }
        return result;
    } 
    
    // submit
    $('a.save').click(function(){
        var result = validateForm();
        if (!result) {
            return false;
        }
        var $that = $('#ProjectBanner');
        var $file = $('#news_image');
        if ($file.length > 0) {
            if ($that.val()!='') {
                var pos = $that.val().lastIndexOf(".");
                var lastname = $that.val().substring(pos, $that.val().length); 
                if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
                    alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
                    return false;
                }
            }
        } else {
            if ($that.val()=='') {
                alert('请上传文件！');
                return false;
            }
            var pos = $that.val().lastIndexOf(".");
            var lastname = $that.val().substring(pos, $that.val().length); 
            if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
                alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
                return false;
            }
        }
        $(this).prev('input').click();
        return false;
    }); 
        
});    

var sortLogo = function(){
    var ids = new Array();
    $('li[data]').each(function(){
        ids.push($(this).attr('data'));
    });
    $.post('/admin/project/sort', {'sort': ids});
};

// upload
$('.button_logo').click(function(){
    var $this = $(this);
    var pos = $('#project_logo').val().lastIndexOf(".");
    var lastname = $('#project_logo').val().substring(pos, $('#project_logo').val().length); 
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
        fileElementId: 'project_logo',
        dataType: 'json',
        success: function(data, status){
            var img = '/attachments/photos/logo/'+data.msg.project_logo_file_path;
            var html = '<li data="'+data.msg.id+'">'+
                        '<div><img title="拖动排序" src="'+img+'" /></div>'+
                        '<input title="中文名称" type="text" name="title_cn['+data.msg.id+']" />'+
                        '<input title="英文名称" type="text" name="title_en['+data.msg.id+']" />'+
                        '<input title="链接" type="text" name="url['+data.msg.id+']" />'+
                        '<a href="'+data.msg.delete_url+'">刪除</a></li>';
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
$('.logoList a').live('click', function(){
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
   
// sort    
$( ".photoList ul" ).sortable({ 
    revert:true,
    update: function(event, ui){
        sortLogo();
    } 
});

// swfupload
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
