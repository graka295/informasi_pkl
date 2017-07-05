	<script>
		$(document).ready(function(){
		$('#masih').css('background-color','#27AE60');
	    $('#masih').click(filter_masih);
	    $('#daftar').click(filter_daftar);
	    $('#pernah').click(filter_pernah);
	    $('#all').click(filter_all);
    	})

			$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
			});

			function filter_masih(){
			$(".filter").css('background-color','');
			$(this).css('background-color','#27AE60');
			var kode = $("#kode").val();
			if (window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}
			else{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			xmlhttp.onreadystatechange=function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("menu").innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","<?php echo base_url()."filter/filter_ruangan_masih/";?>"+kode,true);
				xmlhttp.send();
			}

			function filter_daftar(){
			$(".filter").css('background-color','');
			$(this).css('background-color','#27AE60');
			var kode = $("#kode").val();
			if (window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}
			else{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			xmlhttp.onreadystatechange=function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("menu").innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","<?php echo base_url()."filter/filter_ruangan_daftar/";?>"+kode,true);
				xmlhttp.send();
			}

			function filter_pernah(){
			$(".filter").css('background-color','');
			$(this).css('background-color','#27AE60');
			var kode = $("#kode").val();
			if (window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}
			else{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			xmlhttp.onreadystatechange=function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("menu").innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","<?php echo base_url()."filter/filter_ruangan_pernah/";?>"+kode,true);
				xmlhttp.send();
			}

			function filter_all(){
			$(".filter").css('background-color','');
			$(this).css('background-color','#27AE60');
			var kode = $("#kode").val();
			if (window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}
			else{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			xmlhttp.onreadystatechange=function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("menu").innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","<?php echo base_url()."filter/filter_ruangan_all/";?>"+kode,true);
				xmlhttp.send();
			}
	</script>

	<br><br>
		<div class="container">
			<div class="col-md-3">
				<div class="modal-content">
					<div class="modal-header">
						<div class="display-4" align="center">
							Ruangan
						</div>
					</div>

					<div class="modal-body" align="center">
						<?php foreach($ruangan as $s) { ?>
						<div class="container">
							<br><h4><?php echo $s['nama_ruangan']; ?></h4>
							<h6>KODE RUANGAN :</h6>
							<div class="display-4"><?php echo $s['kode_ruangan']; ?></div>
							<input type="hidden" id="kode" value="<?php echo $s['kode_ruangan']; ?>">
							<br>
						</div>
						<?php } ?>
					</div>

					<div class="modal-footer" style="background:#eee;">
						<div class="col-md-6" style="margin:0; padding:0;">
							<button class="btn btn-block btn-secondary frm filter" style="font-size:13px;" id="masih">Masih PKL</button>
						</div>
						<div class="col-md-6" style="margin:0; padding:0;">
							<button class="btn btn-block btn-secondary frm filter" style="font-size:13px;" id="daftar"> Belum PKL</button>
						</div>
						<div class="col-md-6" style="margin:0; padding:0;">
							<button class="btn btn-block btn-secondary frm filter" style="font-size:13px;" id="pernah"> Pernah PKL</button>
						</div>
						<div class="col-md-6" style="margin:0; padding:0;">
							<button class="btn btn-block btn-secondary frm filter" style="font-size:13px;" id="all">Semua Peserta</button>
						</div>
					</div>

					<div class="modal-footer" style="margin:0; padding:0;">
						<a class="btn btn-block btn-primary frm" data-toggle="modal" data-target="#printruangan" href="#"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
					</div>

					</div>
				</div>
			<div class="col-md-9" id="menu">
				<div class="modal-content frm">
					<div class="modal-header">
						<div class="display-4" align="center">
							Peserta Ruangan
						</div>
					</div>
					<div class="modal-body" style="margin:0; padding:0;">
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
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="printruangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Ruangan</div>
					</div>

					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url()."index.php/admin/print_ruangan/".$s['kode_ruangan'];?>" width="100%" height="100%"></iframe>
						</div>
					</div>

				</div>
			</div>
		</div>
