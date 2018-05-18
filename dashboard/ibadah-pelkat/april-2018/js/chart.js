Highcharts.chart('container', {
	chart: {
	    type: 'column'
	},
	title: {
	    text: 'Jumlah Kehadiran Ibadah Pelkat<br>Periode: April 2018'
	},
	subtitle: {
	    text: 'Source: GPIB Kharis Pulo Gebang'
	},
	xAxis: {
	    categories: [
	        'Minggu Pertama',
	        'Minggu Kedua',
	        'Minggu Ketiga',
	        'Minggu Keempat'
	    ],
	    crosshair: true
	},
	yAxis: {
	    min: 0,
	    title: {
	        text: 'Jumlah Kehadiran'
	    }
	},
	labels: {
        items: [{
            html: 'Total Kehadiran Jemaat bulan ini',
            style: {
                left: '50px',
                top: '18px',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
            }
        }]
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
	    name: 'PA',
	    color: '#F44336',
	    data: [50, 71, 106, 129]
	}, {
	    name: 'PT',
	    color: '#009688',
	    data: [83, 78, 98, 93]
	}, {
	    name: 'GP',
	    color: '#2196F3',
	    data: [42, 33, 34, 39]
	}, {
	    name: 'PKP',
	    color: '#9C27B0',
	    data: [42, 33, 34, 39]
	}, {
	    name: 'PKB',
	    color: '#795548',
	    data: [42, 33, 34, 39]
	}, {
	    name: 'PKLU',
	    color: '#FF9800',
	    data: [42, 33, 34, 39]
	}, {
        type: 'pie',
        name: 'Total',
        data: [{
            name: 'PA',
            y: 500,
            color: '#F44336'
        }, {
            name: 'PT',
            y: 458,
            color: '#009688'
        }, {
            name: 'GP',
            y: 200,
            color: '#2196F3'
        }, {
            name: 'PKP',
            y: 200,
            color: '#9C27B0'
        }, {
            name: 'PKB',
            y: 200,
            color: '#795548'
        }, {
            name: 'PKLU',
            y: 200,
            color: '#FF9800'
        }],
        center: [100, 80],
        size: 100,
        showInLegend: false,
        dataLabels: {
            enabled: true,
            format: '{y}'
        }
	}]
});