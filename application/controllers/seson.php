<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seson extends CI_Controller {
	public function index(){
		$cek = $this->session->userdata('username');
		if (isset($cek)) {
			redirect('admin/lihat_siswa');
		}
		else{
			redirect('admin/index');
		}
	}
}
