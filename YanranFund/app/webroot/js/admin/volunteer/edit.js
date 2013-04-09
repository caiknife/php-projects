$(function(){

if ($('#VolunteerIsDisplay').val()=='0') {
    $('.tabLeft :input').each(function(){       
        $(this).val($(this).attr('data'));
    });
}

$('.tabLeft :input').each(function(){
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
                self.location = '/admin/volunteer/index';
            }
        }, 'text');
    }
    return false;
});

var validateForm = function(){
    var result = true;
    // text box
    $('input[require=1]').each(function(){
        if (!$.trim($(this).val())) {
            result = false;
            alert($(this).attr('message'));
            return false;
        }
    });
    
    // checkbox 
    var count = 0;
    $(':checkbox').each(function(i){
        if ($(this).attr('checked')) {
            count++;
        }
    });
    if (count==0) {
        result = false;
        alert('请选择志愿者类型！');
    }
    return result;
};

// submit
$('a.save').click(function(){
    var result = validateForm();
    if (!result) {
        return false;
    }
    var $that = $('#VolunteerBanner');
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
    $(':submit').click();
    return false;
}); 
        
    
});
