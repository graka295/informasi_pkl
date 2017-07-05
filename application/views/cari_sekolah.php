<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
</head>
<body>
					<table>
						<td>
							<tr>
								<th>NPSN</th>
								<th>Nama Sekolah</th>
								<th>Email sekolah</th>
								<th>No Telepon</th>
								<th>Jalan</th>
								<th>Kecamatan</th>
								<th>Provinsi</th>
								<th>Kabupaten</th>
							</tr>
						</td>
						<?php foreach($sekolah as $a){ ?>
						<tr>
							<td><?php echo $a['npsn'] ?></td>
							<td><?php echo $a['nama_sekolah'] ?></td>
							<td><?php echo $a['email'] ?></td>
							<td><?php echo $a['no_telepon'] ?></td>
							<td><?php echo $a['alamat_jalan'] ?></td>
							<td><?php echo $a['nama_kecamatan'] ?></td>
							<td><?php echo $a['nama_provinsi'] ?></td>
							<td><?php echo $a['nama_kabupaten'] ?></td>
						</tr>
						<?php } ?>
					</table>
</body>
</html>