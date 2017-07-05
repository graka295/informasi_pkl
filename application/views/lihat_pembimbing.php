		<br><br>
		<div class="container">
			<div class="col-md-4">
				<div class="modal-content">
					<div class="modal-header">
						<div class="display-4" align="center">
							Pembimbing
						</div>
					</div>

					<div class="modal-body text-uppercase table-responsive" align="center" style="height:350px;">
						<?php foreach($pembimbing as $s) { $nip = $s['nip'];?>
						<br><h5><?php echo $s['nama_pembimbing']?></h5>
						<h6>NIP : <?php echo $s['nip']?></h6>
						<h6>jabatan : <?php echo $s['jabatan'] ?></h6><br><br>

						<h6>email : <br> <?php echo $s['email'] ?></h6>
						<h6>telepon : <br> <?php echo $s['telepon']?></h6><br>

						<h6>alamat : <br> <?php echo $s['alamat'] ?></h6>

						<?php } ?>
					</div>

					<div class="modal-footer" style="margin:0; padding:0;">
						<a class="btn btn-block btn-primary frm print" data-toggle="modal" data-target="#print" href="#"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<div class="modal-content">
					<div class="modal-header">
						<div class="display-4" align="center">
							Siswa PKL Yang Di Bimbing
						</div>
					</div>

					<div class="modal-body table-responsive" style="margin:0; padding:0;">
						<table class="table table-hover table-bordered" align="center" id='boldStuff' style="margin:0; padding:0;">
								<thead style="background:#eee;">
									<tr>
										<th>No</th>
										<th>NIS</th>
										<th>Nama</th>
										<th>Sekolah</th>
										<th>Status</th>
										<th style="max-width:35px">Aksi</th>
									</tr>
								</thead>
								<?php
									$no = 1;
									foreach($siswa as $d){?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $d['nis'] ?></td>
										<td><?php echo $d['nama'] ?></td>
										<td><?php echo $d['nama_sekolah'] ?></td>
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
											<a class="btn btn-block btn-primary frm tip" title="detail peserta" style="padding-top:14px; padding-bottom:14px;" target="_parent" href="<?php echo base_url()."index.php/admin/lihat_peserta/".$d['nis'];?>"><i class="fa fa-mail-forward"></i></a>
										</td>
									</tr>
								<?php
								} ?>

							</table>

					</div>
				</div>
			</div>

		</div>

		<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Pembimbing</div>
					</div>

					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url()."index.php/admin/print_pembimbing/".$s['nip'];?>" width="100%" height="100%"></iframe>
						</div>
					</div>

				</div>
			</div>
		</div>
