$(function(){
	
if (!$('#BrandTitle').val()) {
	$('#BrandTitle').val('品牌名称');
}
$('#BrandTitle').focus(function(){
    $(this).val('');	
});

if (!$('#EventTitle').val()) {
    $('#EventTitle').val('活动名称');
}
$('#EventTitle').focus(function(){
    $(this).val('');    
});

$('.btnSearch').click(function(){
	if ($(this).prev('input').val() == '品牌名称' || $(this).prev('input').val() == '活动名称') {
		$(this).prev('input').val('');
	}
	$(this).parent('form').submit();
	return false;
});

$(".activitiesList a").colorbox({iframe:true, width:'722', height:'510'});

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

$('.page a').live('click', function(){
    var $this = $(this);
    $.get($this.attr('href'), function(data){
        var page = $('li.current').text();        
        var num = parseInt($this.text());

        var paginate = $('.page', data).html();
        $('.page').html(paginate);
        
        var css = $this.attr('class');
        var content = $('#right #result_content ul', data);
        var current = $('#right #result_content ul');
        if (css=='first' || css=='previous' || num < page) { //left rotate
            content.css('margin-left', -760);
            current.before(content).animate({marginLeft:760}, {duration:'normal'});
        } else if (css=='last' || css=='next' || num > page) { //right rotate            
            content.css('margin-left', 760);
            current.after(content).animate({marginLeft:-760}, {duration:'normal'});
        } 
        content.animate({marginLeft:0}, {duration:'normal', complete:function(){                
            current.remove();
        }});
		$(".activitiesList a").colorbox({iframe:true, width:'722', height:'510'});		
    }, 'html');
    return false;
});	
	
});
