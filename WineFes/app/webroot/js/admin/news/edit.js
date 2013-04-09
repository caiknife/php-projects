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
                self.location = '/admin/news';
            }
        }, 'text');
    }
    return false;
});

$('#NewsNewsDate').datepicker({
    showOn : 'both',
    showButtonPanel: true,
    numberOfMonths: 3,
    buttonImage: '/images/time.png',
    buttonImageOnly: true
});

KindEditor.ready(function(K) {
    K.create('#NewsContent', {
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
    var pos = $('#news_pic').val().lastIndexOf(".");
    var lastname = $('#news_pic').val().substring(pos, $('#news_pic').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }     
    $.ajaxFileUpload({
        url: '/admin/news/upload',
        secureuri: false,
        fileElementId: 'news_pic',
        dataType: 'json',
        data: {id: $('#NewsId').val()},
        success: function(data, status){
            $('#img_news_logo').attr('src', '/attachments/photos/news/'+data.msg.news_pic_file_path);
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});    
    
});
