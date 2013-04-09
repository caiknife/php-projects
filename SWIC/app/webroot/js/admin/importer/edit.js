$(function(){
    
$('a.save').click(function(){
    $('form').submit();
    return false;
});    

$('a.del').click(function(){
    if (confirm("确定要删除吗？")) {
        var id = $('#ImporterId').val();
        var url = '/admin/importer/delete/'+id;
        $.get(url, function(text){
            if (text > 0) {
                self.location = '/admin/importer/index';
            }
        }, 'text');
    }
    return false;
});    
    
});