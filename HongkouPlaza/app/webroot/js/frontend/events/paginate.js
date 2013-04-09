$(function(){
    
$(".activitiesList a").colorbox({iframe:true, width:'722', height:'510'});
$(".alogo a").colorbox({iframe:true, width:'722', height:'510'});

$.get('/events/calendar', function(data){
    function getDateInfo(date, wantsClassName){
        var as_number = Calendar.dateToInt(date);
        for (i in calendar) {
            if (as_number >= parseInt(calendar[i][0]) && as_number <= parseInt(calendar[i][i])) {
                return {klass: "act"};            
            }
        }
    }
    
    function calendarSelect() {
        var date = Calendar.printDate(Calendar.intToDate(this.selection.get()), '%Y-%m-%d');
        url = '/events/now/day:'+date;
        $.get(url, function(data){
            $('#right').html($('#right', data).html());
            $(".activitiesList a").colorbox({iframe:true, width:'722', height:'510'});
            $(".alogo a").colorbox({iframe:true, width:'722', height:'510'});
            $('ul.submenu li').removeClass('curr');
        }, 'html');
    }
    var calendar = data;
    var cal = Calendar.setup({
        cont     : "cont",
        dateInfo : getDateInfo,
        onSelect : calendarSelect
    });    
}, 'json');


    
$('.page a').live('click', function(){
    var $this = $(this);
	if ($this.attr('href')=='#') {
        return false;
    }
    $.get($this.attr('href'), function(data){
        var page = $('li.current').text();        
        var num = parseInt($this.text());

        var paginate = $('.page', data).html();
        $('.page').html(paginate);
        
        var css = $this.attr('class');
        var content = $('#right #event_content ul', data);
        var current = $('#right #event_content ul');
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
		$(".alogo a").colorbox({iframe:true, width:'722', height:'510'});
    }, 'html');
    return false;
});
    
});