<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	
	public function __construct()
  {
    parent::__construct();
    //cek ketika login
    is_logged_in();
  }

	public function index()
	{
		$data['title'] = 'Dasboard';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->model('Guru_model');
		$data['total'] = $this->Guru_model->hitungJumlahAsset();
		$data['siswa'] = $this->Guru_model->hitung();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'name', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!'
		]);

		$this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]',
			['matches' => 'Password dont matches!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi Guru';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('admin/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  			Congratulation! your account has been created. Please Login</div>');
			redirect('auth');
		}
		
	}
	

}