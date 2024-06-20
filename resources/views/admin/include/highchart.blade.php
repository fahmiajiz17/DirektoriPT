<!-- High Chart -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <script>

    {{-- Chart Akreditasi PT --}}
    var akred_pt = {!! json_encode($akred_pt) !!};
    document.addEventListener('DOMContentLoaded', function() {
      Highcharts.chart('JumlahPeringkatApt', {
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
          text: 'Grafik Akreditasi Perguruan Tinggi'
        },
        subtitle: {
          text: 'Jumlah Berdasarkan Akreditasi Perguruan Tinggi'
        },
        xAxis: {
          categories: akred_pt.map(item => item.peringkat_aipt)
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
        colors: ['#f45b5b', '#7cb5ec', '#e4d354', '#90ed7d', '#8085e9', '#f7a35c', '#A9A9A9', '#696969', '#434348'],
        series: [{
          name: 'Perguruan Tinggi',
          data: akred_pt.map(item => item.total)
        }],
        legend: {
          enabled: false
        }
      });
    });

    {{-- Chart Akreditasi Prodi --}}
    var akred_prodi = {!! json_encode($akred_prodi) !!};
    document.addEventListener('DOMContentLoaded', function() {
      Highcharts.chart('JumlahAkreditasiProdi', {
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
          text: 'Grafik Akreditasi Program Studi'
        },
        subtitle: {
          text: 'Jumlah Berdasarkan Akreditasi Program Studi'
        },
        xAxis: {
          categories: akred_prodi.map(item => item.peringkat_akreditasi_banpt)
        },
        yAxis: {
          title: {
            text: 'Jumlah Program Studi'
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
            depth: 25, // Jarak antar bar
            colorByPoint: true
          }
        },
        colors: ['#f45b5b', '#7cb5ec', '#e4d354', '#90ed7d', '#8085e9', '#f7a35c', '#A9A9A9', '#696969', '#434348'],
        series: [{
          name: 'Perguruan Tinggi',
          data: akred_prodi.map(item => item.total)
        }],
        legend: {
          enabled: false
        }
      });
    });

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
        colors: ['#f45b5b', '#7cb5ec', '#e4d354', '#90ed7d', '#8085e9', '#f7a35c', '#A9A9A9', '#696969', '#434348'],
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
    var wilayahpt = {!! json_encode($wilayahpt) !!};
    document.addEventListener('DOMContentLoaded', function() {
      Highcharts.chart('JumlahPerProvinsi', {
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
          text: 'Grafik Perguruan Tinggi Berdasarkan Wilayah'
        },
        subtitle: {
          text: 'Jumlah Perguruan Tinggi Berdasarkan Wilayah'
        },
        xAxis: {
          categories: wilayahpt.map(item => item.nama_provinsi)
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
        colors: ['#f45b5b', '#7cb5ec', '#e4d354', '#90ed7d', '#8085e9', '#f7a35c', '#A9A9A9', '#696969', '#434348'],
        series: [{
          name: 'Perguruan Tinggi',
          data: wilayahpt.map(item => item.total)
        }],
        legend: {
          enabled: false
        }
      });
    });
  </script>
  <!-- End High Chart -->