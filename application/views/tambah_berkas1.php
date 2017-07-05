<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min1.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets\css\sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
    <script src="<?php echo base_url();?>assets\js\jquery.js"></script>
    <script src="<?php echo base_url();?>assets\js\user.js"></script>
    <script src="<?php echo base_url();?>assets\js\sweetalert2.min.js"></script>
    <script src="<?php echo base_url();?>assets\js\bootstrap.min.js"></script>
    <style media="screen">
      .frm {
        border-radius: 0px;
      }
    </style>
    <script type="text/javascript">
    $(document).ready(function(){
    $("#file").change(function(){bacafile(this);});
    $("#file").change(isi);
    $('#namafile').keyup(isi);
    $('#ket').keyup(isi);
      })
    function isi(){
      if($(this).val()==""){
         $(this).parent().removeClass("form-group has-danger");      
      }
      else{
        $(this).parent().removeClass("form-group has-danger");     
      }
    }
  function bacafile(input){
     if (input.files && input.files[0]){
      var file = $('#file').val(); //Ambil Value
    var ekstensi = ['rar','zip']; //Variabel array untuk penentuan Ekstensi
    var ambilekstensi = file.split('.');  //Ambil Ekstensi
        ambilekstensi = ambilekstensi.reverse();
          if ( $.inArray ( ambilekstensi[0].toLowerCase(), ekstensi ) > -1 ){
              $(this).parent().removeClass("form-group has-danger");
          }
       else{
        sweetAlert(
        'Oops...',
          'Tipe File Harus Rar/Zip !!',
          'error'
          );
        $("#file").addClass("form-control-danger");
        $("#file").parent().addClass("form-group has-danger");
        $("#file").focus();
        }
    }
    }
  function cek(){
    var file = $('#file').val();
    var ekstensi = ['rar','zip'];
    if (file==""){
        $("#file").addClass("form-control-danger");
        $("#file").parent().addClass("form-group has-danger");
        $("#file").focus();
        return false;
    }
    else if($("#namafile").val()==""){
     $("#namafile").addClass("form-control-danger");
     $("#namafile").parent().addClass("form-group has-danger");
    $("#namafile").focus();
    return false;
    }
    else if($("#ket").val()==""){
     $("#ket").addClass("form-control-danger");
     $("#ket").parent().addClass("form-group has-danger");
    $("#ket").focus();
    return false;
    }
      else{
      var ambilekstensi = file.split('.');  //Ambil Ekstensi
        ambilekstensi = ambilekstensi.reverse();
          if ( $.inArray ( ambilekstensi[0].toLowerCase(), ekstensi ) > -1 ){
        var uploadedFile = document.getElementById('file');
        var fileSize = uploadedFile.files[0].size;
        var _size = (fileSize/1000000);
          if(_size > 30){
      sweetAlert(
      'Oops...',
      'Ukuran File Tidak Boleh Lebih Dari 30mb !!',
      'error'
      );
        $("#file").addClass("form-control-danger");
        $("#file").parent().addClass("form-group has-danger");
        $("#file").focus();
        return false;
        }
          }
       else{
        sweetAlert(
        'Oops...',
          'Tipe File Harus Rar/Zip !!',
          'error'
          );
        $("#file").addClass("form-control-danger");
        $("#file").parent().addClass("form-group has-danger");
        $("#file").focus();
        return false;
        }
    }
    }
    </script>
  </head>
  <body>
    <div class="container">
        <form name="fform" method="POST" onSubmit="return cek()" enctype="multipart/form-data" action="<?php echo base_url()."index.php/crud/insert_kegiatan";?>" >
          <div>
          <span class="block input-icon input-icon-right">
            File
            <input class="custom-file" type="file" maxlength="30" name="userfile" size="20" laceholder="File" id="file" />
          </span>
          </div>
          <div>
          <span class="block input-icon input-icon-right">
            Nama File
            <input type="text" name="nama" class="form-control frm" maxlength="30" placeholder="Masukan Nama File"  id="namafile">
          </div>
          </span>
          <div>
          <span class="block input-icon input-icon-right">
            Keterangan
            <input class="form-control frm" type="text" maxlength="100" placeholder="Masukan Keterangan" name="ket" id="ket">
          </span> 
          </div>
          <?php foreach ($data as $d) {
           ?>
            <br>
            <input type="hidden" name="cari" value="<?php echo $d['nama_sekolah'];?>"readonly>
            <input type="hidden" name="siswa" value="<?php echo $d['nis'];?>" readonly>
          <div class="input-group-inline">
        <?php }
        ?>
        <div class="modal-footer col-md-12" style="margin:0; padding:0;">
          <div class="input-group-inline">
            <div>
            <span class="block input-icon input-icon-right">
              <button class="btn btn-primary pull-right frm" type="submit" name="submit" value="Submit" onSubmit="return cek()"><i class="fa fa-check"></i> Submit</button>
              <button class="btn btn-secondary pull-right frm" type="reset" name="reset" value="Reset"><i class="fa fa-reset"></i> Reset</button>
            </div>
          </div>
        </div>
          </div>
        </form>
      </div>
  </body>
</html>
