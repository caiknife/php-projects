$(function(){
    
$('.switchBtn li').each(function(i){    
    $(this).click(function(){
        var $this = $(this);
        if ($(this).hasClass('curr')) {
            return false;
        }
        $(this).siblings('li').removeClass('curr');
        $(this).addClass('curr');
        $('.exponentIndex div.chart:eq('+i+')').show();
        $('.exponentIndex div.chart:eq('+i+')').siblings('div').hide();
        var postData = {type:$this.attr('type'), subtype:$this.attr('subtype')};
        $.post('/cn/home/wine', postData, function(html){
            $('.exponentLiquorList tbody').html(html);
        }, 'html')
        return false;
    });    
}).first().removeClass('curr').click().addClass('curr');

$('.exponentIndex div.chart').each(function(){
    var $this = $(this);
    var postData = {type:$this.attr('type'), subtype:$this.attr('subtype')};
    $.post('/cn/index/data', postData, function(json){
        var highchartsOptions = Highcharts.setOptions(Highcharts.theme);
        var chart = new Highcharts.Chart({
            chart: {renderTo: $this.attr('id'), type: 'line', marginRight: 0, marginBottom: 25},
            title: {text: '', x: -20},
            subtitle: {text: '', x: -20},
            xAxis: {categories: ['一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二']},
            yAxis: {
            	title: { text: '' },
            	min:80,
				max:140,
				tickInterval: 10,
            	plotLines: [{
            		value: 0,
            		width: 1,
            		color: '#808080'
            	}]
            },
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