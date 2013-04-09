$(function(){

if ($('#TopicIsDisplay').val()=='0') {
    $(':radio').attr('checked', false);
}
    
// delete
$('a.del').click(function(){
    var $this = $(this);
    if (confirm("确定要删除吗？")) {
        $.get($this.attr('href'), function(text){
            if (text > 0) {
                self.location = '/admin/topic/index';
            }
        }, 'text');
    }
    return false;
});

//validate
var validateForm = function(){
    var result = true;
    // text box
    $(':input[require=1]').each(function(){
        if (!$.trim($(this).val())) {
            result = false;
            alert($(this).attr('message'));
            return false;
        }
    });
    
    // radio box
    var types = ['Lang'];
    var alerts = ['请选择语言！'];
    for (t in types) {
        var count = 0;
        $(':radio[id^=Topic'+types[t]+']').each(function(i){
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

// save
$('a.save').click(function(){
    var result = validateForm();
    if (!result) {
        return false;
    }
    var $that = $('#TopicBanner');
    var $file = $('#topic_file');
    if ($file.length > 0) {
        // if ($that.val()!='') {
            // var pos = $that.val().lastIndexOf(".");
            // var lastname = $that.val().substring(pos, $that.val().length); 
            // if (lastname.toLowerCase()!=".doc" && lastname.toLowerCase()!=".docx" && lastname.toLowerCase()!=".pdf"){
                // alert("您上传的文件类型为"+lastname+"，必须为doc、docx、pdf类型");
                // return false;
            // }
        // }
    } else {
        if ($that.val()=='') {
            alert('请上传文件！');
            return false;
        }
        // var pos = $that.val().lastIndexOf(".");
        // var lastname = $that.val().substring(pos, $that.val().length); 
        // if (lastname.toLowerCase()!=".doc" && lastname.toLowerCase()!=".docx" && lastname.toLowerCase()!=".pdf"){
            // alert("您上传的文件类型为"+lastname+"，必须为doc、docx、pdf类型");
            // return false;
        // }
    }
    
    $(':submit').click();
    return false;
});

//datetimepicker     
$('#TopicTopicDate').datetimepicker({
    showOn : 'both',
    showButtonPanel: true,
    numberOfMonths: 3,
    buttonImage: '/images/time.png',
    buttonImageOnly: true
});
    
});
