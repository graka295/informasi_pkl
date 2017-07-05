
<?php header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_jurusan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>			
        <h3 align="center">
            Universitas Pendidikan Indonesia
          </h3>

          <h5 align="center">
            Alamat: Jl. Dr Setiabudhi No. 229, Kota Bandung, Jawa Barat 40154 Telepon: (022) 2013163
          </h5>
        <hr>
	        <h4 align="center">
	          Laporan Sistem Informasi Prakerin
	        </h4>

	        <h5 align="center">
	          Data Jurusan
	        </h5>

		<table border="1">
			<?php echo "<p>".$this->pagination->create_links()."</p>"; ?>
				<thead>
					<tr>
			    <th>#</th>
			    <th>Kode Jurusan</th>
			    <th>Nama Jurusan</th>
			  </tr>
				</thead>

			    <?php
			    $no = 1;
			      foreach($data1 as $s) {
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