<?php 
	class Transaksi extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('ModelTransaksi');
		}
		public function p()
		{
			$p = $this->uri->segment(3);
			$data['folder'] = "transaksi";
			$data['p'] = $p;
			$data['title'] = "Data transaksi";

			if ($p == "data") {
				$data['val'] = $this->ModelTransaksi->showdata()->result();
				$this->load->view('index',$data);
			}elseif($p == "input"){
				$id = $this->uri->segment(4);
				if (empty($id)) {
					//No otomatis
					$qr = $this->ModelTransaksi->no()->row_array();
					$kode = $qr['kode'];
					$nu = (int) substr($kode, 6,9);
					$nu++;
					$tgl = date('y');
					$data['no'] = "TRA".$tgl.sprintf('%04s',$nu);

					$data['title'] = "input Data transaksi";
					$data['btn'] = "SIMPAN";
					$data['url'] = "transaksi/simpan";
					$data['paket'] = $this->ModelTransaksi->show('tb_paket')->result();
					$this->load->view('index',$data);
				}else{
					$data['title'] = "Edit data transaksi";
					$data['btn'] = "EDIT";
					$data['url'] = "transaksi/edit";
					$data['val'] = $this->ModelTransaksi->showall("tb_transaksi","WHERE id_transaksi = '$id' ");
					$this->load->view('index',$data);
				}
			}elseif ($p == "laporan") {
				$data['folder'] = "transaksi";
				$data['title'] = "Data Laporan transaksi";

				$this->load->view('index',$data);
			}
		}
		public function simpan()
		{
			$data = array(
				'id_transaksi' => $this->input->post('id_transaksi'),
				'id_kasir' => $this->input->post('id_kasir'),
				'id_konsumen' => $this->input->post('id_konsumen'),
				'id_paket' => $this->input->post('id_paket'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'jml_kilo' => $this->input->post('jml_kilo'),
				'total' => $this->input->post('total')
			);
			$this->ModelTransaksi->simpan($data);
			redirect('transaksi/p/data');
		}
		public function edit()
		{
			$id = $this->input->post('id_transaksi');
			$data = array(
				'id_kasir' => $this->input->post('id_kasir'),
				'id_konsumen' => $this->input->post('id_konsumen'),
				'id_paket' => $this->input->post('id_paket'),
				'tgl_transaksi' => $this->input->post('tgl_transaksi'),
				'jml_kilo' => $this->input->post('jml_kilo'),
				'total' => $this->input->post('total')
			);
			$this->ModelTransaksi->edit($id,$data);
			redirect('transaksi/p/data');
		}
		public function hapus($id)
		{
			$this->ModelTransaksi->hapus('tb_transaksi',$id);
			redirect('transaksi/p/data');
		}
		public function modal_konsumen()
		{
			$data['val'] = $this->ModelTransaksi->show('tb_konsumen')->result();
			$this->load->view("transaksi/tb_konsumen",$data);	
		}
		public function data_konsumen()
		{
			$data = $this->ModelTransaksi->showall('tb_konsumen',"WHERE id_konsumen = '$_POST[id_konsumen]'")->row_array();
			$a = array(
				'id_konsumen' => $data['id_konsumen'],
				'nama' => $data['nama'],
				'hp' => $data['hp'],
				'alamat' => $data['alamat']
			 );
			echo json_encode($a);
		}
		public function kilo()
		{
			$kilo = $_POST['jml_kilo'];
			$paket = $this->ModelTransaksi->showall('tb_paket',"WHERE id_paket = '$_POST[paket]' ")->row();
			if ($_POST['jml_kilo'] == "") {
				$total="";
			}else{
				$total = $paket->harga * $kilo;
			}
			echo $total;
		}
		public function nota()
		{
			$id = $this->uri->segment(3);
			$data['val'] = $this->ModelTransaksi->nota($id)->row_array();
			$this->load->view('transaksi/nota',$data);
		}
		public function laporan()
		{
			$data['bulan'] = $_POST['bulan'];
			$data['tahun'] = $_POST['tahun'];
			$data['val'] = $this->ModelTransaksi->laporan($_POST['bulan'],$_POST['tahun'])->result();
			$data['dt'] = $this->ModelTransaksi->total_transaksi($_POST['bulan'],$_POST['tahun'])->row_array();
			$this->load->view("transaksi/tb_laporan",$data);
		}
	}
