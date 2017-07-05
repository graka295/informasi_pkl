<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Filter extends CI_Controller {

public function filter_siswa($nama,$status,$tahun){
	$style = 'highlight';
	$today=date ("Y-m-d");
	$highlight = $this->crudmodel->cari_peserta("and s.nama like '%$nama%'");
	if($nama=="semua"){
		$data2 = '';
	}
	else if(empty($highlight)){
		$data2 = "and s.nis like '%$nama%' ";
	}
	else{
		$data2 = "and s.nama like '%$nama%' ";
	}
	if ($status == 'masih') {
		$data = "and '$today' <= s.selesai and '$today' >= s.mulai";
	}
	else if ($status == 'belum') {
		$data = "and '$today' < s.selesai and '$today' < s.mulai";
	}
	else if ($status == 'selesai') {
		$data = "and '$today' > s.selesai and '$today' > s.mulai";
	}
	else if ($status == 'semua'){
		$data = '';
	}
	$all = $data2.$data;
	$hasil = $this->crudmodel->cari_peserta($all);
	if(empty($hasil)){
		echo "&nbsp;&nbsp;&nbsp;Data Tidak Ada";
		}
	else if($data2 == "and s.nama like '%$nama%' "){
		$i=0;
		foreach($hasil as $k)
		{
		$nis[$i] = $k['nis'];
		$replacement = "<span class='".$style."'>".$nama."</span>";
		$strs[$i] = str_ireplace($nama, $replacement,$k['nama']);
		$i++;
		}
		$this->load->view('cari_siswa',array('siswa' => $hasil,'nama' => $strs,'nis' => $nis,'tahun' => $tahun));
	}
	else{
		$i=0;
		foreach($hasil as $k)
		{
		$strs[$i] = $k['nama'];
		$replacement = "<span class='".$style."'>".$nama."</span>";
		$nis[$i] = str_ireplace($nama, $replacement,$k['nis']);
		$i++;
		}
		$this->load->view('cari_siswa',array('siswa' => $hasil,'nama' => $strs,'nis' => $nis,'tahun' => $tahun));
	}
	}
public function filter_ruangan_masih($kode){
	$today=date ("Y-m-d");
	$siswa = $this->crudmodel->cari_peserta("and '$today' <= s.selesai and '$today' >= s.mulai and s.ruangan = '$kode'");
	$pesan =" Peserta Yang Sedang PKL";
	$this->load->view('filter_ruangan',array('siswa'=>$siswa,'pesan'=>$pesan));
	}
public function filter_ruangan_daftar($kode){
	$today=date ("Y-m-d");
	$siswa = $this->crudmodel->cari_peserta("and '$today' < s.selesai and '$today' < s.mulai and s.ruangan = '$kode'");
	$pesan ="Peserta Yang Akan PKL";
	$this->load->view('filter_ruangan',array('siswa'=>$siswa,'pesan'=>$pesan));
	}
public function filter_ruangan_pernah($kode){
	$today=date ("Y-m-d");
	$siswa = $this->crudmodel->cari_peserta("and '$today' > s.selesai and '$today' > s.mulai and s.ruangan = '$kode'");
	$pesan ="Peserta Yang Sudah Selesai";
	$this->load->view('filter_ruangan',array('siswa'=>$siswa,'pesan'=>$pesan));
	}
public function filter_ruangan_all($kode){
	$today=date ("Y-m-d");
	$siswa = $this->crudmodel->cari_peserta("and s.ruangan = '$kode'");
	$pesan ="Semua Peserta";
	$this->load->view('filter_ruangan',array('siswa'=>$siswa,'pesan'=>$pesan));
	}
}
?>
