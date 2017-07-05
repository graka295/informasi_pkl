<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Lihat extends CI_model {

		public function lihat_siswa(){

			$data = $this->db->query("select * from peserta_pkl");

			return $data;
		}

		public function lihat_aktif($nis){

			$cek= $this->db->query("select * from peserta_pkl where nis='$nis'");
			$data1= $cek->result_array();

			return $data1;
		}

		public function lihat_sekolah(){

			$cek= $this->db->query("select * from sekolah");
			$data1= $cek->result_array();

			return $data1;
		}

		public function lihat_pembimbing(){

			$cek= $this->db->query("select * from pembimbing");
			$data1= $cek->result_array();

			return $data1;
		}

		public function lihat_jurusan(){

			$cek= $this->db->query("select * from jurusan");
			$data1= $cek->result_array();

			return $data1;
		}

		public function lihat_ruangan(){

			$cek= $this->db->query("select * from ruangan");
			$data1= $cek->result_array();

			return $data1;
		}

		public function lihat_sekolah1($cari){

			$cek= $this->db->query("select * from sekolah where provinsi = '$cari'");
			$data1= $cek->result_array();

			return $data1;
		}

		public function lihat_sekolah2($cari,$kabupaten){

			$cek= $this->db->query("select * from sekolah where provinsi = '$cari' AND kabupaten = '$kabupaten' ");
			$data1= $cek->result_array();

			return $data1;
		}

		public function lihat_peserta(){

			$cek= $this->db->query("select * from peserta_pkl");
			$data2= $cek->result_array();

			return $data2;
		}

		public function lihat_provinsi(){

			$cek = $this->db->query("select * from provinsi");
			$data= $cek->result_array();

			return $data;
		}

		public function lihat_kabupaten($cari){

			$cek = $this->db->query("select * from kabupaten where id_provinsi='$cari'");
			$data= $cek->result_array();

			return $data;
		}

		public function lihat_kecamatan($kabupaten){

			$cek = $this->db->query("select * from kecamatan where id_kabupaten='$kabupaten'");
			$data= $cek->result_array();

			return $data;
		}

		public function lihat_pengawas($sekolah){

			$cek = $this->db->query("select * from pengawas where asal_sekolah='$sekolah'");
			$data= $cek->result_array();

			return $data;
		}

		public function lihat_sekolah_luar(){

			$cek= $this->db->query("select * from sekolah where nama_provinsi <> '32'");
			$data1= $cek->result_array();

			return $data1;
		}

		public function edit($tabel,$field,$npsn){

			$cek = $this->db->query("select * from $tabel where $field='$npsn'");
			$data1= $cek->result_array();

			return $data1;
		}

	}
?>
