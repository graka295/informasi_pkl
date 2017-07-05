	<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Laporan
    </title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\bootstrap.min.css" media="all">
	 <style media="screen">
	 	.frm {
	 		border-radius:0;
	 	}
	 </style>
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

        <h3 align="l">
          Data Pengawas
        </h3>
      </div>
			<?php
          foreach($pengawas as $s) {
        ?>
				<br>
				<div class="col-md-3" style="margin:0; padding:0;">
					<b>NIP</b>
				</div>
				<div class="">
					<?php echo $s['nip'] ?>
				</div>
				<div class="col-md-3" style="margin:0; padding:0;">
					<b>Nama</b>
				</div>
				<div class="">
					<?php echo $s['nama_pengawas']; ?>
				</div>
				<div class="col-md-3" style="margin:0; padding:0;">
					<b>Alamat</b>
				</div>
				<div class="">
					<?php  echo $s['alamat']; ?>
				</div>
				<div class="col-md-3" style="margin:0; padding:0;">
					<b>Email</b>
				</div>
				<div class="">
					<?php echo $s['email']; ?>
				</div>
				<div class="col-md-3" style="margin:0; padding:0;">
					<b>Telepon</b>
				</div>
				<div class="">
					<?php echo $s['telepon']; ?>
				</div>
				<div class="col-md-3" style="margin:0; padding:0;">
					<b>Asal Sekolah</b>
				</div>
				<div>
					<?php  echo $s['asal_sekolah']; ?>
				</div>

        <?php }?>

				<br>
        <h3>Data siswa pengawas</h3>
        <table class="table table-hover table-bordered" align="center" id='boldStuff'>
        <thead>
          <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis  Kelamin</th>
            <th>Sekolah</th>
            <th>Jurusan</th>
            <th>Pembimbing</th>
            <th>Pengawas</th>
            <th>Awal PKL</th>
            <th>Akhir PKL</th>
            <th>Status</th>
          </tr>
        </thead>
        <?php

          $no = 1;
          foreach($siswa as $d){?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $d['nis'] ?></td>
          <td><?php echo $d['nama'] ?></td>
          <td>
            <?php
              if ($d['jenis_kelamin']=="L") {
                echo "Laki - Laki";
              }

              else{
                echo "Perempuan";
              }
            ?>
          </td>

          <td><?php echo $d['nama_sekolah'] ?></td>
          <td><?php echo $d['nama_jurusan'] ?></td>
          <td><?php echo $d['nama_pembimbing'] ?></td>
          <td><?php echo $d['nama_pengawas'] ?></td>
          <td><?php echo $d['mulai'] ?></td>
          <td><?php echo $d['selesai']?></td>
          <td>

              <?php
                $today=date ("Y-m-d");
                $tgl_mulai = strtotime($d['mulai']);
                $tgl_selesai = strtotime($d['selesai']);
                $tgl_today = strtotime($today);
                if ($tgl_today <= $tgl_selesai && $tgl_today >= $tgl_mulai){
                  echo "Masih PKL";
                }
                else if ($tgl_today < $tgl_selesai && $tgl_today < $tgl_mulai){
                  echo "Belum PKL";
                }
                else{
                  echo "Selesai";
                }
              ?>
          </td>
        </tr>
        <?php
        } ?>

      </table>
    <input class="btn btn-primary frm" type="submit" name="submit" id="print" onclick="myFunction()">
    </div>
  </body>
</html>
