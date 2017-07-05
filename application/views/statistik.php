	<script>
			$(function () {
				var chart1; // globally available

				$(document).ready(function() {
					chart1 = new Highcharts.Chart({
						chart:
						{
							renderTo:'grafik_daerah',
							plotBackgroundColor: null,
							plotBorderWidth: null,
							plotShadow: false,
							type: 'pie'
						},

						title:
						{
							text: 'Grafik Sekolah Berdasarkan Provinsi'
						},

						tooltip:
						{
							pointFormat: '{series.name}: <b>{point.percentage}%</b>'
						},

						plotOptions:
						{
							pie:
							{
								allowPointSelect: true,
								cursor: 'pointer',
								dataLabels:
								{
									enabled: false
								},

									showInLegend: true
								}
								},
								series: [{name: 'Total',colorByPoint: true,data:[<?php foreach ($daerah as $key) {?>{name :<?php echo "'".$key['nama_provinsi']."',";?>y : <?php echo $key['jumlah'];?>},<?php } ?>
								]
								}]
						});
				});
		});
	</script>
	<script>
		$(function() {

			var chart1; // globally available
			$(document).ready(function() {
				chart1 = new Highcharts.Chart({
					chart: {
								renderTo:'grafik_status',
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false,
								type: 'pie'
						},
						title: {
								text: 'Grafik Peserta Berdasarkan Status'
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
	<script>
		var chart1; // globally available
		$(document).ready(function() {
			chart1 = new Highcharts.Chart({
					chart: {
						renderTo:'grafik_pertahun',
							type: 'line'
					},
					title: {
							text: 'Jumlah Data Peserta PKL Tahunan'
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
								renderTo:'grafik_pl',
										plotBackgroundColor: null,
										plotBorderWidth: null,
										plotShadow: false,
										type: 'pie'
								},
								title: {
										text: 'Grafik Peserta Berdasarkan Jenis Kelamin'
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
											foreach ($pl as $key) {
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
	$(document).ready(function(){
	$('.close').click(close);
	});

	function close(){
	location.reload();
	}

	$("#menu-toggle").click(function(e) {
			$("#wrapper").toggleClass("toggled");
	});

	$(document).ready(function(){
		setTimeout(function(){
			$('body').addClass('loaded');
			$('h1').css('color','#222222')
		}, 1000);
	});

	function menu(){
		$("#CollapseTahun").show();
	}

	function tahun(){
		$("#grafik").attr('src', '<?php echo base_url();?>chartz/peserta_pertahun');
	}

	function jk(){
		$("#grafik").attr('src', '<?php echo base_url();?>chartz/peserta_pl');
	}

	function status(){
		$("#grafik").attr('src', '<?php echo base_url();?>chartz/status_peserta');
	}

	function daerah(){
		$("#grafik").attr('src', '<?php echo base_url();?>chartz/daerah_sekolah');
	}
</script>

	<div class="col-md-12">
			<div class="col-md-4" style="margin:0; padding:0;">
				<h3 style="font-weight:900;"><a class="tip" href="<?php echo base_url();?>admin\kegiatan" title="Ke Berkas"><i class="fa fa-chevron-left"></i></a> STATISTIK <a class="tip" href="<?php echo base_url();?>admin\lihat_siswa" title="Ke Peserta"><i class="fa fa-chevron-right"></i></a></h3>
			</div>
			<div class="col-md-8" style="margin:0; padding:0;">
				<div class="dropdown pull-right">
					<button class="btn btn-success frm" data-toggle="modal" data-target="#print_all"  aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-print"></i> PRINT
					</button>
				</div>
				<br><br>
			</div>
		</div>
	<br><br>
	<div class="col-md-12">
			<div class="col-md-12">
				<div class="modal-content frm">
					<div class="modal-header" style="background:#eee; color:#444;">
						TINJAUAN TAHUNAN
						<div class="pull-right">
							<a class="btn btn-secondary frm" data-toggle="modal" data-target="#print_pertahun" href="#"><i class="fa fa-print" aria-hidden="true"></i>	Print</a>
						</div>
					</div>

					<div class="modal-body" style="margin:10;">
						<div id='grafik_pertahun'></div>
					</div>

					<div class="modal-footer">
						<?php
                foreach ($jumlah_pertahun as $key) {
                    echo "<b>Tahun :</b> ".$key['tahun']." <b>Jumlah :</b> ".$key['jumlah_tahunan']." ";
                }
            ?>
					</div>
				</div>
				<br>
			</div>
			<div class="col-md-4">
				<div class="modal-content frm">
					<div class="modal-header" style="background:#eee; color:#444;">
						PROVINSI SEKOLAH
						<div class="pull-right">
							<a class="btn btn-secondary frm"  data-toggle="modal" data-target="#print_daerah" href="#"><i class="fa fa-print" aria-hidden="true"></i>	Print</a>
						</div>
					</div>

					<div class="modal-body">
						<div id='grafik_daerah'></div>
					</div>

					<div class="modal-footer">
						<?php
						foreach ($jumlah_daerah as $key) {
								 echo "<b>Provinsi : </b>".$key['nama_provinsi']." <b>Jumlah : </b>".$key['jumlah']." Sekolah"."<br>";
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="modal-content frm">
					<div class="modal-header" style="background:#eee; color:#444;">
						STATUS PESERTA
						<div class="pull-right">
							<a class="btn btn-secondary frm"  data-toggle="modal" data-target="#print_status" href="#"><i class="fa fa-print" aria-hidden="true"></i>	Print</a>
						</div>
					</div>

					<div class="modal-body">
						<div id='grafik_status'></div>
					</div>

					<div class="modal-footer">
						<?php
								foreach ($status as $key) {
										$masih = $key['masih_pkl'];
										$belum = $key['belum_pkl'];
										$selesai = $key['selesai'];
								}
						?>
						<b>Masih PKL : </b><?php echo $masih;?>
						<b>Belum PKL : </b><?php echo $belum;?>
						<b>Selesai PKL : </b><?php echo $selesai;?><br>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="modal-content frm">
					<div class="modal-header" style="background:#eee; color:#444;">
						JENIS KELAMIN
						<div class="pull-right">
							<a class="btn btn-secondary frm"  data-toggle="modal" data-target="#print_pl" href="#"><i class="fa fa-print" aria-hidden="true"></i>	Print</a>
						</div>
					</div>

					<div class="modal-body">
						<div id='grafik_pl'></div>
					</div>

					<div class="modal-footer">
						<?php
								 foreach ($jumlah_pl as $key) {
										 $laki = $key['laki_laki'];
										 $perempuan = $key['perempuan'];
								 }
						 ?>
						 <b>Laki Laki : </b><?php echo $laki; ?>
						 <b>Perempuan : </b><?php echo $perempuan; ?>
					</div>
				</div>
				<br>
			</div>
		</div>

	<div class="modal fade" id="print_chart" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Chart</div>
				</div>

				<div class="modal-body">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="<?php echo base_url()."chartz/print_chart/"?>" width="100%" height="100%"></iframe>
					</div>
				</div>

				<div class="modal-footer">
					<input class="btn btn-danger pull-right frm" type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="print_pertahun" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Chart</div>
				</div>

				<div class="modal-body">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="<?php echo base_url()."chartz/print_peserta_pertahun/"?>" width="100%" height="100%"></iframe>
					</div>
				</div>

				<div class="modal-zfooter">
					<input class="btn btn-danger pull-right frm" type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="print_daerah" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Chart</div>
				</div>

				<div class="modal-body">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="<?php echo base_url()."chartz/print_daerah_sekolah/"?>" width="100%" height="100%"></iframe>
					</div>
				</div>

				<div class="modal-footer">
					<input class="btn btn-danger pull-right frm" type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="print_pl" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Chart</div>
				</div>

				<div class="modal-body">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="<?php echo base_url()."chartz/print_peserta_pl/"?>" width="100%" height="100%"></iframe>
					</div>
				</div>

				<div class="modal-footer">
					<input class="btn btn-danger pull-right frm" type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="print_status" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Chart</div>
				</div>

				<div class="modal-body">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="<?php echo base_url()."chartz/print_status_peserta/"?>" width="100%" height="100%"></iframe>
					</div>
				</div>

				<div class="modal-footer">
					<input class="btn btn-danger pull-right frm" type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="print_all" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Chart</div>
				</div>

				<div class="modal-body">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="<?php echo base_url()."chartz/print_semua/"?>" width="100%" height="100%"></iframe>
					</div>
				</div>

				<div class="modal-footer">
					<input class="btn btn-danger pull-right frm" type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</div>
		</div>
	</div>
