<html>
	<head>
		<title>
			Tambah Peserta PKL
		</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\sweetalert2.min.css">
		<script src="<?php echo base_url(); ?>assets\js\sweetalert2.min.js"></script>
		<style media="screen">
			.frm{
				border-radius: 0px;
			}
		</style>
		<script>
			function ambil_peserta(){
				var xmlhttp;
				var cari = document.fform.cari.value;
				if(window.XMLHttpRequest){
					//code for ie7+,firefox,chrome,opera,safari
						xmlhttp = new XMLHttpRequest();
				}
				else{
					//code for ie6,ie5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function(){
					if(xmlhttp.readyState ==XMLHttpRequest.DONE)
					{
					if(xmlhttp.status == 200){
						document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
					}
					else if(xmlhttp.statyus == 400){
						alert('there was an eror 400')
					}
					else{
						alert('something else other than 200 was retuned')
					}
				}

				}
				xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/asal_sekolah?cari="+cari,true);
				xmlhttp.setRequestHeader(
				"Content-type","application/x-www-from-urlencoded");
				xmlhttp.send(cari);
				xmlhttp.open(cari);
				}
				function cleanChar(el){
				var textfield = document.getElementById(el);
				var regex = /[^0-9]/gi;
				if(textfield.value.search(regex) > -1) {
					textfield.value = textfield.value.replace(regex, "");
						}
			}
				function cleanNum(el){
				var textfield = document.getElementById(el);
				var regex = /[^a-z ]/gi;
				if(textfield.value.search(regex) > -1) {
					textfield.value = textfield.value.replace(regex, "");
						}
				}
			function showResult(str){
				document.getElementById("boldStuff").style.visibility = 'hidden';
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

	</head>
	<body style="margin:0, padding:0;">
		<table class="table table-inverse table-hover table-bordered" align="center" id='boldStuff'>
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
				<?php $no = 1; ?>
			  <?php foreach($data as $d){ ?>
			  <tr>
					<td><?php echo $no++ ?></td>
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
					<td width="50px" style="margin:0px; padding:0px;">
						<div width="50px" class="input-group" style="margin:0px; padding:0px;">
								<a class="btn btn-block btn-primary frm" style="margin:0px; padding:10px;" href="<?php echo base_url()."index.php/admin/edit_peserta/".$d['nis'];?>"><i class="fa fa-edit"></i></a>
								<a class="btn btn-block btn-danger tip frm" style="margin:0px; padding:10px;" title="Delete Peserta!" href="#" onclick="javascript:cek(<?php echo $d['nis'].", '".$d['nama']."'"; ?>)" ><i class="fa fa-trash"></i></a>
								<a class="btn btn-block btn-success frm" style="margin:0px; padding:10px;" target="_parent" href="<?php echo base_url()."index.php/admin/lihat_peserta/".$d['nis'];?>"><i class="fa fa-mail-forward"></i></a>
						</div>
					</td>
			  </tr>
			  <?php
			  } ?>

			</table>
		</div>
	</div>
