/* Demo Note:  This demo uses a FileProgress class that handles the UI for displaying the file name and percent complete.
The FileProgress class is not part of SWFUpload.
*/


/* **********************
   Event Handlers
   These are my custom event handlers to make my
   web application behave the way I went when SWFUpload
   completes different tasks.  These aren't part of the SWFUpload
   package.  They are part of my application.  Without these none
   of the actions SWFUpload makes will show up in my application.
   ********************** */
function fileQueued(file) {
    try {
        
    } catch (ex) {
        this.debug(ex);
    }

}

function fileQueueError(file, errorCode, message) {
    try {
        if (errorCode === SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED) {
            alert("You have attempted to queue too many files.\n" + (message === 0 ? "You have reached the upload limit." : "You may select " + (message > 1 ? "up to " + message + " files." : "one file.")));
            return;
        }
        switch (errorCode) {
            case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
                alert('文件体积太大！');
                this.debug("Error Code: File too big, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
                break;
            case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
                progress.setStatus("不能上传空文件！");
                this.debug("Error Code: Zero byte file, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
                break;
            case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
                alert('文件类型不正确！');
                this.debug("Error Code: Invalid File Type, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
                break;
            default:
                if (file !== null) {
                    progress.setStatus("Unhandled Error");
                }
                this.debug("Error Code: " + errorCode + ", File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
                break;
        }
    } catch (ex) {
        this.debug(ex);
    }
}

function fileDialogComplete(numFilesSelected, numFilesQueued) {
    try {
        /* I want auto start the upload and I can do that here */
        this.startUpload();
    } catch (ex)  {
        this.debug(ex);
    }
}

function uploadStart(file) {
    try {
        $('#loading_logo').show();
    } catch (ex) {
        
    }
    
    return true;
}

function uploadProgress(file, bytesLoaded, bytesTotal) {
    try {
        
    } catch (ex) {
        this.debug(ex);
    }
}

function uploadSuccess(file, serverData) {
    try {
        var data = JSON.parse(serverData);
        var img = '/attachments/photos/photo_list/'+data.msg.Filedata_file_path;
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
    } catch (ex) {
        this.debug(ex);
    }
}

function uploadError(file, errorCode, message) {
    try {
        alert('上传失败！');
    } catch (ex) {
        this.debug(ex);
    }
}

function uploadComplete(file) {
    $('#loading_logo').hide();
    this.startUpload();
}

// This event comes from the Queue Plugin
function queueComplete(numFilesUploaded) {
    
}

var sortLogo = function(){
    var ids = new Array();
    $('li[data]').each(function(){
        ids.push($(this).attr('data'));
    });
    $.post('/admin/album/sortphoto', {'sort': ids});
};
