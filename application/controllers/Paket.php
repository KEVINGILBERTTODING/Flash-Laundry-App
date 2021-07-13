<?php 
	class Paket extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('ModelPaket');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['folder'] = "paket";
			$data['p'] = $p;
			$data['title'] = "Data paket";

			if ($p == "data") {
				$data['val'] = $this->ModelPaket->show('tb_paket')->result();
				$this->load->view('index',$data);
			}elseif($p == "input"){
				$id = $this->uri->segment(4);
				if (empty($id)) {
					//No otomatis
					$qr = $this->ModelPaket->no()->row_array();
					$kode = $qr['kode'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('y');
					$data['no'] = "PKT".$tgl.sprintf('%04s',$nu);

					$data['title'] = "input Data paket";
					$data['btn'] = "SIMPAN";
					$data['url'] = "paket/simpan";
					$this->load->view('index',$data);
				}else{
					$data['title'] = "Edit data paket";
					$data['btn'] = "EDIT";
					$data['url'] = "paket/edit";
					$data['val'] = $this->ModelPaket->showall("tb_paket","WHERE id_paket = '$id' ");
					$this->load->view('index',$data);
				}
			}
		}
		public function simpan()
		{
			$data = array(
				'id_paket' => $this->input->post('id_paket'),
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga')
			);
			$this->ModelPaket->simpan($data);
			redirect('paket/p/data');
		}
		public function edit()
		{
			$id = $this->input->post('id_paket');
			$data = array(
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga')
			);
			$this->ModelPaket->edit($id,$data);
			redirect('paket/p/data');
		}
		public function hapus($id)
		{
			$this->ModelPaket->hapus('tb_paket',$id);
			redirect('paket/p/data');
		}
	}
