$(function(){
	
$("#header .aLogin, #loginBox .btnLogin, #promptBox .aLogin, #passwordBox .aLogin, #loginBox .forgotPassword, #forgotPassword .aLogin").colorbox({inline:true});

$('#loginBox .btnLogin').click(function(){
	var result = $.ajax({async:false, type:'POST', url:'/login/signin', data:$('form[name=login]').serialize()}).responseText;
	if (!result) {
		return true;
	} else {
		$(this).attr('href', '#successBox');
		return true;
	}
});

$('#forgotPassword .aLogin').click(function(){
	if ($('#ForgotEmail').val()!='') {
		var result = $.ajax({async:false, type:'POST', url:'/login/resetpassword', data:$('form[name=forgot]').serialize()}).responseText;
		if (result) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
});	

$('#SearchKeyword').keyup(function(){
	var $this = $(this);
	var keyword = $.trim($this.val());
	$this.next('span').show();
	$('div.search').addClass('search_curr');
	if (keyword != '') {
		$.post('/search/quicksearch', $('form[name=search]').serialize(), function(html){
			$('div.result').html(html).show();
			$this.next('span').hide();
			$('div.search').removeClass('search_curr');	
		}, 'html')
	} else {
		$this.next('span').hide();
		$('div.search').removeClass('search_curr');				
	}
});

$(window).click(function(){
	$('div.result').hide();
});
	
});
