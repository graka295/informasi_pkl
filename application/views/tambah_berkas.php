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
    .frm{
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

    function ambil_sekolah(){
    var xmlhttp;
    var cari = document.fform.cari.value;
      if(window.XMLHttpRequest){
          xmlhttp = new XMLHttpRequest();
      }
      else{ 
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState ==XMLHttpRequest.DONE)
        {
        if(xmlhttp.status == 200){
          document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
        }
        else if(xmlhttp.statyus == 400){
          alert('there was an eror 400')
        }
        else{
          alert('something else other than 200 was retuned')
        }
      }

  }
  xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/cari_kegiatan?cari="+cari,true);
  xmlhttp.setRequestHeader(
  "Content-type","application/x-www-from-urlencoded");
  xmlhttp.send(cari);
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
        $("#file").addClass("form-control-danger");
        $("#file").parent().addClass("form-group has-danger");
        $("#file").focus();
        sweetAlert(
        'Oops...',
          'Tipe File Harus Rar/Zip !!',
          'error'
          );
        }
    }
    }
  function cek(){
    var mySelect1 = document.getElementById("sekolah");
    var mySelect2 = document.getElementById("myDiv1");
    var mySelection1 = mySelect1.selectedIndex;
    var mySelection2 = mySelect2.selectedIndex;
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
    else if(mySelection1==0){
        $("#sekolah").addClass("form-control-danger");
        $("#sekolah").parent().addClass("form-group has-danger");
        $("#sekolah").focus();
        return false;
         }
    else if(mySelection2==0){
        $("#myDiv1").addClass("form-control-danger");
        $("#myDiv1").parent().addClass("form-group has-danger");
        $("#myDiv1").focus();
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
            <input class="custom-file" type="file" maxlength="30" name="userfile" size="20" placeholder="File" id="file" />
            </span>
            </div>
            <br>
            <div>
            <span class="block input-icon input-icon-right">
            Nama File
            <input type="text" class="form-control frm" maxlength="30" placeholder="Masukan Nama File"  id="namafile" name="nama">
            </span>
            </div>
            <br>
            <div>
            <span class="block input-icon input-icon-right">
            Keterangan
            <input class="form-control frm" type="text" placeholder="Masukan Keterangan" maxlength="100" name="ket" id="ket">
            </span>
            </div>
            <br>
            <div>
            <span class="block input-icon input-icon-right">
            Sekolah
            <select class="form-control frm sel" name="cari" onchange="ambil_sekolah()" id="sekolah">
              <option style="display:none" value="0">Sekolah</option>
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
            <div>
            <span class="block input-icon input-icon-right">
            Siswa
            <select class="form-control frm sel" name="siswa" id="myDiv1">
              <option style="display:none" value="0">Pilih Siswa</option>
            </select>
            </span>
            </div>
            <br>
            <div class="modal-footer" style="margin:0; padding:0;">
  					<br>
  					<button class="btn btn-primary pull-right frm" type="submit" name="submit" value="Submit" onSubmit="return cek()"><i class="fa fa-check"></i> Submit</button>
  					<button class="btn btn-secondary pull-right frm" type="reset" name="reset" value="Reset"><i class="fa fa-reset"></i> Reset</button>
  				</div>
        </form>
    </div>
  </body>
</html>
