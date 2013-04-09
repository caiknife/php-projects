$(function(){
	
$('dt').toggle(function(){
	$(this).removeClass('open').addClass('close');
	$(this).next('dd').slideDown('slow');
	return false;
}, function(){
	$(this).removeClass('close').addClass('open');
	$(this).next('dd').slideUp('slow');
	return false;
});

$('.selectAll').toggle(function(){
	$(':checkbox:visible', $(this).parent().prev('ul')).attr('checked', true);
	return false;
}, function(){
	$(':checkbox:visible', $(this).parent().prev('ul')).attr('checked', false);
	return false;
});

$('.determine').click(function(){
	if($(':checked:visible', $(this).parent().prev('ul')).length <= 0) {
		return false;
	}
	var brands = {};
	$(':checked:visible', $(this).parent().prev('ul')).each(function(i){
		brands[i] = $(this).attr('name');
	});
	var params = {'brands':brands};
	$.post('/profile/connect', $.param(params), function(text){
		if (text) {
			$.get('/profile/subscribed', function(html){
				$('.submenu > li span').html($('.submenu > li span', html).html());
			}, 'html');
		}
    }, 'text');
	return false;
})	
	
});
