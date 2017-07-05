
		<br><br>
    <div class="container">
      <div class="col-md-3">
        <div class="modal-content">
          <div class="modal-header">
            <div class="display-4" align="center">
              Jurusan
            </div>
          </div>

          <div class="modal-body">
            <?php foreach($jurusan as $s) { ?>
              <div class="container" align="center">
                <br><h4><?php echo $s['nama_jurusan']; ?></h4>
                <h6>KODE RUANGAN :</h6>
                <div class="display-4"><?php echo $s['kode_jurusan']; ?></div>
                <br>
              </div>
            <?php } ?>
          </div>

          <div class="modal-footer" style="margin:0; padding:0;">
            <a class="btn btn-block btn-primary print frm" data-placement="right" data-target="#print" data-toggle="modal" href="#"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="modal-content">
          <div class="modal-header">
            <div class="display-4" align="center">
              Peserta Jurusan RPL
            </div>
          </div>

          <div class="modal-body table-responsive" style="margin:0; padding:0;">
            <div class="container" style="margin:0; padding:0;">
              <table class="table table-hover table-bordered" align="center" style="margin:0; padding:0;">
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
								 	$no=1;
									foreach($siswa as $d){ ?>
        			  <tr>
        			    <td><?php echo $no++ ?></td>
        			    <td><?php echo $d['nis'] ?></td>
        			    <td><?php echo $d['nama'] ?></td>
        	        <td><?php echo $d['nama_sekolah'] ?></td>
        	        <td><?php echo $d['mulai'] ?></td>
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
										<a class="btn btn-primary btn-block frm" style="padding-top:13px; padding-bottom:13px;" target="_parent" href="<?php echo base_url()."index.php/admin/lihat_peserta/".$d['nis'];?>"><i class="fa fa-mail-forward"></i></a>
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

		<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<div class="modal-title display-4 text-success" id="myModalLabel" align="center">Print Jurusan</div>
					</div>

					<div class="modal-body">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo base_url()."index.php/admin/print_jurusan/".$s['kode_jurusan'];?>" width="100%" height="100%"></iframe>
						</div>
					</div>

				</div>
			</div>
		</div>
