$(function(){

var fields = [
    '参展商', '地址', '联系人', '座机', '手机', '经营范围'
];

// reset    
$('button.reset').click(function(){
    $(':input').val('');
    return false;    
}); 

// submit
$('button.submit').click(function(){
    var dataError = false;
    $(':input[valid=1]').each(function(i){
        if (!$(this).val()) {
            alert('请填写'+fields[i]+'！');
            dataError = true;
            return false;
        }
    });
    if (dataError) {
        return false;
    }
    $.post($('form').attr('action'), $('form').serialize(), function(text){
        if (text) {
            alert('提交成功！');
            $('button.reset').click();
        } else {
            alert('提交失败！');
        }
    }, 'text');
    return false;
});
    
});
