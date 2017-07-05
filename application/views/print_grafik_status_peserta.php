<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="<? echo base_url();?>assets/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
	<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url()."assets/js/highcharts.js"; ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" media="all">
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
                	<?php
                	foreach ($data as $key) {
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
              <img src="<?php echo base_url(); ?>assets/img/log.png" alt="" / style="float:left;" width="50px" height="50px;">
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
        Grafik Status siswa PKL
        </h4>

        <br>
        <br>
        <div align="center" id='grafik' class="l"></div>
    <input class="btn btn-primary frm" type="submit" name="submit" id="print" onclick="myFunction()">
</body>
</html>
