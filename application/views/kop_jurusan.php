<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Laporan
    </title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\font-awesome\css\font-awesome.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\bootstrap.min.css" media="all">
   <script type="text/javascript">
     function myFunction() {
      document.getElementById("print").style.visibility = 'hidden';
      window.print();
}
   </script>
  </head>
  <body>
    <div class="container">
      <div class="">
        <div class="">

          <br>

          <div class="col-md-12">
            <div class="col-md-2">
              <img src="<?php echo base_url(); ?>assets\img\log.png" alt="" / style="float:left;" width="50px" height="50px;">
            </div>

            <div class="col-md-8">
              <h3 align="center">
                Universitas Pendidikan Indonesia
              </h3>
            </div>

            <div class="col-md-2">
              &nbsp;
            </div>

          </div>

          <h5 align="center">
            Alamat: Jl. Dr Setiabudhi No. 229, Kota Bandung, Jawa Barat 40154 Telepon: (022) 2013163

          </h5>

        </div>

        <hr>

        <br>

        <h4 align="center">
          Laporan Sistem Informasi Prakerin
        </h4>

        <h5 align="center">
          Data Semua Pengawas
        </h5>
      </div>
      <table class="table table-hover table-bordered">

      <tr>
        <th>#</th>
        <th>Kode Jurusan</th>
        <th>Nama Jurusan</th>
      </tr>
        <?php
        $no = 1;
          foreach($jurusan as $s) {
        ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $s['kode_jurusan']?></td>
        <td><?php echo $s['nama_jurusan']?></td>
        <?php
          }
        ?>
      </tr>
    </table>
      <a class="btn btn-primary frm" href="#" type="submit" name="submit" id="print" onclick="myFunction()"><i class="fa fa-mail-forward"></i> Kirim&nbsp;</a>
    </div>
  </body>
</html>