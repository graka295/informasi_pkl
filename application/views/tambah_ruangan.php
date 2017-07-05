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
		$('#kode').keyup(isi);
		$('#nama').keyup(isi);
		})
		function isi(){
		  if($(this).val()==""){
		     $(this).parent().removeClass("form-group has-danger");      
		  }
		  else{
		    $(this).parent().removeClass("form-group has-danger");     
		  }
		}

			function cek(){
		    if($("#kode").val()==""){
			    $("#kode").addClass("form-control-danger");
			    $("#kode").parent().addClass("form-group has-danger");
			    $("#kode").focus();
			    return false;
		    }
		    else if($("#nama").val()==""){
		    $("#nama").addClass("form-control-danger");
		    $("#nama").parent().addClass("form-group has-danger");
		    $("#nama").focus();
		    return false;
		    }
		    else{
		    return true;
		    }
			}
		</script>
		<div class="container" style="margin-top:15px;">
			<form method="POST" onSubmit="return cek()" action="<?php echo base_url()."index.php/crud/insert_ruangan/"?>">
				<div>
				<span class="block input-icon input-icon-right frm">Kode Ruangan
				<input type="text" class="form-control frm" name="kode" maxlength="5" placeholder="Masukan Kode Ruangan"  id="kode">
				</span>
				</div>
				<br>
				<div>
				<span class="block input-icon input-icon-right frm">Nama Ruangan
				<input type="text" class="form-control frm" name="nama" placeholder="Masukan Nama Ruangan" maxlength="30" id="nama">
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