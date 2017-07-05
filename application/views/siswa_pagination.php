<html>
	<head>
		<title>
			Tambah Peserta PKL
		</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\sweetalert2\sweetalert2.min.css">
		<script src="<?php echo base_url(); ?>assets\sweetalert2\sweetalert2.min.js"></script>
		<style media="screen">
			.frm{
				border-radius: 0px;
			}
		</style>
		<script>
			$(document).ready(function(){
			  $('.tip').tooltip();
			});
			function cek(nis)
			{
			swal({
				  title: 'Are you sure?',
				  text: "You won't be able to revert this!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!',
				  cancelButtonText: 'No, cancel!',
				  confirmButtonClass: 'btn btn-success',
				  cancelButtonClass: 'btn btn-danger',
				  buttonsStyling: false
			}).then(function() {
			  swal({
				   title: 'Deleted!',
				    text :'Your file has been deleted.',
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
			      'Cancelled',
			      'Your imaginary file is safe (:',
			      'error'
			    );
			  }
			})
			}
		</script>
	</head>
	<body style="margin:0, padding:0;">
				<div align="center">
			<br>

			<table class="table table-hover table-bordered" align="center" id='boldStuff'>
			  <thead>
			    <tr>
						<th>#</th>
			      <th>NIS</th>
			      <th>Nama</th>
			      <th>Jenis  Kelamin</th>
			      <th>Sekolah</th>
			      <th>Jurusan</th>
			      <th>Pembimbing</th>
			      <th>Pengawas</th>
			      <th>Awal PKL</th>
			      <th>Akhir PKL</th>
			      <th>Status</th>
			      <th width="50px">Aksi</th>
			    </tr>
			  </thead>
			  <?php foreach($data as $d){ ?>
			  <tr>
					<td><?php $no++;
					echo $no ?></td>
			    <td><?php echo $d['nis'] ?></td>
			    <td><?php echo $d['nama'] ?></td>
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
					<span id="cari" class="display-4"></span>
					<td style="margin:0px; padding:0px; max-width:50px;">
						<a class="btn btn-block btn-primary tip frm" style="margin:0px; padding:10px;" title="Edit Peserta!" href="<?php echo base_url()."index.php/admin/edit_peserta/".$d['nis'];?>"><i class="fa fa-edit"></i></a>
						<a class="btn btn-block btn-danger tip frm" style="margin:0px; padding:10px;" title="Delete Peserta!" href="#" onclick="javascript:cek(<?php echo $d['nis']; ?>)" ><i class="fa fa-trash"></i></a>
						<a class="btn btn-block btn-success tip frm" style="margin:0px; padding:10px;" title="Detail Peserta!" target="_parent" href="<?php echo base_url()."index.php/admin/lihat_peserta/".$d['nis'];?>"><i class="fa fa-mail-forward"></i></a>
					</td>
			  </tr>

			<?php
			  }
			  ?>
			  <div id="pagination">
			  <?php
			    echo "<p>".$this->pagination->create_links()."</p>";
			   ?>
			</div>
			</table>
		</div>
	</div>
	</body>
</html>
