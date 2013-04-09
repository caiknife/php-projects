$(function(){

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

$('#NewsDate').datepicker({
    showOn : 'both',
    showButtonPanel: true,
    numberOfMonths: 3,
    buttonImage: '/img/admin/time.png',
    buttonImageOnly: true
});
    
});