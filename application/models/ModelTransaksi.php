<?php 
	class ModelTransaksi extends CI_Model
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
			return $this->db->insert('tb_transaksi',$val);
		}
		public function edit($id,$val)
		{
			$this->db->where('id_transaksi',$id);
			return $this->db->update('tb_transaksi',$val);
		}
		public function hapus($tb,$id)
		{
			$this->db->where("id_transaksi",$id);
			return $this->db->delete($tb);
		}
		public function no()
		{
			return $this->db->query("SELECT max(id_transaksi) AS kode FROM tb_transaksi");
		}
		public function showdata()
		{
			return $this->db->query("
				SELECT id_transaksi,jml_kilo,tgl_transaksi,total,(tb_kasir.nama) AS kasir,(tb_konsumen.nama) AS konsumen,(tb_paket.nama) AS paket
				FROM tb_transaksi 
				INNER JOIN tb_kasir ON tb_transaksi.id_kasir=tb_kasir.id_kasir
				INNER JOIN tb_konsumen ON tb_transaksi.id_konsumen=tb_konsumen.id_konsumen
				INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket");
		}
		public function nota($id)
		{
			return $this->db->query("
				SELECT id_transaksi,jml_kilo,tgl_transaksi,total,(tb_kasir.nama) AS kasir,(tb_konsumen.nama) AS konsumen,(tb_paket.nama) AS paket,tb_konsumen.id_konsumen,harga
				FROM tb_transaksi 
				INNER JOIN tb_kasir ON tb_transaksi.id_kasir=tb_kasir.id_kasir
				INNER JOIN tb_konsumen ON tb_transaksi.id_konsumen=tb_konsumen.id_konsumen
				INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket
				WHERE id_transaksi = '$id'");
		}
		public function laporan($bulan,$tahun)
		{
			$sql = $this->db->query("SELECT id_transaksi,(tb_kasir.nama) as kasir, (tb_konsumen.nama) as konsumen, (tb_paket.nama) as paket, tgl_transaksi,jml_kilo,total
				FROM tb_transaksi
				INNER JOIN tb_kasir ON tb_transaksi.id_kasir=tb_kasir.id_kasir
				INNER JOIN tb_konsumen ON tb_transaksi.id_konsumen=tb_konsumen.id_konsumen
				INNER JOIN tb_paket ON tb_transaksi.id_paket=tb_paket.id_paket
				WHERE month(tgl_transaksi) = '$bulan' AND year(tgl_transaksi) = '$tahun' ");
			return $sql;
		}
		public function total_transaksi($bulan,$tahun)
		{
			return $this->db->query("SELECT sum(total) as t_transaksi
			FROM tb_transaksi
			WHERE month(tgl_transaksi) = '$bulan' AND year(tgl_transaksi) = '$tahun' ");
		}
	}
 ?>