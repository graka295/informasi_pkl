<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

public function index()
	{
	$this->load->view('login');
}	
public function login()
	{
	$username=$_POST['username'];
	$pass=$_POST['pass'];
	$data = $this->login->ck_akun($username,$pass);
	if($data > 0){
	$data_sekolah = $this->lihat->lihat_sekolah();
	$data_siswa = $this->lihat->lihat_peserta();
	$years = gmdate("Y", time()+60*60*7);
	$months = gmdate("m", time()+60*60*7);
	$days = gmdate("d", time()+60*60*7);
	$i=0;
	foreach($data_siswa as $row){
	$orderdate = explode('-',$row['selesai']);
	$year = $orderdate[0];
	$month  = $orderdate[1];
	$day  = $orderdate[2];
	if($month > $months && $year >= $years){
	$nis=$row['nis'];
	$aktif = $this->lihat->lihat_aktif($nis);
	
	}
	$i++;
	}
			$data = array(
			'siswa'=> $data_siswa,
			'sekolah'=> $data_sekolah,
			'aktif'=> $aktif
			);	
			$this->load->view('menu',$data);
	}
	else{
	echo "gagal";
	}
}	
public function lihat_sekolah()
	{
	$provinsi = $this->lihat->lihat_provinsi();
	$sekolah = $this->lihat->lihat_sekolah();
	$this->load->view('sekolah',array('provinsi'=>$provinsi,'sekolah'=>$sekolah));
}

public function sekolah()
	{
	$provinsi = $this->lihat->lihat_provinsi();
	$this->load->view('daftar_sekolah',array('provinsi'=>$provinsi));
}
public function provinsi()
{
	$cari=$_GET['cari'];
	$kabupaten = $this->lihat->lihat_kabupaten($cari);
	$data = count($kabupaten);
	if($data>0){
	echo "<option value='0'>semua kabupaten</option>";
	foreach($kabupaten as $row){
	echo "<option value=".$row['id'].">".$row['nama_kabupaten']."</option>";
	}
	}
	else{
	echo "<option value='0'>semua kabupaten</option>";
	}
}

public function kabupaten()
	{
	$kabupaten =$_GET['kabupaten'];
	$kecamatan = $this->lihat->lihat_kecamatan($kabupaten);
	$data = count($kecamatan);
		if($data>0){
		echo "<option value='0'>semua kabupaten</option>";
	foreach($kecamatan	 as $row){
	echo "<option value=".$row['id'].">".$row['nama_kecamatan']."</option>";
}
}
else{
echo "<option value='0'>semua kecamatan</option>";
}
}

public function provinsi1()
{
	$cari=$_GET['cari'];
	$kabupaten = $this->lihat->lihat_kabupaten($cari);
	$data = count($kabupaten);
	if($data>0){
	echo "<option value='' disabled selected>pilih kabupaten</option>";
	foreach($kabupaten as $row){
	echo "<option value=".$row['id'].">".$row['nama_kabupaten']."</option>";
	}
	}
	else{
	echo "<option value='' disabled selected>pilih kabupaten</option>";
	}
}

