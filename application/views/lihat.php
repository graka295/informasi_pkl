	<br><br>
	<div class="container">
		<div class="col-md-4">
			<div class="modal-content">

				<div class="modal-header">
					<div class="display-4" align="center">
						Sekolah
					</div>
				</div>

				<div class="modal-body" style="height:350px;" align="center">
					<br><h5 class="text-uppercase"><?php foreach($sekolah as $d){ echo $d['nama_sekolah']?></h5>
					<h6>NPSN : <?php  echo $d['npsn']?></h6>

					<br><br>

					<div class="container text-uppercase">
						<h6>Email : <br> <p class="text-lowercase"><?php echo $d['email'] ?></p></h6>
						<h6>Telepon : <br> <?php echo $d['no_telepon']?></h6>
						<br>

						<h6>Alamat : <br> Jl.<?php echo $d['alamat_jalan']?> Kec.<?php echo $d['nama_kecamatan']?> Kab.<?php echo $d['nama_kabupaten']?> Prov.<?php echo $d['nama_provinsi']?></h6>

					</div>
				</div>

				<div class="modal-footer" style="margin:0; padding:0;">
					<a class="btn btn-block btn-primary frm print" href="#" title="Print Sekolah!" data-toggle="modal" data-target="#print"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
				</div>

				<?php } ?>
			</div>
			<br>
		</div>
		<div class="col-md-8">
			<div class="modal-content">
				<div class="modal-header">
					<div class="display-4" align="center">
						Pengawas Siswa PKL
					</div>
				</div>
				<div class="modal-body table-responsive" style="margin:0; padding:0;">
					<table class="table table-hover table-bordered" align="center" style="margin:0; padding:0;">
						<thead style="background:#eee;">
							<th>Nama</th>
							<th>NIP</th>
							<th>Telepon</th>
							<th style="max-width:35px;">Aksi</th>
						</thead>
								<?php
								foreach($pengawas as $s) {
									$nip = $s['nip'];
							?>
						<tr>
							<td><?php echo $s['nama_pengawas']?></td>
							<td><?php echo $s['nip']?></td>
							<td><?php echo $s['telepon']?></td>
							<td style="margin:0; padding:0;">
								<a class="btn btn-primary btn-block frm" title="detail pengawas" style="padding-top:13px; padding-bottom:13px;" href="<?php echo base_url()."index.php/admin/detail_pengawas/".$s['nip'];?>"><i class="fa fa-mail-forward"></i></a>
							</td>
						</tr>
									<?php
						}
						?>
					</table>
				</div>
			</div>
			<br>
		</div>
		<div class="col-md-12">
			<div class="modal-content">
				<div class="modal-header">
					<div class="display-4" align="center">
						Siswa PKL di UPI
					</div>
				</div>

				<div class="modal-body table-responsive" style="margin:0; padding:0;">
					<table class="table table-bordered table-hover" align="center"style="margin:0; padding:0;">
						<thead style="background:#eee;">
							<tr>
							<th>NIS</th>
							<th>Nama Siswa</th>
							<th>Jurusan</th>
							<th>Ruangan</th>
							<th>Pengawas</th>
							<th style="max-width:35px;">Aksi</th>
						</tr>
						</thead>
						<?php foreach($siswa as $d){ ?>
						<tr>
							<td><?php echo $d['nis'] ?></td>
							<td><?php echo $d['nama'] ?></td>
							<td><?php echo $d['nama_jurusan']?></td>
							<td><?php echo $d['nama_ruangan']?></td>
							<td><?php echo $d['nama_pengawas'] ?></td>
							<td style="margin:0; padding:0;">
								<a class="btn btn-primary btn-block frm tip" title="detail peserta" style="padding-top:13px; padding-bottom:13px;" target="_parent" href="<?php echo base_url()."index.php/admin/lihat_peserta/".$d['nis'];?>"><i class="fa fa-mail-forward"></i></a>
							</td>
							<?php }?>
						</tr>
					</table>
				</div>
			</div>
			<br>
		</div>
	</div>

	<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Sekolah</div>
				</div>

				<div class="modal-body">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="<?php echo base_url()."index.php/admin/print_sekolahd/".$npsn;?>" width="100%" height="100%"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
