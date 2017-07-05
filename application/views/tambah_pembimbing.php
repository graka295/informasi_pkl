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
	</head>
	<style media="screen">
		.frm{
			border-radius: 0px;
		}
	</style>
<script type="text/javascript">
$(document).ready(function(){
   		$('.angka').keyup(angka);
    	$('.huruf').keyup(huruf);
        $('#alamat').keyup(alamat);
    	$('.email').focusout(email);
    	})

function cek(){
    var emailfilter = /^\w+[\+\.\w\-]*@([\w\-]+\.)*\w+[\w\-]*\.([a-z]{2,4}|\d+)$/ig;
    var checkval = emailfilter.test($("#email").val());
 if($("#nip").val()==""){
    $("#nip").addClass("form-control frm-danger");
    $("#nip").parent().addClass("form-group has-danger");
    $("#nip").focus();
    return false;
    }
    else if (cekuser($("#nip").val())) {
    $("#nip").focus();
    return false;
    }
    else if (isNaN($("#nip").val())) {
    $("#nip").focus();
    return false;
    }
    else if($("#nama").val()==""){
    $("#nama").addClass("form-control frm-danger");
    $("#nama").parent().addClass("form-group has-danger");
    $("#nama").focus();
    return false;
    }
    else if (!cekuser($("#nama").val())){
    $("#nama").focus();
    return false;
    }
    else if($("#jabatan").val()==""){
    $("#jabatan").addClass("form-control frm-danger");
    $("#jabatan").parent().addClass("form-group has-danger");
    $("#jabatan").focus();
    return false;
    }
    else if (!cekuser($("#jabatan").val())){
    $("#jabatan").focus();
    return false;
    }
    else if($("#telepon").val()==""){
    $("#telepon").addClass("form-control frm-danger");
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
    $("#email").addClass("form-control frm-danger");
    $("#email").parent().addClass("form-group has-danger");
    $("#email").focus();
    return false;
    }
    else if (checkval == false) {
    $("#email").focus();
    return false;
    }
    else if($("#alamat").val()==""){
    $("#alamat").addClass("form-control frm-danger");
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
    $("#nip").addClass("form-control frm-danger");
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
<body>
	<div class="container">
			<form name="fform" method="POST" onSubmit="return cek()" action="<?php echo base_url()."index.php/crud/insert_pembimbing";?>">
				<div>
                <span class="block input-icon input-icon-right frm">NIP
				<input type="text" name="nip"  placeholder="Masukan NIP" id="nip" maxlength="18"   class="form-control frm angka">
                </span>
				</div>
                <br>
				<div>
                <span class="block input-icon input-icon-right frm">Nama Pembimbing
				<input type="text" name="nama"  placeholder="Masukan Nama" id="nama" maxlength="30"   class="form-control frm huruf">
                </span>
				</div>
                <br>
				<div>
                <span class="block input-icon input-icon-right frm">Jabatan
				<input type="text" name="jabatan"  placeholder="Masukan Jabatan" id="jabatan" maxlength="30"  class="form-control frm huruf">
                </span>
				</div>
                <br>
				<div>
                <span class="block input-icon input-icon-right frm">No. Telp
				<input type="text" name="telepon"  placeholder="No.Telp" id="telepon"   class="form-control frm angka">
				</div>
                <br>
				<div>
                <span class="block input-icon input-icon-right frm">Email
				<input type="text" name="email"  placeholder="Masukan Email" id="email" maxlength="30"   class="form-control frm email">
                </span>
				</div>
                <br>
				<div>
                <span class="block input-icon input-icon-right frm">Alamat
				<textarea class="form-control frm"  placeholder="Masukan Alamat" name="alamat" id="alamat" maxlength="100"></textarea>
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
