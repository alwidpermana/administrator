<?php
	class M_auth extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getDataUser($email)
		{
			$sql = $this->db->select("id, password, email, jenis, nama, url_verification, status")
							->from("user")
							->where('email',$email)
							->where('jenis','Admin')
							->get();
			return $sql;
		}
		public function tes()
		{
			$sql = "SELECT * FROM pengajuan";
			$hosting = $this->load->database('hosting', TRUE);
	        $query1 = $hosting->query($sql);
	        // $query1 = $this->db->query($sql); 
	        return $query1;
		}
	}
?>