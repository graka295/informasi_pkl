<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->Library('pagination');
	}
	public function index()
	{
			$this->load->view('login');
	}

	public function statistik()
		{
			$jumlah_pl=$this->crudmodel->jumlah_pl();
			$jumlah_pertahun = $this->crudmodel->jumlah_pertahun("");
			$jumlah_daerah= $this->crudmodel->sekolah_daerah();
			$today=date("Y-m-d");
			$daerah = $this->crudmodel->sekolah_daerah();
			$status = $this->crudmodel->status($today);
			$pertahun = $this->crudmodel->jumlah_pertahun("");
			$pl = $this->crudmodel->jumlah_pl();

			$data = array(
				'daerah' => $daerah,
				'status' => $status,
				'pl' => $pl,
				'pertahun' => $pertahun,
				'jumlah_pertahun' => $jumlah_pertahun,
				'jumlah_daerah' => $jumlah_daerah,
				'jumlah_pl' => $jumlah_pl,
				);

			$this->load->view('template\header');
			$this->load->view('statistik',$data);
			$this->load->view('template\footer');
		}

	public function cari_siswa(){
		$cari = $_GET['input'];
		$style = 'highlight';
		$data1 = $this->crudmodel->cari_peserta("and s.nama like '%$cari%'");
		$i=0;
		foreach($data1 as $k)
		{
		$nis[$i] = $k['nis'];
		$replacement = "<span class='".$style."'>".$cari."</span>";
		$strs[$i] = str_ireplace($cari, $replacement,$k['nama']);
		$i++;
		}
		if(empty($strs)){
			$data1 = $this->crudmodel->cari_peserta("and s.nis like '%$cari%'");
			$i=0;
			foreach($data1 as $k)
			{
			$strs[$i] = $k['nama'];
			$replacement = "<span class='".$style."'>".$cari."</span>";
			$nis[$i] = str_ireplace($cari, $replacement,$k['nis']);
			$i++;
			}
			if(empty($nis)){
				echo "&nbsp;&nbsp;&nbsp;Data Tidak Ada";
			}
			else{
			$this->load->view('cari_siswa',array('siswa' => $data1,'nama' => $strs,'nis' => $nis));
			}
		}
		else{
			$this->load->view('cari_siswa',array('siswa' => $data1,'nama' => $strs,'nis' => $nis));
		}
	}
	public function status_siswa(){
		$cari = $_GET['input'];
		$today=date ("Y-m-d");
		if ($cari == 'masih') {
			$data = $this->crudmodel->cari_peserta("and '$today' <= s.selesai and '$today' >= s.mulai");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('cari_status',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}
		else if ($cari == 'belum') {
			$data = $this->crudmodel->cari_peserta("and '$today' < s.selesai and '$today' < s.mulai");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('cari_status',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}
		else if ($cari == 'selesai') {
			$data = $this->crudmodel->cari_peserta("and '$today' > s.selesai and '$today' > s.mulai");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('cari_status',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}
		else if ($cari == 'semua'){
			$data = $this->crudmodel->cari_peserta("");
			$data_sekolah = $this->lihat->lihat_sekolah();
			$data_pembimbing = $this->lihat->lihat_pembimbing();
			$data_jurusan = $this->lihat->lihat_jurusan();
			$data_ruangan = $this->lihat->lihat_ruangan();
			$this->load->view('cari_status',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan,'data'=>$data));
		}

	}
	public function cari_sekolah(){
		$cari = $_GET['input'];
		if (is_numeric($cari)){
			$data1 = $this->crudmodel->cari_sekolah("and s.npsn like '%$cari%'");
			$npsn=sizeof($data1);
		}
		else if(is_string($cari)){
			$data = $this->crudmodel->cari_sekolah(" and s.nama_sekolah like '%$cari%'");
			$this->load->view('cari_sekolah',array('sekolah' => $data));
		}
		else{
			echo"Data Tidak ada";
		}
	}
	public function lihat($npsn){
		$siswa = $this->crudmodel->cari_peserta("and s.sekolah = '$npsn'");
		$sekolah = $this->crudmodel->cari_sekolah("and s.npsn = '$npsn'");
		$pengawas = $this->crudmodel->cari_pengawas("and k.npsn = '$npsn'");
		$this->load->view('template/dheader');
		$this->load->view('lihat',array('siswa'=>$siswa,'npsn'=>$npsn, 'sekolah'=>$sekolah, 'pengawas'=>$pengawas));
		$this->load->view('template/footer');
	}
	public function lihat_sekolah(){
			$jumlah= $this->crudmodel->jumlah_baris("sekolah");
			$config['base_url'] = base_url().'admin/lihat_sekolah/';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 4;
			$sampai = $config['per_page'];
			$config['full_tag_open'] = "<ul class='pagination frm'>";
			$config['full_tag_close'] ="</ul>";

			$config['num_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
			$config['num_tag_close'] = '</a></li>';

			$config['cur_tag_open'] = '<a class="page-link frm">';
			$config['cur_tag_close'] = '</a>';

			$config['next_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
			$config['next_tagl_close'] = "</a></li>";

			$config['prev_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
			$config['prev_tagl_close'] = "</a></li>";

			$config['first_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
			$config['first_tagl_close'] = "</a></li>";

			$config['last_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
			$config['last_tagl_close'] = "</a></li>";

			$config['full_tag_open'] = "<ul class='pagination frm'>";
			$config['full_tag_close'] ="</ul>";

			$config['num_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
			$config['num_tag_close'] = '</a></li>';

			$config['cur_tag_open'] = '<a class="page-link frm">';
			$config['cur_tag_close'] = '</a>';

			$config['next_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
			$config['next_tagl_close'] = "</a></li>";

			$config['prev_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
			$config['prev_tagl_close'] = "</a></li>";

			$config['first_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
			$config['first_tagl_close'] = "</a></li>";

			$config['last_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
			$config['last_tagl_close'] = "</a></li>";

			$config['first_link'] = '« First';
			$config['last_link'] = 'Last »';
			$config['next_link'] = "Next »";
			$config['prev_link'] = "« Previous";
			$this->pagination->initialize($config);
			$dari = $this->uri->segment('3');
			if(empty($dari)){
				$sekolah = $this->crudmodel->cari_sekolah("Limit $sampai");
			}
			else{
				$sekolah = $this->crudmodel->cari_sekolah("Limit $dari,$sampai");
			}
			$provinsi = $this->lihat->lihat_provinsi();
			$this->load->view('template\header');
			$this->load->view('sekolah',array('provinsi'=>$provinsi,'sekolah'=>$sekolah));
			$this->load->view('template\footer');
		}
	public function lihat_siswa(){
			$jumlah= $this->crudmodel->jumlah();
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 4;
			$sampai = $config['per_page'];
			$config['full_tag_open'] = "<ul class='pagination frm'>";
			$config['full_tag_close'] ="</ul>";

			$config['num_tag_open'] = '<li class="page-item frm waves-effect"><a class="page-link frm"';
			$config['num_tag_close'] = '</a></li>';

			$config['cur_tag_open'] = '<a class="page-link frm">';
			$config['cur_tag_close'] = '</a>';

			$config['next_tag_open'] = '<li class="page-item frm waves-effect"><a class="page-link frm"';
			$config['next_tagl_close'] = "</a></li>";

			$config['prev_tag_open'] = '<li class="page-item frm waves-effect"><a class="page-link frm"';
			$config['prev_tagl_close'] = "</a></li>";

			$config['first_tag_open'] = '<li class="page-item frm waves-effect"><a class="page-link frm"';
			$config['first_tagl_close'] = "</a></li>";

			$config['last_tag_open'] = '<li class="page-item frm waves-effect"><a class="page-link frm"';
			$config['last_tagl_close'] = "</a></li>";

			$config['first_link'] = '« First';
			$config['last_link'] = 'Last »';
			$config['next_link'] = "Next »";
			$config['prev_link'] = "« Previous";
			$config['base_url'] = base_url().'admin/lihat_siswa/';
			$config['per_page'] = 4;
			$sampai = $config['per_page'];
			$dari = $this->uri->segment('3');
			$data['package'] = $this->crudmodel->lihat($config['per_page'],$dari);
			$this->pagination->initialize($config);
			$dari = $this->uri->segment('3');
			$data = $this->crudmodel->lihat($config['per_page'],$dari);
			$this->pagination->initialize($config);
			$no = $dari;
			$this->load->view('template/header');
			$this->load->view('siswa',array('data'=>$data,'no'=>$no));
			$this->load->view('template/footer');
			}

	public function print_semua_pengawas(){
		$pengawas = $this->crudmodel->cari_pengawas('');
		$this->load->view('kop_pengawas',array('pengawas'=>$pengawas));
	}
	public function lihat_pengawas(){
		$jumlah= $this->crudmodel->jumlah_baris("pengawas");
		$config['base_url'] = base_url().'admin/lihat_pengawas/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 4;
		$sampai = $config['per_page'];
		$config['full_tag_open'] = "<ul class='pagination frm'>";
		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['num_tag_close'] = '</a></li>';

		$config['cur_tag_open'] = '<a class="page-link frm">';
		$config['cur_tag_close'] = '</a>';

		$config['next_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['next_tagl_close'] = "</a></li>";

		$config['prev_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['prev_tagl_close'] = "</a></li>";

		$config['first_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['first_tagl_close'] = "</a></li>";

		$config['last_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['last_tagl_close'] = "</a></li>";

		$config['full_tag_open'] = "<ul class='pagination frm'>";
		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['num_tag_close'] = '</a></li>';

		$config['cur_tag_open'] = '<a class="page-link frm">';
		$config['cur_tag_close'] = '</a>';

		$config['next_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['next_tagl_close'] = "</a></li>";

		$config['prev_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['prev_tagl_close'] = "</a></li>";

		$config['first_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['first_tagl_close'] = "</a></li>";

		$config['last_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['last_tagl_close'] = "</a></li>";

		$config['first_link'] = '« First';
		$config['last_link'] = 'Last »';
		$config['next_link'] = "Next »";
		$config['prev_link'] = "« Previous";
		$this->pagination->initialize($config);
		$dari = $this->uri->segment('3');
		$pengawas = $this->crudmodel->cari_pengawas('');
		if(empty($dari)){
			$pengawas = $this->crudmodel->cari_pengawas("Limit $sampai");
		}
		else{
			$pengawas = $this->crudmodel->cari_pengawas("Limit $dari,$sampai");
		}

		$this->load->view('template\header');
		$this->load->view('pengawas',array('pengawas'=>$pengawas));
		$this->load->view('template\footer');
	}

	public function lihat_pembimbing(){
		$jumlah= $this->crudmodel->jumlah_baris("pembimbing");
		$config['base_url'] = base_url().'admin/lihat_pembimbing/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 4;
		$sampai = $config['per_page'];
		$config['full_tag_open'] = "<ul class='pagination frm'>";
		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['num_tag_close'] = '</a></li>';

		$config['cur_tag_open'] = '<a class="page-link frm">';
		$config['cur_tag_close'] = '</a>';

		$config['next_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['next_tagl_close'] = "</a></li>";

		$config['prev_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['prev_tagl_close'] = "</a></li>";

		$config['first_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['first_tagl_close'] = "</a></li>";

		$config['last_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['last_tagl_close'] = "</a></li>";

		$config['full_tag_open'] = "<ul class='pagination frm'>";
		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['num_tag_close'] = '</a></li>';

		$config['cur_tag_open'] = '<a class="page-link frm">';
		$config['cur_tag_close'] = '</a>';

		$config['next_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['next_tagl_close'] = "</a></li>";

		$config['prev_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['prev_tagl_close'] = "</a></li>";

		$config['first_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['first_tagl_close'] = "</a></li>";

		$config['last_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['last_tagl_close'] = "</a></li>";

		$config['first_link'] = '« First';
		$config['last_link'] = 'Last »';
		$config['next_link'] = "Next »";
		$config['prev_link'] = "« Previous";
		$this->pagination->initialize($config);
		$dari = $this->uri->segment('3');
		if(empty($dari)){
		$pembimbing = $this->crudmodel->get('pembimbing',"LIMIT $sampai");
		}
		else{
		$pembimbing = $this->crudmodel->get('pembimbing',"LIMIT $dari, $sampai");
		}
		$this->load->view('template\header');
		$this->load->view('pembimbing',array('pembimbing'=>$pembimbing));
		$this->load->view('template\footer');
	}
	public function print_semua_pembimbing(){
		$pembimbing = $this->crudmodel->get('pembimbing','');
		$this->load->view('kop_pembimbing',array('pembimbing'=>$pembimbing));
	}
	public function detail_pembimbing($nip){
		$pembimbing = $this->crudmodel->get('pembimbing',"where nip = '$nip'");
		$siswa = $this->crudmodel->cari_peserta("and s.pembimbing = '$nip'");
		$this->load->view('template/dheader');
		$this->load->view('lihat_pembimbing',array('pembimbing'=>$pembimbing,'siswa'=>$siswa));
		$this->load->view('template/footer');
	}

	public function print_pembimbing($nip){
		$pembimbing = $this->crudmodel->get('pembimbing',"where nip = '$nip'");
		$siswa = $this->crudmodel->cari_peserta("and s.pembimbing = '$nip'");
		$this->load->view('print_pembimbing',array('pembimbing'=>$pembimbing,'siswa'=>$siswa));
	}
	public function print_pengawas($nip){
		$pengawas = $this->crudmodel->get('pengawas',"where nip = '$nip'");
		$siswa = $this->crudmodel->cari_peserta("and s.pengawas = '$nip'");
		$this->load->view('print_pengawas',array('pengawas'=>$pengawas,'siswa'=>$siswa));
	}
	public function print_jurusan($kd){
		$jurusan = $this->crudmodel->get('jurusan',"where kode_jurusan = '$kd'");
		$siswa = $this->crudmodel->cari_peserta("and s.jurusan = '$kd'");
		$this->load->view('print_jurusan',array('jurusan'=>$jurusan,'siswa'=>$siswa));
	}
	public function print_ruangan($kd){
		$ruangan = $this->crudmodel->get('ruangan',"where kode_ruangan = '$kd'");
		$siswa = $this->crudmodel->cari_peserta("and s.ruangan = '$kd'");
		$this->load->view('print_ruangan',array('ruangan'=>$ruangan,'siswa'=>$siswa));
	}

	public function tambah_jurusan(){
		$this->load->view('tambah_jurusan');
	}
	public function tambah_ruangan(){
		$this->load->view('tambah_ruangan');
	}
	public function jurusan(){
		$jumlah= $this->crudmodel->jumlah_baris("jurusan");
		$config['base_url'] = base_url().'admin/jurusan/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 4;
		$sampai = $config['per_page'];
		$config['full_tag_open'] = "<ul class='pagination frm'>";
		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['num_tag_close'] = '</a></li>';

		$config['cur_tag_open'] = '<a class="page-link frm">';
		$config['cur_tag_close'] = '</a>';

		$config['next_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['next_tagl_close'] = "</a></li>";

		$config['prev_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['prev_tagl_close'] = "</a></li>";

		$config['first_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['first_tagl_close'] = "</a></li>";

		$config['last_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['last_tagl_close'] = "</a></li>";

		$config['full_tag_open'] = "<ul class='pagination frm'>";
		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['num_tag_close'] = '</a></li>';

		$config['cur_tag_open'] = '<a class="page-link frm">';
		$config['cur_tag_close'] = '</a>';

		$config['next_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['next_tagl_close'] = "</a></li>";

		$config['prev_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['prev_tagl_close'] = "</a></li>";

		$config['first_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['first_tagl_close'] = "</a></li>";

		$config['last_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['last_tagl_close'] = "</a></li>";

		$config['first_link'] = '« First';
		$config['last_link'] = 'Last »';
		$config['next_link'] = "Next »";
		$config['prev_link'] = "« Previous";
		$this->pagination->initialize($config);
		$dari = $this->uri->segment('3');
		if(empty($dari)){
		$jurusan = $this->crudmodel->get('jurusan',"LIMIT $sampai");
		}
		else{
		$jurusan = $this->crudmodel->get('jurusan',"LIMIT $dari, $sampai");
		}

		$this->load->view('template\header');
		$this->load->view('jurusan',array('jurusan' => $jurusan ));
		$this->load->view('template\footer');
	}
	public function print_semua_jurusan(){
		$jurusan = $this->crudmodel->get('jurusan',"");
		$this->load->view('kop_jurusan',array('jurusan' => $jurusan, ));
	}
	public function ruangan(){
		$jumlah= $this->crudmodel->jumlah_baris("ruangan");
		$config['base_url'] = base_url().'admin/ruangan/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 4;
		$sampai = $config['per_page'];
		$config['full_tag_open'] = "<ul class='pagination frm'>";
		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['num_tag_close'] = '</a></li>';

		$config['cur_tag_open'] = '<a class="page-link frm">';
		$config['cur_tag_close'] = '</a>';

		$config['next_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['next_tagl_close'] = "</a></li>";

		$config['prev_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['prev_tagl_close'] = "</a></li>";

		$config['first_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['first_tagl_close'] = "</a></li>";

		$config['last_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['last_tagl_close'] = "</a></li>";

		$config['full_tag_open'] = "<ul class='pagination frm'>";
		$config['full_tag_close'] ="</ul>";

		$config['num_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['num_tag_close'] = '</a></li>';

		$config['cur_tag_open'] = '<a class="page-link frm">';
		$config['cur_tag_close'] = '</a>';

		$config['next_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['next_tagl_close'] = "</a></li>";

		$config['prev_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['prev_tagl_close'] = "</a></li>";

		$config['first_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['first_tagl_close'] = "</a></li>";

		$config['last_tag_open'] = '<li class="page-item frm"><a class="page-link frm"';
		$config['last_tagl_close'] = "</a></li>";

		$config['first_link'] = '« First';
		$config['last_link'] = 'Last »';
		$config['next_link'] = "Next »";
		$config['prev_link'] = "« Previous";
		$this->pagination->initialize($config);
		$dari = $this->uri->segment('3');
		if(empty($dari)){
		$ruangan = $this->crudmodel->get('ruangan',"LIMIT $sampai");
		}
		else{
		$ruangan = $this->crudmodel->get('ruangan',"LIMIT $dari, $sampai");
		}

		$this->load->view('template\header');
		$this->load->view('ruangan',array('ruangan' => $ruangan ));
		$this->load->view('template\footer');
	}
	public function print_semua_ruangan(){
			$ruangan = $this->crudmodel->get('ruangan',"");
		$this->load->view('kop_ruangan',array('ruangan' => $ruangan, ));
	}
	public function detail_pengawas($nip){
			$pengawas = $this->crudmodel->cari_pengawas("and s.nip='$nip'");
			foreach ($pengawas as $key ) {
				$npsn=$key['asal_sekolah'];
			}
			$siswa = $this->crudmodel->cari_peserta("and s.pengawas='$nip'");
			$sekolah = $this->crudmodel->cari_sekolah("and s.npsn = '$npsn'");
			$this->load->view('template/dheader');
			$this->load->view('lihat_pengawas',array('pengawas'=>$pengawas,'siswa' => $siswa, 'sekolah'=>$sekolah));
			$this->load->view('template/footer');
		}

	public function detail_jurusan($kd){
		$jurusan = $this->crudmodel->get('jurusan',"where kode_jurusan='$kd'");
		$siswa = $this->crudmodel->cari_peserta("and s.jurusan = '$kd'");
		$this->load->view('template/dheader');
		$this->load->view('lihat_jurusan',array('jurusan' => $jurusan, 'siswa'=>$siswa ));
		$this->load->view('template/footer');
	}
	public function detail_ruangan($kd){
		$ruangan = $this->crudmodel->get('ruangan',"where kode_ruangan='$kd'");
		$siswa = $this->crudmodel->cari_peserta("and s.ruangan = '$kd'");
		$this->load->view('template/dheader');
		$this->load->view('lihat_ruangan',array('ruangan' => $ruangan, 'siswa'=>$siswa ));
		$this->load->view('template/footer');
	}
	public function edit_jurusan($kd){
		$jurusan = $this->crudmodel->get('jurusan',"where kode_jurusan ='$kd'");
		$this->load->view('edit_jurusan',array('jurusan' => $jurusan, ));
	}
	public function edit_ruangan($kode_ruangan){
		$ruangan = $this->crudmodel->get('ruangan',"where kode_ruangan ='$kode_ruangan'");
		$this->load->view('edit_ruangan',array('ruangan' => $ruangan, ));
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

	public function sekolah(){
		$data = $this->lihat->lihat_sekolah();
		$provinsi = $this->lihat->lihat_provinsi();
		$this->load->view('tambah_sekolah',array('provinsi'=>$provinsi,'data'=>$data));
	}
	public function asal_sekolah(){
		$sekolah=$_GET['cari'];
		$pengawas = $this->lihat->lihat_pengawas($sekolah);
		$data = count($pengawas);
			if($data>0){
				echo "<option value='' style='display:none'>Pilih Pengawas</option>";
				foreach($pengawas as $row){
					echo "<option value=".$row['nip'].">".$row['nama_pengawas']."</option>";
				}
			}
			else{
				echo "<option value='' style='display:none'>Pilih Pengawas</option>";
			}
	}

	public function provinsi(){
		$cari=$_GET['cari'];
		$kabupaten = $this->lihat->lihat_kabupaten($cari);
		$data = count($kabupaten);
		if($data>0){
			echo "<option value='0'>Semua Kabupaten</option>";
			foreach($kabupaten as $row){
				echo "<option value=".$row['id'].">".$row['nama_kabupaten']."</option>";
			}
		}
		else{
			echo "<option value='0'>Semua Kabupaten</option>";
		}
	}
	public function provinsi1(){
		$cari=$_GET['cari'];
		$kabupaten = $this->lihat->lihat_kabupaten($cari);
		$data = count($kabupaten);
			if($data>0){
				echo "<option value='' disabled selected style='display:none'>Pilih Kabupaten</option>";
				foreach($kabupaten as $row){
					echo "<option value=".$row['id'].">".$row['nama_kabupaten']."</option>";
				}
			}
			else{
				echo "<option value='' disabled selected style='display:none'>Pilih Kabupaten</option>";
			}
	}
	public function kabupaten(){
		$kabupaten =$_GET['kabupaten'];
		$kecamatan = $this->lihat->lihat_kecamatan($kabupaten);
		$data = count($kecamatan);
			if($data>0){
				echo "<option value='0'>Semua Kecamatan</option>";
				foreach($kecamatan	 as $row){
					echo "<option value=".$row['id'].">".$row['nama_kecamatan']."</option>";
				}
			}
			else{
				echo "<option value='0'>Semua Kecamatan</option>";
			}
	}
	public function kabupaten1(){
		$kabupaten =$_GET['kabupaten'];
		$kecamatan = $this->lihat->lihat_kecamatan($kabupaten);
		$data = count($kecamatan);
			if($data>0){
				echo "<option value='' disabled selected style='display:none'>Pilih Kecamatan</option>";
				foreach($kecamatan	 as $row){
					echo "<option value=".$row['id'].">".$row['nama_kecamatan']."</option>";
				}
			}
			else{
				echo "<option value=''disabled selected style='display:none'>Pilih Kecamatan</option>";
			}
	}
	public function alamat(){
			$nama_sekolah=$_POST['nama_sekolah'];
			$kabupaten =$_POST['kabupaten'];
			$provinsi =$_POST['cari'];
			$kecamatan =$_POST['kecamatan'];
			if ($provinsi == "0"){
				$sekolah = $this->crudmodel->cari_sekolah("and s.nama_sekolah like'%$nama_sekolah%'");
				$prov = $this->lihat->lihat_provinsi();
				$this->load->view('template\header');
				$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
				$this->load->view('template\footer');
			}
			else if($kabupaten=="0" and empty($nama_sekolah)){
				$sekolah = $this->crudmodel->cari_sekolah("and s.nama_provinsi = '$provinsi'");
				$prov = $this->lihat->lihat_provinsi();
				$this->load->view('template\header');
				$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
				$this->load->view('template\footer');
			}
			else if($kabupaten=="0" and isset($nama_sekolah)){
				$sekolah = $this->crudmodel->cari_sekolah("and s.nama_provinsi = '$provinsi' and  s.nama_sekolah like '%$nama_sekolah%'");
				$prov = $this->lihat->lihat_provinsi();
				$this->load->view('template\header');
				$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
				$this->load->view('template\footer');
			}
			else if($kecamatan =="0" and empty($nama_sekolah)){
				$sekolah = $this->crudmodel->cari_sekolah(" and s.nama_provinsi = '$provinsi' and s.nama_kabupaten = '$kabupaten'");
				$prov = $this->lihat->lihat_provinsi();
				$this->load->view('template\header');
				$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
				$this->load->view('template\footer');
			}
			else if($kecamatan =="0" and isset($nama_sekolah)){
				$sekolah = $this->crudmodel->cari_sekolah("and s.nama_provinsi = '$provinsi' and s.nama_kabupaten = '$kabupaten' and  s.nama_sekolah like '%$nama_sekolah%'");
				$prov = $this->lihat->lihat_provinsi();
				$this->load->view('template\header');
				$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
				$this->load->view('template\footer');
			}
			else if(empty($nama_sekolah)){
				$sekolah = $this->crudmodel->cari_sekolah("and s.nama_provinsi = '$provinsi' and s.nama_kabupaten = '$kabupaten' and s.nama_kecamatan='$kecamatan'");
				$prov = $this->lihat->lihat_provinsi();
				$this->load->view('template\header');
				$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
				$this->load->view('template\footer');
			}
			else{
				$sekolah = $this->crudmodel->cari_sekolah("and s.nama_provinsi = '$provinsi' and s.nama_kabupaten = '$kabupaten' and s.nama_kecamatan='$kecamatan' and  s.nama_sekolah like '%$nama_sekolah%'");
				$prov = $this->lihat->lihat_provinsi();
				$this->load->view('template\header');
				$this->load->view('sekolah',array('provinsi'=>$prov,'sekolah'=>$sekolah));
				$this->load->view('template\footer');
			}
		}

	public function edit_sekolah($npsn){
		$data_select = $this->crudmodel->Get('sekolah',"where npsn='$npsn'");
		$data_sekolah = $this->crudmodel->cari_sekolah("and s.npsn='$npsn'");
		$provinsi = $this->lihat->lihat_provinsi();
		$this->load->view('edit_sekolah',array('data'=>$data_sekolah,'provinsi'=>$provinsi, 'select' =>$data_select));
	}
	public function edit_peserta($nis){
		$data_sekolah = $this->lihat->lihat_sekolah();
		$data_pembimbing = $this->lihat->lihat_pembimbing();
		$data_jurusan = $this->lihat->lihat_jurusan();
		$data_ruangan = $this->lihat->lihat_ruangan();
		$data = $this->crudmodel->cari_peserta("and s.nis='$nis'");

		$this->load->view('edit_peserta',array('data_sekolah'=>$data_sekolah,'data_pembimbing'=>$data_pembimbing,'data_jurusan'=>$data_jurusan,'data_ruangan'=>$data_ruangan, 'data'=> $data));
		}
	public function edit_pembimbing($nip){
		$data = $this->crudmodel->Get("pembimbing","where nip='$nip'");
		$this->load->view('edit_pembimbing',array('data' => $data));
		}
	public function edit_pengawas($nip){
		$data = $this->crudmodel->cari_pengawas("and s.nip='$nip'");
		$data_sekolah = $this->lihat->lihat_sekolah();
		$this->load->view('edit_pengawas',array('data_sekolah'=>$data_sekolah,'data'=>$data));
	}

	public function lihat_peserta($nis){
			$data = $this->crudmodel->cari_peserta("and s.nis='$nis'");
			$data_file= $this->crudmodel->file(" and j.nis = '$nis'");
			$this->load->view('template/dheader');
			$this->load->view('lihat_peserta',array('data'=>$data,'file'=>$data_file));
			$this->load->view('template/footer');
		}

	public function kegiatan(){
			$jumlah= $this->crudmodel->jumlah_baris("file");
			$config['base_url'] = base_url().'admin/kegiatan/';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 4;
			$sampai = $config['per_page'];
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";

			$config['num_tag_open'] = '<li class="page-item"><a class="page-link"';
			$config['num_tag_close'] = '</a></li>';

			$config['cur_tag_open'] = '<a class="page-link">';
			$config['cur_tag_close'] = '</a>';

			$config['next_tag_open'] = '<li class="page-item"><a class="page-link"';
			$config['next_tagl_close'] = "</a></li>";

			$config['prev_tag_open'] = '<li class="page-item"><a class="page-link"';
			$config['prev_tagl_close'] = "</a></li>";

			$config['first_tag_open'] = '<li class="page-item"><a class="page-link"';
			$config['first_tagl_close'] = "</a></li>";

			$config['last_tag_open'] = '<li class="page-item"><a class="page-link"';
			$config['last_tagl_close'] = "</a></li>";

			$config['first_link'] = '« First';
			$config['last_link'] = 'Last »';
			$config['next_link'] = "Next »";
			$config['prev_link'] = "« Previous";
			$this->pagination->initialize($config);
			$dari = $this->uri->segment('3');
			if(empty($dari)){
			$file = $this->crudmodel->file(" LIMIT $sampai");
			}
			else{
			$file = $this->crudmodel->file(" LIMIT $dari, $sampai");
			}

			$this->load->view('template\header');
			$this->load->view('kegiatan',array('data_file'=>$file));
			$this->load->view('template\footer');
		}

	public function cari_kegiatan(){
			$npsn = $_GET['cari'];
			$siswa = $this->crudmodel->cari_peserta("and s.sekolah = '$npsn'");
			$data = count($siswa);
				if($data>0){
					echo "<option value='' style='display:none' selected>Pilih Siswa</option>";
					foreach($siswa as $row){
						echo "<option value=".$row['nis'].">".$row['nama']."</option>";
					}
				}
				else{
					echo "<option value=''style='display:none' selected>Pilih Siswa</option>";
				}
			}

		public function print_siswa(){
			$data_siswa = $this->crudmodel->cari_peserta("");
			$data = array(
			'data'=> $data_siswa,
			'judul'=> "Data Seluruh Peserta PKL"
			);
			$this->load->view('kop',$data);
		}
		public function print_siswad($nis){
			$data_siswa = $this->crudmodel->cari_peserta("and s.nis = '$nis'");
			$data_file= $this->crudmodel->file(" and j.nis = '$nis'");
			$data = array('data'=> $data_siswa,'file'=>$data_file);
			$this->load->view('kop_siswad',$data);
		}
		public function print_sekolah(){
			$data_sekolah = $this->crudmodel->cari_sekolah("");
			$data = array(
			'data'=> $data_sekolah,
			'judul'=> "Data Seluruh Sekolah"
			);
			$this->load->view('kop_sekolah',$data);
		}
		public function print_sekolahd($npsn){
			$sekolah = $this->crudmodel->cari_sekolah("and s.npsn = '$npsn'");
			$siswa = $this->crudmodel->cari_peserta("and s.sekolah = '$npsn'");
			$pengawas = $this->crudmodel->cari_pengawas("and k.npsn = '$npsn'");
			$this->load->view('kop_sekolahd',array('data'=>$siswa,'pengawas'=>$pengawas, 'sekolah'=>$sekolah));
		}

		public function tambah_berkas(){
			$data_sekolah = $this->crudmodel->cari_sekolah("");
			$data = array('data_sekolah' => $data_sekolah );
			$this->load->view('tambah_berkas',$data);
		}

		public function tambah_berkas1($nis){
			$data = $this->crudmodel->cari_peserta("and s.nis='$nis'");
			$this->load->view('tambah_berkas1',array('data'=>$data));;
		}

		public function asal_sekolah1(){
			$sekolah=$_GET['cari'];
			$pengawas = $this->lihat->lihat_pengawas($sekolah);
			$data = count($pengawas);
				if($data>0){
					foreach($pengawas as $row){
						echo "<option value=".$row['nip'].">".$row['nama_pengawas']."</option>";
					}
				}
				else{
					echo "<option value=''>Pilih Pengawas</option>";
				}
		}
		public function luar(){
			$sekolah = $this->lihat->lihat_sekolah_luar();
			$provinsi = $this->lihat->lihat_provinsi();
			$this->load->view('sekolah_luar',array('provinsi'=>$provinsi,'sekolah'=>$sekolah));
		}

		public function toExcelSiswa(){
			$query['data1'] = $this->crudmodel->cari_peserta("");
			$query['no']=0;
			$this->load->view('excel_siswa',$query);
		}


		public function toExcelSekolah(){
			$query['data1'] = $this->crudmodel->cari_sekolah("");
			$query['no']=0;
			$this->load->view('excel_sekolah',$query);
		}

		public function toExcelPembimbing(){
			$query['data1'] = $this->crudmodel->get("pembimbing","");
			$query['no']=0;
			$this->load->view('excel_pembimbing',$query);
		}

		public function toExcelPengawas(){
			$query['data1'] = $this->crudmodel->cari_pengawas("");
			$query['no']=0;
			$this->load->view('excel_pengawas',$query);
		}


		public function toExcelRuangan(){
			$query['data1'] = $this->crudmodel->get("ruangan","");
			$query['no']=0;
			$this->load->view('excel_ruangan',$query);
		}

		public function toExcelJurusan(){
			$query['data1'] = $this->crudmodel->get("jurusan","");
			$query['no']=0;
			$this->load->view('excel_jurusan',$query);
		}
}
