<?php
class Akses extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAkses');
	}
	public function index()
	{
		$data['folder'] = "akses/";
		$data['title'] = "Form Login";
		if (isset($this->session->userdata['level'])) {
			redirect('beranda/p/');
		} else {
			$this->load->view('akses/login', $data);
		}
	}
	public function login()
	{
		$user = $this->input->post('user');
		$pass = base64_encode($this->input->post('pass'));
		$qr = $this->ModelAkses->qr($user, $pass);
		$row = $qr->row();
		if ($row == '') {
			redirect(base_url('akses/index'));
		} else {
			$data = array(
				'id' => $row->id_kasir,
				'user' => $row->nama,
				'level' => $row->level
			);
			$this->session->set_userdata($data);
			redirect(base_url());
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('akses/'));
	}
}
