var chart;
$(function(){
 
$.get('/cn/index/purchasedata', function(json){
    
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        credits: {enabled:false},
        title: {
            text: ''
        },
        tooltip: {
            formatter: function() {
                return '<b>'+ this.point.name +'</b>: '+ parseFloat(this.percentage) +' %';
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ parseFloat(this.percentage) +' %';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '',
            data: json.data
        }]
    });
}, 'json')    
    
});