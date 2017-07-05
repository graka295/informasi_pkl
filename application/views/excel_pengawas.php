<?php header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_pengawas.xls");
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
	          Data Pengawas
	        </h5>

		<table border="1">
				<?php echo "<p>".$this->pagination->create_links()."</p>"; ?>
					<thead>
						<tr>
						<th>#</th>
						<th>Nama pengawas</th>
						<th>NIP</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>Telepon</th>
						<th>Asal Sekolah</th>
					</tr>
					</thead>
					<?php $no = 1; ?>
					<?php
						foreach($data1 as $s) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $s['nama_pengawas']?></td>
						<td><?php echo $s['nip']?></td>
						<td><?php echo $s['alamat']?></td>
						<td><?php echo $s['email']?></td>
						<td><?php echo $s['telepon']?></td>
						<td><?php echo $s['nama_sekolah']?></td>
					</tr>
					<?php
					}
					?>
				</table>