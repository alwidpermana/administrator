<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}elseif ($this->session->userdata("jenis") != 'Admin') {
			redirect(base_url('dashboard'));
		}
		$this->load->model("m_tes");
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
	public function jadwal()
	{
		$data['side'] = 'tes-jadwal';
		$data['menu'] = 'Tes';
		$data['sub_menu1'] = 'Jadwal';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['page'] = 'List Jadwal Tes';
		$data['plant'] = $this->m_data_master->getPlant()->result();
		$this->load->view("tes/jadwal/index", $data);
	}
	public function getDataJadwal()
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
	      0 => 'jadwal.created_at',
	      1 => 'jadwal.created_at',
	      2 => 'tahap',
	      3 => 'jadwal.created_at',
	      4 => 'no_rek',
	      5 => 'jadwal.jenis',
	      6 => 'tgl_tes',
	      7 => 'tgl_tes2',
	      8 => 'tgl_tes3'
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
	    $filTahap = $this->input->post("filTahap");
	    if ($filTahap != '') {
	    	$this->db->where("tahap",$filTahap);
	    }
	    $pelamar = $this->m_tes->getJadwal();
	    $data = array();
	    $i = $start+1;
	    foreach ($pelamar->result() as $rows) {
	      $data[] = array(
	        $rows->jml_lamaran > 0 ?"" :'
	        <button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1 editData" type="button"  data="'.$rows->id.'" tahap="'.$rows->tahap.'" tgl="'.$rows->created_at.'" norek="'.$rows->no_rek.'" jenis="'.$rows->jenis.'" tglTes1="'.date("m/d/Y", strtotime($rows->tgl_tes)).'" tglTes2="'.date("m/d/Y", strtotime($rows->tgl_tes2)).'" tglTes3="'.date("m/d/Y", strtotime($rows->tgl_tes3)).'">
	          <i class="cs-edit-square"></i>
	          <span class="d-none d-xxl-inline-block">Edit</span>
	        </button>
	        <button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1 hapusData" type="button" data="'.$rows->id.'" tahap="'.$rows->tahap.'">
              <i class="cs-bin" data-acorn-size="15"></i>
              <span class="d-none d-xxl-inline-block">Delete</span>
            </button>',
	        $i,
	        $rows->tahap,
	        $rows->created_at,
	        $rows->no_rek,
	        $rows->jenis,
	        $rows->tahap == "2"?'H 1. '.$rows->tgl_tes.'<br>H 2. '.$rows->tgl_tes2.'<br>H 3. '.$rows->tgl_tes3:$rows->tgl_tes,
	        $rows->tempat,
	        '<button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1 pilihPelamar" type="button" data="'.$rows->id.'" tahap="'.$rows->tahap.'" jenis="'.$rows->jenis.'" norek ="'.$rows->no_rek.'">
              <i class="cs-user" data-acorn-size="15"></i>
            </button>'
	      );

	      $i++;
	    }
	    $totalJadwal = $this->totalJadwal();
	    $output = array(
	      "draw" => $draw,
	      "recordsTotal" => $totalJadwal,
	      "recordsFiltered" => $totalJadwal,
	      "data" => $data
	    );
	    echo json_encode($output);
	    exit();
	}
	public function totalJadwal()
  	{
	    $query = $this->m_tes->getJmlJadwal();
	    
	    $result = $query->row();
	    if (isset($result))
	      return $result->num;
	    return 0;
	}
	public function getNoTes()
	{
		$inputPlant = $this->input->get("inputPlant");
		$inputTglTes= $this->input->get("inputTglTes") == '' ? '' : date("Y-m-d", strtotime($this->input->get("inputTglTes"))); 
		$inputTglTes1=  $this->input->get("inputTglTes1") == '' ? '' : date("Y-m-d", strtotime($this->input->get("inputTglTes1"))); 
		$inputTahap= $this->input->get("inputTahap"); 

		$data = $this->m_tes->getNoTes($inputPlant, $inputTglTes, $inputTglTes1, $inputTahap);
		echo json_encode($data);
	}
	public function saveJadwal($value='')
	{
		$inputId = $this->input->post("inputId");
		$inputTahap = $this->input->post("inputTahap");
		$inputJenis = $this->input->post("inputJenis");
		$inputTglTes = $this->input->post("inputTglTes");
		$inputTglTes1 = $this->input->post("inputTglTes1");
		$inputTglTes2 = $this->input->post("inputTglTes2");
		$inputTglTes3 = $this->input->post("inputTglTes3");
		$inputPlant = $this->input->post("inputPlant");
		
		$tanggal = $this->uuid->getDateNow();
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		if (hash_verified($setToken,$this->session->userdata("token"))) {
			if ($inputTahap == '1' && $inputTglTes == '') {
				$data = true;
				$status = 'warning';
				$message = 'Lengkapi Datanya Terlebih Dahulu!';
				$sub_message="Tanggal Tes Masih Kosong!";
			}elseif ($inputTahap == '2' && $inputTglTes1 == '') {
				$data = true;
				$status = 'warning';
				$message = 'Lengkapi Datanya Terlebih Dahulu!';
				$sub_message="Tanggal Tes H 1 Masih Kosong!";
			}elseif ($inputTahap == '2' && $inputTglTes2 == '') {
				$data = true;
				$status = 'warning';
				$message = 'Lengkapi Datanya Terlebih Dahulu!';
				$sub_message="Tanggal Tes H 2 Masih Kosong!";
			}elseif ($inputTahap == '2' && $inputTglTes3 == '') {
				$data = true;
				$status = 'warning';
				$message = 'Lengkapi Datanya Terlebih Dahulu!';
				$sub_message="Tanggal Tes H 3 Masih Kosong!";
			}else{
				if ($inputId =='') {
					$inputId = $this->uuid->v4();
					$inputNoRekaman = $this->m_tes->getNoTes($inputPlant, $inputTglTes, $inputTglTes1, $inputTahap);
					if ($inputTahap == '1') {
						$parsingData = array('id' =>$inputId,'no_rek'=>$inputNoRekaman,'tgl_tes'=>date("Y-m-d", strtotime($inputTglTes)),'jenis'=>$inputJenis,'tempat'=>$inputPlant,'created_at'=>$tanggal,'status'=>'Open');
						$data = $this->m_process_data->addData("tes_tahap_1",$parsingData);
					}else{
						$parsingData = array('id' =>$inputId,'no_rek'=>$inputNoRekaman,'jenis'=>$inputJenis,'tempat'=>$inputPlant,'jadwal_h1_tgl'=>date("Y-m-d", strtotime($inputTglTes1)),'jadwal_h2_tgl'=>date("Y-m-d", strtotime($inputTglTes2)),'jadwal_h3_tgl'=>date("Y-m-d", strtotime($inputTglTes3)),'created_at'=>$tanggal,'status'=>'Open');
						$data = $this->m_process_data->addData("tes_tahap_2",$parsingData);
					}
					
				}else{
					if ($inputTahap == '1') {
						$parsingData = array('tgl_tes'=>date("Y-m-d", strtotime($inputTglTes)),'jenis'=>$inputJenis,'tempat'=>$inputPlant,'updated_at'=>$tanggal);
						$data = $this->m_process_data->updateData('tes_tahap_1',$parsingData, array('id' => $inputId));	
					}else{
						$parsingData = array('jenis'=>$inputJenis,'tempat'=>$inputPlant,'jadwal_h1_tgl'=>date("Y-m-d", strtotime($inputTglTes1)),'jadwal_h2_tgl'=>date("Y-m-d", strtotime($inputTglTes2)),'jadwal_h3_tgl'=>date("Y-m-d", strtotime($inputTglTes3)),'updated_at'=>$tanggal);
						$data = $this->m_process_data->updateData('tes_tahap_2',$parsingData, array('id' => $inputId));
					}
					
				}

				if ($data == true) {
					$data= true;
					$status = 'success';
					$message='Berhasil Menyimpan Data Jadwal';
					$sub_message='';
				}
			}
		}else{
			$data= true;
			$status = 'warning';
			$message='Anda Tidak Memiliki Akses';
			$sub_message='Segera Login Terlebih Dahulu';
		}
		$response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message, 'status'=>$status );
		echo json_encode($response);
	}
	public function hapusData($value='')
	{
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		if (hash_verified($setToken,$this->session->userdata("token"))) {
			$id = $this->input->post("id");
			$tahap = $this->input->post("tahap");
			$tabel = $tahap == '1'?'tes_tahap_1':'tes_tahap_2';
			$data = $this->m_process_data->deleteData($tabel,$id,'id');
			if ($data == true) {
				$message = 'Berhasil Menghapus Data';
				$sub_message = '';
				$status = 'success';
			}
		}else{
			$data= true;
			$status = 'warning';
			$message='Anda Tidak Memiliki Akses';
			$sub_message='Segera Login Terlebih Dahulu';
		}
		$response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message, 'status'=>$status );
		echo json_encode($response);
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
	      0 => 'lamaran.created_at',
	      1 => 'nip',
	      2 => 'nama',
	      3 => 'jenis_kelamin',
	      4 => 'sub',
	      5 => 'type'
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
			

	    $filTahap = $this->input->post("filTahap");
	    if ($filTahap == '1') {
	    	$this->db->where("test_id IS NULL");
	    }else{
	    	$this->db->where("test_id_2 IS NULL");
	    	$this->db->where("test_id IS NOT NULL");
	    }
	    $this->db->limit($length, $start);

	    $pelamar = $this->m_tes->getDataPelamar();
	    $data = array();
	    $i = $start+1;
	    foreach ($pelamar->result() as $rows) {
	      $data[] = array(
	        $rows->nip,
	        $rows->nama,
	        $rows->jenis_kelamin,
	        $rows->sub,
	        $rows->type,
	      	'<button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1 addPelamar" type="button" lamaran="'.$rows->lamaran_id.'">
             <i class="bi bi-person-plus"></i>
            </button>',
	      );

	      $i++;
	    }
	    $totalPelamar = $this->totalPelamar($filTahap);
	    $output = array(
	      "draw" => $draw,
	      "recordsTotal" => $totalPelamar,
	      "recordsFiltered" => $totalPelamar,
	      "data" => $data
	    );
	    echo json_encode($output);
	    exit();		

	}
	public function totalPelamar($filTahap)
	{
		if ($filTahap == '1') {
	    	$this->db->where("test_id IS NULL");
	    	$this->db->where("test_id_2 IS NULL");
	    }else{
	    	$this->db->where("test_id_2 IS NULL");
	    	$this->db->where("test_id IS NOT NULL");
	    }
		$query = $this->m_tes->getTotalPelamar();
	    
	    $result = $query->row();
	    if (isset($result))
	      return $result->num;
	    return 0;
	}

	public function getDataPesertaTes()
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
	      0 => 'lamaran.created_at',
	      1 => 'nip',
	      2 => 'nama',
	      3 => 'jenis_kelamin',
	      4 => 'sub',
	      5 => 'type'
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
			
	    $filTahap = $this->input->post("filTahap");
	    $tesId = $this->input->post("tesId");
	    if ($filTahap == '1') {
	    	$this->db->where("test_id",$tesId);
	    	$this->db->limit($length, $start);
		    $pelamar = $this->m_tes->getDataPesertaTes();
	    }else{
	    	$this->db->where("test_id_2",$tesId);
			$this->db->limit($length, $start);
		    $pelamar = $this->m_tes->getDataPesertaTes2();
	    }
	    
	    $data = array();
	    $i = $start+1;
	    foreach ($pelamar->result() as $rows) {
	      $data[] = array(
	      	$rows->hasil_tes == null ? '<button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1 deletePelamar" type="button" lamaran="'.$rows->lamaran_id.'">
             <i class="bi bi-trash"></i>
            </button>':'',
	        $rows->nip,
	        $rows->nama,
	        $rows->jenis_kelamin,
	        $rows->sub,
	        $rows->type,
	      );

	      $i++;
	    }
	    $totalPeserta = $this->totalPeserta($tesId, $filTahap);
	    $output = array(
	      "draw" => $draw,
	      "recordsTotal" => $totalPeserta,
	      "recordsFiltered" => $totalPeserta,
	      "data" => $data
	    );
	    echo json_encode($output);
	    exit();	
	}
	public function totalPeserta($tesId, $filTahap)
	{
		if ($filTahap == '1') {
	    	$this->db->where("test_id",$tesId);
	    }else{
	    	$this->db->where("test_id_2",$tesId);
	    }
		$query = $this->m_tes->getJmlPesertaTes();
	    
	    $result = $query->row();
	    if (isset($result))
	      return $result->num;
	    return 0;
	}
	public function addPelamar()
	{
		$lamaran = $this->input->post("lamaran");
		$tesId = $this->input->post("tesId");
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		$filTahap = $this->input->post("filTahap");
		$fieldTes = $filTahap == '2' ? 'test_id_2' : 'test_id';
		if (hash_verified($setToken,$this->session->userdata("token"))) {
			$data = $this->m_process_data->updateData('lamaran',array($fieldTes=>$tesId), array('id' => $lamaran));
			if ($data ==true) {
				$status = 'success';
				$message = 'Berhasil Menambah Peserta Tes';
			}
		}else{
			$data = true;
	 		$status = 'warning';
	 		$message = 'Anda tidak memiliki akses untuk menambah data peserta';
		}
		$response = array('status' =>$status ,'data'=>$data,'message'=>$message );
		echo json_encode($response);
	}
	public function deletePeserta()
	{
		$lamaran = $this->input->post("lamaran");
		$filTahap = $this->input->post("filTahap");
		$fieldTes = $filTahap == '2' ? 'test_id_2' : 'test_id';
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		if (hash_verified($setToken,$this->session->userdata("token"))) {
			$data = $this->db->query("UPDATE lamaran SET $fieldTes = NULL WHERE id = '$lamaran'");
			if ($data ==true) {
				$status = 'success';
				$message = 'Berhasil Menghapus Peserta Tes';
			}
		}else{
			$data = true;
	 		$status = 'warning';
	 		$message = 'Anda tidak memiliki akses untuk menghapus data peserta';
		}
		$response = array('status' =>$status ,'data'=>$data,'message'=>$message );
		echo json_encode($response);
	}

	public function peserta_tes()
	{
		$data['side'] = 'tes-peserta_tes';
		$data['menu'] = 'Tes';
		$data['sub_menu1'] = 'List Peserta';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['page'] = 'List Peserta Tes';
		$data['plant'] = $this->m_data_master->getPlant()->result();
		$this->load->view("tes/list_peserta/index", $data);
	}
	public function getListJadwal()
	{
		$draw = intval($this->input->post("draw"));
	    $start = intval($this->input->post("start"));
	    $length = intval($this->input->post("length"));
	    $order = $this->input->post("order");
	    $search = $this->input->post("seach");
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
	      0 => 'jadwal.created_at',
	      1 => 'jadwal.created_at',
	      2 => 'tahap',
	      3 => 'jadwal.created_at',
	      4 => 'no_rek',
	      5 => 'jadwal.jenis',
	      6 => 'tgl_tes',
	      7 => 'tgl_tes2',
	      8 => 'tgl_tes3'
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
	    $search = $this->input->post("inputSearch");
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
	    $pelamar = $this->m_tes->getJadwal();
	    $data = array();
	    $i = $start+1;
	    foreach ($pelamar->result() as $rows) {
	    	$tglTes = $rows->tahap == "2" ? $rows->tgl_tes.", ".$rows->tgl_tes2.", ".$rows->tgl_tes3:$rows->tgl_tes;
	      $data[] = array(
	        '<button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1 btnPilih" type="button" data="'.$rows->id.'" tahap="'.$rows->tahap.'" norek="'.$rows->no_rek.'" jenis="'.$rows->jenis.'" tempat="'.$rows->tempat.'" tglTes="'.$tglTes.'" tgl="'.date("Y-m-d", strtotime($rows->created_at)).'">
              <i class="cs-check" data-acorn-size="15"></i>
            </button>',
	        date("Y-m-d", strtotime($rows->created_at)),
	        $rows->tahap,
	        $rows->no_rek,
	        $rows->jenis,
	        $rows->tahap == "2"?'H 1. '.$rows->tgl_tes.'<br>H 2. '.$rows->tgl_tes2.'<br>H 3. '.$rows->tgl_tes3:$rows->tgl_tes,
	        $rows->tempat
	      );

	      $i++;
	    }
	    $totalJadwal = $this->totalJadwal();
	    $output = array(
	      "draw" => $draw,
	      "recordsTotal" => $totalJadwal,
	      "recordsFiltered" => $totalJadwal,
	      "data" => $data
	    );
	    echo json_encode($output);
	    exit();
	}
	public function getListPeserta()
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
	      0 => 'pelamar.nama',
	      1 => 'lamaran.nip',
	      2 => 'pelamar.no_ktp',
	      3 => 'pelamar.alamat_ktp',
	      4 => 'pelamar.tgl_lahir',
	      5 => 'pelamar.jenis_kelamin',
	      6 => 'lamaran.jenis',
	      7 => 'lamaran.sub',
	      8 => 'lamaran.type',
	      9=>'lamaran.created_at'
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
	    $search = $this->input->post("inputSearch");
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
	    $inputTahap = $this->input->post("inputTahap");
	    $inputId = $this->input->post("inputId");
	    if ($inputTahap == '1') {
	    	$this->db->where("test_id", $inputId);
	    }else{
	    	$this->db->where("test_id_2", $inputId);
	    }
	    $pelamar = $this->m_tes->getListPesertaByNoRekaman();
	    $data = array();
	    $i = $start+1;
	    foreach ($pelamar->result() as $rows) {
	    	$data[] = array(
	        $i,
	        '<a href="'.base_url().'tes/penilaian/'.$rows->id.'/'.$inputId.'" class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" target="_blank">Penilaian</a>',
	        $rows->nip,
	        $rows->nama,
	        $rows->no_ktp,
	        $rows->alamat_ktp,
	        $rows->tgl_lahir,
	        $rows->jenis_kelamin,
	        $rows->jenis,
	        $rows->sub,
	        $rows->type,
	        $rows->hasil_tes,
	      );

	      $i++;
	    }
	    $totalJadwal = $this->totalListPesertaByNoRekaman($inputTahap, $inputId);
	    $output = array(
	      "draw" => $draw,
	      "recordsTotal" => $totalJadwal,
	      "recordsFiltered" => $totalJadwal,
	      "data" => $data
	    );
	    echo json_encode($output);
	    exit();
	}

	public function totalListPesertaByNoRekaman($inputTahap, $inputId)
	{
		if ($inputTahap == '1') {
	    	$this->db->where("test_id", $inputId);
	    }else{
	    	$this->db->where("test_id_2", $inputId);
	    }
		$query = $this->m_tes->getJmlListPesertaByNoRekaman();
	    
	    $result = $query->row();
	    if (isset($result))
	      return $result->num;
	    return 0;
	}
	public function getTotalJmlPeserta()
	{
		$id = $this->input->get("id");
		$cekTahap = $this->db->query("SELECT tahap FROM jadwal WHERE id = '$id'")->row();
		$field = $cekTahap->tahap == '2' ? 'test_id_2':'test_id';
		$data = $this->m_tes->getTotalJmlPeserta($id, $field);
		if ($data->num_rows()>0) {
			$get = $data->row();
			$response = array('jmlPeserta' =>$get->jml_peserta,'jmlLulus'=>$get->jml_lulus, 'jmlTidakLulus'=>$get->jml_tidak_lulus);
		}else{
			$response = array('jmlPeserta' =>0,'jmlLulus'=>0, 'jmlTidakLulus'=>0);
		}
		
		echo json_encode($response);
	}
	public function penilaian($lamaranId, $tesId)
	{
		$data['side'] = 'tes-peserta_tes';
		$data['menu'] = 'Tes';
		$data['sub_menu1'] = 'List Peserta';
		$data['sub_menu2'] = 'Penilaian';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = base_url().'tes/peserta_tes';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Penilaian';
		$data['setting'] = $this->m_tes->getSettingTes($tesId)->result();
		$data['pelamar'] = $this->m_tes->getListPesertaByNoRekaman()->row();
		$jadwal = $this->db->query("SELECT * FROM jadwal WHERE id = '$tesId'")->row();
		$data['tes'] = $jadwal;
		if ($jadwal->tahap == '1') {
			$data['rencana_tes'] = $jadwal->tgl_tes;
			$data['nilai'] = $this->m_tes->getDataPenilaianPerCalonTahap1($tesId, $lamaranId)->row();
			$this->load->view("tes/penilaian/operator-tahap-1", $data);
		}else{
			$data['rencana_tes_1'] = $jadwal->tgl_tes;
			$data['rencana_tes_2'] = $jadwal->tgl_tes2;
			$data['rencana_tes_3'] = $jadwal->tgl_tes3;
			$data['nilai'] = $this->m_tes->getDataPenilaianPerCalonTahap2($tesId, $lamaranId)->row();
			$this->load->view("tes/penilaian/tahap-2", $data);	
		}
		
	}
	public function savePenilaianTahap1Operator($value='')
	{
		// $result= $this->input->post("result"); 
		// $jenis= $this->input->post("jenis"); 
		// $urut= $this->input->post("urut"); 
		// $kategori= $this->input->post("kategori"); 
		// $standar= $this->input->post("standar"); 
		// $tipe= $this->input->post("tipe"); 
		// $lamaran= $this->input->post("lamaran"); 
		// $tes= $this->input->post("tes");
		// $cekData = $this->db->query("SELECT id FROM $kategori WHERE lamaran_id = '$lamaran' AND tes_tahap_1_id = ''") 
		$inputTglTes = date("Y-m-d", strtotime($this->input->post("inputTglTes")));
		$inputKehadiran = $this->input->post("inputKehadiran");
		$inputNilai = $this->input->post("inputNilai");
		$inputId = $this->input->post("inputId");
		$inputIdLamaran = $this->input->post("inputIdLamaran");
		$inputIdTes = $this->input->post("inputIdTes");
		$inputKeterangan = $this->input->post("inputKeterangan");
		$tanggal = $this->uuid->getDateNow();
		$inputHasilTes = $this->input->post("inputHasilTes");
		if ($inputTglTes == '') {
			$data = true;
			$message = "Isi Tanggal Tes Terlebih Dahulu!";
			$sub_message = "";
			$fokus = "#inputTglTes";
			$status = 'warning';
		}else{
			$cekData = $this->db->query("SELECT id FROM tes_detail_1 WHERE tes_tahap_1_id = '$inputIdTes' AND lamaran_id ='$inputIdLamaran'");
			if ($cekData->num_rows()==0) {
				$id = $this->uuid->v4();
				$parsingData = array('id' =>$id,'tes_tahap_1_id'=>$inputIdTes,'lamaran_id'=>$inputIdLamaran,'tgl_tes'=>$inputTglTes,'kehadiran'=>$inputKehadiran,'created_at'=>$tanggal,'hasil_tes'=>$inputHasilTes);
				$data = $this->m_process_data->addData("tes_detail_1",$parsingData);
			}else{
				$parsingData = array('tgl_tes'=>$inputTglTes,'kehadiran'=>$inputKehadiran,'updated_at'=>$tanggal,'hasil_tes'=>$inputHasilTes);
				$data = $this->m_process_data->updateData('tes_detail_1',$parsingData, array('tes_tahap_1_id'=>$inputIdTes,'lamaran_id'=>$inputIdLamaran));
			}
			if ($data == true && $inputKehadiran == 'Hadir') {
				for ($i=0; $i <count($inputId) ; $i++) { 
					$standarId = $inputId[$i];
					$getData = $this->db->query("SELECT field, tabel, nilai FROM standar_tes WHERE id = $standarId")->row();
					$nilai = $getData->nilai;
					$field= $getData->field;
					$tabel = $getData->tabel;
					if ($inputNilai[$i] == '') {
						$hasil = 'X';
					}else{
						$hasil = $inputNilai[$i] >=$nilai ? 'Lulus':'Tidak Lulus';
					}
					if ($field != 'komitmen_ttd_pernyataan') {
						$hasilNilai = $inputNilai[$i] == '' ? 0 : $inputNilai[$i];
						$parsingNilai = array('nilai_'.$field=>$inputNilai[$i],'tes_'.$field=>$hasil);
						$data = $this->m_process_data->updateData('tes_detail_1',$parsingNilai, array('tes_tahap_1_id'=>$inputIdTes,'lamaran_id'=>$inputIdLamaran));
					}
				}
				
				if ($data == true) {
					$message = "Berhasil Mengisi Nilai!";
					$sub_message = "";
					$fokus = "";
					$status = 'success';
				}		
			}elseif($data == true && $inputKehadiran == 'Tidak Hadir'){
				$message = "Data Berhasil Disimpan";
				$sub_message = "Calon Karyawan Tidak Hadir";
				$fokus = "";
				$status = 'success';
			}	

		}
		$response = array('data' =>$data ,'status'=>$status,'message'=>$message,'sub_message'=>$sub_message,'fokus'=>$fokus );
		echo json_encode($response);
	}
	public function savePenilaianTahap2Operator($value='')
	{
		$inputTglTes1 = date("Y-m-d", strtotime($this->input->post("inputTglTes1")));
		$inputTglTes2 = date("Y-m-d", strtotime($this->input->post("inputTglTes2")));
		$inputTglTes3 = date("Y-m-d", strtotime($this->input->post("inputTglTes3")));
		$inputKehadiran1 = $this->input->post("inputKehadiran1");
		$inputKehadiran2 = $this->input->post("inputKehadiran2");
		$inputKehadiran3 = $this->input->post("inputKehadiran3");
		$inputNilai = $this->input->post("inputNilai");
		$inputId = $this->input->post("inputId");
		$inputIdLamaran = $this->input->post("inputIdLamaran");
		$inputIdTes = $this->input->post("inputIdTes");
		$inputKeterangan = $this->input->post("inputKeterangan");
		$tanggal = $this->uuid->getDateNow();
		$inputHasilTes = $this->input->post("inputHasilTes");
		if ($inputTglTes1 == '' && $inputKehadiran1 == 'Hadir') {
			$data = true;
			$message = "Isi Tanggal Tes H 1 Terlebih Dahulu!";
			$sub_message = "";
			$fokus = "#inputTglTes";
			$status = 'warning';
		}elseif ($inputTglTes2 == '' && $inputKehadiran2 == 'Hadir') {
			$data = true;
			$message = "Isi Tanggal Tes H 2 Terlebih Dahulu!";
			$sub_message = "";
			$fokus = "#inputTglTes";
			$status = 'warning';
		}elseif ($inputTglTes3 == '' && $inputKehadiran3 == 'Hadir') {
			$data = true;
			$message = "Isi Tanggal Tes H 3 Terlebih Dahulu!";
			$sub_message = "";
			$fokus = "#inputTglTes";
			$status = 'warning';
		}else{
			$cekData = $this->db->query("SELECT id FROM tes_detail_2 WHERE tes_tahap_2_id = '$inputIdTes' AND lamaran_id ='$inputIdLamaran'");
			if ($cekData->num_rows()==0) {
				$id = $this->uuid->v4();
				$parsingData = array('id' =>$id,'tes_tahap_2_id'=>$inputIdTes,'lamaran_id'=>$inputIdLamaran,'tgl_h1'=>$inputTglTes1,'jadwal_h1_kehadiran'=>$inputKehadiran1,'tgl_h2'=>$inputTglTes2,'jadwal_h2_kehadiran'=>$inputKehadiran2,'tgl_h3'=>$inputTglTes3,'jadwal_h3_kehadiran'=>$inputKehadiran3,'created_at'=>$tanggal, 'hasil_tes'=>$inputHasilTes);
				$data = $this->m_process_data->addData("tes_detail_2",$parsingData);
			}else{
				$parsingData = array('tgl_h1'=>$inputTglTes1,'jadwal_h1_kehadiran'=>$inputKehadiran1,'tgl_h2'=>$inputTglTes2,'jadwal_h2_kehadiran'=>$inputKehadiran2,'tgl_h3'=>$inputTglTes3,'jadwal_h3_kehadiran'=>$inputKehadiran3,'updated_at'=>$tanggal, 'hasil_tes'=>$inputHasilTes);
				$data = $this->m_process_data->updateData('tes_detail_2',$parsingData, array('tes_tahap_2_id'=>$inputIdTes,'lamaran_id'=>$inputIdLamaran));
			}

			if ($data == true) {
				$getHasil1 = $this->db->query("SELECT hasil_tes FROM tes_detail_1 WHERE lamaran_id = '$inputIdLamaran'");
				if ($getHasil1->num_rows()>0) {
					$dataHasil1 = $getHasil1->row();
					$hasil1 = $dataHasil1->hasil_tes;
					$hasilTes = $hasil1 == 'Lulus' && $inputHasilTes == 'Lulus' ? 'Lulus':'Tidak Lulus';
					$this->db->query("UPDATE lamaran SET hasil_tes = '$hasilTes', status_data = 'CLOSE',status='Tidak Aktif' WHERE id = '$inputIdLamaran'");
				}
				if ($inputKehadiran1 == 'Tidak Hadir' || $inputKehadiran2 == 'Tidak Hadir' || $inputKehadiran3 == 'Tidak Hadir') {
					$message = "Data Berhasil Disimpan";
					$sub_message = "Calon Karyawan Tidak Hadir";
					$fokus = "";
					$status = 'success';
				}else{
					for ($i=0; $i <count($inputId) ; $i++) { 
						$standarId = $inputId[$i];
						$getData = $this->db->query("SELECT field, tabel, nilai FROM standar_tes WHERE id = $standarId")->row();
						$nilai = $getData->nilai;
						$field= $getData->field;
						$tabel = $getData->tabel;
						if ($inputNilai[$i] == '') {
							$hasil = 'X';
						}else{
							$hasil = $inputNilai[$i] >=$nilai ? 'Lulus':'Tidak Lulus';
						}
						$hasilNilai = $inputNilai[$i] == '' ? 0 : $inputNilai[$i];
						$parsingNilai = array('nilai_'.$field=>$inputNilai[$i],'tes_'.$field=>$hasil);
						$data = $this->m_process_data->updateData('tes_detail_2',$parsingNilai, array('tes_tahap_2_id'=>$inputIdTes,'lamaran_id'=>$inputIdLamaran));
					}
					if ($data == true) {
						$message = "Berhasil Mengisi Nilai!";
						$sub_message = "";
						$fokus = "";
						$status = 'success';
					}	
				}
			}
		}
		$response = array('data' =>$data ,'status'=>$status,'message'=>$message,'sub_message'=>$sub_message,'fokus'=>$fokus );
		echo json_encode($response);
	}

}
?>