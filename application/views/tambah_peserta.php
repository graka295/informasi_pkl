<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min1.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\sweetalert2.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
		<script src="<?php echo base_url();?>assets\js\jquery.js"></script>
		<script src="<?php echo base_url();?>assets\js\user.js"></script>
		<script src="<?php echo base_url();?>assets\js\sweetalert2.min.js"></script>
		<script src="<?php echo base_url();?>assets\js\bootstrap.min.js"></script>
		<style media="screen">
		.fr{
			width: 600px;
		}
		.frm{
			border-radius: 0px;
		}
		img{
			width: 200px;
			height: 200px;
		}
		</style>
		<script>
			$(document).ready(function(){
			    $('.angka').keyup(angka);
			    $('.huruf').keyup(huruf);
			    $('#alamat').keyup(alamat);
			    $('.email').focusout(email);
			    $('.sel').change(selected);
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

								xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/asal_sekolah?cari="+cari,true);
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
			      			$("#gambar").parent().removeClass("form-group has-danger");
				   		}
					   else{
							 	$('#gambar_nodin').attr('src', '<?php echo base_url();?>assets/img/error.png');
					 		sweetAlert(
					 		'Oops...',
			   				'Tipe Foto Harus Jpg/Png !!',
			   				'error'
			    			);
			    		$("#gambar").addClass("form-control-danger");
			    		$("#gambar").parent().addClass("form-group has-danger");
			    		$("#gambar").focus();
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
		    		if($("#gambar").val()==""){
					    $("#gambar").addClass("form-control-danger");
					    $("#gambar").parent().addClass("form-group has-danger");
					    $("#gambar").focus();
					    return false;
					    }
			 		else if($("#nis").val()==""){
					    $("#nis").addClass("form-control-danger");
					    $("#nis").parent().addClass("form-group has-danger");
					    $("#nis").focus();
					    return false;
					    }
					    else if (cekuser($("#nis").val())) {
					    $("#nis").focus();
					    return false;
					    }
					    else if (isNaN($("#nis").val())) {
					    $("#nis").focus();
					    return false;
					    }
			   		 else if($("#nama").val()==""){
					    $("#nama").addClass("form-control-danger");
					    $("#nama").parent().addClass("form-group has-danger");
					    $("#nama").focus();
					    return false;
					    }
					    else if (!cekuser($("#nama").val())){
					    $("#nama").focus();
					    return false;
					    }
			    	 else if(mySelection==0){
					    $("#jk").addClass("form-control-danger");
					    $("#jk").parent().addClass("form-group has-danger");
					    $("#jk").focus();
					    return false;
					     }
			    	 else if($("#alamat").val()==""){
					    $("#alamat").addClass("form-control-danger");
					    $("#alamat").parent().addClass("form-group has-danger");
					    $("#alamat").focus();
					    return false;
					    }
					else if(mySelection1==0){
					    $("#sekolah").addClass("form-control-danger");
					    $("#sekolah").parent().addClass("form-group has-danger");
					    $("#sekolah").focus();
					    return false;
					     }
					 else if(mySelection2==0){
					    $("#myDiv1").addClass("form-control-danger");
					    $("#myDiv1").parent().addClass("form-group has-danger");
					    $("#myDiv1").focus();
					    return false;
					     }
					 else if(mySelection3==0){
					    $("#jurusan").addClass("form-control-danger");
					    $("#jurusan").parent().addClass("form-group has-danger");
					    $("#jurusan").focus();
					    return false;
					     }
					 else if(mySelection4==0){
					    $("#pembimbing").addClass("form-control-danger");
					    $("#pembimbing").parent().addClass("form-group has-danger");
					    $("#pembimbing").focus();
					    return false;
					     }
					 else if(mySelection5==0){
					    $("#ruangan").addClass("form-control-danger");
					    $("#ruangan").parent().addClass("form-group has-danger");
					    $("#ruangan").focus();
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
			    	 else if (checkval == false){
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
						var awal = $("#awal").val();
						var akhir = $("#akhir").val();
						var ambilekstensi = file.split('.');  //Ambil Ekstensi
			       		ambilekstensi = ambilekstensi.reverse();
			      	 	if ( $.inArray ( ambilekstensi[0].toLowerCase(), ekstensi ) > -1 ){
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
					   		if($("#nis").val().length<9){
						    sweetAlert(
						    'Oops...',
						    'NIS Harus 9 Karaketer!',
						    'error'
						     );
						     $("#nis").focus();
							$("#nis").addClass("form-control-danger");
				    		$("#nis").parent().addClass("form-group has-danger");
				    		$("#nis").focus();
				    		 return false;
						     }
					   else{
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
						   	else{
						   		return true;;
						   	}
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

	<body>
		<div class="container">
			<form name="fform" method="POST" onSubmit="return cek()" enctype="multipart/form-data" action="<?php echo base_url()."index.php/crud/insert_peserta";?>" >
			<br>
				<div class="col-md-12">

					<div>
						<img src="<?php echo base_url();?>assets/img/Foto.jpg" id="gambar_nodin" alt="Preview Gambar"/>
						<input class="custom-file" type="file" name="userfile" size="20" id="gambar"/>
					</div>

					<div>
						NIS
						<input type="text" id="nis" name="nis" placeholder="Masukan NIS" maxlength="9" class="form-control angka frm">
					</div>

					<br>

					<div>
						Nama Peserta
						<input type="text" id="nama" name="nama" placeholder="Masukan Nama"   class="form-control huruf frm">
					</div>


					<br>

					<div>
						Jenis Kelamin
						<select name="jenis_kelamin" id="jk" class="form-control frm sel">
							<option value="" style="display:none">Jenis Kelamin</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>

					<br>

					<div>
						Alamat
						<textarea class="form-control frm"  placeholder="Masukkan Alamat" name="alamat" id="alamat" maxlength="100"></textarea>
					</div>

					<br>
						Sekolah
					<div>
						<select name="cari" id="sekolah" onchange="ambil_peserta()" class="form-control frm sel">
							<option value="0" style="display:none">Pilih Asal Sekolah</option>
							<?php
								foreach($data_sekolah as $row){?>
							<option value="<?php echo $row['npsn']?>"><?php echo $row['nama_sekolah']?></option>
								<?php
								}
								?>
						</select>
					</div>

					<br>

					<div>
			          Pengawas
						<select name="pengawas" id="myDiv1" class="form-control frm sel">
							<option value="" style="display:none">Pilih Pengawas</option>
							<?php
							foreach($data_pengawas as $row){?>
							<option value="<?php echo $row['nip']?>"><?php echo $row['nama_pegawas']?></option>
							<?php
							}
							?>
						</select>
					</div>

					<br>

					<div>
	        	Jurusan
						<select name="jurusan" id="jurusan" class="form-control frm sel">
							<option value="" style="display:none">Pilih Jurusan</option>
							<?php
							foreach($data_jurusan as $row){?>
							<option value="<?php echo $row['kode_jurusan']?>"><?php echo $row['nama_jurusan']?></option>
							<?php
							}
							?>
						</select>
					</div>

					<br>

					<div>
	          Pembimbing
						<select name="pembimbing"   id="pembimbing" class="form-control frm sel">
							<option value="" style="display:none">Pilih Pembimbing</option>
								<?php
								foreach($data_pembimbing as $row){?>
								<option value="<?php echo $row['nip']?>"><?php echo $row['nama_pembimbing']?></option>
								<?php
								}
								?>
						</select>
					</div>

					<br>

					<div>
	        	Ruangan
						<select name="ruangan" id="ruangan" class="form-control frm sel">
							<option value="" style="display:none">Pilih Ruangan</option>
								<?php
								foreach($data_ruangan as $row){?>
								<option value="<?php echo $row['kode_ruangan']?>"><?php echo $row['nama_ruangan']?></option>
								<?php
								}
								?>
						</select>
					</div>

					<br>

					<div>
	          Telepon
						<input type="text" id="telepon" name="telepon" class="form-control angka frm" placeholder="No.Telp">
					</div>

					<br>

					<div>
	          Email
						<input type="email" name="email" id="email" class="form-control email frm" placeholder="Email">
					</div>

					<br>

					<div>
	          Tanggal Mulai
						<input class="form-control frm" id="awal" type="date" name="awal" />
					</div>

					<br>

					<div>
	          Tanggal Berakhir
						<input class="form-control frm" id="akhir" type="date" name="akhir"   class="form-control frm" />
					</div>

					<br>

					<div class="modal-footer col-md-12" style="margin:0; padding:0;">
						<div class="input-group-inline">
							<div class="form-group">
								<button class="btn btn-primary pull-right frm" type="submit" name="submit" value="Submit"><i class="fa fa-check"></i> Submit</button>
								<button class="btn btn-secondary pull-right frm" type="reset" name="reset" value="Reset"><i class="fa fa-reset"></i> Reset</button>
							</div>
						</div>
					</div>

				</div>
			</form>
		</div>
	</body>
</html>
