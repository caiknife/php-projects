$(function(){

var validate_nickname = function(data) {
	var nickname_regex = /[~!@#$%^&*]/;
	if (data.match(nickname_regex)) {
		return 2;
	} else if (data=='') {
		return 1;
	} else {
		return false;
	}
}
	
var validate_fullname = function(data) {
	var nickname_regex = /[~!@#$%^&*]/;
	if (data.match(nickname_regex)) {
		return 1;
	} else {
		return false;
	}
}

var validate_mobile = function(data) {
	var mobile_regex = /^\d{11}$/;
	if (data.match(mobile_regex) || data=='') {
		return false;
	} else {
		return 1;
	}
}

var validate_phone = function(data) {
	var phone_regex = /^\d{8}$/;
	if (data.match(phone_regex) || data=='') {
		return false;
	} else {
		return 1;
	}
}
$('#MemberNickname').blur(function(){
	var data = $.trim($(this).val()); var $this = $(this);
	$.post('/profile/valid', $.param({nickname:data}), function(text){
		var result = validate_nickname(data);
		if (!result && !text) {
			result = 3;
		}
		if (result) {
			$this.siblings('span.error').hide().eq(result-1).show();
			$this.siblings('span.correct').hide();
		} else {
			$this.siblings('span.error').hide();
			$this.siblings('span.correct').show();
		}
	}, 'text');
});
$('#MemberMobile').blur(function(){
	var data = $.trim($(this).val()); var $this = $(this);
	var result = validate_mobile(data);
	if (result) {
		$this.siblings('span.error').hide().eq(result-1).show();
	} else {
		$this.siblings('span.error').hide();
	}
});
$('#MemberPhone').blur(function(){
	var data = $.trim($(this).val()); var $this = $(this);
	var result = validate_phone(data);
	if (result) {
		$this.siblings('span.error').hide().eq(result-1).show();
	} else {
		$this.siblings('span.error').hide();
	}
});
$('a.confirm').click(function(){
	$('input[id^=Member]').blur();
	if ($('span.error:visible').length <= 0) {
		$.post('/profile/changeinfo', $('form.information').serialize(), function(text){
	  		if (text) {
				$('div.message').show();
			}
	   	}, 'text');
	}
	return false;
});

$("#btnMail").colorbox({inline:true});
$("#btnMail").click(function(){
	var result = $.ajax({async:false, type:'GET', url:'/profile/active'}).responseText;
	if (result) {
		return true;
	} else {
		return false;
	}
});
	
});
