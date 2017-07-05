<?php header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_ruangan.xls");
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
	          Data Ruangan
	        </h5>

		<table border="1">
				<thead>
					<?php echo "<p>".$this->pagination->create_links()."</p>"; ?>
					<tr>
		    <th>#</th>
		    <th>Kode Ruangan</th>
		    <th>Nama Ruangan</th>
		  </tr>
				</thead>
		    <?php
		    $no = 1;
		      foreach($data1 as $s) {
		    ?>
		  <tr>
		    <td><?php echo $no++ ?></td>
		    <td><?php echo $s['kode_ruangan']?></td>
		    <td><?php echo $s['nama_ruangan']?></td>
				
		    <?php
		      }
		    ?>
		  </tr>
		</table>