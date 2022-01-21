
<link rel="stylesheet" href="{{ asset('template') }}/css/tabel.css">


{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}

<style>
    .center {
    text-align: center
    }
</style>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="chartPortofolio"></div>
    </div>
</div>





<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartPortofolio', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Diagram Portofolio Mahasiswa'
    },
    subtitle: {
        text: 'Penermia Beasiswa STEI SEBI'
    },
    xAxis: {
        categories: [
            'Kekhasan Beasiswa',
            'Kepesertaan Forum Akademis',
            'Publikasi Karya Tulis',
            'Keaktifan Mentroing',
            'Organisasi Mahasiswa Kepanitiaan',
            'Prestasi Kompetisi',
            'Sosial Kemasyarakatan',
            'Kelulusan Tahsin/Tahfiz',
            'Prestasi Akademik'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah',
        data: [<?php echo $jumlah; ?>, <?php echo $jumlah2; ?>, <?php echo $jumlah3; ?>,
        <?php echo $jumlah4; ?>, <?php echo $jumlah5; ?>, <?php echo $jumlah6; ?>, 
        <?php echo $jumlah7; ?>, <?php echo $jumlah8; ?>, <?php echo $jumlah9; ?>]

    }]
});
</script>