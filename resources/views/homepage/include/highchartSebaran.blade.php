<!-- High Chart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    {{-- Chart Bentuk PT --}}
    var bentukpt = {!! json_encode($bentukpt) !!};
    document.addEventListener('DOMContentLoaded', function() {
        Highcharts.chart('JumlahPerBentuk', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 4,
                    beta: 0,
                    depth: 70,
                    viewDistance: 25
                }
            },
            title: {
                text: 'Grafik Perguruan Tinggi Berdasarkan Bentuk Lembaga'
            },
            subtitle: {
                text: 'Jumlah Berdasarkan Bentuk Lembaga'
            },
            xAxis: {
                categories: bentukpt.map(item => item.namabentuk)
            },
            yAxis: {
                title: {
                    text: 'Jumlah Perguruan Tinggi'
                }
            },
            plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true,
                        align: 'center',
                        style: {
                            textOutline: false
                        }
                    },
                    borderWidth: 1,
                    borderColor: 'black',
                    depth: 25, // Jarak antar bar
                    colorByPoint: true
                }
            },
            colors: ['#f45b5b', '#7cb5ec', '#e4d354', '#90ed7d', '#8085e9', '#f7a35c', '#A9A9A9',
                '#696969', '#434348'
            ],
            series: [{
                name: 'Perguruan Tinggi',
                data: bentukpt.map(item => item.total)
            }],
            legend: {
                enabled: false
            }
        });
    });

    {{-- Chart Wilayah PT --}}
    var chartwilpt = {!! json_encode($chartwilpt) !!};
    document.addEventListener('DOMContentLoaded', function() {
        Highcharts.chart('JumlahWilayah', {
            chart: {
                type: 'bar',
                height: 1770,
                options3d: {
                    enabled: true,
                    alpha: 4,
                    beta: 0,
                    depth: 70,
                    viewDistance: 25
                }
            },
            title: {
                text: 'Grafik Perguruan Tinggi Berdasarkan Kabupaten/Kota'
            },
            subtitle: {
                text: 'Jumlah Berdasarkan Kabupaten/Kota'
            },
            xAxis: {
                categories: chartwilpt.map(item => item.nama_kota_kab)
            },
            yAxis: {
                title: {
                    text: 'Jumlah Perguruan Tinggi'
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true,
                        align: 'center',
                        style: {
                            textOutline: false
                        }
                    },
                    borderWidth: 1,
                    borderColor: 'black',
                    depth: 25, // Jarak antar bar
                    colorByPoint: true
                }
            },
            series: [{
                name: 'Perguruan Tinggi',
                data: chartwilpt.map(item => item.total)
            }],
            legend: {
                enabled: false
            }
        });
    });
</script>
<!-- End High Chart -->
