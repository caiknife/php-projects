$(function(){
	
$('a.subscribe, a.subscribed').live('click', function(){
	var $this = $(this);
	$.get($this.attr('href'), function(text){
		if (text) {
			var klass = $this.attr('class');
			if (klass=='subscribe') {
				var nextKlass = 'subscribed';
				var nextUrl = $this.attr('href').replace(/\/subscribe\//, '/unsubscribe/');
			} else {
				var nextKlass = 'subscribe';
				var nextUrl = $this.attr('href').replace(/\/unsubscribe\//, '/subscribe/');
			}
			$this.removeClass(klass).addClass(nextKlass).attr('href', nextUrl);
		}
	}, 'text');
	return false;
});	
	
});
