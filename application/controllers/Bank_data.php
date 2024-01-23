<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_Data extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}
		$this->load->library('encrypt');
		$this->load->model("m_monitoring");
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
		$data['side'] = 'bank_data';
		$data['menu'] = '';
		$data['sub_menu1'] = '';
		$data['mobile'] = '';
		$data['sub_menu2'] = '';
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Bank Data Pelamar';
		$this->load->view("bank_data/index", $data);
	}
	public function getPaging($value='')
	{
		$filTahun = $this->input->get("filTahun");
		$filBulan = $this->input->get("filBulan") == 'ALL' ? '' : $this->input->get("filBulan");
		$filJenis = $this->input->get("filJenis") == 'ALL' ? '' : $this->input->get("filJenis");
		$filSub = $this->input->get("filSub") == 'ALL' ? '' : $this->input->get("filSub");
		$filType = $this->input->get("filType") == 'ALL' ? '' : $this->input->get("filType");
		$filStatus = $this->input->get("filStatus") == 'ALL' ? '' : $this->input->get("filStatus");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$data['data'] = $this->m_monitoring->getBankPelamar($filTahun, $filBulan, $filJenis, $filSub,$filType,$filSearch,$filStatus,'')->num_rows();
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$this->load->view("_partial/paging",$data);
	}
	public function getData()
	{
		$filTahun = $this->input->get("filTahun");
		$filBulan = $this->input->get("filBulan") == 'ALL' ? '' : $this->input->get("filBulan");
		$filJenis = $this->input->get("filJenis") == 'ALL' ? '' : $this->input->get("filJenis");
		$filSub = $this->input->get("filSub") == 'ALL' ? '' : $this->input->get("filSub");
		$filType = $this->input->get("filType") == 'ALL' ? '' : $this->input->get("filType");
		$filStatus = $this->input->get("filStatus") == 'ALL' ? '' : $this->input->get("filStatus");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$where = " LIMIT $limit OFFSET $offset";
		$data['offset'] = $offset+1;
		$data['data'] = $this->m_monitoring->getBankPelamar($filTahun, $filBulan, $filJenis, $filSub,$filType,$filSearch,$filStatus, $where)->result();
		$this->load->view("bank_data/tabel", $data);
	}
}
