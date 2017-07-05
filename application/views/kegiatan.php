	<script>
	    function showPagination(cari){
	      var xmlhttp;
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
	          else if(xmlhttp.status == 400){
	            alert('there was an eror 400')
	          }
	          else{
	            alert('something else other than 200 was retuned')
	          }
	        }
	    }
	    xmlhttp.open("GET","http://localhost/informasi_prakerin/index.php/admin/kegiatan_pagination/"+cari,true);
	    xmlhttp.setRequestHeader(
	    "Content-type","application/x-www-from-urlencoded");
	    xmlhttp.send(cari);
	    }

	  function cek(nis, nama)
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
	          window.location.href="<?php echo base_url()."index.php/crud/delete_berkas/";?>"+nis
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
	<div class="col-md-12 col-sm-12">
		<div id="myDiv1"></div>
		<div class="col-md-4 col-sm-6" style="margin:0; padding:0;">
			<h3 style="font-weight:900;"><a class="tip" href="<?php echo base_url();?>admin\jurusan" title="Ke Jurusan"><i class="fa fa-chevron-left"></i></a> BERKAS <a class="tip" href="<?php echo base_url();?>admin\statistik" title="Ke Statistik"><i class="fa fa-chevron-right"></i></a></h3>
		</div>
		<div class="col-md-8 col-sm-6" style="margin:0; padding:0;">
			<div class="form-inline pull-right">
				<div class="input-group">
					<a class="btn btn-primary frm" data-toggle="modal" data-target="#tambah" href="#"><i class="fa fa-plus"></i> TAMBAH</a>
				</div>
			</div>
			<br><br>
		</div>
		<div class="table-responsive">
			<table class="table table-hover" style="margin-top:5px;">
          <thead style="background-color:#eee;">
            <tr>
							<th>#</th>
							<th>
								SEKOLAH
							</th>
							<th>
								NAMA PENGIRIM
							</th>
							<th>
								NAMA FILE
							</th>
							<th>
								FILE
							</th>
							<th>
								KETERANGAN
							</th>
							</th>
							<th colspan="2" width="50px">
								AKSI
							</th>
						</tr>
						<?php $no = 1; ?>
						<?php foreach($data_file as $rows){ ?>
          </thead>
					<tr>
						<td><?php echo $no++ ?></td>
						<td>
							<?php echo $rows['nama_sekolah']; ?>
						</td>
						<td>
							<?php echo $rows['nama']; ?>
						</td>
						<td>
								<?php echo $rows['nama_file']; ?>
						</td>
						<td>
								<?php echo $rows['file']; ?>
						</td>
						<td>
							<?php echo $rows['keterangan'];?>
						</td>
						</td>
						<td width="30px" style="margin:0px; padding:0px;">
							<a class="btn-sm btn-primary btn-block tip btn-circle" style="padding-top:8px;padding-left:8.5px;"title="Download : <?php echo $rows['file']; ?>" href="<?php echo base_url()."berkas/".$rows['file']?>" target="_blank" ><i class="fa fa-download" aria-hidden="true"></i></a>
						</td>
						<td width="30px" style="margin:0px; padding:0px;">
							<a class="btn-sm btn-danger btn-block tip btn-circle" style="padding-top:8px;padding-left:9.5px;"title="Delete File!" href="#" onclick="javascript:cek(<?php echo $rows['id_file'].", '".$rows['file']."'"; ?>)"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php } ?>
			</table>
			<div class="pull-right">
				<?php echo "<p>".$this->pagination->create_links()."</p>"; ?>
			</div>
		</div>
	</div>

		<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background-color:white; color:#444;">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<div class="modal-title display-4" id="myModalLabel" align="center">Tambah Berkas</div>
					</div>
					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url();?>admin\tambah_berkas" width="100%" height="100%"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
