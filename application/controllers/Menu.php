<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Siswa_model');

       
    }

	public function index()
	{


		$data['title'] = 'Mahasantri';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		
		
		$data['menu'] = $this->Siswa_model->getSiswa();
		$data['kelas'] = $this->db->get('kelas')->result_array();

		$this->form_validation->set_rules('nim', 'nim', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_Lahir', 'required');
		$this->form_validation->set_rules('kelas', 'kelas', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer',);

		} else{
			$data = [

				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'kelas_id' => $this->input->post('kelas'),
			];

			$this->db->insert('mahasantri',$data);
			$this->session->set_flashdata('message', '<div class = "alert alert-success" role = "alert">
			 	 Input Mahasantri baru sukses!</div>');

			redirect('menu');
		}
	
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Mahasantri';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->Siswa_model->getById($id);
	
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['class'] = $this->db->get_where('kelas', ["id" => $data['siswa']->kelas_id])->row();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/edit', $data);
		$this->load->view('templates/footer',);
	}
	
	public function update()
	{

		$siswa = $this->Siswa_model;
          if ($siswa) {
            # code...
            $siswa->update();
            
            $this->session->set_flashdata('message', '<div class = "alert alert-success" role = "alert">
        Update Mahasantri</div>');
          }else{
            $this->session->set_flashdata('message', '<div class = "alert alert-success" role = "alert">
        Update Mahasantri Gagal</div>');
          }
      
      
             redirect(site_url('menu'));

	}

	 public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Siswa_model->delete($id)) {
            redirect(site_url('menu'));
        }
    }
}
