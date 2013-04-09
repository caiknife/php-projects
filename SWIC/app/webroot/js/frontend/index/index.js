$(function(){
var count = 0;
$('a.btnLeft').click(function(){
    if (count==0) {
        return false;
    }
    count--;
    $('.switch strong:eq('+count+')').click();
    return false; 
});

$('a.btnRight').click(function(){
    if (count>=$('.switch strong').size()) {
        return false;
    }
    count++;
    $('.switch strong:eq('+count+')').click();
    return false; 
});

$('.switch strong').each(function(i){    
    $(this).click(function(){
        if ($(this).hasClass('curr')) {
            return false;
        }
        count = i;
        $(this).siblings('strong').removeClass('curr');
        $(this).addClass('curr');
        $('.indexIntroduction .info:eq('+i+')').siblings('div').hide();
        $('.indexIntroduction .info:eq('+i+')').show();
        return false;
    });
}).first().removeClass('curr').click().addClass('curr');
    
$('.indexCenterTop .info div.chart').each(function(){
    var $this = $(this);
    var postData = {type:$this.attr('type'), subtype:$this.attr('subtype')}
    $.post('/cn/index/data', postData, function(json){
        var highchartsOptions = Highcharts.setOptions(Highcharts.theme);
        var chart = new Highcharts.Chart({
            chart: {renderTo: $this.attr('id'), type: 'line', marginRight: 0, marginBottom: 20},
            title: {text: '', x: -20},
            subtitle: {text: '', x: -20},
            xAxis: {categories: ['一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二']},
            yAxis: {
            	title: { text: '' },
            	min:80,
				max:140,
				tickInterval: 10,
            	plotLines:[{
            		value: 0,
            		width: 1,
            		color: '#808080'
            	}]},
            //yAxis: {enabled: false},
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+this.x +': '+ this.y +'点';
                }
            },
            legend: {enabled: false},
            plotOptions: {
				series: {
					color: "#1A5487",
					fillOpacity: 0.3,
					lineWidth: 1,
					marker: {
						radius: 3,
						lineWidth: 1,
						lineColor: "#FFFFFF" // inherit from series
					}
				}
			},
            series: [{name: $this.attr('data'), type:'area', data: json.data}],
            credits: {enabled:false}
        });
    }, 'json');
});

});