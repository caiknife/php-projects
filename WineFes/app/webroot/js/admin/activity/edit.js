$(function(){
    
$('a.save').click(function(){
    $(this).prev('input').click();
    return false;
});    

$('a.del').click(function(){
    var $this = $(this);
    if (confirm("确定要删除吗？")) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                self.location = '/admin/activity';
            }
        }, 'text');
    }
    return false;
});

$('#ActivityActivityDate').datetimepicker({
    showOn : 'both',
    showButtonPanel: true,
    numberOfMonths: 3,
    buttonImage: '/images/time.png',
    buttonImageOnly: true
});

KindEditor.ready(function(K) {
    K.create('#ActivityContent', {
        allowFileManager : true
        // items : ['source', '|', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                 // 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 
                 // 'clearhtml', 'quickformat', '/',
                 // 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                 // 'italic', 'removeformat', '|', 'image',
                 // 'flash']
    });
});
   
$('.button_logo').click(function(){
    var pos = $('#activity_pic').val().lastIndexOf(".");
    var lastname = $('#activity_pic').val().substring(pos, $('#activity_pic').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }     
    $.ajaxFileUpload({
        url: '/admin/activity/upload',
        secureuri: false,
        fileElementId: 'activity_pic',
        dataType: 'json',
        data: {id: $('#ActivityId').val()},
        success: function(data, status){
            $('#img_news_logo').attr('src', '/attachments/photos/activity/'+data.msg.activity_pic_file_path);
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});    
    
});
