<!DOCTYPE html>
<html>
<head>
	<title>Data Sekolah</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min1.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets\css\sweetalert.css">
  <script src="<?php echo base_url();?>assets\js\jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets\js\user.js"></script>
	<script src="<?php echo base_url();?>assets\js\sweetalert.min.js"></script>
	<script src="<?php echo base_url();?>assets\js\bootstrap.min.js"></script>
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
	  })

		function ambil_provinsi(){
			var xmlhttp;
			document.getElementById("myDiv1").innerHTML="<option disabled selected value='kosong' style='display:none'>Pilih Kecamatan</option>";
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
						document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
					}
					else if(xmlhttp.statyus == 400){
						alert('there was an eror 400')
					}
					else{
						alert('something else other than 200 was retuned')
					}
				}

				}
				xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/provinsi1?cari="+cari,true);
				xmlhttp.setRequestHeader(
				"Content-type","application/x-www-from-urlencoded");
				xmlhttp.send(cari);
				xmlhttp.open(cari);
		}

		function ambil_kabupaten(){
			var xmlhttp;
			var kabupaten = document.fform.kabupaten.value;
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
				xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/kabupaten1?kabupaten="+kabupaten,true);
				xmlhttp.setRequestHeader(
				"Content-type","application/x-www-from-urlencoded");
				xmlhttp.send(kabupaten);
				xmlhttp.open(kabupaten);
		}

		function cek(){
			 var selectedValue = $("#myDiv1").val();
		   if($("#telepon").val()==""){
		    $("#telepon").addClass("form-control-danger");
		    $("#telepon").parent().addClass("form-group has-danger");
		    $("#telepon").focus();
		    return false;
		    }
		    else if (cekuser($("#telepon").val())){
		    $("#telepon").focus();
		    return false;
		    }
		    else if (isNaN($("#telepon").val())){
		    $("#telepon").focus();
		    return false;
		    }
		   else{
		 	if(selectedValue==null){
		    $("#myDiv1").addClass("form-control-danger");
		    $("#myDiv1").parent().addClass("form-group has-danger");
		    $("#myDiv1").focus();
		    return false;
		      }

			else if($("#alamat").val()==""){
		    $("#alamat").addClass("form-control-danger");
		    $("#alamat").parent().addClass("form-group has-danger");
		    $("#alamat").focus();
		    return false;
		    }
		    else{
		    return true;
		    }
		   	}
			}
		</script>
</head>
<body>
	<br>
	<div class="container modal-content frm">
		<?php foreach ($data as $s){ ?>
		<form name="fform" method="POST" onSubmit="return cek()" action="<?php echo base_url()."index.php/crud/edit_sekolah/".$s['npsn'];?>" >

			<div class="modal-header">
				<div class="display-4">
					<a href = "<?=$_SERVER["HTTP_REFERER"]?>"><i class="fa fa-angle-left"></i></a>
						Edit Sekolah
					</div>
			</div>

			<br>

			<div class="col-md-6">
				<span class="block input-icon input-icon-right">Kode NPSN
					<input type="text" id="npsn" name="npsn" class="form-control frm" value="<?php echo $s['npsn']?>" disabled    />
				</span>
			</div>

			<div class="col-md-6">
				<span class="block">Nama Sekolah
					<input type="text" id="nama" name="nama_sekolah" class="form-control frm" maxlength="30" value="<?php echo $s['nama_sekolah']?>">
				</span>
			</div>

			<br>

			<div class="col-md-6">
				<span class="block">Email
					<input type="email" maxlength="30" id="email" name="email" class="form-control frm email" value="<?php echo $s['email']?>">
				</span>
			</div>

			<div class="col-md-6">
				<span class="block">No. Telp
					<input type="text" id="telepon" class="form-control frm angka" name="nomber" value="<?php echo $s['no_telepon']?>">
				</span>
			</div>


			<br>

			<div class="col-md-4">
				<span class="block">Provinsi:<br>
					<select class="custom-select  form-control frm" name="cari" onchange="ambil_provinsi()" id="myDi">
						<?php foreach ($select as $cie) { ?>
						<option value="<?php echo $cie['nama_provinsi']; ?>"><?php echo $s['nama_provinsi']; ?></option>
				<?php
					foreach($provinsi as $row){?>
						<option value="<?php echo $row['id']?>"><?php echo $row['nama_provinsi']?></option>
				<?php
				}
				?>
					</select>
				</span>
			</div>

			<br>

			<div class="col-md-4">
				<span class="block">Kabupaten:<br>
					<select class="custom-select form-control frm" name="kabupaten" onchange="ambil_kabupaten()" id="myDiv"  >
						<option value="<?php echo $cie['nama_kabupaten']; ?>"><?php echo $s['nama_kabupaten']; ?></option>
					</select>
				</span>
			</div>

			<div class="col-md-4">
				<span class="blcok">Kecamatan :<br>
					<select class="custom-select form-control frm" name="kecamatan" id="myDiv1"  >
						<option value="<?php echo $cie['nama_kecamatan']; ?>"><?php echo $s['nama_kecamatan']; ?></option>
					</select>
				</span>
			</div>

			<div class="col-md-12">
				<span class="blcok">Alamat Jalan  :<br>
					<textarea class="form-control frm" id="alamat" placeholder="Masukkan Alamat" id="alamat" name="alamat"><?php echo $s['alamat_jalan']?></textarea>
				</span>
			</div>

			<br>
			<?php	} ?>
			<?php
			}
			?>
			<br><br><br><br>
			<br><br><br><br>

			<div class="modal-footer col-md-12">
				<input class="btn btn-primary pull-right frm" onSubmit="return cek()" type="submit" name="submit" value="submit">
				<input class="btn btn-secondary pull-right frm" type="reset" name="reset" value="reset">
			</div>
		</form>
	</div>
</body>
</html>
