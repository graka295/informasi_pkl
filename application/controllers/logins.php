<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logins extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->Library('session');
	}

	public function login()
	{
		$username=$_POST['username'];
		$pass=md5($_POST['pass']);
		$cek = $this->login->ck_akun($username,$pass);

		if($cek > 0){
			$data= $this->crudmodel->get("user","WHERE username = '$username'");
			foreach ($data as $row) {
				$user = $row['username'];
				$password= $row['password'];
				$nip = $row['nip'];
			}

			$sesi = array(
				'username' => $user,
				'password' => $password,
				'nip' => $nip
			 );
			$this->session->set_userdata($sesi);
			redirect('admin/lihat_siswa');
		}
		else{
			$this->session->set_flashdata("pesan","Username Atau Password Salah");
			redirect('admin/');
		}
	}

	public function logout()
	{
				$sesi1 = array (
						'username',
                        'password',
                        'nip'
                      );
		$this->session->unset_userdata($sesi1);
		redirect('admin/index');
	}

}
