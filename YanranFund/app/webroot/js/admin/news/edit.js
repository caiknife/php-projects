$(function(){

if ($('#NewsIsDisplay').val()=='0') {
    $(':radio').attr('checked', false);
}

// delete
$('a.del').click(function(){
    var $this = $(this);
    if (confirm("确定要删除吗？")) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                self.location = '/admin/news/index';
            }
        }, 'text');
    }
    return false;
});

// editor
KindEditor.ready(function(K) {
    var editor = K.create('#NewsContent', {
        filterMode : false,
        allowFileManager : true
    });
    
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
        if (!editor.html()) {
            result = false;
            alert('请填写内容！');
        }
        // radio box
        var types = ['Lang', 'HasVideo', 'IsPublic'];
        var alerts = ['请选择语言！', '请选择是否包含视频！', '请选择是否在新闻版块显示！'];
        for (t in types) {
            var count = 0;
            $(':radio[id^=News'+types[t]+']').each(function(i){
                if ($(this).attr('checked')) {
                    count++;
                }
            });
            if (count==0) {
                result = false;
                alert(alerts[t]);
                break;
            }
        }
        return result;
    }
    
    // submit
    $('a.save').click(function(){
        var result = validateForm();
        if (!result) {
            return false;
        }
        var $that = $('#NewsBanner');
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
        $('form').attr('action', $(this).attr('href'));
        $(':submit').click();
        return false;
    }); 
});

// search
$('#project').keyup(function(){
    if ($.trim($(this).val())) {
        $.post('/admin/news/searchproject', {query: $(this).val(), newsId: $('#NewsId').val()}, function(html){
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

//datetimepicker     
$('#NewsPublicDate').datetimepicker({
    showOn : 'both',
    showButtonPanel: true,
    numberOfMonths: 3,
    buttonImage: '/images/time.png',
    buttonImageOnly: true
});

});
