$(function(){
    
$.get('/cn/products/price/'+$('#WineId').val(), function(json){
    var highchartsOptions = Highcharts.setOptions(Highcharts.theme);
    var chart = new Highcharts.Chart({
        chart: {renderTo: 'container', type: 'line', marginRight: 0, marginBottom: 25},
        title: {text: '', x: -20},
        subtitle: {text: '', x: -20},
        xAxis: {categories: ['一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二']},
        yAxis: {
            title: { text: '' },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]},
        tooltip: {
            formatter: function() {
                return '<b>'+ this.series.name +'</b><br/>'+this.x +': '+ this.y +'元';
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
        series: [{name: '价格', type:'area', data: json.data}],
        credits: {enabled:false}
    });
}, 'json');    
    
});