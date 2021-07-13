<?php 
	class ModelAkses extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function qr($user,$pass)
		{
			return $this->db->query("SELECT * FROM tb_kasir WHERE nama = '$user' AND password = '$pass' ");
		}
	}
 ?>