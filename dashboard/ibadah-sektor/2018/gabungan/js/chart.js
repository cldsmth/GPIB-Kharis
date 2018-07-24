Highcharts.chart('container', {
	chart: {
	    type: 'column'
	},
	title: {
	    text: 'Jumlah Kehadiran Ibadah Sektor Gabungan<br>Tahun 2018'
	},
	subtitle: {
	    text: 'Source: GPIB Kharis Pulo Gebang'
	},
	xAxis: {
	    categories: [
	        '30-May-2018',
	        '27-Jul-2018'
	    ],
	    crosshair: true
	},
	yAxis: {
	    min: 0,
	    title: {
	        text: 'Jumlah Kehadiran'
	    }
	},
	tooltip: {
	    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	        '<td style="padding:0"><b>{point.y} Jemaat</b></td></tr>',
	    footerFormat: '</table>',
	    shared: true,
	    useHTML: true
	},
	plotOptions: {
	    column: {
	        pointPadding: 0.2,
	        borderWidth: 0,
	        dataLabels: {
                enabled: true
            }
	    }
	},
	series: [{
	    name: 'Gabungan',
	    data: [45, 43]
	}]
});