<?php 
	class ModelPaket extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function showall($tb,$prop)
		{
			return $this->db->query("SELECT * FROM $tb $prop");
		}
		public function show($tb)
		{
			return $this->db->get($tb);
		}
		public function simpan($val)
		{
			return $this->db->insert('tb_paket',$val);
		}
		public function edit($id,$val)
		{
			$this->db->where('id_paket',$id);
			return $this->db->update('tb_paket',$val);
		}
		public function hapus($tb,$id)
		{
			$this->db->where("id_paket",$id);
			return $this->db->delete($tb);
		}
		public function no()
		{
			return $this->db->query("SELECT max(id_paket) AS kode FROM tb_paket");
		}
	}
 ?>