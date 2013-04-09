$(function(){

$(".regSubmit .service a").colorbox({iframe:true, width:'700', height:'95%'});
$(".regSubmit .btnSumit").colorbox({inline:true});
$(".regLogin .aLogin").colorbox({inline:true});

$('.verification a').click(function(){
	var img = $(this).siblings('img');
	var pos = img.attr('src').indexOf('?');
	var url = pos > 0 ? img.attr('src').substr(0, pos) : img.attr('src');
	img.attr('src', url+'?'+Math.random()*10);
	return false;
});	

//validate
var validate_email = function(data) {
	var email_regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/i;
	if (data.match(email_regex)) {
		return false;
	} else if (data=='') {
		return 1;
	} else {
		return 2;
	}
}
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
var validate_captcha = function(data) {
	return false;
}

$('#MemberEmail').blur(function(){
	var data = $.trim($(this).val()); var $this = $(this);
	$.post('/login/valid', $.param({email:data}), function(text){
		var result = validate_email(data);
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
$('#MemberNickname').blur(function(){
	var data = $.trim($(this).val()); var $this = $(this);
	$.post('/login/valid', $.param({nickname:data}), function(text){
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
$('#MemberPassword').blur(function(){
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
$('#MemberPasswordConfirm').blur(function(){
	var data = $.trim($(this).val()); var $this = $(this);
	var password = $.trim($('#MemberPassword').val());
	var result = validate_password_confirm(data, password);
	if (result) {
		$this.siblings('span.error').hide().eq(result-1).show();
		$this.siblings('span.correct').hide();
	} else {
		$this.siblings('span.error').hide();
		$this.siblings('span.correct').show();
	}
});
$('#MemberCaptcha').blur(function(){
	var data = $.trim($(this).val()); var $this = $(this);
	$.get('/captcha/read', function(text){
		var result = data==text ? false : 1;
		if (result) {
			$this.siblings('span.error').hide().eq(result-1).show();
			$this.siblings('span.correct').hide();
		} else {
			$this.siblings('span.error').hide();
			$this.siblings('span.correct').show();
		}
	}, 'text')
});

// submit
$('a.btnSumit').click(function(){
	$('input[id^=Member]').blur();
	if ($('span.correct:visible').length >= 5 && $('span.error:visible').length <= 0 && $('input[name=agree]').is(':checked')) {
		var result = $.ajax({async:false, type:'POST', data:$('form[name=signup]').serialize()}).responseText;
		if (result) {
			$('input[id^=Member]').val('');
			$('span.correct').hide();
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
});

});
