<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Crud extends CI_Controller{

		public function daftar_sekolah(){

			$npsn = $_POST['npsn'];
			$nama_sekolah = $_POST['nama_sekolah'];
			$email = $_POST['email'];
			$telepon = $_POST['nomber'];
			$kd_povinsi = $_POST['cari'];
			$kd_kabupaten = $_POST['kabupaten'];
			$kd_kecamatan = $_POST['kecamatan'];
			$alamat_jalan = $_POST['alamat'];

			$ceks= $this->crudmodel->cek('sekolah',"where npsn='$npsn'");
			if ($ceks>=1) {
				$this->session->set_flashdata('pesan',"<p class='text1 text-danger'>Gagal!!!</p>");
				$this->session->set_flashdata('keterangan',"<div class='keterangan text-danger'>Npsn sudah ada !!!</div>");
				$this->load->view('notificasi');
			}
			else{
			$data_sekolah = array(
				'npsn' =>$npsn ,
				'nama_sekolah' =>$nama_sekolah ,
				'email' =>$email ,
				'no_telepon' =>$telepon ,
				'alamat_jalan' =>$alamat_jalan ,
				'nama_kecamatan' =>$kd_kecamatan ,
				'nama_provinsi' =>$kd_povinsi ,
				'nama_kabupaten' =>$kd_kabupaten ,
				);

			$cek=$this->crudmodel->InsertData('sekolah',$data_sekolah);

			if ($cek>=1)
			{
						$this->session->set_flashdata('pesan',"<p class='text'>Sukses!!!</p>");
				$this->load->view('notificasi');
			}

			}
		}

		public function insert_jurusan(){

			$kode=$_POST['kd'];
			$nama=$_POST['nama'];
			$data = array('kode_jurusan' =>$kode ,
						'nama_jurusan'=>$nama );
			$ceks=$this->crudmodel->cek('jurusan',"where kode_jurusan='$kode'");
			if ($ceks>=1) {
				$this->session->set_flashdata('pesan',"<p class='text1 text-danger'>Gagal!!!</p>");
				$this->session->set_flashdata('keterangan',"<div class='keterangan text-danger'>Kode Jurusan sudah ada !!!</div>");
				$this->load->view('notificasi');
			}
			else{
				$cek=$this->crudmodel->insertData('jurusan',$data);

				if ($cek>=1)
				{
						$this->session->set_flashdata('pesan',"<p class='text'>Sukses!!!</p>");
					$this->load->view('notificasi');
				}
			}
		}
		public function insert_ruangan(){

			$kode=$_POST['kode'];
			$nama=$_POST['nama'];
			$data = array('kode_ruangan' =>$kode ,
						'nama_ruangan'=>$nama );
			$ceks=$this->crudmodel->cek('ruangan',"where kode_ruangan='$kode'");
			if ($ceks>=1) {
				$this->session->set_flashdata('pesan',"<p class='text1 text-danger'>Gagal!!!</p>");
				$this->session->set_flashdata('keterangan',"<div class='keterangan text-danger'>Kode Ruangan sudah ada !!!</div>");
				$this->load->view('notificasi');
			}
			else{
				$cek=$this->crudmodel->insertData('ruangan',$data);

				if ($cek>=1)
				{
						$this->session->set_flashdata('pesan',"<p class='text'>Sukses!!!</p>");
					$this->load->view('notificasi');
				}
			}
		}
		public function insert_pengawas(){
			$nip=$_POST['nip'];
			$nama=$_POST['nama'];
			$alamat=$_POST['alamat'];
			$email=$_POST['email'];
			$telepon=$_POST['telepon'];
			$asal=$_POST['asal'];
			$ceks=$this->crudmodel->cek('pengawas',"where nip = '$nip'");
			if ($ceks>=1) {
				$this->session->set_flashdata('pesan',"<p class='text1 text-danger'>Gagal!!!</p>");
				$this->session->set_flashdata('keterangan',"<div class='keterangan text-danger'>NIP sudah ada !!!</div>");
				$this->load->view('notificasi');
			}
			else{
				$data = array('nip' =>$nip ,
						'nama_pengawas' =>$nama ,
						'alamat' =>$alamat ,
						'email' =>$email ,
						'telepon' =>$telepon ,
						'asal_sekolah' =>$asal ,
				 );
				$cek=$this->crudmodel->insertData('pengawas',$data);

				if ($cek>=1)
				{
						$this->session->set_flashdata('pesan',"<p class='text'>Sukses!!!</p>");
					$this->load->view('notificasi');
				}
			}
		}
		public function insert_pembimbing(){

			$nip=$_POST['nip'];
			$nama=$_POST['nama'];
			$jabatan=$_POST['jabatan'];
			$alamat=$_POST['alamat'];
			$email=$_POST['email'];
			$telepon=$_POST['telepon'];
$ceks= $this->crudmodel->cek('pembimbing',"where nip='$nip'");
if ($ceks>=1) {
$this->session->set_flashdata('pesan',"<p class='text1 text-danger'>Gagal!!!</p>");
$this->session->set_flashdata('keterangan',"<div class='keterangan text-danger'>NIP sudah ada !!!</div>");				$this->load->view('notificasi');
}
			else{
				$data = array('nip' => $nip ,
						'nama_pembimbing' => $nama ,
						'jabatan' => $jabatan,
						'alamat' => $alamat,
						'telepon' => $telepon,
						'email' => $email,

				 );
				$cek=$this->crudmodel->insertData('pembimbing',$data);
						$this->session->set_flashdata('pesan',"<p class='text'>Sukses!!!</p>");
				$this->load->view('notificasi');
			}
		}
		public function insert_peserta(){
			$nis=$_POST['nis'];
			$nama=$_POST['nama'];
			$jenis_kelamin=$_POST['jenis_kelamin'];
			$alamat=$_POST['alamat'];
			$email=$_POST['email'];
			$telepon=$_POST['telepon'];
			$pengawas=$_POST['pengawas'];
			$pembimbing=$_POST['pembimbing'];
			$awal=$_POST['awal'];
			$akhir=$_POST['akhir'];
			$jurusan=$_POST['jurusan'];
			$ruangan=$_POST['ruangan'];
			$sekolah=$_POST['cari'];
			$config['upload_path'] = 'gambar/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$ceks=$this->crudmodel->cek('peserta_pkl',"where nis='$nis'");
			if ($ceks>=1) {
				$this->session->set_flashdata('pesan',"<p class='text1 text-danger'>Gagal!!!</p>");
				$this->session->set_flashdata('keterangan',"<div class='keterangan text-danger'>NIS sudah ada !!!</div>");
				$this->load->view('notificasi');
			}
			else{
				if ( ! $this->upload->do_upload()){
					$error = array('error' => $this->upload->display_errors());
				}
				else{
					$data1 = $this->upload->data();
					$data = array('nis' =>$nis ,
						'nis' =>$nis ,
						'nama'=>$nama,
						'jenis_kelamin'=>$jenis_kelamin,
						'alamat'=>$alamat,
						'sekolah'=>$sekolah,
						'jurusan'=>$jurusan,
						'telepon'=>$telepon,
						'email'=>$email,
						'mulai'=>$awal,
						'selesai'=>$akhir,
						'pengawas'=>$pengawas,
						'pembimbing'=>$pembimbing,
						'ruangan'=>$ruangan,
						'foto'=>$data1['file_name']
						);
					$data1 = array('upload_data' => $this->upload->data());
				}
					$cek=$this->crudmodel->insertData('peserta_pkl',$data);

					if ($cek>=1)
					{
						$this->session->set_flashdata('pesan',"<p class='text'>Sukses!!!</p>");
						$this->load->view('notificasi');
					}
				}
			}
		public function insert_kegiatan(){
			$nis=$_POST['siswa'];
			$sekolah=$_POST['cari'];
			$nama=$_POST['nama'];
			$keterangan=$_POST['ket'];
			$config['upload_path'] = 'berkas/';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
					$error = array('error' => $this->upload->display_errors());
					echo "<pre>";
					print_r($error);
					echo "</pre>";
				}
				else{
					$data = $this->upload->data();
						$data = array(
						'nis' =>$nis ,
						'sekolah' =>$sekolah,
						'keterangan'=>$keterangan,
						'nama_file'=>$nama,
						'file'=>$data['file_name']
					);

					$data1 = array('upload_data' => $this->upload->data());
					$cek=$this->crudmodel->InsertData('file',$data);

				if ($cek>=1)
				{
						$this->session->set_flashdata('pesan',"<p class='text'>Sukses!!!</p>");
					$this->load->view('notificasi');
				}

				else{
							echo "Gagal";
						}

			}
		}

		public function edit_pengawas($nip){
			$nama=$_POST['nama'];
			$alamat=$_POST['alamat'];
			$email=$_POST['email'];
			$telepon=$_POST['telepon'];
			$asal=$_POST['asal'];

			$data = array(
					'nama_pengawas' =>$nama ,
					'alamat' =>$alamat ,
					'email' =>$email ,
					'telepon' =>$telepon ,
					'asal_sekolah' =>$asal ,
			 );
			$where = array('nip' =>$nip , );
			$cek=$this->crudmodel->update('pengawas',$data,$where);

			if ($cek>=1)
			{
				redirect('admin/lihat_pengawas');
			}
		}
		public function edit_pembimbing($nip){

			$nama=$_POST['nama'];
			$jabatan=$_POST['jabatan'];
			$alamat=$_POST['alamat'];
			$email=$_POST['email'];
			$telepon=$_POST['telepon'];

			$data = array(
					'nama_pembimbing' => $nama ,
					'jabatan' => $jabatan,
					'alamat' => $alamat,
					'telepon' => $telepon,
					'email' => $email,

			 );
			$where = array('nip' => $nip, );
			$cek=$this->crudmodel->update('pembimbing',$data,$where);

			if ($cek>=1)
			{
				redirect('admin/lihat_pembimbing');
			}
		}
		public function edit_jurusan($kd){

			$nama=$_POST['nama'];
			$data = array(
					'nama_jurusan' => $nama

			 );
			$where = array('kode_jurusan' => $kd, );
			$cek=$this->crudmodel->update('jurusan',$data,$where);

			if ($cek>=1)
			{
				redirect('admin/jurusan');
			}
		}

		public function edit_ruangan($kd){

		  $nama=$_POST['nama'];
		  $data = array(
		      'nama_ruangan' => $nama

		   );
		  $where = array('kode_ruangan' => $kd, );
		  $cek=$this->crudmodel->update('ruangan',$data,$where);

		  if ($cek>=1)
		  {
		    redirect('admin/ruangan');
		  }
		}

		public function edit_peserta($nis){

			$nama=$_POST['nama'];
			$jenis_kelamin=$_POST['jenis_kelamin'];
			$alamat=$_POST['alamat'];
			$email=$_POST['email'];
			$telepon=$_POST['telepon'];
			$pengawas=$_POST['pengawas'];
			$pembimbing=$_POST['pembimbing'];
			$awal=$_POST['awal'];
			$akhir=$_POST['akhir'];
			$jurusan=$_POST['jurusan'];
			$ruangan=$_POST['ruangan'];
			$sekolah=$_POST['cari'];
			$config['upload_path'] = 'gambar/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload()){
				$fotoS = $this->crudmodel->get('peserta_pkl',"where nis='$nis'");
				foreach ($fotoS as $key) {
					$qwe = $key['foto'];
				}
				$data1 = $this->upload->data();
				$data = array(
					'nama' => $nama,
					'jenis_kelamin' => $jenis_kelamin,
					'alamat' => $alamat,
					'email' => $email,
					'telepon' => $telepon,
					'pengawas' => $pengawas,
					'pembimbing' => $pembimbing,
					'mulai' => $awal,
					'selesai' => $akhir,
					'jurusan' => $jurusan,
					'ruangan' => $ruangan,
					'sekolah' => $sekolah,
					'foto' => $qwe
					);
				$where = array('nis' => $nis,);
				$cek=$this->crudmodel->update("peserta_pkl",$data,$where);
				if ($cek>=1)
				{
					redirect('admin/lihat_siswa');
				}			}
			else{
				$data1 = $this->upload->data();
				$data = array(
					'nama' => $nama,
					'jenis_kelamin' => $jenis_kelamin,
					'alamat' => $alamat,
					'email' => $email,
					'telepon' => $telepon,
					'pengawas' => $pengawas,
					'pembimbing' => $pembimbing,
					'mulai' => $awal,
					'selesai' => $akhir,
					'jurusan' => $jurusan,
					'ruangan' => $ruangan,
					'sekolah' => $sekolah,
					'foto' => $data1['file_name']

					);
				$where = array('nis' => $nis,);
				$this->crudmodel->delete_file_gambar($nis);
				$cek=$this->crudmodel->update("peserta_pkl",$data,$where);
				if ($cek>=1)
				{
					redirect('admin/lihat_siswa');
				}
			}
		}
		public function edit_sekolah($npsn){

			$nama_sekolah = $_POST['nama_sekolah'];
			$email = $_POST['email'];
			$telepon = $_POST['nomber'];
			$kd_povinsi = $_POST['cari'];
			$kd_kabupaten = $_POST['kabupaten'];
			$kd_kecamatan = $_POST['kecamatan'];
			$alamat_jalan = $_POST['alamat'];

			$data_sekolah = array(
				'nama_sekolah'=> $nama_sekolah,
				'email'=> $email,
				'no_telepon'=> $telepon,
				'nama_provinsi' => $kd_povinsi,
				'nama_kabupaten' =>$kd_kabupaten,
				'nama_kecamatan' =>$kd_kecamatan,
				'alamat_jalan' =>$alamat_jalan
			);

			$where = array('npsn' => $npsn);

			$cek=$this->crudmodel->update('sekolah',$data_sekolah,$where);
			redirect('admin/lihat_sekolah');
		}


		public function delete_sekolah($npsn){
			$this->crudmodel->delete('sekolah','npsn',$npsn);
			$this->crudmodel->delete('pengawas','asal_sekolah',$npsn);
			$this->crudmodel->delete('file','sekolah',$npsn);
			$this->crudmodel->delete('peserta_pkl','sekolah',$npsn);
				redirect('admin/lihat_sekolah');
		}
		public function delete_peserta($nis){
			$this->crudmodel->delete_file_gambar($nis);
			$this->crudmodel->delete_file_berkas($nis);
			$this->crudmodel->delete('peserta_pkl','nis',$nis);
			$this->crudmodel->delete('file','nis',$nis);
				redirect('admin/lihat_siswa');
		}
		public function delete_pembimbing($nip){
			$this->crudmodel->delete('pembimbing','nip',$nip);
			$this->crudmodel->delete('peserta_pkl','pembimbing',$nip);
				redirect('admin/lihat_pembimbing');
		}
		public function delete_pengawas($nip){
			$this->crudmodel->delete('pengawas','nip',$nip);
			$this->crudmodel->delete('peserta_pkl','pengawas',$nip);
				redirect('admin/lihat_pengawas');
		}
		public function delete_jurusan($kd){
			$this->crudmodel->delete('jurusan','kode_jurusan',$kd);
				redirect('admin/jurusan');
		}
		public function delete_ruangan($kd){
			$this->crudmodel->delete('ruangan','kode_ruangan',$kd);
				redirect('admin/ruangan');
		}


		public function insert_kegiatan1(){
			$nis = $_POST['nis'];
			$nama = $_POST['nama'];
			$kegiatan = $_POST['kegiatan'];
			$data =  array('kegiatan' =>$kegiatan);
			$where = array('nis' =>$nis);
			$cek=$this->crudmodel->update('peserta_pkl',$data,$where);

			if ($cek>=1)
			{
				redirect("admin/lihat_peserta/".$nis);
			}
		}
		public function delete_berkas($key){
			$this->crudmodel->delete_file_berkasf($key);
			$this->crudmodel->delete('file','id_file',$key);
			redirect('admin/kegiatan');
		}
		public function delete_berkas1($key, $nis){
			$this->crudmodel->delete_file_berkasf($key);
			$this->crudmodel->delete('file','id_file',$key);
			redirect('admin/lihat_peserta/'.$nis);
		}
	}
?>
