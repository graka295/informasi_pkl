<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_model {

		public function ck_akun($username,$pass){

			$cek = $this->db->query("select * from user where username='$username' AND password='$pass'");
			$data= $cek->num_rows();

			return $data;
		}

	}
?>
