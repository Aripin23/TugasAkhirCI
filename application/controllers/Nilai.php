<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller 
{

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_model');

       
    }
	public function index()
	{

		$data['title'] = 'Nilai Mahasantri';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		
		$data['aku'] = $this->Nilai_model->nilai();
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['maha'] = $this->db->get('mahasantri')->result_array();
		

		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('surah', 'surah', 'required');
		$this->form_validation->set_rules('ayat', 'ayat', 'required');
		$this->form_validation->set_rules('kelancaran', 'kelancaran', 'required');
		$this->form_validation->set_rules('kesalahan', 'kelas', 'required');
		$this->form_validation->set_rules('makna_ayat', 'makna_ayat', 'required');
		$this->form_validation->set_rules('nilai', 'nilai', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$this->form_validation->set_rules('mahasantri', 'mahasantri', 'required');
		$this->form_validation->set_rules('kelas', 'kelas', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('nilai/index', $data);
			$this->load->view('templates/footer',);

		} else{
			$data =[
				'tanggal' => $this->input->post('tanggal'),
				'surah' => $this->input->post('surah'),
				'ayat' => $this->input->post('ayat'),
				'kelancaran' => $this->input->post('kelancaran'),
				'kesalahan' => $this->input->post('kesalahan'),
				'makna_ayat' => $this->input->post('makna_ayat'),
				'nilai' => $this->input->post('nilai'),
				'keterangan' => $this->input->post('keterangan'),
				'mahasantri_id' => $this->input->post('mahasantri'),
				'kelas_id' => $this->input->post('kelas')
			];
			
			 
			$this->db->insert('nilai', $data);
			$this->session->set_flashdata('message', '<div class = "alert alert-success" role = "alert">
			 	 Input Nilai Mahasantri sukses!</div>');

			redirect('nilai');
		}
	}

		public function edit($id)
	{
		$data['title'] = 'Edit Nilai Mahasantri';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->Nilai_model->getById($id);
		
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['santri'] = $this->db->get('mahasantri')->result_array();
		$data['class'] = $this->db->get_where('kelas', ["id" => $data['siswa']->kelas_id])->row();
		$data['nama'] = $this->db->get_where('mahasantri', ["id" => $data['siswa']->mahasantri_id])->row();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('nilai/editnilai', $data);
		$this->load->view('templates/footer',);
	}

	public function update()
	{

		$nilai = $this->Nilai_model;
          	if ($nilai) {
            # code...
            $nilai->update();
            
            $this->session->set_flashdata('message', '<div class = "alert alert-success" role = "alert">
        Update Mahasantri</div>');
          }else{
            $this->session->set_flashdata('message', '<div class = "alert alert-success" role = "alert">
        Update  Data Gagal</div>');
          }
      
      
             redirect(site_url('nilai'));

	}
	
	

	 public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Nilai_model->delete($id)) {
            redirect(site_url('nilai'));
        }
    }

	
}