public function kabupaten1()
	{
	$kabupaten =$_GET['kabupaten'];
	$kecamatan = $this->lihat->lihat_kecamatan($kabupaten);
	$data = count($kecamatan);
		if($data>0){
		echo "<option value='' disabled selected>pilih kabupaten</option>";
	foreach($kecamatan	 as $row){
	echo "<option value=".$row['id'].">".$row['nama_kecamatan']."</option>";
}
}
else{
echo "<option value=''disabled selected>Pilih kecamatan</option>";
}

}
public function alamat()
	{
		$nama_sekolah=$_POST['nama_sekolah'];
		$kabupaten =$_POST['kabupaten'];
		$provinsi =$_POST['cari'];
		$kecamatan =$_POST['kecamatan'];
		if ($provinsi == "0"){
			$sekolah = $this->crudmodel->get("sekolah","WHERE nama_sekolah like'%$nama_sekolah%'");
			$prov = $this->lihat->lihat_provinsi();
			$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
		}
		else if($kabupaten=="0" and empty($nama_sekolah)){ 	
			$sekolah = $this->crudmodel->cariprovinsi($provinsi);
			$prov = $this->lihat->lihat_provinsi();
			$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
		}
		else if($kabupaten=="0" and isset($nama_sekolah)){ 	
			$sekolah = $this->crudmodel->cariprovinsidannama($provinsi,$nama_sekolah);
			$prov = $this->lihat->lihat_provinsi();
			$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
		}
		else if($kecamatan =="0" and empty($nama_sekolah)){
			$sekolah = $this->crudmodel->cariprovinsikab($provinsi,$kabupaten);
			$prov = $this->lihat->lihat_provinsi();
			$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
		}
		else if($kecamatan =="0" and isset($nama_sekolah)){
			$sekolah = $this->crudmodel->cariprovinsikabnama($provinsi,$kabupaten,$nama_sekolah);
			$prov = $this->lihat->lihat_provinsi();
			$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
		}
		else if(empty($nama_sekolah)){
			$sekolah = $this->crudmodel->cariprovkabkec($provinsi,$kabupaten,$kecamatan);
			$prov = $this->lihat->lihat_provinsi();
			$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
		}
		else{
			$sekolah = $this->crudmodel->carilengkap($provinsi,$kabupaten,$kecamatan,$nama_sekolah);
			$prov = $this->lihat->lihat_provinsi();
			$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
		}
	}
