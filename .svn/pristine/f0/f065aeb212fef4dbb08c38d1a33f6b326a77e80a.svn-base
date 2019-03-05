		$(document).ready(function(){

			Highcharts.chart('bar-chart', {
			    chart: {
			        type: 'areaspline'
			    },
			    title: {
			        text: 'Credit Information'
			    },
			    legend: {
			        layout: 'vertical',
			        align: 'left',
			        verticalAlign: 'top',
			        x: 150,
			        y: 100,
			        floating: true,
			        borderWidth: 1,
			        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
			    },
			   
			    yAxis: {
			        title: {
			            text: 'Fruit units'
			        }
			    },
			    tooltip: {
			        shared: true,
			        valueSuffix: ' units'
			    },
			    credits: {
			        enabled: false
			    },
			    plotOptions: {
			        areaspline: {
			            fillOpacity: 0.5
			        }
			    },
			    series: [{
			        name: 'Available Credit Limit',
			        data: [3, 4, 3, 5, 4, 10, 12]
			    }, {
			        name: 'Used Credit Limit',
			        data: [1, 3, 4, 3, 3, 5, 4]
			    }]
			});

			Highcharts.chart('donut-chart', {
			    chart: {
			        type: 'pie',
			        options3d: {
			            enabled: true,
			            alpha: 45
			        }
			    },
			    title: {
			        text: 'Bookings'
			    },
			    
			    plotOptions: {
			        pie: {
			            innerSize: 100,
			            depth: 45
			        }
			    },
			    series: [{
			        name: 'Delivered amount',
			        data: [
			            ['Confirmed', 5],
			            ['Inproceess Cancel', 8],
			            ['On Request', 6],
			            ['Rejected', 4],
			            ['Vouchered', 4],
			            ['Cancelled', 4]

			        ]
			    }]
			});


		});
