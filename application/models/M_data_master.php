<?php
	class M_data_master extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getDataPengajuan($jenis, $status)
		{
			$sql = $this->db->select("id, no_pengajuan, jenis_pengajuan, pria, wanita, recruitment_id, status")
							->from("pengajuan")
							->like('jenis_pengajuan',$jenis)
							->like('status', $status)
							->order_by("created_at",'asc')
							->get();
			return $sql;
		}
		public function getSumPengajuanSetup($id)
		{
			$sql = $this->db->select_sum("pengajuan.wanita")
							->select_sum("pengajuan.pria")
							->from('temp_pengajuan')
							->join('pengajuan','temp_pengajuan.no_pengajuan = pengajuan.no_pengajuan')
							->where("temp_pengajuan.recruitment_id",$id)
							->get();
			return $sql;
		}
		public function getSumPengajuanSetup_edit($id)
		{
			$sql = $this->db->select_sum("pengajuan.wanita")
							->select_sum("pengajuan.pria")
							->from('pengajuan')
							->where("pengajuan.recruitment_id",$id)
							->get();
			return $sql;
		}
		public function cekNoPengajuan($id)
		{
			$sql = $this->db->query("SELECT
										a.no_pengajuan
									FROM
										`temp_pengajuan` a 
									INNER JOIN
										pengajuan b ON 
									a.no_pengajuan = b.no_pengajuan
									WHERE
										a.recruitment_id = '$id' AND 
										b.recruitment_id IS NOT NULL");
			return $sql;
		}
		public function getNoRecruitment()
		{
			$tahun = date('Y');
	        $bulan = date('m');
			$gabung = "KPS/REC/".$tahun."/".$bulan."/";
			$cekNoDoc=$this->db->query("SELECT
											MAX(RIGHT(no_recruitment,3)) AS SETNODOC
										FROM
											`recruitment`
										WHERE
											tahun = '$tahun'");
			if ($cekNoDoc->num_rows()==0) {
				$URUTZERO = $gabung."001";
				$hasil= $URUTZERO;
			} else {
				foreach ($cekNoDoc->result() as $data) {
		            $zero='';
	                $length= 3;
	                $index=$data->SETNODOC;

	                for ($i=0; $i <$length-strlen($index+1) ; $i++) { 
	                    $zero = $zero.'0';
	                }
	                $URUTDOCNO = $gabung.$zero.($index+1);
	                
	                $hasil=$URUTDOCNO;
		        }	
			}
			
			
	        return $hasil;
		}
		public function updatePengajuan($id)
		{
			$sql = "UPDATE pengajuan INNER JOIN temp_pengajuan ON pengajuan.no_pengajuan = temp_pengajuan.no_pengajuan SET status = 'CLOSE' WHERE temp_pengajuan.recruitment_id = '$id'";
			return $this->db->query($sql);
		}
		public function getPlant()
		{
			$sql = "SELECT * FROM `plant` ORDER BY id ASC";
			return $this->db->query($sql);
		}
		public function getDepartemen()
		{
			return $this->db->select("nama_departemen")
							->from("departemen")
							->order_by("nama_departemen","asc")
							->get();
		}
		public function getJabatan()
		{
			return $this->db->select("nama_jabatan")
							->from("jabatan")
							->order_by("nama_jabatan","asc")
							->get();
		}
		public function default_standar_tes($jenis)
		{
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							id as pk_default_id,
							objek as default_objek,
							tes as default_tes,
							field as default_field,
							tabel as default_tabel,
							tahap as default_tahap,
							urut
						FROM
							`standar_tes_default`
					)Q1
					LEFT JOIN 
					(
						SELECT
							*
						FROM
							standar_tes
						WHERE
							jenis = '$jenis'
					)Q2 ON Q1.pk_default_id = Q2.default_id
					ORDER BY default_tahap ASC, urut ASC, pk_default_id ASC ";
			return $this->db->query($sql);
		}
		public function getDataAkun($jenis, $where)
		{
			$sql = "SELECT
						* 
					FROM
						`user`
					WHERE
						jenis LIKE '%$jenis'
					ORDER BY created_at DESC
					$where";
			return $this->db->query($sql);
		}
		public function getRequirement($id)
		{
			return $this->db->query("SELECT * FROM requirement WHERE recruitment_id = '$id' ORDER BY created_at ASC");
		}
		public function getDataSetupById($id)
		{
			$sql = "SELECT
						Q1.id,
						IFNULL(Q2.pria,0) as referensi_pria,
						IFNULL(Q2.wanita,0) as referensi_wanita,
						IFNULL(Q3.pria,0) as eksternal_pria,
						IFNULL(Q3.wanita,0) as eksternal_wanita,
						IFNULL(Q4.pria,0) as umum_pria,
						IFNULL(Q4.wanita,0) as umum_wanita
					FROM
					(
						SELECT
							a.id
						FROM
							`recruitment` a
						WHERE
							id = '$id'
					)Q1
					LEFT JOIN 
					(
						SELECT
							SUM(pria) as pria,
							SUM(wanita) as wanita,
							recruitment_id
						FROM
							setup 
						WHERE
							alokasi = 'Referensi' AND
							recruitment_id = '$id'
						GROUP BY recruitment_id
					)Q2 ON Q1.id = Q2.recruitment_id
					LEFT JOIN 
					(
						SELECT
							SUM(pria) as pria,
							SUM(wanita) as wanita,
							recruitment_id
						FROM
							setup 
						WHERE
							alokasi = 'Eksternal' AND
							recruitment_id = '$id'
						GROUP BY recruitment_id
					)Q3 ON Q1.id = Q3.recruitment_id
					LEFT JOIN 
					(
						SELECT
							SUM(pria) as pria,
							SUM(wanita) as wanita,
							recruitment_id
						FROM
							setup 
						WHERE
							alokasi = 'Umum' AND
							recruitment_id = '$id'
						GROUP BY recruitment_id
					)Q4 ON Q1.id = Q4.recruitment_id";
			return $this->db->query($sql);
		}
		public function getDataLamaranMasuk($departemen, $jabatan, $plant, $search, $where)
		{
			$sql ="SELECT
						*
					FROM
					(
						SELECT
							Q1.*
						FROM
						(
							SELECT
								*
							FROM
							(
								SELECT
									a.*,
									no_ktp,
									nama,
									email,
									no_hp,
									tgl_lahir,
									jenis_kelamin,
									status_pernikahan,
									jml_anak,
									alamat_ktp,
									alamat_domisili
								FROM
									`lamaran_masuk` a 
								INNER JOIN
									pelamar b ON a.pelamar_id = b.id
								UNION 
								SELECT
									Q1.*
								FROM
								(
									SELECT
										'',
										a.id,
										'Operator',
										'Produksi',
										a.created_at,
										a.updated_at,
										'OPEN',
										'Plant 1 Cipacing',
										null,
										a.no_ktp,
										a.nama,
										a.email,
										a.no_hp,
										a.tgl_lahir,
										a.jenis_kelamin,
										a.status_pernikahan,
										a.jml_anak,
										a.alamat_ktp,
										a.alamat_domisili
									FROM
										pelamar a 
									INNER JOIN
										user b ON 
									a.user_id = b.id 
									WHERE
										b.jenis = 'Eksternal' AND foto IS NOT NULL AND a.nama IS NOT NULL AND a.email IS NOT NULL AND no_ktp IS NOT NULL AND cv IS NOT NULL AND ijazah_terakhir IS NOT NULL AND surat_lamaran IS NOT NULL AND ktp IS NOT NULL
								)Q1
								LEFT JOIN 
								(
									SELECT
										id,
										pelamar_id
									FROM
										lamaran
									WHERE
										`status` = 'Aktif' OR 
										hasil_tes= 'Lulus'
								)Q2 ON Q1.id = Q2.pelamar_id
								WHERE
									Q2.id IS NULL
							)Q1	
							WHERE
								status = 'OPEN' AND 
								departemen LIKE '%$departemen' AND 
								jabatan LIKE '%$jabatan' AND 
								plant LIKE '%$plant'		
						)Q1
						LEFT JOIN 
						(
							SELECT
								id,
								no_ktp,
								tgl_lahir
							FROM
								karyawan_resign
							WHERE
								kategori = 'Blacklist'
						)Q2 ON Q1.no_ktp = Q2.no_ktp AND Q1.tgl_lahir = Q2.tgl_lahir
						LEFT JOIN 
						(
							SELECT
								pelamar_id
							FROM
								lamaran
							WHERE
								status = 'Aktif'
						)Q3 ON Q1.pelamar_id = Q3.pelamar_id
						WHERE Q2.id IS NULL AND Q3.pelamar_id IS NULL
					)Q1
					WHERE
						nama LIKE '%$search%' OR 
						no_ktp LIKE '%$search%' OR 
						nama LIKE '%$search%' OR 
						email LIKE '%$search%' OR 
						no_hp LIKE '%$search%'
					ORDER BY created_at DESC
					$where";
			return $this->db->query($sql);
		}
		public function getDataRecruitment($search)
		{
			$sql = "SELECT
						Q1.*,
						referensi_pria,
						referensi_wanita,
						umum_pria,
						umum_wanita,
						eksternal_pria,
						eksternal_wanita
					FROM
					(
						SELECT
							* 
						FROM
							`recruitment`
						WHERE
							status = 'OPEN' AND 
							last_apply_date >= CURDATE()
					)Q1
					LEFT JOIN 
					(
						SELECT
							recruitment_id,
							pria as referensi_pria,
							wanita as referensi_wanita 
						FROM 
							setup
						WHERE
							alokasi = 'Referensi'
					)Q2 On Q1.id = Q2.recruitment_id
					LEFT JOIN 
					(
						SELECT
							recruitment_id,
							pria as umum_pria,
							wanita as umum_wanita 
						FROM 
							setup
						WHERE
							alokasi = 'Umum'
					)Q3 On Q1.id = Q3.recruitment_id
					LEFT JOIN 
					(
						SELECT
							recruitment_id,
							pria as eksternal_pria,
							wanita as eksternal_wanita 
						FROM 
							setup
						WHERE
							alokasi = 'Eksternal'
					)Q4 On Q1.id = Q4.recruitment_id
					WHERE
						no_recruitment LIKE '%$search%' OR 
						jenis LIKE '%$search%' OR 
						shift LIKE '%$search%' OR 
						tempat LIKE '%$search%' OR 
						departemen LIKE '%$search%' OR 
						jabatan LIKE '%$search%'
					ORDER BY created_at DESC
					LIMIT 10 ";
			return $this->db->query($sql);
		}
	}
?>
