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
        <?php echo $judul;?>
        </h5>
      </div>
      <table class="table table-bordered" align="center">
      <tr>
        <th>NPSN</th>
        <th>Nama Sekolah</th>
        <th>Email sekolah</th>
        <th>No Telepon</th>
        <th>Jalan</th>
        <th>Provinsi</th>
        <th>Kabupaten</th>
        <th>Kecamatan</th>
      </tr>
      <?php foreach($data as $a){ ?>
      <tr>
        <td><?php $npsn = $a['npsn'];echo $npsn ?></td>
        <td><?php echo $a['nama_sekolah'] ?></td>
        <td><?php echo $a['email'] ?></td>
        <td><?php echo $a['no_telepon'] ?></td>
        <td><?php echo $a['alamat_jalan'] ?></td>
        <td><?php echo $a['nama_provinsi'] ?></td>
        <td><?php echo $a['nama_kabupaten'] ?></td>
        <td><?php echo $a['nama_kecamatan'] ?></td>
      </tr>
      <?php } ?>
    </table>
      <a class="btn btn-primary frm" href="#" type="submit" name="submit" id="print" onclick="myFunction()"><i class="fa fa-mail-forward"></i> Kirim&nbsp;</a>
    </div>
  </body>
</html>
