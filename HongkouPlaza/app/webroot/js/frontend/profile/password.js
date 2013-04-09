$(function(){

var validate_old_password = function(data) {
	if (data=='') {
		return 1;
	}
	var result = $.ajax({async:false, type:'POST', url:'/profile/checkpassword', data:$('form.information').serialize()}).responseText;
	if (result) {
		return false;
	} else {
		return 2;
	}
}

var validate_password = function(data) {
    if (data=='') {
        return 1;
    } else if (data.length < 6) {
        return 2
    } else if (data.length > 14) {
        return 3
    }
    return false;
}
var validate_password_confirm = function(data, password) {
    if (data == '') {
        return 1;
    } else if (data != password) {
        return 2;
    }
    return false;
}
	
$('#MemberOldPassword').blur(function(){
	var data = $.trim($(this).val()); var $this = $(this);
    var result = validate_old_password(data);
    if (result) {
        $this.siblings('span.error').hide().eq(result-1).show();
        $this.siblings('span.correct').hide();
    } else {
        $this.siblings('span.error').hide();
        $this.siblings('span.correct').show();
    }
});	
$('#MemberNewPassword').blur(function(){
    var data = $.trim($(this).val()); var $this = $(this);
    var result = validate_password(data);
    if (result) {
        $this.siblings('span.error').hide().eq(result-1).show();
        $this.siblings('span.correct').hide();
    } else {
        $this.siblings('span.error').hide();
        $this.siblings('span.correct').show();
    }
}); 
$('#MemberNewPasswordConfirm').blur(function(){
    var data = $.trim($(this).val()); var $this = $(this);
    var password = $.trim($('#MemberNewPassword').val());
    var result = validate_password_confirm(data, password);
    if (result) {
        $this.siblings('span.error').hide().eq(result-1).show();
        $this.siblings('span.correct').hide();
    } else {
        $this.siblings('span.error').hide();
        $this.siblings('span.correct').show();
    }
});

$('a.confirm').click(function(){
	$('input[id^=Member]').blur();
    if ($('span.correct:visible').length >= 3 && $('span.error:visible').length <= 0) {
		$.post('/profile/changepassword', $('form.information').serialize(), function(text){
	  		if (text) {
				$('div.message').show();
				$('input[id^=Member]').val('');
			}
	   	}, 'text');
	}
	return false;
}); 
});
