<html>
	<head>
		<title>
			Edit Pembimbing
		</title>
		<script src="<?php echo base_url();?>assets\js\jquery.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\sweetalert-master\dist\sweetalert.css">
    <script src="<?php echo base_url();?>assets\js\sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>assets\js\user.js"></script>
		<script src="<?php echo base_url();?>assets\js\bootstrap.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min1.css">
   	<link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min.css">
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
		    else if($("#jabatan").val()==""){
		    $("#jabatan").addClass("form-control-danger");
		    $("#jabatan").parent().addClass("form-group has-danger");
		    $("#jabatan").focus();
		    return false;
		    }
		    else if (!cekuser($("#jabatan").val())){
		    $("#jabatan").focus();
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
		    else if($("#alamat").val()==""){
		    $("#alamat").addClass("form-control-danger");
		    $("#alamat").parent().addClass("form-group has-danger");
		    $("#alamat").focus();
		    return false;
		    }
			else if($("#nip").val().length<18){
		 	sweetAlert(
		   'Oops...',
		   'NIP Harus 18 Karaketer!',
		   'error'
		    );
		    $("#nip").addClass("form-control-danger");
		    $("#nip").parent().addClass("form-group has-danger");
		    $("#nip").focus();
		   $("#nip").focus();
		   return false;
		   }
		   else{
		   return true;
		   }
		  }
		</script>
	</head>
	<body style="margin-top:15px;">
		<div>
			<div class="container modal-content frm">
				<div class="modal-header">
					<div class="display-4">
						<a href = "<?=$_SERVER["HTTP_REFERER"]?>"><i class="fa fa-angle-left"></i></a>
							Edit Pembimbing
						</div>
				</div>
				<?php foreach ($data as $row) {
		 		?>
				<div class="container">

					<form name="fform" onSubmit="return cek()" method="POST" action="<?php echo base_url()."index.php/crud/edit_pembimbing/".$row['nip'];?>" >
						<br>
						<div class="col-md-6">
							<span class="block">Nomor Induk <br>
								<input class="form-control frm" id="nip" type="text" name="nip" placeholder="NIP" value="<?php echo $row['nip'];?>" disabled required>
							</span>
						</div>

						<div class="col-md-6">
							<span class="block">Nama <br>
								<input class="form-control frm huruf" id="nama" type="text" name="nama" maxlength="30" placeholder="Nama" value="<?php echo $row['nama_pembimbing']; ?>" required>
							</span>
						</div>

						<div class="col-md-6">
							<span class="block">Jabatan <br>
								<input class="form-control frm huruf" type="text" id="jabatan" name="jabatan" maxlength="30" placeholder="Jabatan" value="<?php echo $row['jabatan']; ?>" required>
							</span>
						</div>

						<div class="col-md-6">
							<span>Telepon <br>
								<input class="form-control frm angka" type="text" id="telepon" name="telepon" placeholder="Telepon" value="<?php echo $row['telepon']; ?>" required>
							</span>
						</div>

						<div class="col-md-12">
							<span>Email <br>
								<input class="form-control frm email" type="email" id="email" maxlength="30" name="email" placeholder="Email"  value="<?php echo $row['email']; ?>" required>
							</span>
						</div>

						<div class="col-md-12">
							<span class="block">Alamat <br>
								<textarea class="form-control frm" id="alamat" name="alamat"><?php echo $row['alamat'];?></textarea>
							</span>
							<br>
						</div>

						<div class="modal-footer col-md-12">
							<input class="btn btn-primary pull-right frm" type="submit" name="submit" value="submit" onSubmit="return cek()">
							<input class="btn btn-secondary pull-right frm" type="reset" name="reset" value="reset">
						</div>
					</form>
				</div>
			</div>
			<?php }?>
		</div>
	</body>
</html>
