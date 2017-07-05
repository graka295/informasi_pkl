<html>
	<head>
		<title>
			Tambah Peserta PKL
		</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\sweetalert2.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\all.css">
		<script src="<?php echo base_url(); ?>assets\css\sweetalert2.min.js"></script>
		<script src="<?php echo base_url();?>assets\js\jquery.js"></script>
		<style media="screen">
			.frm{
				border-radius: 0px;
			}

			#modalBackground {
			    z-index:1000;
			    position:fixed;
			    width:100%;
			    height:100%;
			    top:0;
			    left:0;
			    background-color:#000;
			    display:none;
			}
		</style>
		<script>
		$(document).ready(function(){
			  var pag =$('#sad').val();
			  $("#pagination1").val(pag);
			});
			function showPagination(str){
						window.location.href="<?php echo base_url()."index.php/admin/lihat_siswa1/";?>"+str;
					}
			function showResult(str){
				document.getElementById("boldStuff").style.visibility = 'hidden';
				document.getElementById("pagination").style.visibility = 'hidden';
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
			 if (str.length==0)
				{
				document.getElementById("boldStuff").style.visibility = 'visible';
				document.getElementById("cari").innerHTML="";
					return;
				}
				xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/cari_siswa?input="+str,true);
				xmlhttp.send();
			}

			function showStatus(str){
				document.getElementById("boldStuff").style.visibility = 'hidden';
				document.getElementById("pagination").style.visibility = 'hidden';
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
			 if (str.length==0)
				{
				document.getElementById("boldStuff").style.visibility = 'visible';
				document.getElementById("cari").innerHTML="";
					return;
				}
				xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/status_siswa?input="+str,true);
				xmlhttp.send();
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
		</script>
	</head>
	<body style="background-color:transparent; margin:0, padding:0;" >

		<div class="table-responsive">
			<div class="col-md-12" style="margin:0; padding:0;">
				<select class="custom-select frm" name="input" onchange="showStatus(this.value)" style="background-color:transparent;">
					<option value="semua">Semua Status</option>
					<option value="masih">Masih PKL</option>
					<option value="belum">Belum PKL</option>
					<option value="selesai">Selesai PKL</option>
				</select>
				<select class="custom-select frm" id="pagination1" name="input" onchange="showPagination(this.value)" style="background-color:transparent;">
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
				</select>

				<div class="pull-md-right" style="margin:0, padding:0;">
					<input class="form-control  frm" onkeyup="showResult(this.value)" name="input" placeholder="Cari Peserta" style="background-color:transparent;">
					<br>
				</div>
			</div>

				<div align="center">
			<br>

			<table class="table table-inverse table-hover table-bordered" id="boldStuff">
				<thead>
					<tr>
						<th>#</th>
						<th>NIS</th>
						<th>NAMA</th>
						<th>JK</th>
						<th>SEKOLAH</th>
						<th>JURUSAN</th>
						<th>PEMBIMBING</th>
						<th>PENGAWAS</th>
						<th>AKHIR PKL</th>
						<th>AWAL PKL</th>
						<th>STATUS</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $d){ ?>
					<tr>
						<td><?php $no++; echo $no ?></td>
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
						<td style="margin:0px; padding:0px; max-width:50px;">
							<a class="btn btn-block btn-primary tip frm" style="margin:0px; padding:10px;" title="Edit Peserta!" href="<?php echo base_url()."index.php/admin/edit_peserta/".$d['nis'];?>"><i class="fa fa-edit"></i></a>
							<a class="btn btn-block btn-danger tip frm" style="margin:0px; padding:10px;" title="Delete Peserta!" href="#" onclick="javascript:cek(<?php echo $d['nis'].", '".$d['nama']."'"; ?>)" ><i class="fa fa-trash"></i></a>
							<a class="btn btn-block btn-success tip frm" style="margin:0px; padding:10px;" title="Detail Peserta!" target="_parent" href="<?php echo base_url()."index.php/admin/lihat_peserta/".$d['nis'];?>"><i class="fa fa-mail-forward"></i></a>
						</td>
						<?php } ?>
						<span id="cari" class="display-4"></span>
						<input type="hidden" name="sad" id="sad" value="<?php echo $pagi?>">
						<div id="pagination">
							<?php echo "<p>".$this->pagination->create_links()."</p>"; ?>
						</div>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	</body>
</html>
