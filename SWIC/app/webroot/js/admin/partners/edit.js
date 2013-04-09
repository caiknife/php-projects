$(function(){

// delete    
$('a.del').click(function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                $this.parents('li').remove();
            }
        }, 'text');
    }
    return false;
});    
    
// save
$('a.save').click(function(){
    $('form').submit();
});

// upload
$('.upload').click(function(){
    var pos = $('#partner_logo').val().lastIndexOf(".");
    var lastname = $('#partner_logo').val().substring(pos, $('#partner_logo').val().length); 
    if (lastname.toLowerCase()!=".jpg" && lastname.toLowerCase()!=".jpeg" && lastname.toLowerCase()!=".png" && lastname.toLowerCase()!=".gif"){
        alert("您上传的文件类型为"+lastname+"，必须为jpg、png、gif类型");
        return false;
    }     
    $.ajaxFileUpload({
        url: '/admin/partners/upload',
        secureuri: false,
        fileElementId: 'partner_logo',
        dataType: 'json',
        data: {id: $('#PartnerId').val()},
        success: function(data, status){
            $('#img_partner_logo').attr('src', '/attachments/photos/partner/'+data.msg.partner_logo_file_path).show();
        },
        error: function(data, status, e){
            
        }
    });
    return false;
});

});