$(function(){
    
// submit
$('a.save').click(function(){
    $(this).prev('input').click();
    return false;
});     

// delete
$('a.del').click(function(){
    var $this = $(this);
    if (confirm("确定要删除吗？")) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                self.location = '/admin/block/index/type:'+$('#BlockType').val();
            }
        }, 'text');
    }
    return false;
});

// editor
KindEditor.ready(function(K) {
    K.create('#BlockContentCn', {
        allowFileManager : true
        // items : ['source', '|', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                 // 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 
                 // 'clearhtml', 'quickformat', '/',
                 // 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                 // 'italic', 'removeformat', '|', 'image',
                 // 'flash']
    });
    K.create('#BlockContentEn', {
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
