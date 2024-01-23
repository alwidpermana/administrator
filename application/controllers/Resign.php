<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resign extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}elseif ($this->session->userdata("jenis") != 'Admin') {
			redirect(base_url('dashboard'));
		}
		$this->load->model("m_monitoring");
		$this->load->model("m_process_data");
		$this->load->model("m_data_master");
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
	public function add()
	{
		$data['side'] = 'resign-add';
		$data['menu'] = 'Resign';
		$data['sub_menu1'] = 'New';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['page'] = 'Tambah Data Karyawan Resign';
		$this->load->view("resign/add/index", $data);
	}
	public function saveData()
	{
		$inputId = $this->input->post("inputId");
		$inputNama = $this->input->post("inputNama");
		$inputEmail = $this->input->post("inputEmail");
		$inputNoHP = $this->input->post("inputNoHP");
		$inputTempatLahir = $this->input->post("inputTempatLahir");
		$inputTglLahir = date("Y-m-d", strtotime($this->input->post("inputTglLahir")));
		$inputNoKTP = $this->input->post("inputNoKTP");
		$inputAlamatKTP = $this->input->post("inputAlamatKTP");
		$inputJenisKelamin = $this->input->post("inputJenisKelamin");
		$inputStatusMenikah = $this->input->post("inputStatusMenikah");
		$inputJumlahAnak = $this->input->post("inputJumlahAnak");
		$inputGolonganDarah = $this->input->post("inputGolonganDarah");
		$inputAgama = $this->input->post("inputAgama");
		$inputAlamatDomisili = $this->input->post("inputAlamatDomisili");
		$inputKodePOS = $this->input->post("inputKodePOS");
		$inputJoinDate = $this->input->post("inputJoinDate");
		$inputMulaiTraining = $this->input->post("inputMulaiTraining");
		$inputSelesaiTraining = $this->input->post("inputSelesaiTraining");
		$inputMulaiKontrak1 = $this->input->post("inputMulaiKontrak1");
		$inputSelesaiKontrak1 = $this->input->post("inputSelesaiKontrak1");
		$inputMulaiKontrak2 = $this->input->post("inputMulaiKontrak2");
		$inputSelesaiKontrak2 = $this->input->post("inputSelesaiKontrak2");
		$inputMulaiKontrak3 = $this->input->post("inputMulaiKontrak3");
		$inputSelesaiKontrak3 = $this->input->post("inputSelesaiKontrak3");
		$inputTglBerakhir = $this->input->post("inputTglBerakhir") == '' ? '' : date("Y-m-d", strtotime($this->input->post("inputTglBerakhir")));
		$inputAbsensiSakit = round($this->input->post("inputAbsensiSakit"));
		$inputAbsensiIjin = round($this->input->post("inputAbsensiIjin"));
		$inputAbsensiAlpa = round($this->input->post("inputAbsensiAlpa"));
		$inputAbsensiPembinaan = round($this->input->post("inputAbsensiPembinaan"));
		$inputAbsensiSP1 = round($this->input->post("inputAbsensiSP1"));
		$inputAbsensiSP2 = round($this->input->post("inputAbsensiSP2"));
		$inputAbsensiSP3 = round($this->input->post("inputAbsensiSP3"));
		$inputAbsensiPelanggaranBerat = round($this->input->post("inputAbsensiPelanggaranBerat"));
		$inputAttitude = $this->input->post("inputAttitude");
		$inputProduktivitas = $this->input->post("inputProduktivitas");
		$inputLainnya = $this->input->post("inputLainnya");
		$inputKeterangan = $this->input->post("inputKeterangan");
		$inputNIKAsal = $this->input->post("inputNIKAsal");
		$inputAlasanKeluar = $this->input->post("inputAlasanKeluar");
		$inputKategori = $this->input->post("inputKategori");
		if ($inputNama == '') {
			$data = true;
			$message = "Lengkapi Datanya Terlebih Dahulu";
			$sub_message = 'Isi Nama!';
			$tagName = '#inputNama';
			$status = 'warning';
		}elseif ($inputEmail == '') {
			$data = true;
			$message = "Lengkapi Datanya Terlebih Dahulu";
			$sub_message = 'Isi Email!';
			$tagName = '#inputEmail';
			$status = 'warning';
		}elseif ($inputNoHP == '') {
			$data = true;
			$message = "Lengkapi Datanya Terlebih Dahulu";
			$sub_message = 'Isi No HP!';
			$tagName = '#inputNoHP';
			$status = 'warning';
		}elseif ($inputAlamatKTP == '') {
			$data = true;
			$message = "Lengkapi Datanya Terlebih Dahulu";
			$sub_message = 'Isi Alamat KTP!';
			$tagName = '#inputAlamatKTP';
			$status = 'warning';
		}elseif ($inputTempatLahir == '') {
			$data = true;
			$message = "Lengkapi Datanya Terlebih Dahulu";
			$sub_message = 'Isi Tempat Lahir!';
			$tagName = '#inputTempatLahir';
			$status = 'warning';
		}elseif ($inputTglLahir == '') {
			$data = true;
			$message = "Lengkapi Datanya Terlebih Dahulu";
			$sub_message = 'Isi Tanggal Lahir!';
			$tagName = '#inputTglLahir';
			$status = 'warning';
		}elseif ($inputNoKTP == '') {
			$data = true;
			$message = "Lengkapi Datanya Terlebih Dahulu";
			$sub_message = 'Isi No KTP!';
			$tagName = '#inputNoKTP';
			$status = 'warning';
		}elseif ($inputAlamatDomisili == '') {
			$data = true;
			$message = "Lengkapi Datanya Terlebih Dahulu";
			$sub_message = 'Isi Alamat Domisili!';
			$tagName = '#inputAlamatDomisili';
			$status = 'warning';
		}elseif ($inputKodePOS == '') {
			$data = true;
			$message = "Lengkapi Datanya Terlebih Dahulu";
			$sub_message = 'Isi Kode POS!';
			$tagName = '#inputKodePOS';
			$status = 'warning';
		}elseif ($inputTglBerakhir == '') {
			$data = true;
			$message = 'Lengkapi Datanya Terlebih Dahulu';
			$sub_message = 'Isi Tanggal Berakhir';
			$tagName = '#inputTglBerakhir';
			$status = 'warning';
		}else{
			
			if ($inputId == '') {
				$resignId = $this->uuid->v4();
				$parsingData = array('id' =>$resignId,'nama'=>$inputNama,'email'=>$inputEmail,'no_hp'=>$inputNoHP,'tempat_lahir'=>$inputTempatLahir,'tgl_lahir'=>$inputTglLahir,'jenis_kelamin'=>$inputJenisKelamin,'status_pernikahan'=>$inputStatusMenikah,'jml_anak'=>$inputJumlahAnak,'golongan_darah'=>$inputGolonganDarah,'agama'=>$inputAgama,'no_ktp'=>$inputNoKTP,'kode_pos'=>$inputKodePOS,'alamat_ktp'=>$inputAlamatKTP,'alamat_domisili'=>$inputAlamatDomisili,'created_at'=>$this->uuid->getDateNow(),'alasan_keluar'=>$inputAlasanKeluar,'sakit'=>$inputAbsensiSakit,'ijin'=>$inputAbsensiIjin,'alpa'=>$inputAbsensiAlpa,'pembinaan'=>$inputAbsensiPembinaan,'sp1'=>$inputAbsensiSP1,'sp2'=>$inputAbsensiSP2,'sp3'=>$inputAbsensiSP3,'pelanggaran_berat'=>$inputAbsensiPelanggaranBerat,'attitude'=>$inputAttitude,'produktivitas'=>$inputProduktivitas,'lainnya'=>$inputLainnya,'kategori'=>$inputKategori,'tgl_berakhir'=>$inputTglBerakhir,'keterangan'=>$inputKeterangan);
				$data = $this->m_process_data->addData("karyawan_resign",$parsingData);
			} else {
				$parsingData = array('nama'=>$inputNama,'email'=>$inputEmail,'no_hp'=>$inputNoHP,'tempat_lahir'=>$inputTempatLahir,'tgl_lahir'=>$inputTglLahir,'jenis_kelamin'=>$inputJenisKelamin,'status_pernikahan'=>$inputStatusMenikah,'jml_anak'=>$inputJumlahAnak,'golongan_darah'=>$inputGolonganDarah,'agama'=>$inputAgama,'no_ktp'=>$inputNoKTP,'kode_pos'=>$inputKodePOS,'alamat_ktp'=>$inputAlamatKTP,'alamat_domisili'=>$inputAlamatDomisili,'updated_at'=>$this->uuid->getDateNow(),'alasan_keluar'=>$inputAlasanKeluar,'sakit'=>$inputAbsensiSakit,'ijin'=>$inputAbsensiIjin,'alpa'=>$inputAbsensiAlpa,'pembinaan'=>$inputAbsensiPembinaan,'sp1'=>$inputAbsensiSP1,'sp2'=>$inputAbsensiSP2,'sp3'=>$inputAbsensiSP3,'pelanggaran_berat'=>$inputAbsensiPelanggaranBerat,'attitude'=>$inputAttitude,'produktivitas'=>$inputProduktivitas,'lainnya'=>$inputLainnya,'kategori'=>$inputKategori,'tgl_berakhir'=>$inputTglBerakhir,'keterangan'=>$inputKeterangan);
				$data = $this->m_process_data->updateData("karyawan_resign",$parsingData, array('id' => $inputId));
			}
			
			
			if ($data == true) {
				if ($inputId != '') {
					$this->m_process_data->deleteData('masa_kerja',$inputId,'resign_id');
					$resignId = $inputId;
				}
				for ($i=0; $i < count($inputNIKAsal); $i++) { 
					$id = $this->uuid->v4();
					if ($inputNIKAsal[$i] != '') {
						$joinDate = $inputJoinDate[$i] == '' ? null : date("Y-m-d", strtotime($inputJoinDate[$i]));
						$mulaiTraining = $inputMulaiTraining[$i] == '' ? null : date("Y-m-d", strtotime($inputMulaiTraining[$i]));
						$selesaiTraining = $inputSelesaiTraining[$i] == '' ? null : date("Y-m-d", strtotime($inputSelesaiTraining[$i]));
						$mulaiKontrak1 = $inputMulaiKontrak1[$i] == '' ? null : date("Y-m-d", strtotime($inputMulaiKontrak1[$i]));
						$selesaiKontrak1 = $inputSelesaiKontrak1[$i] == '' ? null : date("Y-m-d", strtotime($inputSelesaiKontrak1[$i]));
						$mulaiKontrak2 = $inputMulaiKontrak2[$i] == '' ? null : date("Y-m-d", strtotime($inputMulaiKontrak2[$i]));
						$selesaiKontrak2 = $inputSelesaiKontrak2[$i] == '' ? null : date("Y-m-d", strtotime($inputSelesaiKontrak2[$i]));
						$mulaiKontrak3 = $inputMulaiKontrak3[$i] == '' ? null : date("Y-m-d", strtotime($inputMulaiKontrak3[$i]));
						$selesaiKontrak3 = $inputSelesaiKontrak3[$i] == '' ? null : date("Y-m-d", strtotime($inputSelesaiKontrak3[$i]));
						$parsingMasaKerja = array("id"=>$id,"resign_id"=>$resignId,"nik"=>$inputNIKAsal[$i],"join_date"=>$joinDate,"mulai_training"=>$mulaiTraining,"selesai_training"=>$selesaiTraining,"mulai_kontrak_1"=>$mulaiKontrak1,"selesai_kontrak_1"=>$selesaiKontrak1,"mulai_kontrak_2"=>$mulaiKontrak2,"selesai_kontrak_2"=>$selesaiKontrak2,"mulai_kontrak_3"=>$mulaiKontrak3,"selesai_kontrak_3"=>$selesaiKontrak3,'created_at'=>$this->uuid->getDateNow());
						$data = $this->m_process_data->addData("masa_kerja",$parsingMasaKerja);
					}	
				}	
			}
			if ($data == true) {
				$message = 'Berhasil Menyimpan Data Karyawan Resign';
				$sub_message='';
				$status = 'success';
				$tagName = '';
			}	
		}
		$response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message,'status'=>$status,'tagName'=>$tagName);
		echo json_encode($response);
	}
	public function monitoring()
	{
		$data['side'] = 'resign-monitoring';
		$data['menu'] = 'Resign';
		$data['sub_menu1'] = 'Monitoring';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['page'] = 'Monitoring Karyawan Resign / Keluar';
		$this->load->view("resign/monitoring/index", $data);
	}
	public function getPagingMonitoring()
	{
		$filTahun = $this->input->get("filTahun");
		$filBulan = $this->input->get("filBulan") == 'All' ? '' : $this->input->get("filBulan");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$data['data'] = $this->m_monitoring->getDataResign($filTahun, $filBulan, $filSearch,'')->num_rows();
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$this->load->view("_partial/paging",$data);
	}
	public function getDataMonitoring()
	{
		$filTahun = $this->input->get("filTahun");
		$filBulan = $this->input->get("filBulan") == 'All' ? '' : $this->input->get("filBulan");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$filSearch = $this->input->get("filSearch");
		$where = " LIMIT $limit OFFSET $offset";
		$data['data'] = $this->m_monitoring->getDataResign($filTahun, $filBulan, $filSearch,$where)->result();
		$data['offset']=$offset+1;
		$this->load->view("resign/monitoring/tabel", $data);
	}
	public function view($id)
	{
		$data['side'] = 'resign-monitoring';
		$data['menu'] = 'Resign';
		$data['sub_menu1'] = 'Monitoring';
		$data['sub_menu2'] = 'View';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = base_url("resign/monitoring");
		$data['link3'] = 'javascript:;';
		$data['page'] = 'View Karyawan Resign / Keluar';
		$get = $this->m_monitoring->getDataResignById($id);
		if ($get->num_rows()>0) {
			$data['data'] = $get->row();
			$data['masa_kerja'] = $this->m_monitoring->getMasaKerjaById($id)->result();
			$this->load->view("resign/monitoring/view", $data);
		}else{
			redirect(base_url("resign/monitoring"));
		}
		
	}
	public function edit($id)
	{
		$data['side'] = 'resign-monitoring';
		$data['menu'] = 'Resign';
		$data['sub_menu1'] = 'Monitoring';
		$data['sub_menu2'] = 'Edit';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = base_url("resign/monitoring");
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Edit Karyawan Resign / Keluar';
		$get = $this->m_monitoring->getDataResignById($id);
		if ($get->num_rows()>0) {
			$data['data'] = $get->row();
			$data['masa_kerja'] = $this->m_monitoring->getMasaKerjaById($id)->result();
			$this->load->view("resign/monitoring/edit", $data);
		}else{
			redirect(base_url("resign/monitoring"));
		}
	}
	public function hapus()
	{
		$id = $this->input->post("id");
		$data = $this->m_process_data->deleteData('karyawan_resign',$id,'id');
		if ($data == true) {
			
		$this->m_process_data->deleteData('masa_kerja',$id,'resign_id');
		}
		echo json_encode($data);
	}
}
?>
