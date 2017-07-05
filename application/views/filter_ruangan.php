			<div class="modal-content frm">
				<div class="modal-header frm">
					<div class="display-4" align="center">
						<?php echo $pesan;?>
					</div>
				</div>
				<div class="modal-body frm" style="margin:0; padding:0;">
					<table class="table table-hover table-bordered" align="center" id='boldStuff' style="margin:0; padding:0;">
					  <thead style="background:#eee;">
					    <tr>
								<th>No</th>
					      <th>NIS</th>
					      <th>Nama</th>
					      <th>Sekolah</th>
					      <th>Awal PKL</th>
					      <th>Akhir PKL</th>
					    	<th>Aksi</th>
							</tr>
					  </thead>
						<tbody>
							<?php
							$no = 1;
						  foreach($siswa as $d){?>
						  <tr>
								<td><?php echo $no++ ?></td>
						    <td><?php echo $d['nis'] ?></td>
						    <td><?php echo $d['nama'] ?></td>
					      <td><?php echo $d['nama_sekolah'] ?></td>
					      <td><?php echo $d['mulai'] ?></td>
					      <td><?php echo $d['selesai']?></td>

								<td style="margin:0; padding:0;">
									<a class="btn frm btn-block btn-primary tip" style="padding-top:13px;padding-bottom:13px;" title="detail peserta" target="_parent" href="<?php echo base_url()."index.php/admin/lihat_peserta/".$d['nis'];?>"><i class="fa fa-mail-forward"></i></a>
								</td>
					    </tr>
					    <?php
					    } ?>
						</tbody>
				  </table>
				</div>
			</div>
