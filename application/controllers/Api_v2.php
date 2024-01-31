<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_v2 extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_process_data');
		$this->load->model('m_auth');
		$this->load->library('encryption');
		// if ($this->session->userdata("is_login") == false) {
		// 	redirect(base_url("dashboard"));
		// }
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
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$plain_text = 'it@kps0K123rancaKeKDwip4pu21mjlk';
		$token = $this->input->post("token");
		if ($token == $plain_text) {
			$inputPengajuan = $this->input->post("inputPengajuan");
			$inputJenisPengajuan = $this->input->post("inputJenisPengajuan");
			$inputPria = $this->input->post("inputPria");
			$inputWanita= $this->input->post("inputWanita");
			for ($i=0; $i < count($inputPengajuan); $i++) { 
				$id = $this->uuid->v4();
				$tanggal = $this->uuid->getDateNow();
				$parsingData = array('id' =>$id,'no_pengajuan'=>$inputPengajuan[$i],'jenis_pengajuan'=>$inputJenisPengajuan,'pria'=>$inputPria[$i],'wanita'=>$inputWanita[$i],'created_at'=>$tanggal,'status'=>'OPEN');
					$data = $this->m_process_data->addData("pengajuan",$parsingData);
					if ($data == true) {
						$message = 'Berhasil Menyimpan Data';
						$sub_message = 'Data Berhasil di Import ke website recruitment lihat di administrator.kps.co.id';
						$status = 'success';
					}

			}	
		}else{
			$data = true;
			$message = 'Anda tidak memiliki akses ke data ini';
			$sub_message = 'minta akses ke tim IT KPS';
			$status = 'warning';
		}
		
		$response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message,'status'=>$status);
		echo json_encode($response);
	}
	public function test()
	{
		$data['side'] = 'data_master-pengajuan';
		$data['menu'] = 'Data Master';
		$data['sub_menu1'] = 'Pengajuan';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		// $data['tes'] = $this->m_auth->tes()->result();
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Pengajuan Tenaga Kerja';
		$this->load->view("dashboard/test", $data);
	}
}
?>