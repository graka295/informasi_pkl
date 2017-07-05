<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min1.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\sweetalert.css">
    <script src="<?php echo base_url();?>assets\js\jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets\js\sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>assets\js\user.js"></script>
		<script src="<?php echo base_url();?>assets\js\bootstrap.min.js"></script>
		<style media="screen">
		.frm{
			border-radius: 0px;
		}
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.angka').keyup(angka);
		    $('.huruf').keyup(huruf);
		    $('.email').focusout(email);
		  })
			function cek(){
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
		else if (cekuser($("#telepon").val())) {
		$("#telepon").focus();
		return false;
		}
		else if (isNaN($("#telepon").val())) {
		$("#telepon").focus();
		return false;
		}
    else{
      if($("#nip").val().length<18){
      sweetAlert(
      'Oops...',
      'NIP Harus 18 Karaketer!',
      'error'
      );
      $("#nip").focus();
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
			<div class="modal-header">
				<div class="display-4">
					<a href = "<?=$_SERVER["HTTP_REFERER"]?>"><i class="fa fa-angle-left"></i></a>
						Edit Pengawas
					</div>
			</div>
			<?php foreach ($data as $pengawas) {?>
			<form name="fform" method="POST" onSubmit="return cek()" action="<?php echo base_url()."index.php/crud/edit_pengawas/".$pengawas['nip'];?>" onsubmit="cek()">
			<br>
			<div class="col-md-6">
				<span class="block">NIP <br>
					<input class="form-control frm" id="nip" type="text" name="nip" placeholder="NIP" value="<?php echo $pengawas['nip']; ?>" disabled>
				</span>
			</div>
			<div class="col-md-6">
				<span class="block">Nama <br>
					<input class="form-control frm huruf" id="nama" type="text" maxlength="30" name="nama" placeholder="Nama" value="<?php echo $pengawas['nama_pengawas'];?>">
				</span>
			</div>

			<br>

			<div class="col-md-12">
				<span class="block">Alamat <br>
					<textarea class="textarea form-control" id="alamat" name="alamat"><?php echo $pengawas['alamat'];?></textarea>
				</span>
			</div>

			<br>

			<div class="col-md-6">
				<span class="block">Email <br>
					<input class="form-control frm email" id="email" type="text" maxlength="30" name="email" placeholder="Email" value="<?php echo $pengawas['email']; ?>"   >
				</span>
			</div>
			<div class="col-md-6">
				<span class="block">Telepon <br>
					<input class="form-control frm angka" id="telepon" type="text" name="telepon" placeholder="TELEPON" value="<?php echo $pengawas['telepon']; ?>"   >
				</span>
			</div>
			<br>
			<div class="col-md-12">
				<span class="block">Asal Sekolah <br>
					<select class="custom-select form-control frm" id="sekolah" name="asal"   >
						<option style="display:none;"  value="<?php echo $pengawas['asal_sekolah'];?>"><?php echo $pengawas['nama_sekolah'];?></option>
						<?php
						foreach($data_sekolah as $ro){ ?>
							<option value="<?php echo $ro['npsn']?>"><?php echo $ro['nama_sekolah']?></option>
							<?php
						}
						?>
					</select>
					<br><br>
				</span>
			</div>

			<?php } ?>

			<div class="modal-footer col-md-12">
				<input class="btn btn-primary pull-right frm" type="submit" name="submit" value="submit" onSubmit="return cek()">
				<input class="btn btn-secondary pull-right frm" type="reset" name="reset" value="reset">
			</div>
		</form>
		</div>
	</body>
</html>
