<html>
	<head>
		<title>
			Edit Peserta PKL
		</title>
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min1.css">
 	  <link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\sweetalert-master\dist\sweetalert.css">
	  <script src="<?php echo base_url();?>assets\js\jquery.js"></script>
   	<script src="<?php echo base_url();?>assets\js\sweetalert.min.js"></script>
   	<script src="<?php echo base_url();?>assets\js\user.js"></script>
		<script src="<?php echo base_url();?>assets\js\bootstrap.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
		<style media="screen">
	    .frm{
	      border-radius: 0px;
	    }
	  </style>
		<script>
			$(document).ready(function(){
			    $('.angka').keyup(angka);
			    $('.huruf').keyup(huruf);
			    $('.email').focusout(email);
			    $("#gambar").change(function(){bacaGambar(this);});
			    	})

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
						xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/asal_sekolah1?cari="+cari,true);
						xmlhttp.setRequestHeader(
						"Content-type","application/x-www-from-urlencoded");
						xmlhttp.send(cari);
						xmlhttp.open(cari);
						}


			function bacaGambar(input){
			 	   if (input.files && input.files[0]){
			   		var file = $('#gambar').val(); //Ambil Value
			 		var ekstensi = ['jpg','png']; //Variabel array untuk penentuan Ekstensi
			 		var ambilekstensi = file.split('.');  //Ambil Ekstensi
			       	ambilekstensi = ambilekstensi.reverse();
			      	 	if ( $.inArray ( ambilekstensi[0].toLowerCase(), ekstensi ) > -1 ){
			      			var reader = new FileReader();
			      			reader.onload = function (e) {
			      			$("#gambar_nodin").width = "200";
			      	  		$("#gambar_nodin").height = "200";
			          		$('#gambar_nodin').attr('src', e.target.result);
			      			}
			      			reader.readAsDataURL(input.files[0]);

				   		}
					   else{
					   		$('#gambar_nodin').attr('src', '<?php echo base_url();?>assets/img/error.png');
					 		sweetAlert(
					 		'Oops...',
			   				'Tipe Foto Harus Jpg/Png !!',
			   				'error'
			    			);
				   		}
					}
					}
			function cek(){
					var file = $('#gambar').val(); //Ambil Value
			 		var ekstensi = ['jpg','png']; //Variabel array untuk penentuan Ekstensi
			 		var mySelect = document.getElementById("jk");
			 		var mySelect1 = document.getElementById("sekolah");
			 		var mySelect2 = document.getElementById("myDiv1");
			 		var mySelect3 = document.getElementById("jurusan");
			 		var mySelect4 = document.getElementById("pembimbing");
			 		var mySelect5 = document.getElementById("ruangan");
			    	var mySelection = mySelect.selectedIndex;
					var mySelection1 = mySelect1.selectedIndex;
					var mySelection2 = mySelect2.selectedIndex;
					var mySelection3 = mySelect3.selectedIndex;
					var mySelection4 = mySelect4.selectedIndex;
					var mySelection5 = mySelect5.selectedIndex;
			      	var awal = $("#awal").val();
			      	var akhir = $("#akhir").val();
				 	var ss = awal.split("-");
				 	var s = akhir.split("-");
				   	var date = new Date();
					var day = date.getDate();
					var month = date.getMonth();
					var yy = date.getYear();
					var year = (yy < 1000) ? yy + 1900 : yy;
					var emailfilter = /^\w+[\+\.\w\-]*@([\w\-]+\.)*\w+[\w\-]*\.([a-z]{2,4}|\d+)$/ig;
			    	var checkval = emailfilter.test($("#email").val());
			    	if($("#nama").val()==""){
					    $("#nama").addClass("form-control-danger");
					    $("#nama").parent().addClass("form-group has-danger");
					    $("#nama").focus();
					    return false;
					    }
					    else if (!cekuser($("#nama").val())){
					    $("#nama").focus();
					    return false;
					    }
			    	 else if($("#alamat").val()==""){
					    $("#alamat").addClass("form-control-danger");
					    $("#alamat").parent().addClass("form-group has-danger");
					    $("#alamat").focus();
					    return false;
					    }
			  		 else if($("#telepon").val()==""){
					    $("#telepon").addClass("form-control-danger");
					    $("#telepon").parent().addClass("form-group has-danger");
					    $("#telepon").focus();
					    return false;
					    }
			    	 else if (cekuser($("#telepon").val())) {
					    $("#telepon").focus();
					    return false;
					    }
			    	 else if (isNaN($("#telepon").val())) {
					    $("#telepon").focus();
					    return false;
			    		}
			   	 	 else if($("#email").val()==""){
					    $("#email").addClass("form-control-danger");
					    $("#email").parent().addClass("form-group has-danger");
					    $("#email").focus();
					    return false;
					    }
			    	 else if (checkval == false) {
					    $("#email").focus();
					    return false;
					    }
			    	 else if(awal==""){
					    $("#awal").addClass("form-control-danger");
					    $("#awal").parent().addClass("form-group has-danger");
					    $("#awal").focus();
					    return false;
					    }
			    	 else if(akhir==""){
					    $("#akhir").addClass("form-control-danger");
					    $("#akhir").parent().addClass("form-group has-danger");
					    $("#akhir").focus();
					    return false;
					    }
					else{
						var ambilekstensi = file.split('.');  //Ambil Ekstensi
			       		ambilekstensi = ambilekstensi.reverse();
			       		if (file==""){
							var dolars = 0;
						}
						else{
							var dolars = 1;
						}
			      	 	if (dolars == 0 || $.inArray ( ambilekstensi[0].toLowerCase(), ekstensi ) > -1 ){
					   	if(ss[0] > s[0] ){
					   	sweetAlert(
				 		'Oops...',
						'Form Yang Anda Isi Tidak Benar !!',
						'error'
						);
			    		$("#akhir").addClass("form-control-danger");
			    		$("#akhir").parent().addClass("form-group has-danger");
			    		$("#akhir").focus();
			    		return false;
					   	}
					   	else if(ss[0] == s[0] && ss[1] > s[1] ){
					   	sweetAlert(
				 		'Oops...',
						'Form Yang Anda Isi Tidak Benar !!',
						'error'
						);
			    		$("#akhir").addClass("form-control-danger");
			    		$("#akhir").parent().addClass("form-group has-danger");
			    		$("#akhir").focus();
			    		return false;
					   	}
					    else if(ss[1] == s[1] && ss[2] > s[2] ){
					   	sweetAlert(
				 		'Oops...',
						'Form Yang Anda Isi Tidak Benar !!',
						'error'
						);
			    		$("#akhir").addClass("form-control-danger");
			    		$("#akhir").parent().addClass("form-group has-danger");
			    		$("#akhir").focus();
			    		return false;
					   	}
					 else if(dolars == 1){
			      	 	var uploadedFile = document.getElementById('gambar');
				    	var fileSize = uploadedFile.files[0].size;
			      		var _size = (fileSize/1000000);
			      		if(_size > 5){
						sweetAlert(
				 		'Oops...',
						'Ukuran Gambar Tidak Boleh Lebih Dari 5mb !!',
						'error'
						);
			    		$("#gambar").addClass("form-control-danger");
			    		$("#gambar").parent().addClass("form-group has-danger");
			    		$("#gambar").focus();
			    		return false;
				   		}
				   	}
					   	else{
					   		return true;;
					   	}
				   		}
					   else{
					 		sweetAlert(
					 		'Oops...',
			   				'Tipe Foto Harus Jpg/Png !!',
			   				'error'
			    			);
			    		$("#gambar").addClass("form-control-danger");
			    		$("#gambar").parent().addClass("form-group has-danger");
			    		$("#gambar").focus();
			    		return false;
				   		}
				   	}
			}
		</script>
	</head>
	<body style="margin-top:15px;">
		<div class="container modal-content frm">
			<div class="col-md-12">
				<div class="modal-header">
					<div class="display-4">
						<a class="tip" title="Kembali" href ="<?=$_SERVER["HTTP_REFERER"]?>"><i class="fa fa-angle-left"></i></a>
							Edit Peserta
						</div>
				</div>

				<?php foreach ($data as $siswa) { ?>
				<form name="fform" method="POST" enctype="multipart/form-data" onSubmit="return cek()" action="<?php echo base_url()."index.php/crud/edit_peserta/".$siswa['nis'];?>" >
					<br>
					<div class="col-md-12">
						<span class="block input-icon input-icon-right">
							<br>
							<div class="col-md-4">
								<img src="<?php echo base_url()."gambar/".$siswa['foto']?>" id="gambar_nodin" alt="Preview Gambar" width="250px" height="250px" />
								<label class="btn btn-primary btn-file frm btn-block" style="width:250px;">
    							<i class="fa fa-file"></i> Browse <input type='file'name="userfile" id="gambar" style="display: none; width:250px;" />
								</label>
							</div>
						</span>
					<div class="col-md-8">
							NIS
							<input class="form-control frm" id="nis" type="text" name="nis" placeholder="NIS" value ="<?php echo $siswa['nis']; ?>" disabled>
					</div>
					<div class="col-md-8">
							Nama
							<input class="form-control frm huruf"  maxlength="30" type="text" id="nama" name="nama" placeholder="Nama" value ="<?php echo $siswa['nama']; ?>"  >
					</div>
					<div class="col-md-8">
						Alamat
						<textarea class="form-control frm" id="alamat" name="alamat"><?php echo $siswa['alamat']; ?>
						</textarea>
					</div>

					<div class="col-md-4">
							Telepon
							<input class="form-control frm angka" type="text" id="telepon" name="telepon" value ="<?php echo $siswa['telepon']; ?>">
					</div>

					<div class="col-md-4">
						Email
						<input maxlength="30" type="text" id="email" name="email" value ="<?php echo $siswa['email']; ?>" class="form-control frm email" >
					</div>
				</div>

					<div class="col-md-12">
					<div class="col-md-2">
						Jenis Kelamin
						<select class="form-control custom-select frm" id="jk" name="jenis_kelamin" >
							<option value="<?php echo $siswa['jenis_kelamin'] ?>">
								<?php
								if ($siswa['jenis_kelamin']=="L") {
									echo "Laki-laki";
								}
								else{
									echo "Perempuan";
								}
								 ?>
							</option>
							<?php
								if ($siswa['jenis_kelamin']=="L") {?>
								<option value="P">Perempuan</option>
								<?php
								}
								else{ ?>
								<option value="L">Laki - Laki</option>

								<?php }
								?>
						</select>
					</div>

					<div class="col-md-2">
						Asal Sekolah
						<select class="form-control custom-select frm" id="sekolah" name="cari" onchange="ambil_peserta()">
							<option value="<?php echo $siswa['sekolah']; ?>" style="display: none;"><?php echo $siswa['nama_sekolah']; ?></option>
						<?php
							foreach($data_sekolah as $row){?>
							<option value="<?php echo $row['npsn']?>"><?php echo $row['nama_sekolah']?></option>
						<?php
						}
						?>
						</select>
					</div>

					<div class="col-md-2">
						Pengawas
						<select class="form-control custom-select frm" name="pengawas" id="myDiv1">
							<option value="<?php echo $siswa['pengawas']; ?>" style="display:none"><?php echo $siswa['nama_pengawas']; ?></option>
						</select>
					</div>
					<div class="col-md-2">
						Pembimbing
						<select class="form-control custom-select frm" id="pembimbing" name="pembimbing" >
							<option value="<?php echo $siswa['pembimbing']; ?>" style="display:none"><?php echo $siswa['nama_pembimbing']; ?></option>
						<?php
						foreach($data_pembimbing as $row){?>
							<option value="<?php echo $row['nip']?>"><?php echo $row['nama_pembimbing']?></option>
						<?php
						}
						?>
						</select>
					</div>

					<div class="col-md-2">
						Jurusan
						<select class="form-control custom-select frm" name="jurusan" id="jurusan" >
							<option value="<?php echo $siswa['jurusan']; ?>" style="display:none"><?php echo $siswa['nama_jurusan']; ?></option>
						<?php
						foreach($data_jurusan as $row){?>
							<option value="<?php echo $row['kode_jurusan']?>"><?php echo $row['nama_jurusan']?></option>
						<?php
						}
						?>
						</select>
					</div>

					<div class="col-md-2">
						Ruangan
						<select class="form-control custom-select frm" id="ruangan" name="ruangan" >
							<option value="<?php echo $siswa['ruangan']; ?>" style="display:none"><?php echo $siswa['nama_ruangan']; ?></option>
						<?php
						foreach($data_ruangan as $row){?>
							<option value="<?php echo $row['kode_ruangan']?>"><?php echo $row['nama_ruangan']?></option>
						<?php
						}
						?>
						</select>
					</div>

					<div class="col-md-6">
						Mulai
						<input class="form-control frm" class="form-control" type="date" id="awal" name="awal" value="<?php echo $siswa['mulai']; ?>" />
					</div>

					<div class="col-md-6">
						Berakhir
						<input class="form-control frm" class="form-control" type="date" id="akhir" name="akhir" value="<?php echo $siswa['selesai']; ?>" />
						<br>
					</div>
				</div>

				<div class="modal-footer col-md-12">
					<input class="btn btn-primary pull-right frm" type="submit" onSubmit="return cek()" name="submit" value="submit">
					<input class="btn btn-secondary pull-right frm" type="reset" name="reset" value="reset">
				</div>
			<form>
			<?php  }

			 ?>
			</div>
		</div>
		<br>
	</body>
</html>
