<!DOCTYPE html>
<html>
<head>
	<title>Notifacasi</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
	<style type="text/css">
	.keterangan{
		background: white;
		border: 1px solid red;
		padding-bottom: 15px;
		text-align: center;
		font-size: 40px;
	}

	.text {
	font: bold 500% Consolas;
	border-right: .1em solid gray;
	width: 12.9ch;
	overflow: hidden;
	color:	#5cb85c;
	-webkit-animation: type 1s steps(28, end),
	blink-caret .4s step-end infinite alternate;
}
@-webkit-keyframes type { from { width: 0; } }
@-webkit-keyframes blink-caret { 100% { border-color: transparent; } }

	.text1 {
	font: bold 500% Consolas;
	border-right: .1em solid red;
	width: 12.9ch;
	overflow: hidden;
	-webkit-animation: type 5s steps(28, end),
	blink-caret .4s step-end infinite alternate;
}
@-webkit-keyframes type { from { width: 0; } }
@-webkit-keyframes blink-caret { 100% { border-color: transparent; } }

	</style>
</head>
	<body>
	<div class="container">
		<?php echo $this->session->flashdata('pesan'); ?>
		<br><br><br><br>
		<?php echo $this->session->flashdata('keterangan'); ?>
		<br><br><br><br>
		<?php
		$cek=$this->session->flashdata('pesan');
		if ("<p class='text'>Sukses!!!</p>" == $cek) {

		}
		else{
			?>
			<div align='center'>
				<a href = "<?=$_SERVER["HTTP_REFERER"]?>"><input class="btn btn-danger" type="submit" name="Back" value="BACK"></a>
			</div>
			<?php }
			?>
	</div>
	</body>
</html>
