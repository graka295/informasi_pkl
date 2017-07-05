	<script>
		$(document).ready(function(){
			$('.tip').tooltip();
		});
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
					window.location.href="<?php echo base_url()."index.php/crud/delete_pengawas/";?>"+nis
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

		<div class="col-md-4 col-sm-12">
			<h3 style="font-weight:900;">
				<div class="hidden-sm-down">
					<a class="tip" href="<?php echo base_url();?>admin\lihat_pembimbing" title="Ke Pembimbing"><i class="fa fa-chevron-left"></i></a>
						PENGAWAS
					<a class="tip" href="<?php echo base_url();?>admin\ruangan" title="Ke Ruangan"><i class="fa fa-chevron-right"></i></a>
				</div>
			</h3>
			<h3 style="font-weight:900;">
				<div class="hidden-lg-up" align="center">
					<a class="tip" href="<?php echo base_url();?>admin\lihat_pembimbing" title="Ke Pembimbing"><i class="fa fa-chevron-left"></i></a>
						PENGAWAS
					<a class="tip" href="<?php echo base_url();?>admin\ruangan" title="Ke Ruangan"><i class="fa fa-chevron-right"></i></a>
				</div>
			</h3>
		</div>
		<div class="col-md-8 col-sm-12">
			<div class="form-inline-block hidden-sm-down pull-right">
				<div class="input-group">
					<a class="btn btn-primary frm tip" title="Tambah Pengawas"style="background-color:#2980b9;" data-toggle="modal" data-target="#tambah" href="#"><i class="fa fa-plus"></i></a>
					<a class="btn btn-warning frm tip" title="Print Pengawas" data-toggle="modal" data-target="#print" href="#"><i class="fa fa-print"></i></a>
					<a class="btn btn-success frm tip" title="Export semua data Pengawas ke Excel" href='toExcelPengawas'><i class="fa fa-file-excel-o"></i></a>
				</div>
			</div>
			<div class="form-inline-block hidden-lg-up" align="center">
				<div class="input-group">
					<a class="btn btn-primary frm tip" title="Tambah Pengawas"style="background-color:#2980b9;" data-toggle="modal" data-target="#tambah" href="#"><i class="fa fa-plus"></i></a>
					<a class="btn btn-warning frm tip" title="Print Pengawas" data-toggle="modal" data-target="#print" href="#"><i class="fa fa-print"></i></a>
					<a class="btn btn-success frm tip" title="Export semua data Pengawas ke Excel" href='toExcelPengawas'><i class="fa fa-file-excel-o"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead style="background-color:#eee;">
						<tr>
						<th>#</th>
						<th>NAMA PENGAWAS</th>
						<th>NIP</th>
						<th>ALAMAT</th>
						<th>EMAIL</th>
						<th>TELEPON</th>
						<th>ASAL SEKOLAH</th>
						<th colspan="3">AKSI</th>
					</tr>
					</thead>
					<?php $no = 1; ?>
					<?php
						foreach($pengawas as $s) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $s['nama_pengawas']?></td>
						<td><?php echo $s['nip']?></td>
						<td><?php echo $s['alamat']?></td>
						<td><?php echo $s['email']?></td>
						<td><?php echo $s['telepon']?></td>
						<td><?php echo $s['nama_sekolah']?></td>

						<td style="margin:0px; padding:0px; width:30px;">
							<a class="btn-sm btn-primary btn-block tip btn-circle" style="padding-top:8px; padding-left:8px;"title="Edit Pengawas!" href="<?php echo base_url()."index.php/admin/edit_pengawas/".$s['nip'];?>"><i class="fa fa-edit"></i></a>
						</td>
						<td style="margin:0px; padding:0px; width:30px;">
							<a class="btn-sm btn-danger btn-block tip btn-circle" style="padding-top:8px; padding-left:9.5px;"title="Delete Pengawas!" href="#" onclick="javascript:cek(<?php echo "'".$s['nip']."', '".$s['nama_pengawas']."'"; ?>)"><i class="fa fa-trash"></i></a>
						</td>
						<td style="margin:0px; padding:0px; width:30px;">
							<a class="btn-sm btn-success btn-block tip btn-circle" style="padding-top:8px; padding-left:8px;"title="Detail Pengawas!" target="_parent" href="<?php echo base_url()."index.php/admin/detail_pengawas/".$s['nip'];?>"><i class="fa fa-mail-forward"></i></a>
		        </td>
					</tr>
					<?php
					}
					?>
				</table>
				<div class="pull-right">
					<?php echo "<p>".$this->pagination->create_links()."</p>"; ?>
				</div>
			</div>
		</div>

		<div class="modal fade" id="tambah">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color:white; color:#444;">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<div class="modal-title display-4" id="myModalLabel" align="center">Tambah Pengawas</div>
					</div>
					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url();?>admin\tambah_pengawas"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="print">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header" style="background-color:white; color:#444;">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<div class="modal-title display-4" id="myModalLabel" align="center">Print Pengawas</div>
					</div>
					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url()."admin/print_semua_pengawas/"?>" width="100%" height="100%"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