public function cari_peserta()
	{
		$nis=$_POST['nis'];
		$nama =$_POST['nama'];
		$jenis_kelamin =$_POST['jenis_kelamin'];
		$sekolah =$_POST['cari'];
		$pengawas =$_POST['pengawas'];
		$jurusan =$_POST['jurusan'];
		$pembimbing =$_POST['pembimbing'];
		$ruangan =$_POST['ruangan'];
		if (isset($nis) and empty($nama) and empty($jenis_kelamin) and empty($sekolah) and empty($jurusan) and empty($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta("and s.nis like '%$nis%'");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (empty($nama) and empty($jenis_kelamin) and isset($sekolah) and empty($jurusan) and empty($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta("and s.sekolah='$sekolah'");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}


		else if (empty($nama) and empty($jenis_kelamin) and empty($sekolah) and empty($jurusan) and isset($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta("and s.pembimbing='$pembimbing'");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (empty($nama) and empty($jenis_kelamin) and empty($sekolah) and isset($jurusan) and empty($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta("and s.jurusan='$jurusan'");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (empty($nama) and empty($jenis_kelamin) and empty($sekolah) and empty($jurusan) and empty($pembimbing) and isset($ruangan) ) {
			$data = $this->crudmodel->cari_peserta("and s.ruangan='$ruangan'");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (isset($nama) and empty($jenis_kelamin) and empty($sekolah) and empty($jurusan) and empty($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta(" and s.nama like '%$nama%'");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (isset($nama) and isset($jenis_kelamin) and empty($sekolah) and empty($jurusan) and empty($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta(" and s.jenis_kelamin='$jenis_kelamin' and s.nama like '%$nama%'");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (isset($nama) and isset($jenis_kelamin) and isset($sekolah) and empty($jurusan) and empty($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta( "and s.jenis_kelamin='$jenis_kelamin' and s.sekolah = '$sekolah' and s.nama like '%$nama%'");$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (isset($nama) and isset($jenis_kelamin) and isset($sekolah) and isset($jurusan) and empty($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta(" and s.jenis_kelamin='$jenis_kelamin' and s.sekolah = '$sekolah' and s.jurusan='$jurusan' and s.nama like '%$nama%'");$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (isset($nama) and isset($jenis_kelamin) and isset($sekolah) and isset($jurusan) and isset($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta(" and s.jenis_kelamin='$jenis_kelamin' and s.sekolah = '$sekolah' and s.jurusan='$jurusan' and s.pembimbing='$pembimbing' and s.nama like '%$nama%'");$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (isset($nama) and isset($jenis_kelamin) and isset($sekolah) and isset($jurusan) and isset($pembimbing) and isset($ruangan) ) {
			$data = $this->crudmodel->cari_peserta(" and s.jenis_kelamin='$jenis_kelamin' and s.sekolah = '$sekolah' and s.jurusan='$jurusan' and s.pembimbing='$pembimbing' and s.ruangan='$ruangan' and s.nama like '%$nama%'");$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (empty($nama) and isset($jenis_kelamin) and empty($sekolah) and empty($jurusan) and empty($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta(" and s.jenis_kelamin='$jenis_kelamin'");$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (empty($nama) and isset($jenis_kelamin) and isset($sekolah) and empty($jurusan) and empty($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta(" and s.jenis_kelamin='$jenis_kelamin' and s.sekolah='$sekolah'");$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (empty($nama) and isset($jenis_kelamin) and isset($sekolah) and isset($jurusan) and empty($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta(" and s.jenis_kelamin='$jenis_kelamin' and s.sekolah='$sekolah' and s.jurusan='$jurusan'");$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (empty($nama) and isset($jenis_kelamin) and isset($sekolah) and isset($jurusan) and isset($pembimbing) and empty($ruangan) ) {
			$data = $this->crudmodel->cari_peserta(" and s.jenis_kelamin='$jenis_kelamin' and s.sekolah='$sekolah' and s.jurusan='$jurusan' and s.pembimbing='$pembimbing'");$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

		else if (empty($nama) and isset($jenis_kelamin) and isset($sekolah) and isset($jurusan) and isset($pembimbing) and isset($ruangan) ) {
			$data = $this->crudmodel->cari_peserta(" and s.jenis_kelamin='$jenis_kelamin' and s.sekolah='$sekolah' and s.jurusan='$jurusan' and s.pembimbing='$pembimbing' and s.ruangan='$ruangan'");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}


	}
public function tambah_jurusan(){
$this->load->view('tambah_jurusan');
}
public function tambah_pengawas(){
$data_sekolah = $this->lihat->lihat_sekolah();
$this->load->view('tambah_pengawas',array('data_sekolah'=>$data_sekolah));
}
public function tambah_pembimbing(){
$this->load->view('tambah_pembimbing');
}
public function tambah_peserta(){
$data_sekolah = $this->lihat->lihat_sekolah();
$data_pembimbing = $this->lihat->lihat_pembimbing();
$data_jurusan = $this->lihat->lihat_jurusan();
$data_ruangan = $this->lihat->lihat_ruangan();
$this->load->view('tambah_peserta',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan));
}
public function asal_sekolah()
{
	$sekolah=$_GET['cari'];
	$pengawas = $this->lihat->lihat_pengawas($sekolah);	
	$data = count($pengawas);
		if($data>0){
		echo "<option value=''>Pilih pengawas</option>";
	foreach($pengawas as $row){
	echo "<option value=".$row['nip'].">".$row['nama_pengawas']."</option>";
}
}
else{
echo "<option value=''>Pilih pengawas</option>";
}
}	
public function luar(){
$sekolah = $this->lihat->lihat_sekolah_luar();
$provinsi = $this->lihat->lihat_provinsi();
$this->load->view('sekolah',array('provinsi'=>$provinsi,'sekolah'=>$sekolah));
}
public function lihat_siswa(){
$data = $this->crudmodel->cari_peserta("");
$data_sekolah = $this->lihat->lihat_sekolah();
$data_pembimbing = $this->lihat->lihat_pembimbing();
$data_jurusan = $this->lihat->lihat_jurusan();
$data_ruangan = $this->lihat->lihat_ruangan();
$this->load->view('siswa',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
}
public function edit_sekolah($npsn){
$data_sekolah = $this->lihat->edit('sekolah','npsn',$npsn);
$provinsi = $this->lihat->lihat_provinsi();
$this->load->view('edit_sekolah',array('data'=>$data_sekolah,'provinsi'=>$provinsi));
	}
public function lihat($npsn){
$siswa = $this->lihat->edit('peserta_pkl','sekolah',$npsn);
$this->load->view('lihat',array('siswa'=>$siswa));
	}

}

	