<!DOCTYPE html>
<html>
<head>
	<title>Data Sekolah</title>
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min1.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\sweetalert2.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
		<script src="<?php echo base_url();?>assets\js\jquery.js"></script>
		<script src="<?php echo base_url();?>assets\js\user.js"></script>
		<script src="<?php echo base_url();?>assets\js\sweetalert2.min.js"></script>
		<script src="<?php echo base_url();?>assets\js\bootstrap.min.js"></script>
	<style media="screen">
		.frm{
			border-radius: 0px;
		}
	</style>

	<script type="text/javascript">
	$(document).ready(function(){
		$('.sel').change(selected);
		$('#alamat').keyup(alamat);
	    $('.angka').keyup(angka);
	    $('.huruf').keyup(huruf);
	    $('#nama').keyup(nama);
	    $('.email').focusout(email);
	    })
		function nama(){
		$("#nama").popover('hide');
     	$("#nama").parent().removeClass("form-group has-danger");      
		}
		function ambil_provinsi(){
					var xmlhttp;
					document.getElementById("myDiv1").innerHTML="<option disabled selected>Pilih Kecamatan</option>";
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
	var emailfilter = /^\w+[\+\.\w\-]*@([\w\-]+\.)*\w+[\w\-]*\.([a-z]{2,4}|\d+)$/ig;
	var checkval = emailfilter.test($("#email").val());
	   if($("#npsn").val()==""){
	    $("#npsn").addClass("form-control-danger");
	    $("#npsn").parent().addClass("form-group has-danger");
	    $("#npsn").focus();
	    return false;
	    }
	    else if(cekuser($("#npsn").val())) {
	    $("#npsn").focus();
	    return false;
	    }
	    else if (isNaN($("#npsn").val())) {
	    $("#npsn").focus();
	    return false;
	    }
	    else if($("#nama").val()==""){
	    $("#nama").addClass("form-control-danger");
	    $("#nama").parent().addClass("form-group has-danger");
	    $("#nama").focus();
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
	    else if($("#telepon").val()==""){
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
	   	var mySelect = document.getElementById("myDi");
	   	var mySelect1 = document.getElementById("myDiv");
	   	var mySelect2 = document.getElementById("myDiv1");
	    var mySelection = mySelect.selectedIndex;
	    var mySelection1 = mySelect1.selectedIndex;
	    var mySelection2= mySelect2.selectedIndex;
	    if(mySelection==0){
	    $("#myDi").addClass("form-control-danger");
	    $("#myDi").parent().addClass("form-group has-danger");
	    $("#myDi").focus();
	    return false;
	      }
	    else if(mySelection1==0){
	    $("#myDiv").addClass("form-control-danger");
	    $("#myDiv").parent().addClass("form-group has-danger");
	    $("#myDiv").focus();
	    return false;
	      }
	    else if(mySelection2==0){
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
		else if($("#npsn").val().length<8){
	 	sweetAlert(
	   'Oops...',
	   'NPSN Harus 8 Karaketer!',
	   'error'
	    );
	    $("#npsn").addClass("form-control-danger");
	    $("#npsn").parent().addClass("form-group has-danger");
	    $("#npsn").focus();
	   $("#npsn").focus();
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
	<div class="container">
		<form name="fform" method="POST" onSubmit="return cek()" action="<?php echo base_url()."index.php/crud/daftar_sekolah";?>" >
			<div>
				<span class="block input-icon input-icon-right">Kode NPSN
					<input type="text" id="npsn" name="npsn" class="form-control frm angka" id="npsn" maxlength="8" placeholder="Masukan Kode"/>
				</span>
			</div>
			<br>
			<div>
				<span class="block">Nama Sekolah
					<input type="text" name="nama_sekolah" class="form-control frm" id="nama" maxlength="30" placeholder="Masukan Nama"   />
				</span>
			</div>
			<br>

			<div>
				<span class="block">Email
					<input type="text" name="email" class="form-control frm email" id="email" maxlength="30" placeholder="Masukan Email" />
				</span>
			</div>

			<br>

			<div>
				<span class="block">No. Telp
					<input type="text" class="form-control frm angka" placeholder="No.Telp" id="telepon" name="nomber"/>
				</span>
			</div>


			<br>

			<div>
				<span class="block">Provinsi:
					<select class="frm form-control sel" name="cari" onchange="ambil_provinsi()" id="myDi"  >
						<option value="" style="display:none">Pilih Provinsi</option>
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

			<div>
				<span class="block">Kabupaten:
					<select class="frm form-control sel" name="kabupaten" onchange="ambil_kabupaten()" id="myDiv"  >
						<option style="display:none">Pilih Kabupaten</option>
					</select>
				</span>
			</div>

			<br>

			<div>
				<span class="blcok">Kecamatan :
					<select class="frm form-control sel" name="kecamatan" id="myDiv1"  >
						<option style="display:none">Pilih Kecamatan</option>
					</select>
				</span>
			</div>

			<br>

			<div>
				<span class="blcok">Alamat Jalan  :
					<textarea class="form-control frm" placeholder="Masukkan Alamat" id="alamat" name="alamat" maxlength="100"></textarea>
				</span>
			</div>
			<br>
			<div class="modal-footer col-md-12" style="margin:0; padding:0;">
				<div class="input-group-inline">
					<div class="form-group">
						<button class="btn btn-primary pull-right frm" type="submit" name="submit" value="Submit" onSubmit="return cek()"><i class="fa fa-check"></i> Submit</button>
						<button class="btn btn-secondary pull-right frm" type="reset" name="reset" value="Reset"><i class="fa fa-reset"></i> Reset</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
