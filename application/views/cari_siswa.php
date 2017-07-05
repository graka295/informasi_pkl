<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<link rel="stylesheet" href="<? echo base_url()?>assets/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\sweetalert2.min.css">
	<script src="<?php echo base_url(); ?>assets\js\sweetalert2.min.js"></script>
	<style type="text/css">
		.highlight
		{
			background: red;
		}
	</style>


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
							  confirmButtonClass: 'btn btn-success',
							  cancelButtonClass: 'btn btn-danger',
							  buttonsStyling: false
						}).then(function() {
						  swal({
							   title: 'Sukses',
							    text :'Data '+nama+' telah berhasil di hapus',
							    type :'success',
								  confirmButtonColor: '#3085d6',
								  confirmButtonText: 'Tutup',
								  confirmButtonClass: 'btn btn-success',
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
</head>
<body>
			<table class="table table-bordered table-hover">
						<thead style="background-color:#eee;">
							<tr>
								<th>#</th>
								<th>NIS</th>
								<th>NAMA PESERTA</th>
								<th>SEKOLAH</th>
								<th>JURUSAN</th>
								<th>PEMBIMBING</th>
								<th>PENGAWAS</th>
								<th>AKHIR PKL</th>
								<th>AWAL PKL</th>
								<th>STATUS</th>
								<th colspan="3">AKSI</th>
							</tr>
						</thead>
						<?php
						$no = 1;
						if ($tahun=="semua"){
						$i=0;
						foreach($siswa as $d){ ?>

						<tr>
							<td><?php echo $no;
							$no++ ?></td>
							<td><?php echo $nis[$i] ?></td>
							<td><?php echo $nama[$i]; ?></td>
							<td><?php echo $d['nama_sekolah'] ?></td>
							<td><?php echo $d['nama_jurusan'] ?></td>
							<td><?php echo $d['nama_pembimbing'] ?></td>
							<td><?php echo $d['nama_pengawas'] ?></td>
							<td><?php echo $d['mulai'] ?></td>
							<td><?php echo $d['selesai']?></td>
							<td>
								<?php
								$today=date ("Y-m-d");
								$tgl_mulai = strtotime($d['mulai']);
								$tgl_selesai = strtotime($d['selesai']);
								$tgl_today = strtotime($today);
								if ($tgl_today < $tgl_selesai && $tgl_today > $tgl_mulai){
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
						</tr>
						<?php $i++;	}
					}
					else{
			$i=0;
			foreach($siswa as $d){
			$mulai = $d['mulai'];
			if($tahun == substr($mulai,0,4)){
						?>
						<tr>
							<td><?php echo $no;
							$no++ ?></td>
							<td><?php echo $nis[$i] ?></td>
							<td><?php echo $nama[$i]; ?></td>
							<td>
								<?php
									if ($d['jenis_kelamin']=="L") {
									echo "Laki - Laki";
								}
								else{
									echo "Perempuan";
								}
								?>

							</td>
							<td><?php echo $d['nama_sekolah'] ?></td>
							<td><?php echo $d['nama_jurusan'] ?></td>
							<td><?php echo $d['nama_pembimbing'] ?></td>
							<td><?php echo $d['nama_pengawas'] ?></td>
							<td><?php echo $d['mulai'] ?></td>
							<td><?php echo $d['selesai']?></td>
							<td>
								<?php
								$today=date ("Y-m-d");
								$tgl_mulai = strtotime($d['mulai']);
								$tgl_selesai = strtotime($d['selesai']);
								$tgl_today = strtotime($today);
								if ($tgl_today < $tgl_selesai && $tgl_today > $tgl_mulai){
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
						</tr>
					<?php
										}
								$i++;}
					 }?>
			</table>
</body>
</html>
