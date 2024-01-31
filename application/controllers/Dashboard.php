<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}
		// $this->load->library('encrypt');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['side'] = 'dashboard';
		$data['menu'] = '';
		$data['sub_menu1'] = '';
		$data['mobile'] = '';
		$data['sub_menu2'] = '';
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Dashboard';
		if ($this->session->userdata("jenis") == 'Admin') {
			$this->load->view('dashboard/admin/index', $data);
		}elseif ($this->session->userdata("jenis") == 'Umum') {
			$this->load->model("m_profile");
			$cekData = $this->m_profile->cekDataPelamarByUserId()->num_rows();
			if ($cekData==0) {
				redirect(base_url("profile"));
			}else{
				$this->load->view('dashboard/umum/index', $data);	
			}
			
		}elseif ($this->session->userdata("jenis") == 'Eksternal') {
			$this->load->view('dashboard/admin/index', $data);
		}
	}
	public function test()
	{
		$msg = $this->session->userdata("user_id").'||'.date('Y-m-d'); //Plain text 
	    // $key =  //Key 32 character 
	       //default menggunakan MCRYPT_RIJNDAEL_256 
	       // $hasil_enkripsi = $this->encrypt->encode($msg);  
	       // $hasil_dekripsi = $this->encrypt->decode($hasil_enkripsi); 
	       echo "Pesan yang mau dienkripsi: ".$msg."<br/><br/>"; 
	       echo "Hasil enkripsi: ".$hasil_enkripsi."<br/><br/>"; 
	       echo "Hasil dekripsi: ".$hasil_dekripsi."<br/><br/>"; 
	       echo "Hasil token: ".$this->session->userdata("token")."<br/><br/>"; 
	}
}
