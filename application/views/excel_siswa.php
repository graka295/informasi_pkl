<?php header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=peserta_Pkl.xls");
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
	          Data Peserta
	        </h5>
  
			<table border="1px">
				<thead>
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>NAMA</th>
						<th>JK</th>
						<th>SEKOLAH</th>
						<th>JURUSAN</th>
						<th>PEMBIMBING</th>
						<th>PENGAWAS</th>
						<th>AKHIR PKL</th>
						<th>AWAL PKL</th>
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data1 as $d){ ?>
					<tr>
						<td><?php $no++; echo $no ?></td>
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
						<?php } ?>
					</tr>
				</tbody>
			</table>