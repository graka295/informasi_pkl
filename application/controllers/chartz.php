<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chartz extends CI_Controller {
	public function print_daerah_sekolah()
	{
		$sekolah_daerah= $this->crudmodel->sekolah_daerah();
		$data = array(
			'sekolah_daerah' =>$sekolah_daerah,
		 );
		$this->load->view('print_grafik_daerah_sekolah',$data);
	}
	public function print_status_peserta()
	{
		$today=date ("Y-m-d");
		$data1 = $this->crudmodel->status($today);
		$data = array('data' => $data1, );
		$this->load->view('print_grafik_status_peserta',$data);
	}
	public function print_peserta_pertahun()
	{
		$pertahun = $this->crudmodel->jumlah_pertahun("");
		$data = array('pertahun' => $pertahun, );
		$this->load->view('print_grafik_peserta_pertahun',$data);
	}
	public function print_peserta_pl()
	{
		$data1 = $this->crudmodel->jumlah_pl();
		$data = array('data' => $data1, );
		$this->load->view('print_grafik_peserta_pl',$data);
	}

	public function print_semua()
	{
		$jumlah_pl=$this->crudmodel->jumlah_pl();
		$pertahun = $this->crudmodel->jumlah_pertahun("");
		$today=date ("Y-m-d");
		$status = $this->crudmodel->status($today);
		$sekolah_daerah= $this->crudmodel->sekolah_daerah();
		$data = array(
			'jumlah_pl' =>$jumlah_pl ,
			'pertahun' =>$pertahun ,
			'status' =>$status ,
			'sekolah_daerah' =>$sekolah_daerah,
		 );
		$this->load->view('print_grafik_semua',$data);
	}
}
