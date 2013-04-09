$(function(){
    
// submit
$('a.save').click(function(){
    var $that = $('#ServiceBanner');
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

// delete
$('a.del').click(function(){
    var $this = $(this);
    if (confirm("确定要删除吗？")) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                self.location = '/admin/service';
            }
        }, 'text');
    }
    return false;
});

// editor
KindEditor.ready(function(K) {
    K.create('#ServiceContentCn', {
        allowFileManager : true
        // items : ['source', '|', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                 // 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 
                 // 'clearhtml', 'quickformat', '/',
                 // 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                 // 'italic', 'removeformat', '|', 'image',
                 // 'flash']
    });
    K.create('#ServiceContentEn', {
        allowFileManager : true
        // items : ['source', '|', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                 // 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 
                 // 'clearhtml', 'quickformat', '/',
                 // 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                 // 'italic', 'removeformat', '|', 'image',
                 // 'flash']
    });
    
    $('a.en').click(function(){
        $('a.cn').removeClass('curr');      
        $('div.cn').hide();
        $(this).addClass('curr');
        $('div.en').show();
        return false;
    });
    $('a.cn').click(function(){
        $('a.en').removeClass('curr');
        $('div.en').hide();
        $(this).addClass('curr');
        $('div.cn').show();
        return false;
    }).click();    
});
    
});
