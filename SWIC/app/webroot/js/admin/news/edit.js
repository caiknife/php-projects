$(function(){
    
$('a.save').click(function(){
    $(this).prev('input').click();
    return false;
});    

$('a.del').click(function(){
    if (confirm("确定要删除吗？")) {
        var id = $('#NewsId').val();
        var url = '/admin/news/delete/'+id;
        $.get(url, function(text){
            if (text > 0) {
                self.location = '/admin/news/index';
            }
        }, 'text');
    }
    return false;
});

$('#NewsArticleDate').datepicker({
    showOn : 'both',
    showButtonPanel: true,
    numberOfMonths: 3,
    buttonImage: '/img/time.png',
    buttonImageOnly: true
});

KindEditor.ready(function(K) {
    K.create('#NewsContent', {
        allowFileManager : true,
        items : ['source', '|', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 
                 'clearhtml', 'quickformat', '/',
                 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                 'italic', 'removeformat', '|', 'image',
                 'flash']
    });
});
   
$('.button_logo').click(function(){
    var pos = $('#news_logo').val().lastIndexOf(".");
    var lastname = $('#news_logo').val().substring(pos, $('#news_logo').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }     
    $.ajaxFileUpload({
        url: '/admin/news/upload/logo',
        secureuri: false,
        fileElementId: 'news_logo',
        dataType: 'json',
        data: {id: $('#NewsId').val()},
        success: function(data, status){
            $('#img_news_logo').attr('src', '/attachments/photos/news_logo/'+data.msg.news_logo_file_path);
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});

$('.button_big').click(function(){
    var pos = $('#news_big').val().lastIndexOf(".");
    var lastname = $('#news_big').val().substring(pos, $('#news_big').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }    
    $.ajaxFileUpload({
        url: '/admin/news/upload/big',
        secureuri: false,
        fileElementId: 'news_big',
        dataType: 'json',
        data: {id: $('#NewsId').val()},
        success: function(data, status){
            $('#img_news_big').attr('src', '/attachments/photos/news_big/'+data.msg.news_big_file_path); 
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});

});