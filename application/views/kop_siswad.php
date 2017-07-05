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
   <style media="screen">
   .printbreak {
      page-break-before: always;
     }
   </style>
  </head>
  <body>
    <div class="container">
      <div class="table-responsive">
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
          Data Peserta
          <br>
          <br>
        </h5>
      </div>
      <br>
      <?php foreach($data as $d){ ?>
      <div class="container table-responsive" align="left">
        <table>
          <tr>
            <td rowspan="5" width="270px">
              <div class="col-md-12" style="margin:0; padding:0;">
                <div class="col-md-6">
                  <img alt="User Pic" src="<?php echo base_url()."gambar/".$d['foto']?>" class="img-responsive" width="270px" height="270px">
                </div>
              </div>
            </td>

            <td>
              <div class="col-md-12">
                <b>NIS</b> : <?php echo $d['nis'] ?>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="col-md-12">
                <b>NAMA</b> : <?php echo $d['nama'] ?>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="col-md-12">
                <b>JURUSAN</b> : <?php echo $d['nama_jurusan'] ?>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="col-md-12">
                <b>SEKOLAH</b> : <?php echo $d['nama_sekolah'] ?>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="col-md-12">
                <b>KEGIATAN</b> : <?php echo $d['kegiatan'] ?>
              </div>
            </td>
          </tr>


        </table>
      </div>
      <br>
      <div class="printbreak">
        <div class="container">
        <table class="table">
          <tr>
            <td>
              <div class="col-md-12" style="margin:0; padding:0;">
                <div class="col-md-6">
                  <label  for="pembimbing">Pembimbing</label>
                </div>
            </td>
            <td>
                <div class="col-md-6">
                  <div class="" id="pembimbing">
                    <?php echo $d['nama_pembimbing'] ?>
                  </div>
                </div>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="col-md-12" style="margin:0; padding:0;">
                <div class="col-md-6">
                  <label  for="pengawas">Pengawas</label>
                </div>
            </td>
            <td>
                <div class="col-md-6" id="pengawas">
                  <?php echo $d['nama_pengawas'] ?>
                </div>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="col-md-12" style="margin:0; padding:0;">
                <div class="col-md-6">
                  <label  for="jeniskelamin">Jenis Kelamin</label>
                </div>
            </td>
            <td>
              <div class="col-md-6">
                <div class="" id="jeniskelamin">
                  <?php
                    if ($d['jenis_kelamin']=="L") {
                      echo "Laki - Laki";
                    }

                    else{
                      echo "Perempuan";
                    }
                  ?>
                </div>
              </div>
            </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="col-md-12" style="margin:0; padding:0;">
                <div class="col-md-6">
                  <label  for="telepon">No Telpon</label>
                </div>
            </td>
            <td>
              <div class="col-md-6">
                <div class="" id="telepon">
                  <?php echo $d['telepon'] ?>
                </div>
              </div>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="col-md-12" style="margin:0; padding:0;">
                <div class="col-md-6">
                  <label  for="email">Email</label>
                </div>
            </td>

            <td>
                <div class="col-md-6" id="email">
                  <?php echo $d['email'] ?>
                </div>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="col-md-12" style="margin:0; padding:0;">
                <div class="col-md-6">
                  <label  for="awal">Awal PKL : <?php echo $d['mulai'] ?></label>
                </div>
              </div>
            </td>

            <td>
              <div class="col-md-12" style="margin:0; padding:0;">
                <div class="col-md-6">
                  <label  for="akhir">Akhir PKL : <?php echo $d['selesai']?></label>
                </div>
            </td>
            <td>
              </div>
            </td>
          </tr>

          <?php }?>
        </table>
      </div>
      </div>
      <br><br><br>
      <div class="printbreak">
        <div class="container">
          <br>
        <div class="col-md-3">
          <b>BERKAS PESERTA</b>
        </div>

        <br>
        <div class="col-md-12">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>
                  Nama Berkas
                </th>
                <th>
                  Keterangan
                </th>
              </tr>
            </thead>
            <?php foreach ($file as $rows) { ?>
            <tr>
              <td>
                <?php echo $rows['nama'];?></a>
              </td>

              <td>
                <?php echo $rows['keterangan'];?>
              </td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
      <div class="col-md-12">
        <div class="col-md-6">
          <a class="btn btn-primary frm" href="#" type="submit" name="submit" id="print" onclick="myFunction()"><i class="fa fa-mail-forward"></i> Kirim&nbsp;</a>
        </div>
      </div>
      </div>
      <br>
    </div>
  </body>
</html>
