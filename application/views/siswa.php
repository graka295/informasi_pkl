<script>
		$(document).ready(function(){
			$('.tip').tooltip();
		});
		function showResult(){
			document.getElementById("boldStuff").style.visibility = 'hidden';
			var status = document.getElementById("status").value;
			var tahun = document.getElementById("tahun").value;
			var nama = document.getElementById("nama").value;
			if (window.XMLHttpRequest)
			{

				xmlhttp=new XMLHttpRequest();
			}

			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("cari").innerHTML=xmlhttp.responseText;
				}
			}
			if (nama.length==0)
			{
				var nama="semua";
			}

			xmlhttp.open("GET","<?php echo base_url()."index.php/filter/filter_siswa/";?>"+nama+"/"+status+"/"+tahun,true);
			xmlhttp.send();
		}
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
	<script>
		function cek(nis, nama)
		{
			swal({
				title: 'Apakah Anda Yakin ?',
				text: "Ingin menghapus Data "+nama,
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Hapus',
				cancelButtonText: 'Batal',
				confirmButtonClass: 'btn btn-success frm',
				cancelButtonClass: 'btn btn-danger frm',
				buttonsStyling: false
			}).then(function() {
				swal({
					title: 'Sukses',
					text :'Data '+nama+' telah berhasil di hapus',
					type :'success',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Tutup',
					confirmButtonClass: 'btn btn-success frm',
					buttonsStyling: false
				}).then(function(){
					window.location.href="<?php echo base_url()."index.php/crud/delete_peserta/";?>"+nis
				})
			}, function(dismiss) {
				// dismiss can be 'cancel', 'overlay', 'close', 'timer'
				if (dismiss === 'cancel') {
					swal(
					'Close',
					'Data '+nama+' tidak terhapus :)',
					'error'
					);
				}
			})
		}
	</script>

	<div class="col-md-4 col-sm-4 col-xs-7">
		<h3 style="font-weight:900;">
			<a class="tip" href="<?php echo base_url();?>admin\statistik" title="Ke Statistik"><i class="fa fa-chevron-left"></i></a>
				PESERTA
			<a class="tip" href="<?php echo base_url();?>admin\lihat_sekolah" title="Ke Sekolah"><i class="fa fa-chevron-right"></i></a>
		</h3>
	</div>
	<div class="col-md-8 col-sm-8 col-xs-5">
		<div class="form-inline-block hidden-sm-down pull-right">
			<div class="input-group">
				<a class="btn btn-primary frm tip" title="Tambah Peserta"style="background-color:#2980b9;" data-toggle="modal" data-target="#tambah" href="#"><i class="fa fa-plus"></i></a>
				<a class="btn btn-warning frm tip" title="Print Peserta" data-toggle="modal" data-target="#print" href="#"><i class="fa fa-print"></i></a>
				<a class="btn btn-success frm tip" title="Export semua data Siswa ke Excel" href='toExcelSiswa'><i class="fa fa-file-excel-o"></i></a>
			</div>
		</div>
		<div class="form-inline-block hidden-lg-up pull-right" align="center">
			<div class="input-group">
				<a class="btn btn-primary btn-circle tip" title="Tambah Peserta"style="background-color:#2980b9;" data-toggle="modal" data-target="#tambah" href="#"><i class="fa fa-plus"></i></a>
				<a class="btn btn-warning btn-circle tip" title="Print Peserta" data-toggle="modal" data-target="#print" href="#"><i class="fa fa-print"></i></a>
				<a class="btn btn-success btn-circle tip" title="Export semua data Siswa ke Excel" href='toExcelSiswa'><i class="fa fa-file-excel-o"></i></a>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-body">
				<div class="col-md-2 col-sm-4 col-xs-4" style="margin:0; padding:0;">
							<select class="frm custom-select" id="status" name="input" onchange="showResult()" style="width:100%;">
								<option value="semua">Semua Status</option>
								<option value="masih">Masih PKL</option>
								<option value="belum">Belum PKL</option>
								<option value="selesai">Selesai PKL</option>
							</select>
						</div>
				<div class="col-md-2 col-sm-4 col-xs-4" style="margin:0; padding:0;">
							<select class="frm custom-select" id="tahun" onchange="showResult()" style="width:100%;">
								<option value="semua">Semua Tahun</option>
								<?php
									$s=date(Y);
									for($i = 1999;$i<=$s;$i++){
										echo "<option value='".$i."'>".$i."</option>";
									 }
								?>
							</select>
						</div>
				<div class="col-md-8 col-sm-4 col-xs-4" style="margin:0; padding:0;">
							<input class="form-control frm" onkeyup="showResult()" id="nama" name="input" placeholder="Cari Peserta">
						</div>
			</div>
			<div class="table-responsive">
					<table class="table table table-hover" id="boldStuff">
							<thead style="background-color:#eee;">
								<tr>
									<th>#</th>
									<th class="hidden-sm-down">NIS</th>
									<th>NAMA PESERTA</th>
									<th class="hidden-xs-down">SEKOLAH</th>
									<th class="hidden-sm-down">JURUSAN</th>
									<th class="hidden-xs-down">PEMBIMBING</th>
									<th class="hidden-sm-down">PENGAWAS</th>
									<th class="hidden-sm-down">AKHIR PKL</th>
									<th class="hidden-sm-down">AWAL PKL</th>
									<th>STATUS</th>
									<th colspan="3">AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($data as $d){ ?>
								<tr>
									<td><?php $no++; echo $no ?></td>
									<td class="hidden-sm-down"><?php echo $d['nis'] ?></td>
									<td><?php echo $d['nama'] ?></td>
									<td class="hidden-xs-down"><?php echo $d['nama_sekolah'] ?></td>
									<td class="hidden-sm-down"><?php echo $d['nama_jurusan'] ?></td>
									<td class="hidden-xs-down"><?php echo $d['nama_pembimbing'] ?></td>
									<td class="hidden-sm-down"><?php echo $d['nama_pengawas'] ?></td>
									<td class="hidden-sm-down"><?php echo $d['mulai'] ?></td>
									<td class="hidden-sm-down"><?php echo $d['selesai']?></td>
									<td>

										<?php
											$today=date ("Y-m-d");
											$tgl_mulai = strtotime($d['mulai']);
											$tgl_selesai = strtotime($d['selesai']);
											$tgl_today = strtotime($today);
											if ($tgl_today <= $tgl_selesai && $tgl_today >= $tgl_mulai){
												echo "Masih PKL";
											}
											else if ($tgl_today < $tgl_selesai && $tgl_today < $tgl_mulai){
												echo "Belum PKL";
											}
											else{
												echo "Selesai";
											}
										?>
									</td>
									<td style="margin:0px; padding:0px; width:30px;" align="center">
										<a class="btn-sm btn-primary btn-block tip btn-circle" style="padding-top:8px;" title="Edit Peserta!" href="<?php echo base_url()."index.php/admin/edit_peserta/".$d['nis'];?>"><i class="fa fa-edit"></i></a>
									</td>
									<td style="margin:0px; padding:0px; width:30px;" align="center">
										<a class="btn-sm btn-danger btn-block tip btn-circle" style="padding-top:8px;" title="Delete Peserta!" href="#" onclick="javascript:cek(<?php echo $d['nis'].", '".$d['nama']."'"; ?>)" ><i class="fa fa-trash"></i></a>
									</td>
									<td style="margin:0px; padding:0px; width:30px;" align="center">
										<a class="btn-sm btn-success btn-block tip btn-circle" style="padding-top:8px;" title="Detail Peserta!" target="_parent" href="<?php echo base_url()."index.php/admin/lihat_peserta/".$d['nis'];?>"><i class="fa fa-mail-forward"></i></a>
									</td>
									<?php } ?>
									<span id="cari" class="display-4"></span>
								</tr>
							</tbody>
						</table>
					<div class="pull-right">
						<?php echo "<p>".$this->pagination->create_links()."</p>"; ?>
					</div>
				</div>
		</div>
	</div>

	<div class="modal fade" id="tambah">
			<div class="modal-dialog" role="document">
				<div class="modal-content frm">
					<div class="modal-header" style="background-color:white; color:#444;">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<div class="modal-title display-4" id="myModalLabel" align="center">Tambah Peserta</div>
					</div>
					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url();?>admin\tambah_peserta" width="100%" height="100%"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="modal fade" id="print">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color:white; color:#444;">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<div class="modal-title display-4" id="myModalLabel" align="center">Print Peserta</div>
					</div>
					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url()."admin/print_siswa/"?>" width="100%" height="100%"></iframe>
						</div>
					</div>
					<div class="modal-footer">
						<input class="btn btn-danger frm pull-right frm" type="button" class="btn btn-default" data-dismiss="modal" value="Close">
					</div>
				</div>
			</div>
		</div>
