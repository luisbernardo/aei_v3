var funcao = function () {

    $('#container').highcharts({

        chart: {
            polar: true,
            type: 'line'
        },

        title: {
            text: 'Nível de Cobertura MIEGSI',
            x: -80
        },

        pane: {
            size: '90%'
        },

        xAxis: {
            categories: ['ADER', 'CCSI', 'TVSI', 'PEITI','GPSI', 'PASI'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },



        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0
        },

        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}%</b><br/>'
        },

        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 70,
            layout: 'vertical'
        },

        series: [{
            name: 'Atos de Profissão',
            data: [100, 100, 100, 100, 100, 50],
            pointPlacement: 'on'
        }, ]

    });
};
