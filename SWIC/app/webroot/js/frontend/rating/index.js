$(function(){
	
$('.switchYear a').click(function(){
	if ($(this).hasClass('curr')) {
		return false;
	}
	$(this).addClass('curr').siblings('a').removeClass('curr');
	$.get($(this).attr('data'), function(html){
		$('.historyBox').html(html);
	}, 'html');
	return false;
});

$('.switchYear a:first').click();
	
});