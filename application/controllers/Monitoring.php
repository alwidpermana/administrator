<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}
		$this->load->model("m_monitoring");
		// if ($this->session->userdata("is_login")) {
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
	public function recruitment()
	{
		$data['side'] = 'monitoring-recruitment';
		$data['menu'] = 'Monitoring';
		$data['sub_menu1'] = 'Recruitment';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Monitoring Recruitment';
		$this->load->view("monitoring/recruitment/index", $data);	
	}
	public function getTabelRecruitment()
	{
		$filTahun = $this->input->get("filTahun");
		$filStatus = $this->input->get("filStatus");
		$filSearch = $this->input->get("filSearch");
		$limit= $this->input->get("limit");
		$offset =$this->input->get("offset")*10;
		$where = " LIMIT 10 OFFSET $offset";
		$data['startNo'] = $this->input->get("offset")+1;
		$data['data'] = $this->m_monitoring->getDataMonitoringRecruitment($filTahun, $filStatus,$filSearch,$where)->result();
		$this->load->view("monitoring/recruitment/tabel", $data);
	}
	public function getPagingRecruitment($value='')
	{
		$filTahun = $this->input->get("filTahun");
		$filStatus = $this->input->get("filStatus");
		$filSearch = $this->input->get("filSearch");
		$limit= $this->input->get("limit");
		$offset =$this->input->get("offset");
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['data'] = $this->m_monitoring->getDataMonitoringRecruitment($filTahun, $filStatus,$filSearch, '')->num_rows();
		$this->load->view("_partial/paging",$data);
	}
	public function lamaran_masuk()
	{
		$data['side'] = 'monitoring-lamaran_masuk';
		$data['menu'] = 'Monitoring';
		$data['sub_menu1'] = 'Lamaran Masuk';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Monitoring Lamaran masuk';
		$this->load->view("monitoring/lamaran_masuk/index", $data);
	}
	public function getPagingLamaranMasuk()
	{
		$filTahun=$this->input->get("filTahun");
		$filBulan=$this->input->get("filBulan");
		$filNoRecruitment=$this->input->get("filNoRecruitment");
		$filJenis=$this->input->get("filJenis") == 'ALL' ? '':$this->input->get("filJenis");
		$filSub=$this->input->get("filSub") == 'ALL' ? '' : $this->input->get("filSub");
		$filType=$this->input->get("filType") == 'ALL' ? '' : $this->input->get("filType");
		$limit=$this->input->get("limit");
		$offset=$this->input->get("offset");
		$filSearch=$this->input->get("filSearch");
		$data['data'] = $this->m_monitoring->getDataLamaranMasuk($filJenis, $filSub, $filType, $filNoRecruitment,$filSearch, '')->num_rows();
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$this->load->view("_partial/paging",$data);
	}
	public function getTabelLamaranMasuk($value='')
	{
		$filTahun=$this->input->get("filTahun");
		$filBulan=$this->input->get("filBulan");
		$filNoRecruitment=$this->input->get("filNoRecruitment");
		$filJenis=$this->input->get("filJenis") == 'ALL' ? '':$this->input->get("filJenis");
		$filSub=$this->input->get("filSub") == 'ALL' ? '' : $this->input->get("filSub");
		$filType=$this->input->get("filType") == 'ALL' ? '' : $this->input->get("filType");
		$limit=$this->input->get("limit");
		$offset=$this->input->get("offset");
		$filSearch=$this->input->get("filSearch");
		$offset =$this->input->get("offset")*10;
		$where = " LIMIT $limit OFFSET $offset";
		$data['offset']=$offset+1;
		$data['data'] = $this->m_monitoring->getDataLamaranMasuk($filJenis, $filSub, $filType, $filNoRecruitment,$filSearch, '')->result();
		$this->load->view("monitoring/lamaran_masuk/data", $data);
	}
	public function getNoRecruitmentByBulanTahun()
	{
		$filBulan= $this->input->get("filBulan");
		$filTahun = $this->input->get("filTahun");
		$data = $this->m_monitoring->getNoRecruitment($filBulan, $filTahun);
		if ($data->num_rows()==0) {
			$html="<option value='-'>Data Tidak Tersedia</option>";
		}else{
			$html="<option value='-'>Pilih No Recruitment</option>";
			foreach ($data->result() as $key) {
				$html.='<option value="'.$key->id.'">'.$key->no_recruitment.'</option>';
			}
		}

		echo json_encode($html);
	}
	public function getTotal()
	{
		$id = $this->input->get("filNoRecruitment");
		$bulan = $this->input->get("filBulan") == 'ALL' ? '':'';
		$tahun = $this->input->get("filTahun");
		$data = $this->m_monitoring->getTotalMonitoringRecruitment($id, $bulan, $tahun);
		$html = "";
		if ($data->num_rows()>0) {
			foreach ($data->result() as $key) {
				$html.='<tr>
							<td>'.$key->kategori.'</td>
							<td>'.$key->pria.'</td>
							<td>'.$key->wanita.'</td>
							<td>'.$key->total.'</td>
						</tr>';
			}
		}
		
		echo json_encode($html);
	}
	public function view_lamaran($id)
	{
		$data['side'] = 'monitoring-lamaran_masuk';
		$data['menu'] = 'Monitoring';
		$data['sub_menu1'] = 'Lamaran Masuk';
		$data['sub_menu2'] = 'View';
		$data['mobile'] = true;
		$data['link1'] = 'javascript:;';
		$data['link2'] = base_url().'monitoring/lamaran_masuk';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'View Lamaran masuk';
		$getData = $this->m_monitoring->getDataLamaranById($id);
		if ($getData->num_rows()==0) {
			redirect('monitoring/lamaran_masuk');
		}else{
			$lamaran = $getData->row();
			$data['setting1'] = $this->m_monitoring->get_standar_tes($id, 1)->result();
			$data['setting2'] = $this->m_monitoring->get_standar_tes($id, 2)->result();
			$data['tahap1'] = $this->m_monitoring->penilaian_tes_tahap_1($id)->row();
			$data['tahap2'] = $this->m_monitoring->penilaian_tes_tahap_2($id)->row();
			$data['data'] = $lamaran;
			$this->load->view("monitoring/lamaran_masuk/view", $data);	
		}
		
	}
	public function jadwal_peserta_tes()
	{
		$data['side'] = 'monitoring-jadwal_peserta_tes';
		$data['menu'] = 'Monitoring';
		$data['sub_menu1'] = 'Jadwal Peserta Tes';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Monitoring Jadwal Peserta Tes';
		$this->load->view("monitoring/jadwal_peserta_tes/index", $data);	
	}
	public function getPagingJadwalPesertaTes()
	{
		$filTahun = $this->input->get("filTahun");
		$filStatus = $this->input->get("filStatus");
		$filSearch = $this->input->get("filSearch");
		$limit=$this->input->get("limit");
		$offset=$this->input->get("offset");
		$filSearch=$this->input->get("filSearch");
		$data['data'] = $this->m_monitoring->getJadwalPesertaTes($filTahun, $filStatus, $filSearch, '')->num_rows();
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$this->load->view("_partial/paging",$data);
	}
	public function getDataJadwalPesertaTes()
	{
		$filTahun = $this->input->get("filTahun");
		$filStatus = $this->input->get("filStatus");
		$filSearch = $this->input->get("filSearch");
		$limit=$this->input->get("limit");
		$offset=$this->input->get("offset");
		$filSearch=$this->input->get("filSearch");
		$where = " LIMIT $limit OFFSET $offset";
		$data['offset']=$offset+1;
		$data['data'] = $this->m_monitoring->getJadwalPesertaTes($filTahun, $filStatus, $filSearch, $where)->result();
		$this->load->view("monitoring/jadwal_peserta_tes/data", $data);
	}
	public function schedule()
	{
		$data['side'] = 'monitoring-schedule';
		$data['menu'] = 'Monitoring';
		$data['sub_menu1'] = 'Schedule';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Monitoring Schedule';
		$this->load->view("monitoring/schedule/index", $data);	
	}
	public function getNoRecruitmentForFilter()
	{
		$filTahun = $this->input->get("filTahun");
		$filBulan = $this->input->get("filBulan");
		$data = $this->m_monitoring->getNoRecruitmentForFilter($filTahun, $filBulan);
		$html='<option value="All">ALL</option>';
		if ($data->num_rows()>0) {
			foreach ($data->result() as $key) {
				$html.='<option value="'.$key->id.'">'.$key->no_recruitment.' - '.$key->jenis.'</option>';
			}
		}
		echo json_encode($html);
	}
	public function getPagingSchedule($value='')
	{
		$filTahun = $this->input->get("filTahun");
		$filBulan = $this->input->get("filBulan") == 'All' ? '' : $this->input->get("filBulan");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$filNoRecruitment = $this->input->get("filNoRecruitment") =='All' ? '' : $this->input->get("filNoRecruitment");
		$filSub = $this->input->get("filSub") =='All' ? '' : $this->input->get("filSub");
		$filType = $this->input->get("filType") =='All' ? '' : $this->input->get("filType");
		$filStatus = $this->input->get("filStatus")=='All' ? '' : $this->input->get("filStatus");
		$data['data'] = $this->m_monitoring->getDataSchedule($filTahun, $filBulan, $filSearch, $filNoRecruitment, $filSub, $filType, '',$filStatus)->num_rows();
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$this->load->view("_partial/paging",$data);
	}
	public function getDataSchedule()
	{
		$filTahun = $this->input->get("filTahun");
		$filBulan = $this->input->get("filBulan") == 'All' ? '' : $this->input->get("filBulan");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$filNoRecruitment = $this->input->get("filNoRecruitment") =='All' ? '' : $this->input->get("filNoRecruitment");
		$filSub = $this->input->get("filSub") =='All' ? '' : $this->input->get("filSub");
		$filType = $this->input->get("filType") =='All' ? '' : $this->input->get("filType");
		$filStatus = $this->input->get("filStatus")=='All' ? '' : $this->input->get("filStatus");
		$where = " LIMIT $limit OFFSET $offset";
		$data['offset']=$offset+1;
		$data['data'] = $this->m_monitoring->getDataSchedule($filTahun, $filBulan, $filSearch, $filNoRecruitment, $filSub, $filType,$where, $filStatus)->result();
		$this->load->view("monitoring/schedule/tabel", $data);
	}
	public function detail()
	{
		$data['side'] = 'monitoring-detail';
		$data['menu'] = 'Monitoring';
		$data['sub_menu1'] = 'Detail';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Monitoring Detail Schedule Peserta Tes';
		$this->load->view("monitoring/detail/index", $data);	
	}
	public function getDataDetailSchedule()
	{
		$filTahun = $this->input->get("filTahun");
		$filBulan = $this->input->get("filBulan") == 'All' ? '' : $this->input->get("filBulan");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$filNoRecruitment = $this->input->get("filNoRecruitment") =='All' ? '' : $this->input->get("filNoRecruitment");
		$filSub = $this->input->get("filSub") =='All' ? '' : $this->input->get("filSub");
		$filType = $this->input->get("filType") =='All' ? '' : $this->input->get("filType");
		$filStatus = $this->input->get("filStatus")=='All' ? '' : $this->input->get("filStatus");
		$where = " LIMIT $limit OFFSET $offset";
		$data['offset']=$offset+1;
		$data['data'] = $this->m_monitoring->getDataDetailSchedule($filTahun, $filBulan, $filSearch, $filNoRecruitment, $filSub, $filType,$where, $filStatus)->result();
		$this->load->view("monitoring/detail/tabel", $data);
	}
	public function getPagingDetailSchedule($value='')
	{
		$filTahun = $this->input->get("filTahun");
		$filBulan = $this->input->get("filBulan") == 'All' ? '' : $this->input->get("filBulan");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$filNoRecruitment = $this->input->get("filNoRecruitment") =='All' ? '' : $this->input->get("filNoRecruitment");
		$filSub = $this->input->get("filSub") =='All' ? '' : $this->input->get("filSub");
		$filType = $this->input->get("filType") =='All' ? '' : $this->input->get("filType");
		$filStatus = $this->input->get("filStatus")=='All' ? '' : $this->input->get("filStatus");
		$data['data'] = $this->m_monitoring->getDataDetailSchedule($filTahun, $filBulan, $filSearch, $filNoRecruitment, $filSub, $filType, '',$filStatus)->num_rows();
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$this->load->view("_partial/paging",$data);
	}
	public function view_setup($id)
	{
		$recruitment = $this->m_monitoring->getDataRecruitmentById($id);
		if ($recruitment->num_rows()>0) {
			$this->load->model("m_data_master");
			$data['side'] = 'monitoring-recruitment';
			$data['menu'] = 'Monitoring';
			$data['sub_menu1'] = 'Recruitment';
			$data['sub_menu2'] = 'View';
			$data['mobile'] = false;
			$data['link1'] = 'javascript:;';
			$data['link2'] = base_url().'monitoring/recruitment';
			$data['link3'] = 'javascript:;';
			$data['page'] = 'View Recruitment';
			$data['recruitment'] =$recruitment->row();
			$data['stok'] = $this->m_monitoring->getStockPelamar($id)->row();
			$data['setup']=$this->m_monitoring->getSetupById($id)->row();
			$data['referensi'] = $this->m_monitoring->hitungStatusLamaran($id, 'Referensi')->row();
			$data['eksternal'] = $this->m_monitoring->hitungStatusLamaran($id, 'Eksternal')->row();
			$data['umum'] = $this->m_monitoring->hitungStatusLamaran($id, 'Umum')->row();
			$data['requirement'] = $this->m_data_master->getRequirement($id)->result();
			$this->load->view("monitoring/recruitment/view", $data);
		}else{
			redirect(base_url("monitoring/recruitment"));
		}
		 
	}
	public function changeStatusLamaran()
	{
		$this->load->model("m_process_data");
		$id = $this->input->post("id");
		$status = $this->input->post("status");
		date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
		$data = $this->m_process_data->updateData('lamaran',array('status'=>'Tidak Aktif','status_data'=>'CLOSE','updated_at'=>$tanggal,'hasil_tes'=>$status), array('id' => $id));
		echo json_encode($data);
	}
}
