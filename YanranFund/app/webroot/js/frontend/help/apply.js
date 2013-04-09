$(function(){

var lang = $('body').attr('lang');    
var count = 5;
var timer;

$('.fancybox').fancybox({
    minWidth:930,
    padding:5
});

$('.fancybox2').fancybox({
    beforeShow: function(){
        timer = setInterval(function(){
            $('.count').html(count);
            count--;
            if (count < 0) {
                self.location = $('a.home').attr('href');
            }
        }, 1000);
    },
    afterClose: function(){
        clearAll();
    }
});

var validation = function() {
    var success = true;
    $(':text:visible[require]').each(function(i){
        if (!$.trim($(this).val())) {
            success = false;
        }
    });
    $('textarea:visible[require]').each(function(i){
        if (!$.trim($(this).val())) {
            success = false;
        }
    });
    var types = ['Residence', 'SickType', 'SickOperation', 'SickHistory'];
    for (t in types) {
        var count = 0;
        $('input[id^=FormHelp'+types[t]+']').each(function(i){
            if ($(this).attr('checked')) {
                count++;
            }
        });
        if (count==0) {
            success = false;
        }
    }
    if ($('.uploadBox .con i:visible').length < 6) {
        success = false;
    }
    return success;  
};

// show    
$('a.fancybox2').click(function(){
    if (!validation()) {        
        var alerts = {
            'cn': '请填写必填项目！所有附件都必须上传！',
            'en': 'Pleas fill the required items and upload the attachments! '
        };
        alert(alerts[lang]);
        return false;
    }
    var result = $.ajax({
        async: false, 
        type: 'POST', 
        url: $('form').attr('action'), 
        data: $('form').serialize()}
    ).responseText;
    return true;
});   

//close
$('a.close').click(function(){
    clearAll();
    return false;
});

// datepicker
$('#FormHelpBirthday').datepicker({
    showOn : 'focus',
    showButtonPanel: true,
    changeMonth: true,
    changeYear: true
});

var clearAll = function(){
    count = 5;
    clearInterval(timer);
    $(':input').val('');
    $('input[type=radio]').attr('checked', false);    
    $('input:hidden[name^=attachments]').remove();
    $('a[for=attachments]').remove();
    $('.uploadBox .con i').hide();
    $.fancybox.close();
};

// put radio button inside its label
$('label[for]').each(function(i){
    $(this).prepend($(this).prev('input'));
    $(this).prev('input').remove();
});

// swf upload 
$('.uploadBox .con').each(function(i){
    var $this = $(this);
    var swfu;
    var settings = {
        flash_url : "/swfupload/swfupload.swf",
        upload_url: $('.uploadBox').attr('url'),
        post_params: {'type': i},
        file_size_limit : "5 MB",
        file_types : "*.jpg;*.jpeg;*.gif;*.png",
        file_types_description : "Image Files",
        file_upload_limit : 100,
        file_queue_limit : 0,
        debug: false,
    
        // Button settings
        button_placeholder_id : "spanButtonPlaceholder"+i,
        button_image_url: "/images/btn_upload_"+lang+".png",
        button_width: 45,
        button_height: 24,
        button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
        button_cursor: SWFUpload.CURSOR.HAND,
        
        // The event handler functions are defined in handlers.js
        file_queued_handler : fileQueued,
        file_queue_error_handler : fileQueueError,
        file_dialog_complete_handler : fileDialogComplete,
        upload_start_handler : function(file){
            try {
                $('.loading', $this).show();
            } catch (ex) {
                
            }
            return true;
        },
        upload_progress_handler : uploadProgress,
        upload_error_handler : uploadError,
        upload_success_handler : function(file, serverData){
            try {
                $('i', $this).show();
                $this.append(serverData);
            } catch (ex) {
                this.debug(ex);
            }
        },
        upload_complete_handler : function(file){
            $('.loading', $this).hide();
            this.startUpload();            
        },
        queue_complete_handler : queueComplete  // Queue plugin event
    };
    
    swfu = new SWFUpload(settings);
});
    
});
