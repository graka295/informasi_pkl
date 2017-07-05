<html>
<head>
	<title>Sistem Informasi Prakerin</title>
	<link rel="icon" href="<?php echo base_url();?>assets/img/log.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.css">
	<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url()."assets/js/highcharts.js"; ?>"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
</head>
<body style="height:100%;">
	<?php
	$login = $this->session->userdata('username');
	if (isset($login)){}
		else{redirect('admin/index');}
		?>

		<nav class="navbar navbar-light frm hidden-sm-down" style="background-color:#100; margin:0; padding:0;">
			<div class="navbar-brand" style="background:url(<?php echo base_url();?>assets/img/hd.png); padding:20; background-position: 47% 25%; width:100%; background-repeat:no-repeat; ">
				<a class="pull-right" data-toggle="dropdown" style="color:#ecf0f1;">
					<div class="dropdown pull-right frm" style="padding:17;">
						<center>
							<span class="text-uppercase" style="margin-right:37.5px; font-size:16; font-weight:600; padding-left:28px;"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?></span>
							<div class="dropdown-menu frm">
								<a style="margin-right:40px" class="dropdown-item frm" href="<?php echo base_url()."index.php/logins/logout";?>"><center><i class="fa fa-sign-out"></i>LOG OUT</center></a>
							</div>
						</center>
					</div>
				</a>
				<a href="<?php echo base_url();?>admin/" style="text-decoration:none;"><span style="color:#f1c40f;">UNIVERSITAS</span> <span style="color:#e74c3c;">PENDIDIKAN</span><br><span style="color:#ecf0f1;">INDONESIA</span></a>
			</div>
		</nav>

		<nav class="navbar navbar-light frm hidden-lg-up" style="background-color:#100; margin:0; padding:0;">
			<div class="navbar-brand" style="padding:20; width:100%;">
				<a class="pull-right" data-toggle="dropdown" style="color:#ecf0f1;">
					<div class="dropdown pull-right frm" style="padding:17;">
						<center>
							<span class="text-uppercase" style="margin-right:37.5px; font-size:16; font-weight:600; padding-left:28px;"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?></span>
							<div class="dropdown-menu frm">
								<a style="margin-right:40px" class="dropdown-item frm" href="<?php echo base_url()."index.php/logins/logout";?>"><center><i class="fa fa-sign-out"></i>LOG OUT</center></a>
							</div>
						</center>
					</div>
				</a>
				<a href="<?php echo base_url();?>admin/" style="text-decoration:none; color:#222;"><span style="color:#f1c40f;">UNIVERSITAS</span> <span style="color:#e74c3c;">PENDIDIKAN</span><br><span style="color:#ecf0f1;">INDONESIA</span></a>
			</div>
		</nav>

		<br>
		<div class="hidden-sm-down" style="margin:0; padding:0;">
			<div class="jumbotron jumbotron-fluid jmb" style="padding:15px; background-color:white;">
				<div align="center">
					<h1 class="display-3 text-uppercase hidden-sm-down" style="font-weight:800;">Sistem Informasi PKL</h1>
					<div>
						<a class="lead text-uppercase" style="color:#e74c3c; font-weight:500;" href="<?php echo base_url();?>admin/lihat_siswa">
							Peserta
						</a> -
						<a class="lead text-uppercase" style="color:#e74c3c; font-weight:500;" href="<?php echo base_url();?>admin/lihat_sekolah">
							Sekolah
						</a> -
						<a class="lead text-uppercase" style="color:#e74c3c; font-weight:500;" href="<?php echo base_url();?>admin/lihat_pembimbing">
							Pembimbing
						</a> -
						<a class="lead text-uppercase" style="color:#e74c3c; font-weight:500;" href="<?php echo base_url();?>admin/lihat_pengawas">
							Pengawas
						</a> -
						<a class="lead text-uppercase" style="color:#e74c3c; font-weight:500;" href="<?php echo base_url();?>admin/ruangan">
							Ruangan
						</a> -
						<a class="lead text-uppercase" style="color:#e74c3c; font-weight:500;" href="<?php echo base_url();?>admin/jurusan">
							Jurusan
						</a> -
						<a class="lead text-uppercase" style="color:#e74c3c; font-weight:500;" href="<?php echo base_url();?>admin/kegiatan">
							Berkas
						</a> -
						<a class="lead text-uppercase" style="color:#e74c3c; font-weight:500;" href="<?php echo base_url();?>admin/statistik">
							Statistik
						</a>
					</div>
				</div>
			</div>
		</div>
