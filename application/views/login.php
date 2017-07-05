<html>
<head>
	<title>Sistem Informasi PKL</title>
	<link rel="icon" href="<?php echo base_url();?>assets/img/log.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min1.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/all.css">
	<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">

		function cek(){
			if($("#username").val()==""){
		    $("#username").addClass("form-control-danger");
		    $("#username").parent().addClass("form-group has-danger");
		    $("#username").focus();
		    return false;
		    }
		    else if($("#password").val()==""){
		    $("#password").addClass("form-control-danger");
		    $("#password").parent().addClass("form-group has-danger");
		    $("#password").focus();
		    return false;
		    }
		    else{
		    	return true;
		    }
		}
	</script>
	<style media="screen">
		body{
			font-weight: 100;
			height: 100vh;
			margin: 0;
			height: 100%;
			width: 100%;
			background: url('<?php echo base_url(); ?>assets/img/hd.png'); background-position: 50% 40%; width:100%; background-repeat:no-repeat;
		}
	</style>
</head>
<body>

	<?php
		$login = $this->session->userdata('username');
		if ($login=='admin') {
			redirect('admin/lihat_siswa');
		}
		else{
		}

	?>

	<body>
		<div class="flex-center position-ref full-height">
			<form name="fform" method="POST" onSubmit="return cek()" action="<?php echo base_url()."index.php/logins/login";?>">
				<br class="hidden-xs-down">
				<br class="hidden-md-up hidden-xs-down">
				<br class="hidden-md-up hidden-xs-down">
			  <div class="container modal-content frm" style="max-width:500px;">
			    <div class="col-md-12 col-sm-12 col-xs-12">
			      <div class="modal-header">
			        <div class="display-4" style="background: url('<?php echo base_url(); ?>assets/img/hd.png'); background-position:70% 30%; width:100%; background-repeat:no-repeat;">
			          Sign In
			        </div>
			      </div>

						<div class="modal-body">
							<div class="form-group container col-md-12 col-sm-12 col-xs-12" style="margin:0; padding:0;">
								<div class="col-md-2 col-sm-2 col-xs-2" style="margin:0; padding:0;">
									<button class="frm form-control" style="border-right:0px;" type="btn" disabled><i class="fa fa-user" aria-hidden="true"></i></button>
								</div>
								<div class="col-md-10 col-sm-10 col-xs-10 col-xs-10" style="margin:0; padding:0;">
									<input type="text" class="form-control frm" id="username" name="username" class="form-control" placeholder="Masukan Username" required>
								</div>
							</div>
							<div class="form-group container col-md-12 col-sm-12 col-xs-12" style="margin:0; padding:0; margin-top:1px; margin-bottom:15px;">
								<div class="col-md-2 col-sm-2 col-xs-2" style="margin:0; padding:0;">
									<button class="frm form-control" style="border-right:0px;" type="btn" disabled><i class="fa fa-key" aria-hidden="true"></i></button>
								</div>
								<div class="col-md-10 col-sm-10 col-xs-10" style="margin:0; padding:0;">
									<input type="password" class="form-control frm" id="password" name="pass" class="form-control" placeholder="********" required>
								</div>
							</div>
						</div>

			      <div class="modal-footer col-md-12 col-sm-12 col-xs-12" style="margin-right:0; padding-right:0;">
			        <div class="col-md-8 col-sm-8 col-xs-10" style="margin:0; padding:0;" align="left">
			          <?php echo $this->session->flashdata('pesan'); ?>
			        </div>
			        <div class="col-md-4 col-sm-4 col-xs-12" style="margin:0; padding:0;">
			          <input class="btn btn-primary pull-right frm" type="submit" name="submit" value="submit">
			        </div>
			      </div>
			    </div>
			  </div>
			</form>
		</div>
		<div class="flex-center hidden-sm-down" style="font-size:25; letter-spacing:0">
			<b>SISTEM INFORMASI PKL</b>
		</div>
		<div class="flex-center hidden-sm-down" style="letter-spacing:10;">
			<b>UNIVERSITAS PENDIDIKAN INDONESIA</b>
		</div>
	</body>
</html>
