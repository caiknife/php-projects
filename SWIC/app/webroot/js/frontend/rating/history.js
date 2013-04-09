$(function(){
	
$('#history a').click(function(){
	if ($(this).hasClass('curr')) {
		return false;
	}
	$(this).addClass('curr');
	$(this).parent('li').siblings('li').find('a').removeClass('curr');
	$.get($(this).attr('href'), function(html){
		$('.historyBox').html(html);
	}, 'html');
	return false;
});	

$('#history a:first').click();

$('li.historyList').live('click', function(){
    var url = $(this).find('a').attr('href');
    self.location = url;
});
	
});