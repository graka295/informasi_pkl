<?php header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data_sekolah.xls");
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
	          Data Sekolah
	        </h5>

			<table border="1">
					<?php echo "<p>".$this->pagination->create_links()."</p>"; ?>
					<thead>
						<tr>
					<th>#</th>
					<th>NPSN</th>
					<th>Nama Sekolah</th>
					<th>Email sekolah</th>
					<th>No Telepon</th>
					<th>Jalan</th>
					<th>Provinsi</th>
					<th>Kabupaten</th>
					<th>Kecamatan</th>
				</tr>
					</thead>
				<?php $no = 1; ?>
				<?php foreach($data1 as $a){ ?>
				<tr>
					<td><?php echo $no++ ?></td>
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