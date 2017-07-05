
		<br><br>
		<div class="container">
			<div class="col-md-4">
				<div class="modal-content">
					<div class="modal-header">
						<div class="display-4" align="center">
							Pengawas
						</div>
					</div>

					<div class="modal-body text-uppercase" align="center" style="height:350px;">
						<br><?php foreach($pengawas as $s) { $nip = $s['nip']; ?>
						<h5><?php echo $s['nama_pengawas']?></h5>
						<h6>NIP : <?php echo $s['nip'] ?></h6>
						<h6>SEKOLAH : <?php echo $s['nama_sekolah']?></h6><br>
						<h6>EMAIL : <br> <?php echo $s['email']?></h6>
						<h6>TELEPON : <br> <?php echo $s['telepon']?></h6><br>
						<h6>ALAMAT :<br> <?php echo $s['alamat']?></h6>
						<?php } ?>
					</div>

					<div class="modal-footer" style="margin:0; padding:0;">
						<a class="btn btn-block btn-primary frm print" data-placement="right" data-toggle="modal" data-target="#print" href="#"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
					</div>
				</div>
				<br>
			</div>
			<div class="col-md-8">
				<div class="modal-content">

					<div class="modal-header">
						<div class="display-4" align="center">
							Sekolah
						</div>
					</div>

					<div class="modal-body" style="margin:0; padding:0;" align="center">
						<div class="container" style="font-size:13px;">
							<?php foreach($sekolah as $d){ ?>
								<table class="table text-uppercase" style="border">
									<tr>
										<td>
											<b>npsn</b>
										</td>
										<td>
											<?php echo $d['npsn'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b>nama sekolah</b>
										</td>
										<td>
											<?php echo $d['nama_sekolah'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b>telepon</b>
										</td>
										<td>
											<?php echo $d['no_telepon'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b>email</b>
										</td>
										<td>
											<?php echo $d['email'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b>Kecamatan</b>
										</td>
										<td>
											<?php echo$d['nama_kecamatan'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b>Kota/Kab</b>
										</td>
										<td>
											<?php echo$d['nama_kabupaten'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b>Kecamatan</b>
										</td>
										<td>
											<?php echo$d['nama_kecamatan'] ?>
										</td>
									</tr>
								</table>
						</div>
					</div>

					<div class="modal-footer" style="margin:0; padding:0;">
						<a class="btn btn-block btn-primary frm" target="_parent" href="<?php echo base_url()."index.php/admin/lihat/".$d['npsn'];?>"><i class="fa fa-mail-forward"></i> Detail Sekolah</a>
					</div>
					<?php } ?>

				</div>
				<br>
			</div>
			<div class="col-md-12">
				<div class="modal-content">
					<div class="modal-header">
						<div class="display-4" align="center">
							Siswa PKL Yang Di Awas
						</div>
					</div>
					<div class="modal-body table-responsive" style="margin:0; padding:0;">
					<div class="contrainer" style="margin:0; padding:0;">
						<table class="table table-hover table-bordered" align="center" id='boldStuff' style="margin:0; padding:0;">
							  <thead style="background:#eee;">
							    <tr>
							      <th>No</th>
							      <th>NIS</th>
							      <th>Nama</th>
							      <th>Jurusan</th>
							      <th>Awal PKL</th>
							      <th>Akhir PKL</th>
							      <th>Status</th>
							      <th style="max-width:40px;">Aksi</th>
							    </tr>
							  </thead>
							  <?php
								$no=1;
							  	foreach($siswa as $d){?>
							  <tr>
							    <td><?php echo $no++ ?></td>
							    <td><?php echo $d['nis'] ?></td>
							    <td><?php echo $d['nama'] ?></td>
							    <td>
								    <?php echo $d['nama_jurusan']?>
							    </td>

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
							    <td style="margin:0; padding:0;">
										<a class="btn btn-primary btn-block frm tip" title="detail peserta" style="padding-top:13px; padding-bottom:13px;" target="_parent" href="<?php echo base_url()."index.php/admin/lihat_peserta/".$d['nis'];?>"><i class="fa fa-mail-forward"></i></a>
									</td>
							  </tr>
							  <?php
							  } ?>

							</table>
					</div>
				</div>
				</div>
			</div>
		</div>
		<br>
		<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Pengawas</div>
					</div>

					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url()."index.php/admin/print_pengawas/".$s['nip'];?>" width="100%" height="100%"></iframe>
						</div>
					</div>

				</div>
			</div>
		</div>
