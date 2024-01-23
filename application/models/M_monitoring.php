<?php
	class M_monitoring extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getDataMonitoringRecruitment($tahun, $status,$search, $where)
		{
			$sql = "SELECT
						Q1.*,
						kebutuhan_pria,
						kebutuhan_wanita,
						kebutuhan_total,
						outstanding_pria,
						outstanding_wanita,
						IFNULL(outstanding_pria,0) + IFNULL(outstanding_wanita,0) as outstanding_total,
						lulus_pria,
						lulus_wanita,
						IFNULL(lulus_pria,0) + IFNULL(lulus_wanita,0) as lulus_total
					FROM
					(
						SELECT
							id,
							no_recruitment,
							jenis,
							bulan,
							tahun,
							IFNULL(updated_at,created_at) AS tgl,
							status
						FROM
							recruitment
						WHERE
							tahun = $tahun
					)Q1
					LEFT JOIN
					(
						SELECT
							recruitment_id,
							SUM(pria) as kebutuhan_pria,
							SUM(wanita) as kebutuhan_wanita,
							SUM(pria) + SUM(wanita) as kebutuhan_total
						FROM
							setup
						GROUP BY recruitment_id
					)Q2 ON Q1.id = Q2.recruitment_id
					LEFT JOIN 
					(
						SELECT
							COUNT(a.id) as outstanding_pria,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN
							pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							status = 'Aktif' AND 
							status_data = 'OPEN' AND 
							hasil_tes IS NULL AND 
							jenis_kelamin = 'Laki-laki'
						GROUP BY
							recruitment_id
					)Q3 ON Q1.id = Q3.recruitment_id
					LEFT JOIN 
					(
						SELECT
							COUNT(a.id) as outstanding_wanita,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN
							pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							status = 'Aktif' AND 
							status_data = 'OPEN' AND 
							hasil_tes IS NULL AND 
							jenis_kelamin = 'Perempuan'
						GROUP BY
							recruitment_id
					)Q4 ON Q1.id = Q4.recruitment_id
					LEFT JOIN 
					(
						SELECT
							COUNT(a.id) as lulus_pria,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN
							pelamar b ON 
						a.pelamar_id = b.id
						WHERE 
							hasil_tes ='Lulus' AND 
							jenis_kelamin = 'Laki-laki'
						GROUP BY
							recruitment_id
					)Q5 ON Q1.id = Q5.recruitment_id
					LEFT JOIN 
					(
						SELECT
							COUNT(a.id) as lulus_wanita,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN
							pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							hasil_tes ='Lulus' AND 
							jenis_kelamin = 'Perempuan'
						GROUP BY
							recruitment_id
					)Q6 ON Q1.id = Q6.recruitment_id
					WHERE
						no_recruitment LIKE '%$search%'
					ORDER BY tgl ASC
					$where";
			return $this->db->query($sql);
		}
		public function getDataLamaranMasuk($jenis, $sub, $type, $noRecruitment,$search, $where)
		{
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							pelamar.id AS pelamar_id,
							lamaran.id AS lamaran_id,
							recruitment.id AS recruitment_id,
							tgl,
							nip,
							nama,
							no_ktp,
							alamat_ktp,
							alamat_domisili,
							no_hp,
							email,
							tempat_lahir,
							tgl_lahir,
							jenis_kelamin,
							status_pernikahan,
							jml_anak,
							golongan_darah,
							agama,
							no_recruitment,
							lamaran.jenis,
							lamaran.sub,
							lamaran.type,
							lamaran.`status`,
							status_data,
							lamaran.created_at	
						FROM
							pelamar 
						INNER JOIN lamaran ON pelamar.id = lamaran.pelamar_id
						INNER JOIN recruitment ON lamaran.recruitment_id = recruitment.id
						WHERE
							lamaran.jenis LIKE '$jenis%' AND 
							lamaran.sub LIKE '$sub%' AND
							lamaran.type LIKE '$type%' AND 
							lamaran.recruitment_id = '$noRecruitment'
					)Q1
					WHERE
						nip LIKE '%$search%' OR 
						nama LIKE '%$search%' OR 
						no_ktp LIKE '%$search%' OR 
						alamat_ktp LIKE '%$search%' OR 
						alamat_domisili LIKE '%$search%'
					ORDER BY lamaran_id ASC
					$where";
			return $this->db->query($sql);
		}

		public function getNoRecruitment($bulan, $tahun)
		{
			$whereBulan = '';
			if ($bulan != '' && $bulan != 'ALL') {
				$whereBulan = " AND bulan = $bulan";
			}
			$sql = $this->db->query("SELECT id, no_recruitment FROM recruitment WHERE tahun = '$tahun' $whereBulan");
			return $sql;
		}
		public function getTotalMonitoringRecruitment($id, $bulan, $tahun)
		{
			$whereBulan = $bulan =='ALL'?'':" AND bulan = $bulan";
			$sql = "SELECT
						'Kebutuhan' AS kategori,
						SUM(pria) AS pria,
						SUM(wanita) AS wanita,
						SUM(pria)+SUM(wanita) as total
					FROM
						recruitment 
					JOIN setup ON recruitment.id = setup.recruitment_id
					WHERE
						recruitment.id = '$id'
						AND tahun = '$tahun'
						";
			return $this->db->query($sql);
		}
		public function getDataLamaranById($id)
		{
			$sql = "SELECT
						lamaran.*,
						no_recruitment,
						foto,
						nama,
						no_hp,
						email,
						tempat_lahir,
						tgl_lahir,
						jenis_kelamin, 
						status_pernikahan,
						jml_anak,
						golongan_darah,
						agama,
						no_ktp,
						kode_pos,
						alamat_ktp,
						alamat_domisili,
						cv,
						ijazah_terakhir,
						surat_lamaran,
						skck,
						ktp,
						surat_keterangan_sehat,
						surat_ijin,
						kartu_keluarga,
						sertifikat_vaksin,
						surat_bebas_narkoba
					FROM
						lamaran 
					INNER JOIN recruitment ON lamaran.recruitment_id = recruitment.id
					INNER JOIN pelamar ON lamaran.pelamar_id = pelamar.id
					WHERE
						lamaran.id = '$id'";
			return $this->db->query($sql);
		}
		public function getJadwalPesertaTes($tahun, $status,$search, $where)
		{
			$sql = "SELECT
						Q1.*,
						jml_laki_internal,
						jml_perempuan_internal,
						IFNULL(jml_laki_internal,0) + IFNULL(jml_perempuan_internal,0) AS jml_total_internal,
						jml_laki_eksternal,
						jml_perempuan_eksternal,
						IFNULL(jml_laki_eksternal,0) + IFNULL(jml_perempuan_eksternal,0) AS jml_total_eksternal,
						jml_laki_umum,
						jml_perempuan_umum,
						IFNULL(jml_laki_umum,0) + IFNULL(jml_perempuan_umum,0) AS jml_total_umum,
						jml_laki_lulus,
						jml_perempuan_lulus,
						IFNULL(jml_laki_lulus,0) + IFNULL(jml_perempuan_lulus,0) AS jml_total_lulus,
						jml_laki_tidak,
						jml_perempuan_tidak,
						IFNULL(jml_laki_tidak,0) + IFNULL(jml_perempuan_tidak,0) AS jml_total_tidak
					FROM
					(
						SELECT
							*
						FROM
							jadwal
						WHERE
							YEAR(created_at) = $tahun AND 
							status LIKE '%$status%'
					)Q1
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_laki_internal,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							jenis = 'Internal'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							jenis = 'Internal'
						GROUP BY test_id_2
					)Q2 ON Q1.id = Q2.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_perempuan_internal,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							sub = 'Internal'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							sub = 'Internal'
						GROUP BY test_id_2
					)Q3 ON Q1.id = Q3.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_laki_eksternal,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							sub = 'Eksternal'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							sub = 'Eksternal'
						GROUP BY test_id_2
					)Q4 ON Q1.id = Q4.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_perempuan_eksternal,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							sub = 'Eksternal'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							sub = 'Eksternal'
						GROUP BY test_id_2
					)Q5 ON Q1.id = Q5.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_laki_umum,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							sub = 'Umum'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							sub = 'Umum'
						GROUP BY test_id_2
					)Q6 ON Q1.id = Q6.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_perempuan_umum,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							sub = 'Umum'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							sub = 'Umum'
						GROUP BY test_id_2
					)Q7 ON Q1.id = Q7.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_laki_lulus,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							hasil_tes = 'Lulus'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							hasil_tes = 'Lulus'
						GROUP BY test_id_2
					)Q8 ON Q1.id = Q8.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_perempuan_lulus,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							hasil_tes = 'Lulus'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							hasil_tes = 'Lulus'
						GROUP BY test_id_2
					)Q9 ON Q1.id = Q9.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_laki_tidak,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							hasil_tes = 'Tidak Lulus'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							hasil_tes = 'Tidak Lulus'
						GROUP BY test_id_2
					)Q10 ON Q1.id = Q10.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_perempuan_tidak,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							hasil_tes = 'Tidak Lulus'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							hasil_tes = 'Tidak Lulus'
						GROUP BY test_id_2
					)Q11 ON Q1.id = Q11.test_id
					WHERE no_rek LIKE '%$search%'
					ORDER BY created_at desc
					$where";
			return $this->db->query($sql);
		}
		public function getNoRecruitmentForFilter($tahun, $bulan)
		{
			$whereBulan = $bulan == "All" ? "" : " AND bulan=$bulan";
			$sql ="SELECT
						id,
						no_recruitment,
						jenis
					FROM
						`recruitment`
					WHERE
						tahun = $tahun $whereBulan";
			return $this->db->query($sql);
		}
		public function getDataSchedule($tahun, $bulan, $search, $noRecruitment, $sub, $type, $where, $status)
		{
			$whereBulan = $bulan == ''?'':" AND MONTH(tgl) = '$bulan'";
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							* 
						FROM
							monitoring_schedule
						WHERE
							YEAR(tgl) = '$tahun' AND
							recruitment_id LIKE '%$noRecruitment' AND 
							sub LIKE '%$sub' AND 
							type LIKE '%$type' AND 
							hasil_tes LIKE '%$status' AND 
							MONTH(tgl) LIKE '%$bulan'
					)Q1
					WHERE
						nip LIKE '%$search%' OR 
						nama LIKE '%$search%' OR 
						no_ktp LIKE '%$search%' OR 
						no_hp LIKE '%$search%'
					ORDER BY
						tgl ASC
					$where";
			return $this->db->query($sql);
		}
		public function getDataDetailSchedule($tahun, $bulan, $search, $noRecruitment, $sub, $type, $where, $status)
		{
			$whereBulan = $bulan == ''?'':" AND MONTH(tgl) = '$bulan'";
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							* 
						FROM
							monitoring_detail_schedule
						WHERE
							YEAR(tgl) = '$tahun' AND
							recruitment_id LIKE '%$noRecruitment' AND 
							sub LIKE '%$sub' AND 
							type LIKE '%$type' AND 
							hasil_tes LIKE '%$status' AND 
							MONTH(tgl) LIKE '%$bulan'
					)Q1
					WHERE
						nip LIKE '%$search%' OR 
						nama LIKE '%$search%' 
					ORDER BY
						tgl ASC
					$where";
			return $this->db->query($sql);
		}
		public function penilaian_tes_tahap_1($id)
		{
			$sql = "SELECT
						a.id as id_lamaran,
						a.pelamar_id,
						a.recruitment_id,
						a.test_id,
						b.no_rek,
						b.tgl_tes as rencana_tes,
						c.*
					FROM
						`lamaran` a 
					LEFT JOIN
						tes_tahap_1 b ON 
					a.test_id = b.id
					LEFT JOIN
						tes_detail_1 c ON 
					a.test_id = c.tes_tahap_1_id AND a.id = c.lamaran_id
					WHERE
						a.id = '$id'";
			return $this->db->query($sql);
		}
		public function penilaian_tes_tahap_2($id)
		{
			$sql = "SELECT
						a.id as id_lamaran,
						a.pelamar_id,
						a.recruitment_id,
						a.test_id,
						b.no_rek,
						b.jadwal_h1_tgl as rencana_tes_1,
						b.jadwal_h2_tgl as rencana_tes_2,
						b.jadwal_h3_tgl as rencana_tes_3,
						c.*
					FROM
						`lamaran` a 
					LEFT JOIN
						tes_tahap_2 b ON 
					a.test_id_2 = b.id
					LEFT JOIN
						tes_detail_2 c ON 
					a.test_id_2 = c.tes_tahap_2_id AND a.id = c.lamaran_id
					WHERE
						a.id = '$id'";
			return $this->db->query($sql);
		}
		public function get_standar_tes($id, $tahap)
		{
			$sql = "SELECT
						a.*
					FROM
						standar_tes a
					INNER JOIN
						lamaran b ON a.jenis = b.jenis
					WHERE
						b.id = '$id' AND 
						tahap = $tahap
					ORDER BY id ASC";
			return $this->db->query($sql);
		}
		public function getDataRecruitmentById($id)
		{
			return $this->db->select("*")
							->from("recruitment")
							->where("id",$id)
							->get();
		}
		public function getStockPelamar($id)
		{
			$sql = "SELECT
						Q1.jabatan,
						jml_eksternal_pria,
						jml_eksternal_wanita,
						jml_umum_pria,
						jml_umum_wanita,
						jml_referensi_pria,
						jml_referensi_wanita,
						IFNULL(jml_eksternal_pria,0) + IFNULL(jml_umum_pria,0) + IFNULL(jml_referensi_pria,0) AS jml_total_pria,
						IFNULL(jml_eksternal_wanita,0) + IFNULL(jml_umum_wanita,0) + IFNULL(jml_referensi_wanita,0) AS jml_total_wanita 
					FROM
					(
						SELECT
							jabatan	
						FROM
							recruitment
						WHERE
							id = '$id'
					)Q1
					LEFT JOIN 
					(
						SELECT
							COUNT(a.id) as jml_eksternal_pria,
							'Operator' as jabatan
						FROM
							`pelamar` a 
						INNER JOIN
							user b ON a.user_id = b.id 
						LEFT JOIN 
							lamaran c ON a.id = c.pelamar_id
						WHERE
							b.jenis = 'Eksternal' AND 
							a.jenis_kelamin = 'Laki-laki' AND 
							c.id IS NULL
					)Q2 ON Q1.jabatan = Q2.jabatan
					LEFT JOIN 
					(
						SELECT
							COUNT(a.id) as jml_eksternal_wanita,
							'Operator' as jabatan
						FROM
							`pelamar` a 
						INNER JOIN
							user b ON a.user_id = b.id 
						LEFT JOIN 
							lamaran c ON a.id = c.pelamar_id
						WHERE
							b.jenis = 'Eksternal' AND 
							a.jenis_kelamin = 'Perempuan' AND 
							c.id IS NULL
					)Q3 ON Q1.jabatan = Q3.jabatan
					LEFT JOIN 
					(
						SELECT
							COUNT(a.id) as jml_umum_pria,
							c.jabatan
						FROM
							pelamar a 
						INNER JOIN
							user b ON a.user_id = b.id
						LEFT JOIN
							outstanding_lamaran c ON 
						a.id = c.pelamar_id
						WHERE
							jenis = 'Umum' AND 
							a.jenis_kelamin = 'Laki-laki'
						GROUP BY
							c.jabatan
					)Q4 ON Q1.jabatan = Q4.jabatan
					LEFT JOIN 
					(
						SELECT
							COUNT(a.id) as jml_umum_wanita,
							c.jabatan
						FROM
							pelamar a 
						INNER JOIN
							user b ON a.user_id = b.id
						LEFT JOIN
							outstanding_lamaran c ON 
						a.id = c.pelamar_id
						WHERE
							jenis = 'Umum' AND 
							a.jenis_kelamin = 'Perempuan'
						GROUP BY
							c.jabatan
					)Q5 ON Q1.jabatan = Q5.jabatan
					LEFT JOIN 
					(
						SELECT
							COUNT(a.id) as jml_referensi_pria,
							c.jabatan
						FROM
							pelamar a 
						INNER JOIN
							user b ON a.user_id = b.id
						LEFT JOIN
							outstanding_lamaran c ON 
						a.id = c.pelamar_id
						INNER JOIN
							referensi d ON 
						a.referensi_id = d.id
						WHERE
							jenis = 'Umum' AND 
							a.jenis_kelamin = 'Laki-laki'
						GROUP BY
							c.jabatan
					)Q6 ON Q1.jabatan = Q6.jabatan
					LEFT JOIN 
					(
						SELECT
							COUNT(a.id) as jml_referensi_wanita,
							c.jabatan
						FROM
							pelamar a 
						INNER JOIN
							user b ON a.user_id = b.id
						LEFT JOIN
							outstanding_lamaran c ON 
						a.id = c.pelamar_id
						INNER JOIN
							referensi d ON 
						a.referensi_id = d.id
						WHERE
							jenis = 'Umum' AND 
							a.jenis_kelamin = 'Perempuan'
						GROUP BY
							c.jabatan
					)Q7 ON Q1.jabatan = Q7.jabatan";
			return $this->db->query($sql);
		}
		public function getSetupById($id)
		{
			$sql = "SELECT
						IFNULL(referensi_pria,0) as referensi_pria,
						IFNULL(referensi_wanita,0) as referensi_wanita,
						IFNULL(eksternal_pria,0) as eksternal_pria,
						IFNULL(eksternal_wanita,0) as eksternal_wanita,
						IFNULL(umum_pria,0) as umum_pria,
						IFNULL(umum_wanita,0) as umum_wanita,
						IFNULL(kebutuhan_pria,0) as kebutuhan_pria,
						IFNULL(kebutuhan_wanita,0) as kebutuhan_wanita
					FROM
					(
						SELECT	
							id
						FROM
							recruitment
						WHERE
							id= '$id'
					)Q1
					LEFT JOIN
					(
						SELECT
							SUM(pria) as referensi_pria,
							SUM(wanita) as referensi_wanita,
							recruitment_id
						FROM
							`setup` 
						WHERE
							recruitment_id = '$id' AND 
							alokasi = 'Referensi'
					)Q2 ON Q1.id = Q2.recruitment_id
					LEFT JOIN
					(
						SELECT
							SUM(pria) as eksternal_pria,
							SUM(wanita) as eksternal_wanita,
							recruitment_id
						FROM
							`setup` 
						WHERE
							recruitment_id = '$id' AND 
							alokasi = 'Eksternal'
					)Q3 ON Q1.id = Q3.recruitment_id
					LEFT JOIN
					(
						SELECT
							SUM(pria) as umum_pria,
							SUM(wanita) as umum_wanita,
							recruitment_id
						FROM
							`setup` 
						WHERE
							recruitment_id = '$id' AND 
							alokasi = 'Umum'
					)Q4 ON Q1.id = Q4.recruitment_id
					LEFT JOIN 
					(
						SELECT
							SUM(pria) as kebutuhan_pria,
							recruitment_id
						FROM
							pengajuan
						WHERE
							recruitment_id = '$id'
						GROUP BY recruitment_id
					)Q5 ON Q1.id = Q5.recruitment_id
					LEFT JOIN 
					(
						SELECT
							SUM(wanita) as kebutuhan_wanita,
							recruitment_id
						FROM
							pengajuan
						WHERE
							recruitment_id = '$id'
						GROUP BY recruitment_id
					)Q6 ON Q1.id = Q6.recruitment_id";
			return $this->db->query($sql);
		}
		public function hitungStatusLamaran($id, $sub)
		{
			$sql = "SELECT
						Q1.id,
						IFNULL(jml_ng_pria, 0) AS jml_ng_pria,
						IFNULL(jml_ng_wanita, 0) AS jml_ng_wanita,
						IFNULL(jml_testing_pria, 0) AS jml_testing_pria,
						IFNULL(jml_testing_wanita, 0) AS jml_testing_wanita,
						IFNULL(jml_tidak_lulus_pria, 0) AS jml_tidak_lulus_pria,
						IFNULL(jml_tidak_lulus_wanita, 0) AS jml_tidak_lulus_wanita,
						IFNULL(jml_lulus_pria, 0) AS jml_lulus_pria,
						IFNULL(jml_lulus_wanita, 0) AS jml_lulus_wanita,
						IFNULL(jml_non_aktif_pria, 0) AS jml_non_aktif_pria,
						IFNULL(jml_non_aktif_wanita, 0) AS jml_non_aktif_wanita
						
					FROM
					(
						SELECT	
							id
						FROM
							recruitment
						WHERE
							id= '$id'
					)Q1
					LEFT jOIN 
					(
						SELECT
							COUNT(a.id) as jml_ng_pria,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							recruitment_id = '$id' AND
							hasil_tes = 'NG' AND 
							jenis_kelamin = 'Laki-laki' AND 
							sub = '$sub'
					)Q2 ON Q1.id = Q2.recruitment_id
					LEFT jOIN 
					(
						SELECT
							COUNT(a.id) as jml_ng_wanita,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							recruitment_id = '$id' AND
							hasil_tes = 'NG' AND 
							jenis_kelamin = 'Perempuan' AND 
							sub = '$sub'
					)Q3 ON Q1.id = Q3.recruitment_id
					LEFT jOIN 
					(
						SELECT
							COUNT(a.id) as jml_testing_pria,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							recruitment_id = '$id' AND
							hasil_tes IS NULL AND
							test_id IS NOT NULL AND 
							jenis_kelamin = 'Laki-laki' AND 
							sub = '$sub'
					)Q4 ON Q1.id = Q4.recruitment_id
					LEFT jOIN 
					(
						SELECT
							COUNT(a.id) as jml_testing_wanita,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							recruitment_id = '$id' AND
							hasil_tes IS NULL AND 
							test_id IS NOT NULL AND
							jenis_kelamin = 'Perempuan' AND 
							sub = '$sub'
					)Q5 ON Q1.id = Q5.recruitment_id
					LEFT jOIN 
					(
						SELECT
							COUNT(a.id) as jml_tidak_lulus_pria,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							recruitment_id = '$id' AND
							hasil_tes ='Tidak Lulus' AND 
							jenis_kelamin = 'Laki-laki' AND 
							sub = '$sub'
					)Q6 ON Q1.id = Q6.recruitment_id
					LEFT jOIN 
					(
						SELECT
							COUNT(a.id) as jml_tidak_lulus_wanita,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							recruitment_id = '$id' AND
							hasil_tes ='Tidak Lulus' AND 
							jenis_kelamin = 'Perempuan' AND 
							sub = '$sub'
					)Q7 ON Q1.id = Q7.recruitment_id
					LEFT jOIN 
					(
						SELECT
							COUNT(a.id) as jml_lulus_pria,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							recruitment_id = '$id' AND
							hasil_tes ='Lulus' AND 
							jenis_kelamin = 'Laki-laki' AND 
							sub = '$sub'
					)Q8 ON Q1.id = Q8.recruitment_id
					LEFT jOIN 
					(
						SELECT
							COUNT(a.id) as jml_lulus_wanita,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							recruitment_id = '$id' AND
							hasil_tes ='Lulus' AND 
							jenis_kelamin = 'Perempuan' AND 
							sub = '$sub'
					)Q9 ON Q1.id = Q9.recruitment_id
					LEFT jOIN 
					(
						SELECT
							COUNT(a.id) as jml_non_aktif_pria,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							recruitment_id = '$id' AND
							hasil_tes ='Tidak Aktif' AND 
							jenis_kelamin = 'Laki-laki' AND 
							sub = '$sub'
					)Q10 ON Q1.id = Q10.recruitment_id
					LEFT jOIN 
					(
						SELECT
							COUNT(a.id) as jml_non_aktif_wanita,
							recruitment_id
						FROM
							lamaran a 
						INNER JOIN pelamar b ON 
						a.pelamar_id = b.id
						WHERE
							recruitment_id = '$id' AND
							hasil_tes ='Tidak Lulus' AND 
							jenis_kelamin = 'Perempuan' AND 
							sub = '$sub'
					)Q11 ON Q1.id = Q11.recruitment_id";
			return $this->db->query($sql);
		}
		public function getDataResign($tahun, $bulan, $search, $where)
		{
			// return $this->db->select("*")
			// 				->from("karyawan_resign")
			// 				->order_by("created_at","desc")
			// 				->get();
			$sql = "SELECT
						* 
					FROM
						karyawan_resign
					WHERE
						nama LIKE '%$search%' OR 
						no_hp LIKE '%$search%' OR 
						email LIKE '%$search%' OR 
						no_ktp LIKE '%$search%'
					ORDER BY created_at desc
					$where";
			return $this->db->query($sql);
		}
		public function getJmlResign()
		{
			return $this->db->select("count(*) as num")
							->from("karyawan_resign")
							->get();
		}
		public function getDataResignById($id)
		{
			return $this->db->select("*")
							->from("karyawan_resign")
							->where("id", $id)
							->order_by("created_at","desc")
							->get();
		}
		public function getMasaKerjaById($id)
		{
			$sql = "SELECT
						* 
					FROM
						`masa_kerja`
					WHERE
						resign_id = '$id'
					ORDER BY join_date ASC";
			return $this->db->query($sql);
		}
		public function getBankPelamar($tahun, $bulan, $jenis, $sub, $type, $search, $status, $where)
		{
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							*
						FROM
						(
							SELECT
								*
							FROM
								`pelamar`
						)Q1
						LEFT JOIN 
						(
							SELECT
								Q2.id as lamaran_id,
								pelamar_id,
								nip,
								hasil_tes,		
								jenis,
								sub,
								type,
								tgl,
								test_id,
								test_id_2,
								no_rek_tes_1,
								no_rek_tes_2,
								no_recruitment,
								status
							FROM
							(
								SELECT
									a.id,
									a.nip,
									a.pelamar_id,
									a.hasil_tes,
									a.jenis,
									a.sub,
									a.type,
									a.tgl,
									a.test_id,
									a.test_id_2,
									b.no_recruitment,
									CASE 
										WHEN test_id IS NULL OR test_id_2 IS NULL THEN 'Belum Tes'
										WHEN test_id IS NOT NULL AND hasil_tes IS NULL OR test_id_2 IS NOT NULL AND hasil_tes IS NULL THEN 'Sedang Tes'
										ELSE a.hasil_tes
									END as status
								FROM
									lamaran a
								INNER JOIN
									recruitment b ON 
								a.recruitment_id = b.id
							)Q2
							LEFT JOIN 
							(
								SELECT
									id,
									no_rek As no_rek_tes_1
								FROM
									tes_tahap_1
							)Q3 ON Q2.test_id = Q3.id
							LEFT JOIN 
							(
								SELECT
									id,
									no_rek As no_rek_tes_2
								FROM
									tes_tahap_2
							)Q4 ON Q2.test_id_2 = Q4.id
						)Q2 ON Q1.id = Q2.pelamar_id
						WHERE
							jenis LIKE '$jenis%' AND 
							sub LIKE '$sub%' AND
							type LIKE '$type%' AND 
							status LIKE '$status%' AND 
							YEAR(tgl) LIKE '%$tahun' AND 
							MONTH(tgl) LIKE '%$bulan'
					)Q1
					WHERE
						nama LIKE '%$search%' OR 
						no_ktp LIKE '%$search%' OR 
						no_hp LIKE '%$search%' OR 
						email LIKE '%$search%' 
					ORDER BY created_at DESC
					$where";
			return $this->db->query($sql);
		}
		public function getLamaranTanpaRecruitment($jabatan, $departemen, $plant, $status, $jenisKelamin, $search)
		{
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							a.*,
							foto,
							nama,
							no_hp,
							email,
							tgl_lahir,
							tempat_lahir,
							jenis_kelamin,
							status_pernikahan,
							jml_anak,
							no_ktp,
							alamat_ktp,
							alamat_domisili
						FROM
							`lamaran_masuk` a 
						INNER JOIN
							pelamar b ON a.pelamar_id = b.id
						WHERE
							a.jabatan LIKE '%$jabatan' AND 
							a.departemen LIKE '%$departemen' AND 
							a.plant LIKE '%$plant' AND 
							a.status LIKE '%$status' AND 
							b.jenis_kelamin LIKE '%$jenisKelamin'
					)Q1
					WHERE
						nama LIKE '%$search%' OR 
						no_hp LIKE '%$search%' OR 
						email LIKE '%$search%' OR 
						no_ktp LIKE '%$search%'
					ORDER BY created_at DESC";
			return $this->db->query($sql);
		}
	}
?>