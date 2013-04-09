$(function(){
    
var count = 5;
var timer;

// fancybox    
$('.fancybox').fancybox({
    maxWidth: 940,
    minWidth: 910,
    padding: 5
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

var clearAll = function(){
    count = 5;
    clearInterval(timer);
    $(':input').val('');
    $.fancybox.close();
};

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
    return success;  
};

//show    
$('a.fancybox2').click(function(){
    if (!validation()) {
        var lang = $('body').attr('lang');
        var alerts = {
            'cn': '所有项目都必须填写！',
            'en': 'Every item must be filled!'
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

//upload
$('.button_logo').click(function(){
    var $this = $(this);
    var pos = $('#banner').val().lastIndexOf(".");
    var lastname = $('#banner').val().substring(pos, $('#banner').val().length); 
    if (lastname.toLowerCase()!=".rar" && lastname.toLowerCase()!=".zip"){
        alert("您上传的文件类型为"+lastname+"，必须为rar、zip类型");
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
        fileElementId: 'banner',
        dataType: 'json',
        success: function(data, status){
            var url = '/attachments/files/'+data.msg.banner_file_path;
            $('a.download').attr('href', url).show();
            $('#FormHospitalBannerFilePath').val(data.msg.banner_file_path);
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});

// put radio button inside its label
$('label[for]').each(function(i){
    $(this).prepend($(this).prev('input'));
    $(this).prev('input').remove();
});

});
