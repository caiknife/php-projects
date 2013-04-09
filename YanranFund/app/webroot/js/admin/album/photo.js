$(function(){

// delete
$('a.del').click(function(){
    var $this = $(this);
    if (confirm("确定要删除吗？")) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                self.location = '/admin/album/edit/'+$('#PhotoAlbumId').val();
            }
        }, 'text');
    }
    return false;
});

// submit
$('a.save').click(function(){
    var $that = $('#PhotoBanner');   
    if ($that.val()!='') {
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

// search
$('#project').keyup(function(){
    if ($.trim($(this).val())) {
        $.post('/admin/album/searchproject', {query: $(this).val(), photoId: $('#PhotoId').val()}, function(html){
            $('#projectList').html(html).show();
        }, 'html');
    }
});

$(window).click(function(){
    $('#projectList').hide();
});

// connect
$('a.connect').live('click', function(){
    var $this = $(this);
    $.get($(this).attr('href'), function(text){
        if (text) {
            var html = $this;
            html.attr('href', text).removeClass('connect').addClass('disconnect');
            $('#projectDiv').append(html);
        } else {
            alert('关系已经存在！');
        }
    }, 'text');
    return false;
});

// disconnect
$('a.disconnect').live('click', function(){
    var $this = $(this);
    if (confirm("确定要移除关系吗？")) {
        $.get($(this).attr('href'), function(text){
            if (text) {
                $this.remove();
            }
        }, 'text');
    }
    return false;
});

});
