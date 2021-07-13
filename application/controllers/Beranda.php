<?php 
	class Beranda extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('ModelBeranda');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['title'] = "Aplikasi Manajemen Laundry";
			$data['folder'] = "beranda";
			if (empty($p)) {
				$p = "beranda";
			}
			$data['p'] = $p;
			$data['kasir'] = $this->ModelBeranda->kasir()->num_rows();
			$data['konsumen'] = $this->ModelBeranda->konsumen()->num_rows();
			$data['paket'] = $this->ModelBeranda->paket()->num_rows();
			$data['transaksi'] = $this->ModelBeranda->transaksi()->num_rows();
			$this->load->view('index',$data);
		}
	}
