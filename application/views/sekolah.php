	<script>
	    $(document).ready(function(){
	      $('.tip').tooltip();
	    });
	    function ambil_provinsi(){
	      var xmlhttp;
	      document.getElementById("myDiv1").innerHTML="<option value='0'>-Semua kecamatan-</option>";
	      var cari = document.fform.cari.value;
	        if(window.XMLHttpRequest){
	          //code for ie7+,firefox,chrome,opera,safari
	            xmlhttp = new XMLHttpRequest();
	        }
	        else{
	          //code for ie6,ie5
	          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange=function(){
	          if(xmlhttp.readyState ==XMLHttpRequest.DONE)
	          {
	          if(xmlhttp.status == 200){
	            document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
	          }
	          else if(xmlhttp.statyus == 400){
	            alert('there was an eror 400')
	          }
	          else{
	            alert('something else other than 200 was retuned')
	          }
	        }

	      }
	      xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/provinsi?cari="+cari,true);
	      xmlhttp.setRequestHeader(
	      "Content-type","application/x-www-from-urlencoded");
	      xmlhttp.send(cari);
	      xmlhttp.open(cari);
	    }
	    function ambil_kabupaten(){
	      var xmlhttp;
	      var kabupaten = document.fform.kabupaten.value;
	        if(window.XMLHttpRequest){
	          //code for ie7+,firefox,chrome,opera,safari
	            xmlhttp = new XMLHttpRequest();
	        }
	        else{
	          //code for ie6,ie5
	          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange=function(){
	          if(xmlhttp.readyState ==XMLHttpRequest.DONE)
	          {
	          if(xmlhttp.status == 200){
	            document.getElementById("myDiv1").innerHTML=xmlhttp.responseText;
	          }
	          else if(xmlhttp.statyus == 400){
	            alert('there was an eror 400')
	          }
	          else{
	            alert('something else other than 200 was retuned')
	          }
	        }

	      }
	      xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/kabupaten?kabupaten="+kabupaten,true);
	      xmlhttp.setRequestHeader(
	      "Content-type","application/x-www-from-urlencoded");
	      xmlhttp.send(kabupaten);
	      xmlhttp.open(kabupaten);
	    }
	    function cek(nis, nama)
	    {
	    swal({
	        title: 'Apakah Anda Yakin ?',
	        text: "Ingin menghapus Data "+nama,
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
	          text :'Data '+nama+' telah berhasil di hapus',
	          type :'success',
	          confirmButtonColor: '#3085d6',
	          confirmButtonText: 'Tutup',
	          confirmButtonClass: 'btn btn-success frm',
	          buttonsStyling: false
	      }).then(function(){
	          window.location.href="<?php echo base_url()."index.php/crud/delete_sekolah/";?>"+nis
	      })
	    }, function(dismiss) {
	      // dismiss can be 'cancel', 'overlay', 'close', 'timer'
	      if (dismiss === 'cancel') {
	        swal(
	          'Close',
	          'Data '+nama+' tidak terhapus :)',
	          'error'
	        );
	      }
	    })
	    }
	</script>
	<script>
		$(document).ready(function(){
		$('.close').click(close);
		});

		function close(){
		location.reload();
		}

		$("#menu-toggle").click(function(e) {
				$("#wrapper").toggleClass("toggled");
		});

		$(document).ready(function(){
		  setTimeout(function(){
		    $('body').addClass('loaded');
		    $('h1').css('color','#222222')
		  }, 1000);
		});

    function menu(){
			$("#CollapseTahun").show();
		}

		function tahun(){
			$("#grafik").attr('src', '<?php echo base_url();?>chartz/peserta_pertahun');
		}

		function jk(){
			$("#grafik").attr('src', '<?php echo base_url();?>chartz/peserta_pl');
		}

		function status(){
			$("#grafik").attr('src', '<?php echo base_url();?>chartz/status_peserta');
		}

		function daerah(){
			$("#grafik").attr('src', '<?php echo base_url();?>chartz/daerah_sekolah');
		}
	</script>

	<div class="col-md-4 col-sm-12">
		<h3 style="font-weight:900;">
			<div class="hidden-sm-down">
				<a class="tip" href="<?php echo base_url();?>admin\lihat_siswa" title="Ke Peserta"><i class="fa fa-chevron-left"></i></a>
					SEKOLAH
				<a class="tip" href="<?php echo base_url();?>admin\lihat_pembimbing" title="Ke Pembimbing"><i class="fa fa-chevron-right"></i></a>
			</div>
		</h3>
		<h3 style="font-weight:900;">
			<div class="hidden-lg-up" align="center">
				<a class="tip" href="<?php echo base_url();?>admin\lihat_siswa" title="Ke Peserta"><i class="fa fa-chevron-left"></i></a>
				SEKOLAH
				<a class="tip" href="<?php echo base_url();?>admin\lihat_pembimbing" title="Ke Pembimbing"><i class="fa fa-chevron-right"></i></a>
			</div>
		</h3>
	</div>
	<div class="col-md-8 col-sm-12">
		<div class="form-inline-block hidden-sm-down pull-right">
			<div class="input-group">
				<a class="btn btn-primary frm tip" title="Tambah Sekolah"style="background-color:#2980b9;" data-toggle="modal" data-target="#tambah" href="#"><i class="fa fa-plus"></i></a>
				<a class="btn btn-warning frm tip" title="Print Sekolah" data-toggle="modal" data-target="#print" href="#"><i class="fa fa-print"></i></a>
				<a class="btn btn-success frm tip" title="Export semua data Sekolah ke Excel" href='toExcelSekolah'><i class="fa fa-file-excel-o"></i></a>
			</div>
		</div>
		<div class="form-inline-block hidden-lg-up" align="center">
			<div class="input-group">
				<a class="btn btn-primary frm tip" title="Tambah Sekolah"style="background-color:#2980b9;" data-toggle="modal" data-target="#tambah" href="#"><i class="fa fa-plus"></i></a>
				<a class="btn btn-warning frm tip" title="Print Sekolah" data-toggle="modal" data-target="#print" href="#"><i class="fa fa-print"></i></a>
				<a class="btn btn-success frm tip" title="Export semua data Sekolah ke Excel" href='toExcelSekolah'><i class="fa fa-file-excel-o"></i></a>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12">
		<div class="panel panel-default">
	  	<div class="panel-body">
				<form name="fform" method="POST" action="<?php echo base_url()."index.php/admin/alamat";	?>"style="margin:0; padding:0;">
					<div class="col-md-3 col-sm-3 col-xs-3" style="margin:0; padding:0;">
							<select style=" width:100%;" class="custom-select col-md-3 frm" name="cari" onclick="ambil_provinsi()" >
								<option value="0">Semua Provinsi</option>
								<?php
								foreach($provinsi as $row){?>
									<option value="<?php echo $row['id']?>"><?php echo $row['nama_provinsi']?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3" style="margin:0; padding:0;">
							<select style=" width:100%;" class="custom-select frm" name="kabupaten" onclick="ambil_kabupaten()" id="myDiv">
								<option value="0">Semua Kota</option>
							</select>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2" style="margin:0; padding:0;">
							<select style=" width:100%;" class="custom-select frm" name="kecamatan" id="myDiv1">
								<option value="0">Semua Kecamatan</option>
							</select>
						</div>
						<div class="col-md-3 col-sm-10" style="margin:0; padding:0;">
							<input style=""class="form-control frm" type="text" onkeyup="namasekolah(this.value)" name="nama_sekolah" placeholder="Nama Sekolah">
						</div>
						<div class="col-md-1 col-sm-2" style="margin:0; padding:0;">
							<button class="btn btn-success frm btn-block" type="submit" name="submit">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
						</div>
						<div id="nama"></div>
				</form>
			</div>
		  <div class="table-responsive">
				<table class="table table-hover">
					<thead style="background-color:#eee;">
						<tr>
							<th>#</th>
							<th>NPSN</th>
							<th>NAMA SEKOLAH</th>
							<th>TELEPON</th>
							<th>PROVINSI</th>
							<th>KABUPATEN</th>
							<th>KECAMATAN</th>
							<th colspan="3">AKSI</th>
						</tr>
					</thead>
					<?php $no = 1; ?>
					<?php foreach($sekolah as $a){ ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php $npsn = $a['npsn'];echo $npsn ?></td>
						<td><?php echo $a['nama_sekolah'] ?></td>
						<td><?php echo $a['no_telepon'] ?></td>
						<td><?php echo $a['nama_provinsi'] ?></td>
						<td><?php echo $a['nama_kabupaten'] ?></td>
						<td><?php echo $a['nama_kecamatan'] ?></td>
						<td style="margin:0px; padding:0px; width:30;">
							<a class="btn-sm btn-primary btn-block tip btn-circle" style="padding-top:8px; padding-left:8px;"title="Edit Sekolah!" href="<?php echo base_url()."index.php/admin/edit_sekolah/".$a['npsn'];?>"><i class="fa fa-edit"></i></a>
						</td>
						<td style="margin:0px; padding:0px; width:30;">
							<a class="btn-sm btn-danger btn-block tip btn-circle" style="padding-top:8px; padding-left:9.5px;"title="Delete Sekolah!" href="#" onclick="javascript:cek(<?php echo $a['npsn'].", '".$a['nama_sekolah']."'"; ?>)"><i class="fa fa-trash"></i></a>
						</td>
						<td style="margin:0px; padding:0px; width:30;">
							<a class="btn-sm btn-success btn-block tip btn-circle" style="padding-top:8px; padding-left:8px;"title="Detail Sekolah!" target="_parent" href="<?php echo base_url()."index.php/admin/lihat/".$a['npsn'];?>"><i class="fa fa-mail-forward"></i></a>
						</td>
					</tr>
					<?php } ?>
				</table>
		  </div>
		  <div class="pull-right">
	    <?php echo "<p>".$this->pagination->create_links()."</p>"; ?>
	  </div>
		</div>
	</div>

	<div class="modal fade" id="tambah">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color:white; color:#444;">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<div class="modal-title display-4"align="center">Tambah Sekolah</div>
				</div>
				<div class="modal-body">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="<?php echo base_url();?>admin\sekolah" width="100%" height="100%"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="print">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header" style="background-color:white; color:#444;">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<div class="modal-title display-4" align="center">Print Sekolah</div>
				</div>
				<div class="modal-body">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="<?php echo base_url()."admin/print_sekolah/"?>" width="100%" height="100%"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
