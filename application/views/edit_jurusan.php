<html>
	<head>
    <link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min1.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets\css\sweetalert.css">
    <script src="<?php echo base_url();?>assets\js\jquery.js"></script>
    <script src="<?php echo base_url();?>assets\js\sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>assets\js\user.js"></script>
    <script src="<?php echo base_url();?>assets\js\bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
    <script type="text/javascript">
        function cek(){
				  if($("#nama").val()==""){
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
		<style media="screen">
			.frm{
				border-radius: 0px;
			}
		</style>
	</head>
	<body>
		<br>
		<div class="container modal-content frm">
  		<?php foreach ($jurusan as $row){ ?>
  		<form name="fform" method="POST" onSubmit="return cek()" action="<?php echo base_url()."index.php/crud/edit_jurusan/".$row['kode_jurusan'];?>" >
  			<div class="modal-header">
  				<div class="display-4">
  					<a href = "<?=$_SERVER["HTTP_REFERER"]?>"><i class="fa fa-angle-left"></i></a>
						Edit Jurusan
  				</div>
  			</div>

  			<br>
        <div class="col-md-12">
          <div class="form-group">
            <label for="kode">Kode Jurusan</label>
            <input class="form-control frm" id="kode"  type="text" name="kd" placeholder="Kode Jurusan" value="<?php echo $row['kode_jurusan'];?>" disabled >
          </div>
  			</div>

  			<div class="col-md-12">
          <div class="form-group">
            <label for="jurusan">Nama Jurusan</label>
            <input class="form-control frm" id="nama" type="text" maxlength="10" name="nama" placeholder="Nama Jurusan" value="<?php echo $row['nama_jurusan']; ?>" >
          </div>
  			</div>

  			<br>

        <div class="modal-footer col-md-12">
  				<input class="btn btn-primary pull-right frm" type="submit" name="submit" value="submit">
  				<input class="btn btn-secondary pull-right frm" type="reset" name="reset" value="reset">
        </div>
		  <?php }?>
    </div>
		<br>
	</body>
</html>
