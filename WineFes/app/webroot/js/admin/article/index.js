$(function(){

// editor    
KindEditor.ready(function(K) {
    var editor = K.create('#ArticleContent', {
        allowFileManager : true
        // items : ['source', '|', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                 // 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 
                 // 'clearhtml', 'quickformat', '/',
                 // 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                 // 'italic', 'removeformat', '|', 'image',
                 // 'flash']
    });
    
    // clear
    $('a.del').click(function(){
        if (confirm('确认清除内容吗？')) {
            editor.html('')
        }
        return false;
    }); 
});

// submit
$('a.save').click(function(){
    $(this).prev('input').click();
    return false;
});    
    
});
