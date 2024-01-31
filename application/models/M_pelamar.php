<?php
	class M_pelamar extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getDataPelamar()
		{
			$sql = $this->db->select("pelamar.*")
							->from("pelamar")
							->join('user','pelamar.user_id = user.id')
							->where_not_in("jenis","'Eksternal','Umum'")
							->get();
			return $sql;
		}
		public function getJmlPelamar()
		{
			$sql = $this->db->select("count(pelamar.id) as num")
							->from("pelamar")
							->join('user','pelamar.user_id = user.id')
							->where_not_in("jenis","'Eksternal','Umum'")
							->get();
			return $sql;
		}
	}
?>