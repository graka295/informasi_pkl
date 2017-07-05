<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min1.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
	</head>
  <style media="screen">
    .frm{
      border-radius: 0px;
    }
  </style>
	<body>
    <br>
    <div class="container modal-content frm">
  		<?php foreach ($ruangan as $row){ ?>
  		<form name="fform" method="POST" action="<?php echo base_url()."index.php/crud/edit_ruangan/".$row['kode_ruangan'];?>" >

				<div class="modal-header">
					<div class="display-4">
						<a href = "<?=$_SERVER["HTTP_REFERER"]?>"><i class="fa fa-angle-left"></i></a>
							Edit Ruangan
					</div>
				</div>

  			<br>
        <div class="col-md-12">
          <div class="form-group">
            <label for="kode">Kode Ruangan</label>
            <input class="form-control frm" id="kode"  type="text" name="kd" placeholder="Kode Ruangan" value="<?php echo $row['kode_ruangan'];?>" disabled required>
          </div>
  			</div>

  			<div class="col-md-12">
          <div class="form-group">
            <label for="ruangan">Nama Ruangan</label>
            <input class="form-control frm" id="ruangan" type="text" name="nama" placeholder="Nama Ruangan" value="<?php echo $row['nama_ruangan']; ?>" required>
          </div>
  			</div>

  			<br>

        <div class="modal-footer col-md-12">
  				<input class="btn btn-primary pull-right frm" type="submit" name="submit" value="submit">
  				<input class="btn btn-secondary pull-right frm" type="reset" name="reset" value="reset">
        </div>
		  <?php }?>
    </div>
	</body>
</html>
