<?php 
	class ModelKasir extends CI_Model
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
			return $this->db->insert('tb_kasir',$val);
		}
		public function edit($id,$val)
		{
			$this->db->where('id_kasir',$id);
			return $this->db->update('tb_kasir',$val);
		}
		public function hapus($tb,$id)
		{
			$this->db->where("id_kasir",$id);
			return $this->db->delete($tb);
		}
		public function no()
		{
			return $this->db->query("SELECT max(id_kasir) AS kode FROM tb_kasir");
		}
	}
 ?>