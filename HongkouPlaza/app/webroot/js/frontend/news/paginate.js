$(function(){
	
$(".newsList a.img,.newsList h3 a,.newsList a.more").colorbox({iframe:true, width:'700', height:'95%'});

//$('.page a').live('click', function(){
//    var $this = $(this);
//    if ($this.attr('href')=='#') {
//        return false;
//    }
//    $.get($this.attr('href'), function(data){
//        var page = $('li.current').text();        
//        var num = parseInt($this.text());
//
//        var paginate = $('.page', data).html();
//        $('.page').html(paginate);
//        
//        var css = $this.attr('class');
//        var content = $('#right .newsList ul', data);
//        var current = $('#right .newsList ul');
//        if (css=='first' || css=='previous' || num < page) { //left rotate
//            content.css('margin-left', -760);
//            current.before(content).animate({marginLeft:760}, {duration:'normal'});
//        } else if (css=='last' || css=='next' || num > page) { //right rotate            
//            content.css('margin-left', 760);
//            current.after(content).animate({marginLeft:-760}, {duration:'normal'});
//        } 
//        content.animate({marginLeft:0}, {duration:'normal', complete:function(){                
//            current.remove();
//        }});
//		$(".newsList a").colorbox({iframe:true, width:'700', height:'95%'});
//    }, 'html');
//    return false;
//});	
	
});
