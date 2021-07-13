<?php 
	class ModelBeranda extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function kasir()
		{
			return $this->db->query("SELECT * FROM tb_kasir");
		}
		public function konsumen()
		{
			return $this->db->query("SELECT * FROM tb_konsumen");
		}
		public function paket()
		{
			return $this->db->query("SELECT * FROM tb_paket");
		}
		public function transaksi()
		{
			return $this->db->query("SELECT * FROM tb_transaksi");
		}
	}
 ?>