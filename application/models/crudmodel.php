<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Crudmodel extends CI_model {
		public function Get($tabelName,$where){
			$data = $this->db->query("select *from $tabelName ".$where);
			return $data->result_array();
		}
		public function Cek($tabelName,$where){

			$data = $this->db->query("select *from $tabelName ".$where);
			return $data->num_rows();
		}

		public function cari_sekolah($where){

			$data = $this->db->query("select s.npsn, s.nama_sekolah, s.email, s.no_telepon, s.alamat_jalan, p.nama_provinsi, k.nama_kecamatan, b.nama_kabupaten from sekolah s, provinsi p, kecamatan k, kabupaten b where s.nama_provinsi = p.id and s.nama_kabupaten= b.id and s.nama_kecamatan=k.id ".$where);
			return $data->result_array();
		}

		public function cari_peserta($where){

			$res = $this->db->query("select s.kegiatan, s.nama, s.nis,s.sekolah, s.jenis_kelamin, s.alamat,s.ruangan, s.pengawas, s.pembimbing, s.jurusan, ss.nama_sekolah, j.nama_jurusan, s.telepon, s.email, s.mulai, s.selesai, pen.nama_pengawas, pem.nama_pembimbing, r.nama_ruangan, s.foto from sekolah ss, peserta_pkl s, jurusan j, pembimbing pem, pengawas pen, ruangan r where s.jurusan=j.kode_jurusan and s.sekolah=ss.npsn and s.pengawas = pen.nip and s.pembimbing = pem.nip and s.ruangan = r.kode_ruangan ".$where);
			return $res->result_array();
		}

		public function cari_pengawas($where){

			$data = $this->db->query("select s.asal_sekolah, s.nip,s.asal_sekolah, s.nama_pengawas, s.alamat, s.email, s.telepon, k.nama_sekolah from pengawas s,sekolah k where s.asal_sekolah = k.npsn ".$where);
			return $data->result_array();
		}

		public function delete($nama_tabel,$nama_field,$where){

			$this->db->where($nama_field,$where);
			$this->db->delete($nama_tabel);
		}

		public function update($tabelName,$data,$where){
			$res = $this->db->update($tabelName,$data,$where);
			return $res;
		}

		public function InsertData($tabelName,$data){
			$res = $this->db->insert($tabelName,$data);
			return $res;
		}

		public function jumlah_pertahun($where){
			$res=$this->db->query("SELECT YEAR(selesai) AS tahun, COUNT(*) AS jumlah_tahunan FROM peserta_pkl GROUP BY YEAR(selesai)");
			return $res->result_array();
		}

		public function jumlah_pl(){
			$res=$this->db->query("select sum(if(jenis_kelamin = 'L',1,0)) as laki_laki,sum(if(jenis_kelamin = 'P',1,0)) as perempuan FROM peserta_pkl");
			return $res->result_array();
		}

		function delete_file_gambar($key){
     		$query = $this->db->query("SELECT *FROM peserta_pkl where nis='$key'");
     		$row = $query->row();
			unlink("./gambar/$row->foto");
		}
		function delete_file_berkas($key){
     		$query = $this->db->query("SELECT *FROM file where nis='$key'");
     		$row = $query->row();
			unlink("./berkas/$row->file");
		}
		function delete_file_berkasf($key){
     		$query = $this->db->query("SELECT *FROM file where id_file='$key'");
     		$row = $query->row();
			unlink("./berkas/$row->file");
		}

		function status($today){
			$res = $this->db->query("select sum(if('$today' <= selesai and '$today' >= mulai,1,0)) as masih_pkl, sum(if('$today' < selesai and '$today' < mulai ,1,0)) as  belum_pkl, sum(if('$today' > mulai and '$today' > selesai ,1,0)) as selesai FROM peserta_pkl");
			return $res->result_array();
		}

		public function file($where){
			$data = $this->db->query("select j.id_file, s.nama,ss.nama_sekolah, j.file, j.nama_file, j.keterangan from sekolah ss, peserta_pkl s, file j where j.nis=s.nis and s.sekolah=ss.npsn".$where);
			return $data->result_array();
		}
		public function sekolah_daerah(){
			$data = $this->db->query("SELECT provinsi.nama_provinsi,COUNT(*) AS jumlah FROM sekolah JOIN provinsi ON provinsi.id=sekolah.nama_provinsi GROUP BY sekolah.nama_provinsi");
			return $data->result_array();
		}

		public function jumlah(){
   			$query = $this->db->get('peserta_pkl');
   			return $query->num_rows();
  			}

public function lihat($sampai,$dari){
if(empty($dari)){
$query = $this->db->query("select s.kegiatan, s.nama, s.nis,s.sekolah, s.jenis_kelamin, s.alamat,s.ruangan, s.pengawas, s.pembimbing, s.jurusan, ss.nama_sekolah, j.nama_jurusan, s.telepon, s.email, s.mulai, s.selesai, pen.nama_pengawas, pem.nama_pembimbing, r.nama_ruangan, s.foto from sekolah ss, peserta_pkl s, jurusan j, pembimbing pem, pengawas pen, ruangan r where s.jurusan=j.kode_jurusan and s.sekolah=ss.npsn and s.pengawas = pen.nip and s.pembimbing = pem.nip and s.ruangan = r.kode_ruangan LIMIT $sampai");
}
else{
$query = $this->db->query("select s.kegiatan, s.nama, s.nis,s.sekolah, s.jenis_kelamin, s.alamat,s.ruangan, s.pengawas, s.pembimbing, s.jurusan, ss.nama_sekolah, j.nama_jurusan, s.telepon, s.email, s.mulai, s.selesai, pen.nama_pengawas, pem.nama_pembimbing, r.nama_ruangan, s.foto from sekolah ss, peserta_pkl s, jurusan j, pembimbing pem, pengawas pen, ruangan r where s.jurusan=j.kode_jurusan and s.sekolah=ss.npsn and s.pengawas = pen.nip and s.pembimbing = pem.nip and s.ruangan = r.kode_ruangan LIMIT $dari,$sampai");
}
return $query->result_array();
}

		public function jumlah_baris($tabel){
			$cek= $this->db->query("select * from $tabel");
			return $cek->num_rows();
		}
	}
?>
