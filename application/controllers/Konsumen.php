<?php 
	class Konsumen extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('ModelKonsumen');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['folder'] = "konsumen";
			$data['p'] = $p;
			$data['title'] = "Data Konsumen";

			if ($p == "data") {
				$data['val'] = $this->ModelKonsumen->show('tb_konsumen')->result();
				$this->load->view('index',$data);
			}elseif($p == "input"){
				$id = $this->uri->segment(4);
				if (empty($id)) {
					//No otomatis
					$qr = $this->ModelKonsumen->no()->row_array();
					$kode = $qr['kode'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('y');
					$data['no'] = "KON".$tgl.sprintf('%04s',$nu);

					$data['title'] = "input Data Konsumen";
					$data['btn'] = "SIMPAN";
					$data['url'] = "konsumen/simpan";
					$this->load->view('index',$data);
				}else{
					$data['title'] = "Edit data Konsumen";
					$data['btn'] = "EDIT";
					$data['url'] = "konsumen/edit";
					$data['val'] = $this->ModelKonsumen->showall("tb_konsumen","WHERE id_konsumen = '$id' ");
					$this->load->view('index',$data);
				}
			}
		}
		public function simpan()
		{
			$data = array(
				'id_konsumen' => $this->input->post('id_konsumen'),
				'nama' => $this->input->post('nama'),
				'hp' => $this->input->post('hp'),
				'alamat' => $this->input->post('alamat')
			);
			$this->ModelKonsumen->simpan($data);
			redirect('konsumen/p/data');
		}
		public function edit()
		{
			$id = $this->input->post('id_konsumen');
			$data = array(
				'nama' => $this->input->post('nama'),
				'hp' => $this->input->post('hp'),
				'alamat' => $this->input->post('alamat')
			);
			$this->ModelKonsumen->edit($id,$data);
			redirect('konsumen/p/data');
		}
		public function hapus($id)
		{
			$this->ModelKonsumen->hapus('tb_konsumen',$id);
			redirect('konsumen/p/data');
		}
	}
