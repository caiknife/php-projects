$(function(){
	
$('.braDel').click(function(){
	var $this = $(this);
	if (confirm("确定删除吗？")) {
		$.get($this.attr('href'), function(text){
            if (text) {
                $this.parent('li').remove();
				$.get('/profile/subscribed', function(html){
					$('.submenu > li span').html($('.submenu > li span', html).html());
			}, 'html');
            }
        }, 'text');
	}
	return false;
});

});
