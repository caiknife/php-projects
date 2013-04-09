Highcharts.theme = {
    colors: ['#1A5487', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
    chart: {
      backgroundColor: {
         linearGradient: [0, 0, 500, 500],
         stops: [
            [0, 'rgb(255, 255, 255)']
         ]
      },
      borderWidth: 0,
      plotBackgroundColor: 'rgba(255, 255, 255, .9)',
      plotShadow: true,
      plotBorderWidth: 1
   },
   plotOptions: {
        series: {
            color: "#1A5487",
            fillOpacity: 0.3,
            lineWidth: 2,
            marker: {
                radius: 3,
                lineWidth: 1,
                lineColor: "#FFFFFF" // inherit from series
            }
        }
    },
   title: {
      style: {
         color: '#999',
         font: 'bold 12px Tahoma,Arial,sans-serif',
      }
   },
   subtitle: {
      style: {
         color: '#999',
         font: 'bold 12px Tahoma,Arial,sans-serif'
      }
   },
   xAxis: {
      gridLineWidth: 1,
      lineColor: '#999',
      tickColor: '#999',
      labels: {
         style: {
            color: '#888',
            font: '11px Tahoma,Arial,sans-serif'
         }
      },
      title: {
         style: {
            color: '#333',
            fontWeight: 'bold',
            fontSize: '12px',
            fontFamily: 'Tahoma,Arial,sans-serif'
         }
      }
   },
   yAxis: {
      minorTickInterval: 'auto',
      lineColor: '#DCDCDC',
      lineWidth: 0,
      tickWidth: 1,
      tickColor: '#DCDCDC',
      labels: {
         style: {
            color: '#999',
            font: '11px Tahoma,Arial,sans-serif'
         }
      },
      title: {
         style: {
            color: '#999',
            fontWeight: 'bold',
            fontSize: '11px',
            fontFamily: 'Tahoma,Arial,sans-serif'
         }
      }
   },
   legend: {
      itemStyle: {
         font: '12px Tahoma,Arial,sans-serif',
         color: '#999'

      },
      itemHoverStyle: {
         color: '#999'
      },
      itemHiddenStyle: {
         color: 'gray'
      }
   },
   labels: {
      style: {
         color: '#999'
      }
   }
};