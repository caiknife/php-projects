$(function(){

// submit
$('a.save').click(function(){
    $(this).prev('input').click();
    return false;
}); 


// delete    
$('a.del').click(function(){
    if (confirm("确定要删除吗？")) {
        var id = $('#LinkId').val();
        var url = '/admin/link/delete/'+id;
        $.get(url, function(text){
            if (text > 0) {
                self.location = '/admin/link/index';
            }
        }, 'text');
    }
    return false;
});    

// editor
KindEditor.ready(function(K) {
    K.create('#LinkContent', {
        allowFileManager : true,
        items : ['source', '|', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 
                 'clearhtml', 'quickformat', '/',
                 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                 'italic', 'removeformat', '|', 'image',
                 'flash']
    });
});    
    
});
