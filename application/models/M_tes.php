<?php
	class M_tes extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getJadwal()
		{
			$sql = $this->db->select("jadwal.*, jml_lamaran ")
							->from("jadwal")
							->join("jml_peserta",'jadwal.id = jml_peserta.test_id AND jadwal.tahap = jml_peserta.tahap_tes',"left")
							->order_by('id',"desc")
							->get();
			return $sql;
		}
		public function getJmlJadwal()
		{
			$sql = $this->db->select("count(*) as num")
							->from("jadwal")
							->order_by('id',"desc")
							->get();
			return $sql;
		}
		public function getNoTes($plant, $tglTes, $tglTes1, $tahap)
		{
			if ($tahap == '1') {
				$tahun = $tglTes == '' ? date("Y") : date("Y", strtotime($tglTes));
			}else{
				$tahun = $tglTes1 == '' ? date("Y") : date("Y", strtotime($tglTes1));
			}
			
			$gabung = "KPS/TES/".str_replace(' ', '', $plant)."/".$tahun."/";
			$sql = $this->db->query("SELECT
										MAX(RIGHT(no_rek,3)) AS NO_URUT
									FROM
									(
										SELECT
											no_rek
										FROM
											tes_tahap_1
										WHERE
											YEAR(tgl_tes) = $tahun
										UNION
										SELECT
											no_rek
										FROM
											tes_tahap_2
										WHERE
											YEAR(jadwal_h1_tgl) = $tahun
									)Q1");
			if ($sql->num_rows()==0) {
				$hasil = $gabung."001";
			} else {
				foreach ($sql->result() as $data) {
		            $zero='';
	                $length= 3;
	                $index=$data->NO_URUT;

	                for ($i=0; $i <$length-strlen($index+1) ; $i++) { 
	                    $zero = $zero.'0';
	                }
	                $hasil = $gabung.$zero.($index+1);
		        }	
			}
	        return $hasil;
		}
		public function getDataPelamar()
		{
			$sql = $this->db->select("lamaran.id as lamaran_id, lamaran.pelamar_id, lamaran.recruitment_id, lamaran.nip, lamaran.jenis, lamaran.sub, lamaran.type, pelamar.nama, pelamar.jenis_kelamin, lamaran.created_at")
							->from("lamaran")
							->join('pelamar','lamaran.pelamar_id = pelamar.id')
							->where("status_data",'OPEN')
							->get();
			return $sql;
		}
		public function getTotalPelamar()
		{
			$sql = $this->db->select("count(*) as num")
							->from("lamaran")
							->join('pelamar','lamaran.pelamar_id = pelamar.id')
							->where("status_data",'OPEN')
							->where("test_id IS NULL")
							->get();
			return $sql;
		}
		public function getDataPesertaTes()
		{
			$sql = $this->db->select("lamaran.id as lamaran_id, lamaran.pelamar_id, lamaran.recruitment_id, lamaran.nip, lamaran.jenis, lamaran.sub, lamaran.type, pelamar.nama, pelamar.jenis_kelamin, lamaran.created_at, tes_detail_1.hasil_tes")
							->from("lamaran")
							->join('pelamar','lamaran.pelamar_id = pelamar.id')
							->join("tes_detail_1",'lamaran.id = tes_detail_1.lamaran_id',"left")
							->where("status_data",'OPEN')
							->get();
			return $sql;
		}
		public function getDataPesertaTes2()
		{
			$sql = $this->db->select("lamaran.id as lamaran_id, lamaran.pelamar_id, lamaran.recruitment_id, lamaran.nip, lamaran.jenis, lamaran.sub, lamaran.type, pelamar.nama, pelamar.jenis_kelamin, lamaran.created_at, tes_detail_2.hasil_tes")
							->from("lamaran")
							->join('pelamar','lamaran.pelamar_id = pelamar.id')
							->join("tes_detail_2",'lamaran.id = tes_detail_2.lamaran_id',"left")
							->where("status_data",'OPEN')
							->get();
			return $sql;
		}
		public function getJmlPesertaTes()
		{
			$sql = $this->db->select("count(*) as num")
							->from("lamaran")
							->join('pelamar','lamaran.pelamar_id = pelamar.id')
							->where("status_data",'OPEN')
							->get();
			return $sql;
		}
		public function getListPesertaByNoRekaman()
		{
			$sql = $this->db->select("lamaran.created_at, lamaran.id, lamaran.pelamar_id, lamaran.nip, pelamar.nama, pelamar.no_ktp, pelamar.alamat_ktp, pelamar.tgl_lahir, pelamar.jenis_kelamin, lamaran.jenis, lamaran.sub, lamaran.type, lamaran.hasil_tes, pelamar.foto")
							->from("lamaran")
							->join("pelamar","lamaran.pelamar_id = pelamar.id")
							->where('status_data','OPEN')
							->order_by("lamaran.created_at","ASC")
							->get();
			return $sql;
		}
		public function getJmlListPesertaByNoRekaman()
		{
			$sql = $this->db->select("count(*) as num")
							->from("lamaran")
							->join("pelamar","lamaran.pelamar_id = pelamar.id")
							->get();
			return $sql;
		}
		public function getTotalJmlPeserta($id, $field)
		{
			$sql = "SELECT
						Q1.jml_peserta,
						IFNULL(Q2.jml_peserta,0)as jml_lulus,
						IFNULL(Q3.jml_peserta,0) as jml_tidak_lulus
					FROM
					(
						SELECT
							COUNT(id) as jml_peserta,
							$field as id
						FROM
							lamaran
						WHERE
							$field IS NOT NULL AND 
							$field = '$id'
						GROUP BY $field
					)Q1
					LEFT JOIN
					(
						SELECT
							COUNT(id) as jml_peserta,
							$field as id
						FROM
							lamaran
						WHERE
							$field IS NOT NULL AND 
							hasil_tes = 'Lulus'
						GROUP BY $field
					)Q2 ON Q1.id = Q2.id
					LEFT JOIN 
					(
						SELECT
							COUNT(id) as jml_peserta,
							$field as id
						FROM
							lamaran
						WHERE
							$field IS NOT NULL
						AND hasil_tes = 'Tidak Lulus'
						GROUP BY $field
					)Q3 ON Q1.id = Q3.id";
			return $this->db->query($sql);
		}
		public function getSettingTes($id)
		{
			$sql = $this->db->select("standar_tes.*")
							->from("jadwal")
							->join("standar_tes","jadwal.tahap = standar_tes.tahap AND jadwal.jenis = standar_tes.jenis")
							->where("jadwal.id",$id)
							->order_by("standar_tes.id","ASC")
							->get();
			return $sql;
		}
		public function getDataPenilaianPerCalonTahap1($tes, $lamaran)
		{
			$sql = $this->db->query("SELECT
										*
									FROM
									(
										SELECT
											lamaran.id as id_lamaran
										FROM
											lamaran
										WHERE
											id = '$lamaran'
									)Q1
									LEFT JOIN
									(
										SELECT
											*
										FROM
											tes_detail_1
										WHERE
											tes_tahap_1_id = '$tes'
									)Q2 ON Q1.id_lamaran = Q2.lamaran_id");
			return $sql;
		}
		public function getDataPenilaianPerCalonTahap2($tes, $lamaran)
		{
			$sql = $this->db->query("SELECT
										*
									FROM
									(
										SELECT
											lamaran.id as id_lamaran
										FROM
											lamaran
										WHERE
											id = '$lamaran'
									)Q1
									LEFT JOIN
									(
										SELECT
											*
										FROM
											tes_detail_2
										WHERE
											tes_tahap_2_id = '$tes'
									)Q2 ON Q1.id_lamaran = Q2.lamaran_id");
			return $sql;
		}
	}	
?>