<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <title>Jumlah</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" media="all" title="no title" charset="utf-8">
    <script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.js"; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url()."assets/js/highcharts.js"; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" media="print">
   <script type="text/javascript">
     function myFunction() {
      document.getElementById("print").style.visibility = 'hidden';
      window.print();
}
   </script>
    <script>
$(function () {

    var chart1; // globally available
        $(document).ready(function() {

      chart1 = new Highcharts.Chart({
            chart: {
                renderTo:'grafik',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },

            series: [{
                name: 'Total',
                colorByPoint: true,
                data:
                [
                    <?php foreach ($sekolah_daerah as $key) {?>
                    {
                        name :<?php echo "'".$key['nama_provinsi']."',";?>
                        y : <?php echo $key['jumlah'];?>
                    },

                    <?php
                    }
                    ?>
                ]
            }]
        });
    });
});
    </script>

    <script>

        var chart1; // globally available
        $(document).ready(function() {
      chart1 = new Highcharts.Chart({
            chart: {
                renderTo:'grafik2',
                type: 'line'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                <?php
                foreach ($pertahun as $key) {
                    echo "'".$key['tahun']."',";
                }
                 ?>
                 ]
            },
        tooltip: {
            valueSuffix: '%'
        },
            yAxis: {
                            allowDecimals:false,
                title: {
                    text: 'Jumlah'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series:
            [
                 {
                    name:'Peserta',
                    data:[
                    <?php
                    foreach ($pertahun as $key) {
                        echo $key['jumlah_tahunan'].", ";
                    }
                     ?>
                    ]
                },
            ]
        });
    });
    </script>

    <script>
$(function () {

    var chart1; // globally available
        $(document).ready(function() {
      chart1 = new Highcharts.Chart({
            chart: {
                renderTo:'grafik3',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data:
                [
                    <?php
                    foreach ($jumlah_pl as $key) {
                        $laki = $key['laki_laki'];
                        $perempuan = $key['perempuan'];
                    }
                    ?>
                    {
                        name: 'Laki - Laki',
                        y: <?php echo $laki; ?>
                    },
                    {
                        name: 'Perempuan',
                        y: <?php echo $perempuan; ?>
                    }
                ]
            }]
        });
    });
});
    </script>
    <script>
$(function () {

    var chart1; // globally available
        $(document).ready(function() {
      chart1 = new Highcharts.Chart({
            chart: {
                renderTo:'grafik4',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data:
                [
                    <?php
                    foreach ($status as $key) {
                        $masih = $key['masih_pkl'];
                        $belum = $key['belum_pkl'];
                        $selesai = $key['selesai'];
                    }
                    ?>
                    {
                        name: 'Masih PKL',
                        y: <?php echo $masih; ?>
                    },
                    {
                        name: 'Belum PKL',
                        y: <?php echo $belum; ?>
                    },
                    {
                        name: 'Telah selesai PKL',
                        y: <?php echo $selesai; ?>
                    }
                ]
            }]
        });
    });
});
    </script>
    <style type="text/css">
    .l{
        width: 1000px;
    }
    </style>
</head>
<body>
<div class="">
        <div class="">

          <br>

          <div class="col-md-12">
            <div class="col-md-2">
              <img src="<?php echo base_url(); ?>assets/img/log.png" alt="" style="float:left;" width="50px" height="50px;">
            </div>

            <div class="col-md-8">
              <h3 align="center">
                Universitas Pendidikan Indonesia
              </h3>
            </div>

            <div class="col-md-2">
              &nbsp;
            </div>

          </div>

          <h5 align="center">
            Alamat: Jl. Dr Setiabudhi No. 229, Kota Bandung, Jawa Barat 40154 Telepon: (022) 2013163

          </h5>

        </div>
        <hr>
        <h3 align="center">
            Laporan Sistem Informasi Prakerin
        </h3>
        <h4 align="center">
            Diagram Sekolah Perprovinsi
        </h4>
        <br>
        <div align="center" id='grafik' class="l"></div>
        <div>
            <?php
            foreach ($sekolah_daerah as $key) {
                 echo "<b>Provinsi : </b>".$key['nama_provinsi']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Jumlah : </b>".$key['jumlah']."<br>";
            }
            ?>
        </div>
        <br>
        <h4 align="center">
             Diagram Perbandingan Jenis kelamin Peserta
        </h4>
        <br>
        <div align="center" id='grafik3' class="l"></div>
        <div>
           <?php
                foreach ($jumlah_pl as $key) {
                    $laki = $key['laki_laki'];
                    $perempuan = $key['perempuan'];
                }
            ?>
            <b>Laki Laki : </b><?php echo $laki; ?><br>
            <b>perempuan : </b><?php echo $perempuan; ?>
        </div>
         <br>
         <br>
         <br>
        <h4 align="center">
             Grafik Status siswa PKL
        </h4>
        <div align="center" id='grafik4' class="l"></div>
        <div>
            <?php
                foreach ($status as $key) {
                    $masih = $key['masih_pkl'];
                    $belum = $key['belum_pkl'];
                    $selesai = $key['selesai'];
                }
            ?>
            <b>Masih PKL : </b><?php echo $masih;?><br>
            <b>Belum PKL : </b><?php echo $belum;?><br>
            <b>Selesai PKL : </b><?php echo $selesai;?><br>
        </div>
        <br>
        <h4 align="center">
             Grafik Peserta Pertahun
        </h4>
        <br>
        <div align="center" id='grafik2' class="l"></div>
        <div>
            <?php
                foreach ($pertahun as $key) {
                    echo "<b>Tahun :</b> ".$key['tahun']."&nbsp&nbsp<b>Jumlah :</b> ".$key['jumlah_tahunan'];
                }
            ?>
        </div>
    <input class+"btn btn=primary frm" type="submit" name="submit" id="print" onclick="myFunction()">
</body>
</html>
