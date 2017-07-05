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
		<script type="text/javascript">
			$(document).ready(function(){
				$('.sel').change(selected);
				$('#alamat').keyup(alamat);
			    $('.angka').keyup(angka);
			    $('.huruf').keyup(huruf);
			    $('.email').focusout(email);
			    })
			function cek(){
			    var emailfilter = /^\w+[\+\.\w\-]*@([\w\-]+\.)*\w+[\w\-]*\.([a-z]{2,4}|\d+)$/ig;
			    var checkval = emailfilter.test($("#email").val());
				  if($("#nip").val()==""){
			    $("#nip").addClass("form-control-danger");
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
			      var mySelect = document.getElementById("sekolah");
			      var mySelection = mySelect.selectedIndex;
			      if(mySelection==0){
			      $("#sekolah").addClass("form-control-danger");
			      $("#sekolah").parent().addClass("form-group has-danger");
			      $("#sekolah").focus();
			      return false;
			      }
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
		<style media="screen">
			.frm{
				border-radius: 0px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="">
        <form name="fform" method="POST" onSubmit="return cek()" action="<?php echo base_url()."index.php/crud/insert_pengawas";?>">
				<div>
          <span class="block input-icon input-icon-right">NIP
			<input type="text" class="frm form-control angka" name="nip" placeholder="Masukan NIP" maxlength="18" id="nip" class="angka form-control">
          </span>
				</div>
          <br>
				<div>
          <span class="block input-icon input-icon-right">Nama Pengawas
					<input type="text" class="frm form-control huruf" name="nama" placeholder="Masukan Nama" maxlength="30" id="nama" class="huruf form-control">
          </span>
				</div>
          <br>
				<div>
          <span class="block input-icon input-icon-right">Alamat
					<textarea name="alamat" placeholder="Masukan Alamat" id="alamat" class="form-control frm" maxlength="100"></textarea>
          </span>
				</div>
          <br>
				<div>
          <span class="block input-icon input-icon-right">Email
					<input type="text" class="frm form-control email" name="email" placeholder="Masukan Email" id="email" maxlength="30" class="email form-control">
          </span>
				</div>
          <br>
				<div>
          <span class="block input-icon input-icon-right">No.Tlpn
					<input type="text" class="frm form-control angka" name="telepon" placeholder="No.Telp" id="telepon" maxlength="15" class="angka form-control">
          </span>
				</div>
        <br>
				<div>
          <span class="block input-icon input-icon-right">Sekolah :
					<select name="asal" class="frm form-control sel" id="sekolah">
						<option value="" style="display:none" >Pilih Asal Sekolah</option>
						<?php
						foreach($data_sekolah as $row){?>
							<option value="<?php echo $row['npsn']?>"><?php echo $row['nama_sekolah']?></option>
							<?php
						}
						?>
					</select>
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
		</div>
	</body>
</html>
