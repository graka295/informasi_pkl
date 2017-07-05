	<script>

		$(document).ready(function(){
	    $('.print').tooltip();
	    $('.print').click(printer);
		});
		$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
		});
		function ganti(){
			document.getElementById("ganti").style.visibility = 'visible';


		}

		function ceek(nis, nama, siswa)
			{
			swal({
				  title: 'Apakah Anda Yakin ?',
				  text: "Ingin menghapus berkas "+nama,
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Hapus',
				  cancelButtonText: 'Batal',
				  confirmButtonClass: 'btn btn-success frm',
				  cancelButtonClass: 'btn btn-danger frm',
				  buttonsStyling: false
			}).then(function() {
			  swal({
				   title: 'Sukses',
				    text :'Berkas '+nama+' telah berhasil di hapus',
				    type :'success',
					  confirmButtonColor: '#3085d6',
					  confirmButtonText: 'Tutup',
					  confirmButtonClass: 'btn btn-success frm',
					  buttonsStyling: false
			  }).then(function(){
			  		window.location.href="<?php echo base_url()."index.php/crud/delete_berkas1/";?>"+nis+"/"+siswa
			  })
			}, function(dismiss) {
			  // dismiss can be 'cancel', 'overlay', 'close', 'timer'
			  if (dismiss === 'cancel') {
			    swal(
			      'Close',
			      'Berkas '+nama+' tidak terhapus :)',
			      'error'
			    );
			  }
			})
			}
	</script>
			<?php foreach($data as $d){$nis = $d['nis'];?>
			<div class="container">
				<br><br>
				<div class="col-md-4 toppad">
					<div class="modal-content frm">
						<div class="container" style="margin:0; padding:0;">
							<div class="modal-header">
								<div class="display-4" align="center">
									Peserta
								</div>
							</div>

							<div align="center">
									<div class="modal-body" style="height:480px;">
										<br><h5 class="text-uppercase"><?php echo $d['nama'] ?></h5>

										<br><img alt="User Pic" src="<?php echo base_url()."gambar/".$d['foto']?>" class="img-circle img-responsive" width="150px" height="150px"><br><br>

										<b>NIS</b> :
										<?php echo $d['nis'];
											$nis = 	$d['nis'];
										?>

										<br><b>Status</b> :
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
												echo "Selesai PKL";
											}
										?>

										<br><br><b>Kegiatan </b>:
										<div class="container">
											<div align="center">
												<?php
													$kegiatan = $d['kegiatan'];
													if(empty($kegiatan))
														{ ?>
															<input class="btn btn-secondary frm" data-toggle="modal" data-target="#kegiatan" type="button" name="name" value="tambah kegiatan">
															<div class="modal fade" id="kegiatan">
																<div class="modal-dialog">
																	<div class="modal-content frm">
																		<div class="modal-header">
																			<div class="modal-title">
																				<p style="font-size:30px; font-weight:100;">
																					Tambah Kegiatan
																				</p>
																			</div>
																		</div>

																		<form name="fform" method="POST" action="<?php echo base_url()."index.php/crud/insert_kegiatan1";?>">
																			<div class="modal-body">
																				<textarea class="form-control frm" placeholder="Tambah Kegiatan" name="kegiatan" height="300px;"></textarea>
																				<input type="hidden" value="<?php echo $nis;?>" name="nis">
																			</div>

																			<div class="modal-footer">
																				<div class="input-group-inline">
																					<input class="btn btn-primary frm" type="submit" value="Tambah" style="width:100px;">
																					<input class="btn btn-secondary frm" type="reset" value="Reset" style="width:100px;">
																					<input class="btn btn-danger frm" data-dismiss="modal" value="Cancel" style="width:100px;">
																				</div>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
												<?php
														}

													else
													{
																echo "<h4>".$kegiatan."</h4>";?>
																<input class="btn btn-secondary frm" data-toggle="modal" data-target="#edit" type="button" name="name" value="edit kegiatan">

																<div class="modal fade" id="edit">
																	<div class="modal-dialog">
																		<div class="modal-content frm">
																			<div class="modal-header">
																				<div class="modal-title">
																					<h2>Edit Kegiatan</h2>
																				</div>
																			</div>

																			<form name="fform" method="POST" action="<?php echo base_url()."index.php/crud/insert_kegiatan1";?>">
																				<div class="modal-body">
																					<textarea class="form-control frm" placeholder="Masukan Kegiatan" name="kegiatan"><?php echo $kegiatan;?></textarea>
																					<input type="hidden" value="<?php echo $nis;?>" name="nis">
																				</div>

																				<div class="modal-footer">
																					<div class="input-group-inline">
																						<input class="btn btn-primary frm" type="submit" value="Ubah" style="width:100px;">
																						<input class="btn btn-danger frm" data-dismiss="modal" value="Cancel" style="width:100px;">
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>

												<?php
													}
												?>
											</div>
										</div>
									</div>

									<div class="modal-footer" style="margin:0; padding:0;">
										<a align="center" class="btn btn-primary form-control frm print" href="#" data-placement="right" target="_parent" data-toggle="modal" data-target="#print"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
									</div>
								</div>
						</div>
					</div>
	      </div>

				<div class="col-md-8 toppad">
					<div class="modal-content frm">
						<div class="modal-header">
							<div class="display-4" align="center">
								Data Peserta
							</div>
						</div>

						<div class="modal-body" style="margin:0; padding:0;">
							<div class="container" style="font-size:9px; ">
								<table class="table text-uppercase" style="border">
									<tr>
										<td>
											<b>Pengawas</b>
										</td>
										<td>
											<a target="_parent" href="<?php echo base_url()."index.php/admin/detail_pengawas/".$d['pengawas'];?>"><?php echo $d['nama_pengawas'] ?></a>
										</td>
									</tr>
									<tr>
										<td>
											<b>Sekolah Asal</b>
										</td>
										<td>
										<a target="_parent" href="<?php echo base_url()."index.php/admin/lihat/".$d['sekolah'];?>">
											<?php echo $d['nama_sekolah'] ?>
										</a>
										</td>
									</tr>
									<tr>
										<td>
											<b>Jurusan</b>
										</td>
										<td>
											<a target="_parent" href="<?php echo base_url()."index.php/admin/detail_jurusan/".$d['jurusan'];?>">
											<?php echo $d['nama_jurusan'] ?>
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<b>Ruangan</b>
										</td>
										<td>
										<a target="_parent" href="<?php echo base_url()."index.php/admin/detail_ruangan/".$d['ruangan'];?>">
											<?php echo $d['nama_ruangan'] ?>
										</a>
										</td>
									</tr>
									<tr>
										<td>
											<b>Pembimbing</b>
										</td>
										<td>
										<a target="_parent" href="<?php echo base_url()."index.php/admin/detail_pembimbing/".$d['pembimbing'];?>">
											<?php echo $d['nama_pembimbing'] ?>
										</a>
										</td>
									</tr>
									<tr>
										<td>
											<b>Awal PKL</b>
										</td>
										<td>
											<?php echo $d['mulai'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b>Akhir PKL</b>
										</td>
										<td>
											<?php echo $d['selesai'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b>Jenis Kelamin</b>
										</td>
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
									</tr>
									<tr>
										<td>
											<b>Alamat</b>
										</td>
										<td>
											<?php echo $d['alamat'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b>Email</b>
										</td>
										<td>
											<?php echo $d['email'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<b>Telepon</b>
										</td>
										<td>
											<?php echo $d['telepon'] ?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>

			<div class="container">
				<div class="col-md-12">
					<div class="modal-content frm">
						<div align="center">
							<div class="modal-header">
								<div class="display-4">Berkas Peserta</div>
							</div>
							<div class="modal-body table-responsive" style="margin:0; padding:0;">
									<div class="col-md-12" style="margin:0; padding:0;">
										<div class="table-responsive">
											<table class="table table-hover table-bordered" style="margin:0; padding:0;">
												<div class="col-md-6">
													<thead style="background:#eee;">
														<th>
																Nama Berkas
														</th>

														<th>
																Keterangan
														</th>

														<th colspan="2" style="max-width:20px;">
															Aksi
														</th>
													</thead>
													<?php foreach ($file as $rows) { ?>
													<tr>
														<td>
															 <?php echo $rows['nama_file'];?>
														</td>

														<td>
															<?php echo $rows['keterangan'];?>
														</td>

														<td style="margin:0px; padding:0px; max-width:10px;">
															<a class="btn btn-block btn-primary tip frm" style="margin:0px; padding-top:13px; padding-bottom:13px;"  title="Download : <?php echo $rows['file']; ?>" href="<?php echo base_url()."berkas/".$rows['file']?>" target="_blank" ><i class="fa fa-download" aria-hidden="true"></i></a>
														</td>
														<td style="margin:0px; padding:0px; max-width:10px;">
															<a class="btn btn-block btn-danger tip frm" style="margin:0px; padding-top:13px; padding-bottom:13px;" href="#" onclick="javascript:ceek(<?php echo $rows['id_file'].", '".$rows['nama_file']."' ,".$nis; ?>)"><i class="fa fa-trash"></i></a>
														</td>
													</tr>
													<?php } ?>
												</div>
											</table>
										</div>
									</div>
							</div>
							<div class="modal-footer" style="margin:0; padding:0;">
								<a class="btn btn-block btn-primary frm print" href="#" data-placement="right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br><br><br>
			<?php } ?>
		</div>

		<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Peserta</div>
					</div>

					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url()."index.php/admin/print_siswad/".$nis;?>" width="100%" height="100%"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Tambah Berkas</div>
					</div>
					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url()."index.php/admin/tambah_berkas1/".$nis;?>" width="100%" height="100%"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
