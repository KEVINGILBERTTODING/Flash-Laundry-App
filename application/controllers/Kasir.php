<?php
class Kasir extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelKasir');
	}
	public function p()
	{
		$p = $this->uri->segment(3);
		$data['folder'] = "kasir";
		$data['p'] = $p;
		$data['title'] = "Data kasir";

		if ($p == "data") {
			$data['val'] = $this->ModelKasir->show('tb_kasir')->result();
			$this->load->view('index', $data);
		} elseif ($p == "input") {
			$id = $this->uri->segment(4);
			if (empty($id)) {
				//No otomatis
				$qr = $this->ModelKasir->no()->row_array();
				$kode = $qr['kode'];
				$nu = (int) substr($kode, 6, 9);
				$nu++;
				$tgl = date('y');
				$data['no'] = "KSR" . $tgl . sprintf('%04s', $nu);

				$data['title'] = "input Data kasir";
				$data['btn'] = "SIMPAN";
				$data['url'] = "kasir/simpan";
				$this->load->view('index', $data);
			} else {
				$data['title'] = "Edit data kasir";
				$data['btn'] = "EDIT";
				$data['url'] = "kasir/edit";
				$data['val'] = $this->ModelKasir->showall("tb_kasir", "WHERE id_kasir = '$id' ");
				$this->load->view('index', $data);
			}
		}
	}
	public function simpan()
	{
		$data = array(
			'id_kasir' => $this->input->post('id_kasir'),
			'nama' => $this->input->post('nama'),
			'password' => base64_encode($this->input->post('password')),
			'level' => $this->input->post('level')
		);
		$this->ModelKasir->simpan($data);
		redirect('kasir/p/data');
	}
	public function edit()
	{
		$id = $this->input->post('id_kasir');
		$data = array(
			'nama' => $this->input->post('nama'),
			'password' => $this->input->post('password')
		);
		$this->ModelKasir->edit($id, $data);
		redirect('kasir/p/data');
	}
	public function hapus($id)
	{
		$this->ModelKasir->hapus('tb_kasir', $id);
		redirect('kasir/p/data');
	}
}
