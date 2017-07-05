<html>
<head>
	<title>Sistem Informasi Prakerin</title>
	<link rel="icon" href="<?php echo base_url();?>assets/img/log.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>assets/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>assets/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>assets/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/icon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url();?>assets/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url();?>assets/icon//ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url()."assets/js/highcharts.js"; ?>"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>

	<style media="screen">
	  .navbar {
	    background:#222;
	  }

	  .modal-header{
	    background: #222;
	    color: #eee;
	  }

	  .frm{
	    border-radius: 0;
	  }

	  .wh{
	    color:white;
	  }

	</style>
</head>
<body style="height:100%;">
	<?php
	$login = $this->session->userdata('username');
	if (isset($login)){}
		else{redirect('admin/index');}
		?>

		<nav class="navbar navbar-light frm" style="background-color:#100; margin:0; padding:0;">
			<div class="navbar-brand" style="padding:20; width:100%;	">
				<a class="pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#f1c40f;">
					<div class="dropdown pull-right frm" style="padding:17;">
						<center>
							<span class="text-uppercase" style="margin-right:37.5px; font-size:16; font-weight:600; padding-left:28px;"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?></span>
							<div class="dropdown-menu frm" aria-labelledby="dropdownMenu1" style="background-color:color:#ecf0f1;">
								<a style="margin-right:40px" class="dropdown-item frm" href="<?php echo base_url()."index.php/logins/logout";?>"><center><i class="fa fa-sign-out"></i>LOG OUT</center></a>
							</div>
						</center>
					</div>
				</a>
				<a href="<?php echo base_url();?>admin/" style="text-decoration:none; color:#222; font-size:18px;"><span style="color:#f1c40f;" class="rb">UNIVERSITAS</span> <span class="rb" style="color:#e74c3c;">PENDIDIKAN</span><br><span style="color:#ecf0f1;">INDONESIA</span></a>
			</div>
		</nav>
