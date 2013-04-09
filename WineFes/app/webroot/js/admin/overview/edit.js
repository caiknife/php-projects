$(function(){

// editor    
KindEditor.ready(function(K) {
    K.create('#BlockContent', {
        allowFileManager : true
        // items : ['source', '|', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                 // 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 
                 // 'clearhtml', 'quickformat', '/',
                 // 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                 // 'italic', 'removeformat', '|', 'image',
                 // 'flash']
    });
});

// submit
$('a.save').click(function(){
    $(this).prev('input').click();
    return false;
});

// clear
$('a.del').click(function(){
    var $this = $(this);
    if (confirm('确认删除吗？')) {
        $.get($this.attr('href'), function(text){
            if (text) {
                self.location = '/admin/overview';
            }
        }, 'text');
    }
    return false;    
});     
    
});
