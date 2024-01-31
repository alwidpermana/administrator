<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_master extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}elseif ($this->session->userdata("jenis") != 'Admin') {
			redirect(base_url('dashboard'));
		}
		$this->load->model("m_data_master");
		$this->load->model("m_process_data");
		$this->load->model("m_pelamar");
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
	public function pengajuan()
	{
		$jenis = $this->input->get("jenis") == '' ? 'Operator' : $this->input->get("jenis");
		$status = $this->input->get("status") == '' ? 'OPEN': $this->input->get("status");
		$data['side'] = 'data_master-pengajuan';
		$data['menu'] = 'Data Master';
		$data['sub_menu1'] = 'Pengajuan';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Pengajuan Tenaga Kerja';
		$data['data'] = $this->m_data_master->getDataPengajuan($jenis, $status)->result();
		$this->load->view("data_master/pengajuan/index",$data);
	}
	public function prasetup()
	{
		$inputPengajuan = $this->input->post("inputPengajuan");
		$filJenis = $this->input->post("filJenis");
		$jmlData = count($inputPengajuan);
		if ($jmlData==0) {
			$status = 'warning';
			$data = true;
			$message = 'Pilih Terlebih Dahulu Data Pengajuannya!';
			$sub_message='';
			$id ='';
		}else{
			$id = $this->uuid->v4();
			for ($i=0; $i <$jmlData ; $i++) { 
				$parsingData = array('no_pengajuan' =>$inputPengajuan[$i] ,'recruitment_id'=>$id );
				$data = $this->m_process_data->addData('temp_pengajuan',$parsingData);
			}

			if ($data == true) {
				$status = 'success';
				$message = 'Berhasil Menambah Data Temporary Pengajuan';
				$sub_message =  "Anda Akan Dialihkan ke Halaman Setup Recruitment";
			}else{
				$status = 'gagal';
				$message = 'Gagal Menambah Data Temporary Pengajuan';
				$sub_message =  "";
			}	
		}
		

		$response = array('data'=>$data, 'message' =>$message, 'status'=>$status,'sub_message'=>$sub_message,'id'=>$id);
		echo json_encode($response);
	}
	public function setup($id)
	{
		$data['side'] = 'data_master-pengajuan';
		$data['menu'] = 'Data Master';
		$data['sub_menu1'] = 'Pengajuan';
		$data['sub_menu2'] = 'Setup';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = base_url().'data_master/pengajuan';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Setup Pengajuan Tenaga Kerja';
		$data['inputId'] = $id;
		$data['filJenis'] = $this->input->get("jenis");
		
		$cek = $this->db->query("SELECT id,deskripsi, departemen,no_recruitment, jabatan, shift, tempat,last_apply_date from recruitment where id = '$id'");
		$getPengajuan = $cek->num_rows() == 0 ? $this->m_data_master->getSumPengajuanSetup($id)->result():$this->m_data_master->getSumPengajuanSetup_edit($id)->result();
		$wanitaP = 0;
		$priaP = 0;
		$jumlahP = 0;
		foreach ($getPengajuan as $key) {
			$wanitaP = $key->wanita;
			$priaP = $key->pria;
			$jumlahP = $key->wanita+$key->pria;
		}
		if ($cek->num_rows()==0) {
			
			$departemen = '';
			$jabatan = '';
			$plan = '';
			$shift = '';
			$deskripsi = '';
			$no = '';
			$referensiPria = 0;
			$referensiWanita = 0;
			$eksternalPria = 0;
			$eksternalWanita = 0;
			$umumPria = 0;
			$umumWanita = 0;
			$lastApply = date("m/d/Y");
		}else{
			$getJml = $this->m_data_master->getDataSetupById($id)->row();
			$referensiPria = $getJml->referensi_pria;
			$referensiWanita = $getJml->referensi_wanita;
			$eksternalPria = $getJml->eksternal_pria;
			$eksternalWanita = $getJml->eksternal_wanita;
			$umumPria = $getJml->umum_pria;
			$umumWanita = $getJml->umum_wanita;
			$get = $cek->row();
			$departemen = $get->departemen;
			$jabatan = $get->jabatan;
			$plan = $get->tempat;
			$shift=$get->shift;
			$deskripsi = $get->deskripsi;
			$no = $get->no_recruitment;
			$lastApply = $get->last_apply_date == null || $get->last_apply_date == '' ? date("m/d/Y"):date("m/d/Y", strtotime($get->last_apply_date));
		}
		$data['referensiPria'] = $referensiPria;
		$data['referensiWanita'] = $referensiWanita;
		$data['eksternalPria'] = $eksternalPria;
		$data['eksternalWanita'] = $eksternalWanita;
		$data['umumPria'] = $umumPria;
		$data['umumWanita'] = $umumWanita;
		$data['cek'] = $cek->num_rows();
		$data['no_recruitment'] = $cek->num_rows() == 0 ? $this->m_data_master->getNoRecruitment():$no;
		$data['departemen'] = $this->m_data_master->getDepartemen()->result();
		$data['jabatan'] = $this->m_data_master->getJabatan()->result();
		$data['plant'] = $this->m_data_master->getPlant()->result();
		$data['wanitaP'] = $wanitaP;
		$data['priaP'] = $priaP;
		$data['jumlahP'] = $jumlahP;
		$data['recDepartemen'] = $departemen;
		$data['recJabatan'] = $jabatan;
		$data['recPlant'] = $plan;
		$data['recShift'] = $shift;
		$data['recDeskripsi'] = $deskripsi;
		$data['recApply'] = $lastApply;
		$this->load->view("data_master/setup/index", $data);
	}
	public function getRequirement()
	{
		$inputId = $this->input->get("inputId");
		$data = $this->m_data_master->getRequirement($inputId);
		if ($data->num_rows()==0) {
			$html="<table class='table text-center w-100'>
					<tbody>
						<tr>
							<td>Tidak Tersedia Data Requirement</td>
						</tr>
					</tbody>
				   </table";
		}else{
			$no = 1;
			$html="<table class='table w-100'><tbody>";
				foreach ($data->result() as $key) {
					$html.='<tr><td>'.$no++.'</td><td>'.$key->requirement.'</td><td class="text-center"><button class="btn btn-icon btn-icon-only btn-primary mb-1 hapusRequirement" data="'.$key->id.'" type="button"><i class="bi bi-trash"></i></button></td></tr>';
				}
			$html.="</tbody></table";
		}
		echo json_encode($html);
	}
	public function hapusRequirement($value='')
	{
		$id = $this->input->post("id");
		$data = $this->m_process_data->deleteData('requirement',$id,'id');
		echo json_encode($data);
	}
	public function saveRequirement()
	{
		$inputId =$this->input->post("inputId");
		$inputRequirement = $this->input->post("inputRequirement");
		date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
		if ($inputRequirement == '') {
			$data = true;
			$message = 'Lengkapi Datanya Terlebih Dahulu';
			$sub_message='Requirement Masih Kosong';
			$status= 'warning';
		}else{
			$parsingData = array('id'=>$this->uuid->v4(),'recruitment_id' =>$inputId,'requirement'=>$inputRequirement,'created_at'=>$tanggal);
			$data = $this->m_process_data->addData("requirement",$parsingData);
			if ($data == true) {
				$message = 'Berhasil Menyimpan Data';
				$sub_message = '';
				$status = 'success';
			}
		}
		$response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message,'status'=>$status );
		echo json_encode($response);

	}
	public function saveSetup()
	{
		$inputReferensiPria = $this->input->post("inputReferensiPria");
		$inputReferensiWanita = $this->input->post("inputReferensiWanita");
		$inputEksternalPria = $this->input->post("inputEksternalPria");
		$inputEksternalWanita = $this->input->post("inputEksternalWanita");
		$inputUmumPria = $this->input->post("inputUmumPria");
		$inputUmumWanita = $this->input->post("inputUmumWanita");
		$inputShift = $this->input->post("inputShift");
		$inputId = $this->input->post("inputId");
		$jumlahReferensi = $inputReferensiPria + $inputReferensiWanita;
		$jumlahEksternal = $inputEksternalPria + $inputEksternalWanita;
		$jumlahUmum = $inputUmumPria + $inputUmumWanita;
		$filJenis = $this->input->post("filJenis");
		$pria = $inputReferensiPria + $inputEksternalPria + $inputUmumPria;
		$wanita = $inputReferensiWanita + $inputEksternalWanita + $inputUmumWanita;
		$noRecruitment = $this->m_data_master->getNoRecruitment();
		$cekNoPengajuan = $this->m_data_master->cekNoPengajuan($inputId)->num_rows();
		date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
        $inputDepartemen = $this->input->post("inputDepartemen");
        $inputJabatan = $this->input->post("inputJabatan");
        $inputPlant = $this->input->post("inputPlant");
        $inputDeskripsi = $this->input->post("inputDeskripsi");
        $requirement = $this->m_data_master->getRequirement($inputId);
        $inputLastApply = $this->input->post("inputLastApply") == '' ? '' : date("Y-m-d", strtotime($this->input->post("inputLastApply")));
		if ($cekNoPengajuan>0) {
			$status = 'warning';
			$message = 'Salah satu no pengajuan sudah masuk ke data recruitment';
			$sub_message='Pilih Kembali No Pengajuan!';
			$data = true;
		}elseif($inputDepartemen == ''){
			$status = 'warning';
			$message = 'Pilih Departemen Terlebih Dahulu';
			$sub_message='';
			$data = true;
		}elseif($inputJabatan == ''){
			$status = 'warning';
			$message = 'Pilih Jabatan Terlebih Dahulu';
			$sub_message='';
			$data = true;
		}elseif($inputPlant == ''){
			$status = 'warning';
			$message = 'Pilih Plant Terlebih Dahulu';
			$sub_message='';
			$data = true;
		}elseif ($jumlahReferensi <=0 && $jumlahEksternal <= 0 && $jumlahUmum <= 0 ) {
			$status = 'warning';
			$message = 'Isi Setup Terlebih Dahulu';
			$sub_message='Pilih Kembali No Pengajuan!';
			$data = true;	
		}elseif($inputDeskripsi == '' ){
			$status = 'warning';
			$message = 'Isi Deskripsi Terlebih Dahulu';
			$sub_message='';
			$data = true;
		}elseif($inputLastApply == '' ){
			$status = 'warning';
			$message = 'Isi Tanggal Terakhir Melamar Terlebih Dahulu';
			$sub_message='';
			$data = true;
		}elseif($requirement->num_rows() == 0){
			$status = 'warning';
			$message = 'Tidak Tersedia Data Requirement';
			$sub_message='Tambah Data Requirement minimal 1';
			$data = true;
		}else{
			$cekData = $this->db->query("SELECT id FROM recruitment where id = '$inputId'");
			if ($cekData->num_rows() == 0) {
				$parsingData = array('id' =>$inputId,'no_recruitment'=>$noRecruitment,'jenis'=>$filJenis,'bulan'=>date("n"),'tahun'=>date("Y"),'created_at'=>$tanggal,'departemen'=>$inputDepartemen,'jabatan'=>$inputJabatan, 'tempat'=>$inputPlant,'shift'=>$inputShift,'deskripsi'=>$inputDeskripsi,'status'=>'OPEN','last_apply_date'=>$inputLastApply);
				$data = $this->m_process_data->addData("recruitment",$parsingData);
				if ($data == true) {
					$this->m_data_master->updatePengajuan($inputId);
					$this->m_process_data->addData("setup",array('id'=>$this->uuid->v4(),'recruitment_id'=>$inputId, 'alokasi'=>'Referensi','pria'=>$inputReferensiPria, 'wanita'=>$inputReferensiWanita, 'created_at'=>$tanggal));
					$this->m_process_data->addData("setup",array('id'=>$this->uuid->v4(),'recruitment_id'=>$inputId, 'alokasi'=>'Eksternal','pria'=>$inputEksternalPria, 'wanita'=>$inputEksternalWanita, 'created_at'=>$tanggal));
					$this->m_process_data->addData("setup",array('id'=>$this->uuid->v4(),'recruitment_id'=>$inputId, 'alokasi'=>'Umum','pria'=>$inputUmumPria, 'wanita'=>$inputUmumWanita, 'created_at'=>$tanggal));
					$this->db->query("update pengajuan INNER JOIN temp_pengajuan ON pengajuan.no_pengajuan = temp_pengajuan.no_pengajuan SET pengajuan.recruitment_id='$inputId'");
					$data = $this->m_process_data->deleteData('temp_pengajuan',$inputId,'recruitment_id');
					$status = 'success';
					$message = 'Berhasil Menyimpan Data Setup Recruitment';
					$sub_message = 'Anda akan dialihkan ke halaman monitoring recruitment';
				}
			}else{

				$data = $this->m_process_data->updateData('setup',array('pria'=>$inputReferensiPria,'wanita'=>$inputReferensiWanita,'updated_at'=>$tanggal), array('recruitment_id' => $inputId,'alokasi'=>'Referensi'));
				$data = $this->m_process_data->updateData('setup',array('pria'=>$inputEksternalPria,'wanita'=>$inputEksternalWanita,'updated_at'=>$tanggal), array('recruitment_id' => $inputId,'alokasi'=>'Eksternal'));
				$data = $this->m_process_data->updateData('setup',array('pria'=>$inputUmumPria,'wanita'=>$inputUmumWanita,'updated_at'=>$tanggal), array('recruitment_id' => $inputId,'alokasi'=>'Umum'));
				$parsingData = array('id' =>$inputId,'no_recruitment'=>$noRecruitment,'jenis'=>$filJenis,'bulan'=>date("n"),'tahun'=>date("Y"),'created_at'=>$tanggal,'departemen'=>$inputDepartemen,'jabatan'=>$inputJabatan, 'tempat'=>$inputPlant,'shift'=>$inputShift,'deskripsi'=>$inputDeskripsi,'last_apply_date'=>$inputLastApply);
				$data = $this->m_process_data->updateData('recruitment',$parsingData,array('id'=>$inputId));
				$status = 'success';
				$message = 'Berhasil Menyimpan Data Setup Recruitment';
				$sub_message = 'Anda akan dialihkan ke halaman monitoring recruitment';
			}
			
		}

		$response = array('data' =>$data ,'status'=>$status, 'message'=>$message,'sub_message'=>$sub_message);
		echo json_encode($response);
	}
	public function setting_bahan_tes()
	{
		$data['side'] = 'data_master-setting_bahan_tes';
		$data['menu'] = 'Data Master';
		$data['sub_menu1'] = 'Setting Bahan Tes';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Setting Bahan Tes';
		$this->load->view("data_master/setting_bahan_tes/index", $data);
	}
	public function isi_setting($jenis)
	{
		$data['side'] = 'data_master-setting_bahan_tes';
		$data['menu'] = 'Data Master';
		$data['sub_menu1'] = 'Setting Bahan Tes';
		$data['sub_menu2'] = 'Isi Setting';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = base_url('data_master/setting_bahan_tes');
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Setting Bahan Tes';
		$data['data'] = $this->m_data_master->default_standar_tes($jenis)->result();
		$this->load->view("data_master/setting_bahan_tes/isi", $data);
	}
	public function saveStandar()
	{
		$inputPilih = $this->input->post("inputPilih");
		$inputStandar = $this->input->post("inputStandar");
		$inputNilai = $this->input->post("inputNilai");
		$inputCT = $this->input->post("inputCT");
		$inputJenis = $this->input->post("inputJenis");
		$this->db->query("DELETE FROM standar_tes WHERE jenis = '$inputJenis'");
		for ($i=0; $i <count($inputPilih) ; $i++) { 
			$getData = $this->db->query("SELECT * FROM standar_tes_default WHERE id = $inputPilih[$i]")->row();
			$objek = $getData->objek;
			$tes = $getData->tes;
			$field = $getData->field;
			$tabel = $getData->tabel;
			$tahap = $getData->tahap;
			$parsingData = array('objek'=>$objek,'tes'=>$tes,'standar'=>$inputStandar[$i],'nilai'=>$inputNilai[$i],'field'=>$field,'jenis'=>$inputJenis,'tabel'=>$tabel,'tahap'=>$tahap,'default_id'=>$inputPilih[$i]);
			$data = $this->m_process_data->addData("standar_tes",$parsingData);
		}
		if ($data == true) {
			$status = 'success';
			$message = "Berhasil Menyimpan Standar Tes";
			$sub_message = '';
		}
		$response = array('data' =>$data ,'status'=>$status,'message'=>$message,'sub_message'=>$sub_message);
		echo json_encode($response);
	}
	public function user()
	{
		$data['side'] = 'data_master-user';
		$data['menu'] = 'Data Master';
		$data['sub_menu1'] = 'User';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Data Pengguna';
		$this->load->view("data_master/user/index", $data);
	}
	public function getPagingAkun()
	{
		$filJenis = $this->input->get("filJenis") == 'ALL' ? '' : $this->input->get("filJenis");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['data'] = $this->m_data_master->getDataAkun($filJenis, '')->num_rows();
		$this->load->view("_partial/paging",$data);
	}
	public function getDataAkun()
	{
		$filJenis = $this->input->get("filJenis") == 'ALL' ? '' : $this->input->get("filJenis");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$where = " LIMIT $limit OFFSET $offset";
		$data['offset'] = $offset+1;
		$data['data'] = $this->m_data_master->getDataAkun($filJenis, $where)->result();
		$this->load->view('data_master/user/tabel', $data);
	}
	public function saveUser()
	{
		$inputEmail = $this->input->post("inputEmail");
		$inputNama = $this->input->post("inputNama");
		$inputJenis = $this->input->post("inputJenis");
		$cek = $this->db->query("SELECT id FROM user WHERE email = '$inputEmail'");
		if ($inputEmail == '') {
			$data = true;
			$message = 'Lengkapi Datanya Terlebih Dahulu';
			$sub_message = 'Email masih kosong';
			$status = 'warning';
			$tagName = '#inputEmail';
		}elseif ($inputNama == '') {
			$data = true;
			$message = 'Lengkapi Datanya Terlebih Dahulu';
			$sub_message = 'Nama masih kosong';
			$status = 'warning';
			$tagName = '#inputNama';
		}elseif(!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)){
			$data = true;
			$message = 'Format Email Tidak Valid';
			$sub_message = '';
			$status = 'warning';
			$tagName = '#inputEmail';
		}elseif($cek->num_rows()>0){
			$data = true;
			$message = 'Email sudah tersedia';
			$sub_message = '';
			$status = 'warning';
			$tagName = '#inputEmail';
		}else{
			$password = get_hash($inputEmail);
			$id = $this->uuid->v4();
			$tanggal = $this->uuid->getDateNow();
			$parsingData = array('id' =>$id ,'email'=>$inputEmail,'password'=>$password,'nama'=>$inputNama,'jenis'=>$inputJenis,'created_at'=>$tanggal,'status'=>'VERIFIED');
			$data = $this->m_process_data->addData('user',$parsingData);
			$message = 'Berhasil Menyimpan Data User';
			$sub_message = '';
			$tagName = '';
			$status = 'success';
		}
		$response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message,'status'=>$status, 'tagName'=>$tagName );
		echo json_encode($response);
	}
	public function lamaran_masuk()
	{
		$data['side'] = 'data_master-masuk';
		$data['menu'] = 'Data Master';
		$data['sub_menu1'] = 'Lamaran Masuk Outstanding';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Data Lamaran Masuk Outstanding';
		$data['departemen'] = $this->m_data_master->getDepartemen()->result();
		$data['jabatan'] = $this->m_data_master->getJabatan()->result();
		$data['plant'] = $this->m_data_master->getPlant()->result();
		$this->load->view("data_master/lamaran_masuk/index", $data);
	}
	public function getPagingLamaranMasuk($value='')
	{
		$filDepartemen = $this->input->get("filDepartemen")=='ALL' ? '' :$this->input->get("filDepartemen");
		$filJabatan = $this->input->get("filJabatan")=='ALL' ? '' :$this->input->get("filJabatan");
		$filPlant = $this->input->get("filPlant")=='ALL' ? '' :$this->input->get("filPlant");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$data['data'] = $this->m_data_master->getDataLamaranMasuk($filDepartemen, $filJabatan, $filPlant, $filSearch, '')->num_rows();
		$this->load->view("_partial/paging",$data);
	}
	public function getDataLamaranMasuk()
	{
		$filDepartemen = $this->input->get("filDepartemen")=='ALL' ? '' :$this->input->get("filDepartemen");
		$filJabatan = $this->input->get("filJabatan")=='ALL' ? '' :$this->input->get("filJabatan");
		$filPlant = $this->input->get("filPlant")=='ALL' ? '' :$this->input->get("filPlant");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$where = " LIMIT $limit OFFSET $offset";
		$data['offset'] = $offset+1;
		$data['data'] = $this->m_data_master->getDataLamaranMasuk($filDepartemen, $filJabatan, $filPlant, $filSearch, $where)->result();
		$this->load->view('data_master/lamaran_masuk/tabel', $data);
	}
	public function saveLamaranOutstanding()
	{
		$this->load->model("m_lowongan");
		$pelamarId = $this->input->post("pelamarId");
  		$id = $this->input->post("recruitmentId");
  		$lamaranMasukId = $this->input->post("lamaranMasukId");
  		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
	 	if (hash_verified($setToken,$this->session->userdata("token"))) {
	 		$nip = $this->m_lowongan->setNIP();
	 		$tanggal = $this->uuid->getDateNow();
	 		$getJenis = $this->db->query("SELECT jenis FROM recruitment where id = '$id'")->row();
	 		$jenis = $getJenis->jenis;
	 		$getSub = $this->db->query("SELECT 
											jenis 
											FROM 
										`pelamar` 
										INNER JOIN user ON 
											pelamar.user_id = user.id
										WHERE
											pelamar.id = '$pelamarId'")->row();
	 		$sub = $getSub->jenis;
	 		$dataResign = $this->m_lowongan->cekKaryawanResign($pelamarId);
	 		if ($dataResign->num_rows() == 0) {
	 			$type = 'Pelamar Baru';	
	 			$isisStatus = 'Aktif';
	 			$hasilTes = null;
	 			$statusData = 'OPEN';
	 		}else{
	 			$resign = $dataResign->row();
	 			$type = 'Ex-KPS';
	 			$isisStatus = $resign->kategori == 'Blacklist' ? 'Tidak Aktif':'Aktif';
	 			$hasilTes = $resign->kategori == 'Blacklist' ? 'NG':null; 
	 			$statusData = $resign->kategori == 'Blacklist' ? 'CLOSE':'OPEN'; 
	 		}
	 		
	 		$cekData = $this->db->query("SELECT id FROM lamaran WHERE pelamar_id = '$pelamarId' AND recruitment_id = '$id'");
	 		if ($cekData->num_rows() == 0) {
	 			$cekLamaran = $this->db->query("SELECT id FROM lamaran WHERE pelamar_id = '$pelamarId' AND recruitment_id != '$id' AND status = 'Aktif'");
	 			if ($cekLamaran->num_rows()==0) {
	 				$lamaranId = $this->uuid->v4();
		    		$parsingData = array('id' =>$lamaranId,'pelamar_id'=>$pelamarId,'recruitment_id'=>$id,'nip'=>$nip,'tgl'=>$tanggal,'jenis'=>$jenis,'sub'=>$sub,'type'=>$type,'status_data'=>$statusData,'status'=>$isisStatus,'created_at'=>$tanggal,'user_id'=>$this->session->userdata("user_id"), 'hasil_tes'=>$hasilTes);
					$data = $this->m_process_data->addData("lamaran",$parsingData);
					if ($data == true) {
						$status = 'success';
						$message="Berhasil Menyimpan Data Lamaran";
						$sub_message='';
						$this->db->query("UPDATE lamaran_masuk SET status = 'CLOSE', lamaran_id = '$lamaranId' WHERE id = '$lamaranMasukId'");
					}
	 			}else{
	 				$data = true;
	 				$status = 'warning';
	 				$message = 'Data pelamar dalam proses lamaran lain di recruitment KPS';
	 				$sub_message = '';
	 			}
	 		}else{
	 			$data = true;
	 			$status = 'success';
	 			$message = "Data Telah Tersimpan";
	 			$sub_message = "";
	 		}
	 	}else{
	 		$data = true;
	 		$status = 'warning';
	 		$message = 'Anda tidak memiliki akses untuk menampilkan data ini';
	 		$sub_message = '';
	 	}
	 	$response = array('data' =>$data ,'message'=>$message, 'sub_message'=>$sub_message,'status'=>$status );
	 	echo json_encode($response);
	}
	public function getDataRecruitmentBySearch()
	{
		$filSearch = $this->input->get("filSearch");
		$data = $this->m_data_master->getDataRecruitment($filSearch);
		if ($data->num_rows() == 0) {
			$html='<tr><td colspan="12">Data Tidak Tersedia</td></tr>';
		}else{
			$html='';
			foreach ($data->result() as $key) {
				$html .= '<tr>
							<td>'.$key->no_recruitment.'</td>
							<td>'.$key->jenis.'</td>
							<td>'.$key->jabatan.'</td>
							<td>'.$key->departemen.'</td>
							<td>'.$key->tempat.'</td>
							<td>'.$key->shift.'</td>
							<td>'.$key->referensi_pria.'</td>
							<td>'.$key->referensi_wanita.'</td>
							<td>'.$key->umum_pria.'</td>
							<td>'.$key->umum_wanita.'</td>
							<td>'.$key->eksternal_pria.'</td>
							<td>'.$key->eksternal_wanita.'</td>
							<td>
								<button class="btn btn-icon btn-icon-only btn-sm btn-primary mb-1 pilihRecruitment active-scale-down" type="button" data="'.$key->id.'">
			                      <i class="cs-check"></i>
			                    </button>
			                </td>
						</tr>';
			}
		}
		echo json_encode($html);
	}
	public function updatePassword()
	{
		$this->load->model("m_auth");
		$inputPasswordLama = $this->input->post("inputPasswordLama");
		$inputPasswordBaru =$this->input->post("inputPasswordBaru");
		$inputKonfirmasiPassword = $this->input->post("inputKonfirmasiPassword");
		$inputEmail = $this->session->userdata("email");
		$user_id = $this->session->userdata('user_id');
		$cek = $this->db->query("SELECT password from user WHERE id = '$user_id'")->row();
		$this->load->library('encryption');
		$this->load->library('encrypt');
		$key = $this->encryption->create_key(16);
		$password = get_hash($inputPasswordBaru);
		if (hash_verified($inputPasswordLama,$cek->password)) {
			if ($inputPasswordBaru == '') {
				$data = true;
				$message = 'Password Baru harus diisi!';
				$sub_message = '';
				$status = 'warning';
			}elseif ($inputKonfirmasiPassword == '') {
				$data = true;
				$message = 'Konfirmasi Password harus diisi!';
				$sub_message = '';
				$status = 'warning';
			}elseif ($inputPasswordBaru != $inputKonfirmasiPassword) {
				$data = true;
				$message = 'Konfirmasi Password tidak sama dengan password baru!';
				$sub_message = '';
				$status = 'warning';
			}else{
				
				
				$data = $this->m_process_data->updateData('user',array('password'=>$password), array('id' => $user_id));
				$message = 'Berhasil Mengubah Data Password';
				$sub_message = '';
				$status = 'success';
			}
		}else{
			$data = true;
			$message= 'Password yang berlaku salah!';
			$sub_message = 'Masukkan password sebelumnya dengan benar';
			$status = 'warning';
		}
		$response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message,'status'=>$status,'password'=>$password);
		echo json_encode($response);
	}
	public function referensi()
	{
		$data['side'] = 'data_master-referensi';
		$data['menu'] = 'Data Master';
		$data['sub_menu1'] = 'Referensi';
		$data['uuid'] = $this->uuid->v4();
		$data['sub_menu2'] = '';
		$data['mobile'] = true;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
	  	$data['link3'] = 'javascript:;';
		$data['page'] = 'Referensi';
		$this->load->view("data_master/referensi/index", $data);
	}
	public function getDataPelamar()
  {
    $draw = intval($this->input->post("draw"));
    $start = intval($this->input->post("start"));
    $length = intval($this->input->post("length"));
    $order = $this->input->post("order");
    $search = $this->input->post("search");
    $search = $search['value'];
    $col = 0;
    $dir = "";
    if (!empty($order)) {
      foreach ($order as $o) {
        $col = $o['column'];
        $dir = $o['dir'];
      }
    }

    if ($dir != "asc" && $dir != "desc") {
      $dir = "desc";
    }
    $valid_columns = array(
      0 => 'created_at',
      1 => 'nama',
      2 => 'no_hp',
      3 => 'email',
      4 => 'tempat_lahir',
      5 => 'tgl_lahir',
      6 => 'jenis_kelamin',
      7 => 'status_pernikahan',
      8 =>'jml_anak',
      9 => 'golongan_darah',
      10 => 'agama',
      11 => 'no_ktp',
      12 => 'kode_pos',
      13 =>'alamat_ktp',
      14 => 'alamat_domisili'
    );
    if (!isset($valid_columns[$col])) {
      $order = null;
    } else {
      $order = $valid_columns[$col];
    }
    if ($order != null) {
      $this->db->order_by($order, $dir);
    }

    $x=0;

    $inputSearch = $this->input->get("inputSearch");
		foreach ($valid_columns as $sterm) // loop kolom 
    {
        if (!empty($search)) // jika datatable mengirim POST untuk search
        {
            if ($x === 0) // looping pertama
            {
                $this->db->group_start();
                $this->db->like($sterm, $search);
            } else {
                $this->db->or_like($sterm, $search);
            }
            if (count($valid_columns) - 1 == $x) //looping terakhir
                $this->db->group_end();
        }
        $x++;
    }
		

    $this->db->limit($length, $start);
    $user_id = $this->session->userdata("user_id");
    $this->db->where("user_id",$user_id);
    $pelamar = $this->m_pelamar->getDataPelamar();
    $data = array();
    $i = $start+1;
    foreach ($pelamar->result() as $rows) {
      $data[] = array(
        $i,
        '<div class="dropdown me-1">
                          <button
                            type="button"
                            class="btn btn-secondary dropdown-toggle"
                            id="dropdownMenuOffset"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-bs-offset="10,20"
                          >
                            <i class="bi bi-gear"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <a class="dropdown-item" href="'.base_url().'pelamar/edit/'.$rows->id.'">Edit</a>
                            <a class="dropdown-item hapusData" href="javascript:;">Hapus Data</a>
                          </div>
                        </div>',
        '<div class="sw-10 sh-10 me-1 mb-1 d-inline-block"><img src="'.base_url().''.$rows->foto.'" class="img-fluid img-fluid-height rounded-md" alt="thumb" /></div>',
       	$rows->nama,
        $rows->no_hp,
        $rows->email,
        $rows->tempat_lahir,
        date("d-m-Y", strtotime($rows->tgl_lahir)),
        $rows->jenis_kelamin,
        $rows->status_pernikahan == 'Y' ? 'Menikah' : 'Belum Menikah',
        $rows->jml_anak,
        $rows->golongan_darah,
        $rows->agama,
        $rows->no_ktp,
        $rows->kode_pos,
        $rows->alamat_ktp,
        $rows->alamat_domisili,
        $rows->cv,
        $rows->ijazah_terakhir,
        $rows->surat_lamaran,
        $rows->skck,
        $rows->ktp,
        $rows->surat_keterangan_sehat,
        $rows->surat_ijin,
        $rows->kartu_keluarga,
        $rows->sertifikat_vaksin,
        $rows->surat_bebas_narkoba
      );

      $i++;
    }
    $totalPelamar = $this->totalPelamar();
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $totalPelamar,
      "recordsFiltered" => $totalPelamar,
      "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function totalPelamar()
  {
    $query = $this->m_pelamar->getJmlPelamar();
    
    $result = $query->row();
    if (isset($result))
      return $result->num;
    return 0;
  }
  public function add_referensi()
  {
  	$data['side'] = 'data_master-referensi';
	$data['menu'] = 'Data Master';
	$data['sub_menu1'] = 'Referensi';
	$data['uuid'] = $this->uuid->v4();
	$data['sub_menu2'] = 'Add';
	$data['mobile'] = true;
	$data['link1'] = 'javascript:;';
	$data['link2'] = base_url().'data_master/referensi';
  	$data['link3'] = 'javascript:;';
	$data['page'] = 'Add Data Referensi';
	$this->load->view("data_master/referensi/add", $data);
  }
  public function addData()
  {
  		$inputFoto = $this->input->post("inputFoto");
		$inputNama = $this->input->post("inputNama");
		$inputEmail = $this->input->post("inputEmail");
		$inputNoHP = $this->input->post("inputNoHP");
		$inputTempatLahir = $this->input->post("inputTempatLahir");
		$inputTglLahir = $this->input->post("inputTglLahir") == '' ? '' : date("Y-m-d", strtotime($this->input->post("inputTglLahir")));
		$inputJenisKelamin = $this->input->post("inputJenisKelamin");
		$inputStatusMenikah = $this->input->post("inputStatusMenikah");
		$inputJumlahAnak = $this->input->post("inputJumlahAnak") == '' ? 0 : $this->input->post("inputJumlahAnak");
		$inputGolonganDarah = $this->input->post("inputGolonganDarah");
		$inputAgama = $this->input->post("inputAgama");
		$inputNoKTP = $this->input->post("inputNoKTP");
		$inputAlamatKTP = $this->input->post("inputAlamatKTP");
		$inputAlamatDomisili = $this->input->post("inputAlamatDomisili");
		$inputKodePOS = $this->input->post("inputKodePOS");
		$size_file = $this->input->post("size_file");
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		$hiddenPhoto = $this->input->post("hiddenPhoto");
		$inputReferensiNIK = $this->input->post("inputReferensiNIK");
		$inputReferensiNama = $this->input->post("inputReferensiNama");
		$inputReferensiJabatan = $this->input->post("inputReferensiJabatan");
		$inputReferensiDepartemen = $this->input->post("inputReferensiDepartemen");
		$inputReferensiSubDepartemen = $this->input->post("inputReferensiSubDepartemen");
		$inputReferensiHubungan = $this->input->post("inputReferensiHubungan");
		$inputId =$this->input->post("inputIdPelamar");
		// $dataAttachment = $this->db->query("SELECT id FROM pelamar WHERE cv IS NOT NULL AND ijazah_terakhir IS NOT NULL AND surat_lamaran IS NOT NULL AND skck IS NOT NULL AND ktp IS NOT NULL and surat_keterangan_sehat IS NOT NULL AND surat_ijin IS NOT NULL and kartu_keluarga AND sertifikat_vaksin IS NOT NULL AND id = '$inputId'");


		if (hash_verified($setToken,$this->session->userdata("token"))) {
			if ($size_file>1000000) {
	        	$data = true;
	        	$status = 'warning';
	        	$message = 'Ukuran File Foto Melebihi 1 Mb';
	        	$sub_message = '';
	        }else{
	        	if ($inputNama == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Nama Lengkap!';
			    }elseif ($inputEmail == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Email!';
			    }elseif ($inputNoHP == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi No HP!';
			    }elseif ($inputTempatLahir == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Tempat Lahir!';
			    }elseif ($inputTglLahir == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Tanggal Lahir!';
			    }elseif ($inputNoKTP == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi No KTP!';
			    }elseif ($inputAlamatKTP == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Alamat KTP!';
			    }elseif ($inputAlamatDomisili == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Alamat Domisili!';
			    }elseif ($inputKodePOS=='') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Kode POS!';
			    }elseif ($inputReferensiNIK=='') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Referensi NIK!';
			    }elseif ($inputReferensiNama=='') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Referensi Nama!';
			    }elseif ($inputReferensiJabatan=='') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Referensi Jabatan!';
			    }elseif ($inputReferensiDepartemen=='') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Referensi Departemen!';
			    }elseif ($inputReferensiSubDepartemen=='') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Referensi Sub Departemen!';
			    }elseif ($inputReferensiHubungan=='') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Referensi Hubungan!';
			    }else{
			    	$config['upload_path']="./assets/arsip/photo-pelamar";
			        $config['allowed_types']='jpg|png|jpeg';
			        $config['encrypt_name'] = TRUE;
			         
			        $this->load->library('upload',$config);
		        	if($this->upload->do_upload("inputFoto")){
				    	$data = $this->upload->data();
						//Resize and Compress Image
			            // $config['image_library']='gd2';
			            $config['source_image']='./assets/arsip/photo-pelamar/'.$data['file_name'];
			            // $config['create_thumb']= FALSE;
			            $config['maintain_ratio']= FALSE;
			            // $config['quality']= '60%';
			            // $config['width']= 1024;
			            $config['max_size']     = '1000';
			        		
			            // $config['height']= 768;
			            // $config['new_image']= './assets/dokumen/kecelakaan-kerja/'.$data['file_name'];
			            $this->load->library('image_lib', $config);
			            // $this->image_lib->resize();
			            $fileName= 'assets/arsip/photo-pelamar/'.$data['file_name'];
				    }else{
				    	$fileName = $hiddenPhoto;
				    }

				    if ($fileName == '' && $hiddenPhoto == '') {
				    	$data = true;
			        	$status = 'warning';
			        	$message = 'Lengkapi Datanya Terlebih Dahulu';
			        	$sub_message = 'Anda belum memasukkan file foto wajah';
				    }else{
				    	
			    		$sql = "SELECT id FROM pelamar WHERE id = '$inputId'";

				    	$cekData = $this->db->query($sql);
				    	if ($cekData->num_rows() == 0) {
				    		$idReferensi = $this->uuid->v4();
				    		$parsingData = array('id' =>$inputId,'foto'=>$fileName,'nama'=>$inputNama,'email'=>$inputEmail,'no_hp'=>$inputNoHP,'tempat_lahir'=>$inputTempatLahir,'tgl_lahir'=>$inputTglLahir,'jenis_kelamin'=>$inputJenisKelamin,'status_pernikahan'=>$inputStatusMenikah,'jml_anak'=>$inputJumlahAnak,'golongan_darah'=>$inputGolonganDarah,'agama'=>$inputAgama,'no_ktp'=>$inputNoKTP,'kode_pos'=>$inputKodePOS,'alamat_ktp'=>$inputAlamatKTP,'alamat_domisili'=>$inputAlamatDomisili,'referensi_id'=>$idReferensi,'user_id'=>$this->session->userdata("user_id"),'created_at'=>$this->uuid->getDateNow());
							$data = $this->m_process_data->addData("pelamar",$parsingData);
							
							$parsingReferensi = array('id'=>$idReferensi,'nik'=>$inputReferensiNIK, 'nama'=>$inputReferensiNama,'jabatan'=>$inputReferensiJabatan,'departemen'=>$inputReferensiDepartemen,'sub_departemen1'=>$inputReferensiSubDepartemen,'hubungan'=>$inputReferensiHubungan,'pelamar_id'=>$inputId,'created_at'=>$this->uuid->getDateNow());
							$data = $this->m_process_data->addData("referensi",$parsingReferensi);
				    	}else{
				    		$userIdFoto = $this->input->post("inputIdPelamar");
			    			$getFotoBefore = $this->db->query("SELECT foto FROM pelamar WHERE user_id = '$userIdFoto' AND foto IS NOT NULL OR foto != '' AND id = '$userIdFoto'");
			    			$dataId = array('id' => $userIdFoto);
				    			
			    			if ($getFotoBefore->num_rows()>0) {
			    				$fileFotoBefore = $getFotoBefore->row();
			    				$fotoBefore = $fileFotoBefore->foto;
			    			}
			    			$parsingData = array('foto'=>$fileName,'nama'=>$inputNama,'no_hp'=>$inputNoHP,'email'=>$inputEmail,'tempat_lahir'=>$inputTempatLahir,'tgl_lahir'=>$inputTglLahir,'jenis_kelamin'=>$inputJenisKelamin,'status_pernikahan'=>$inputStatusMenikah,'jml_anak'=>$inputJumlahAnak,'golongan_darah'=>$inputGolonganDarah,'agama'=>$inputAgama,'no_ktp'=>$inputNoKTP,'kode_pos'=>$inputKodePOS,'alamat_ktp'=>$inputAlamatKTP,'alamat_domisili'=>$inputAlamatDomisili,'updated_at'=>$this->uuid->getDateNow());
							$data = $this->m_process_data->updateData('pelamar',$parsingData, $dataId);		

							$parsingReferensi = array('nik'=>$inputReferensiNIK, 'nama'=>$inputReferensiNama,'jabatan'=>$inputReferensiJabatan,'departemen'=>$inputReferensiDepartemen,'sub_departemen1'=>$inputReferensiSubDepartemen,'hubungan'=>$inputReferensiHubungan,'updated_at'=>$this->uuid->getDateNow());
							$data = $this->m_process_data->updateData('referensi',$parsingReferensi, array('pelamar_id'=>$userIdFoto));		
							// if ($data == true && $hiddenPhoto != '' && $fileName != '') {
							// 	unlink($fotoBefore);
							// }
							
				    	}
				    	if ($data == true) {
					    	$status = 'success';
					    	$message="Berhasil Menyimpan Data";
					    	$sub_message='Silahkan Lengkapi Attachment';
				    	}
				    	
				    }
			    }
	        }
		}else{
			$data= true;
			$status = 'warning';
			$message='Anda Tidak Memiliki Akses';
			$sub_message='Segera Login Terlebih Dahulu';
		}

		$response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message,'status'=>$status );
		echo json_encode($response);
  }
}
