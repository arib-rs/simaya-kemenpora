<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Plh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') != TRUE) {
            redirect(base_url());
        }
        $this->load->model('M_jenis_surat');
        $this->load->model('M_satuan_kerja');
        $this->load->model('M_pegawai');
        $this->load->model('M_surat');
        $this->load->model('M_disposisi');
        $this->load->model('M_user');
        $this->load->model('M_grup');
        $this->load->model('M_jabatan');
    }
    
    public function index()
    {

        $data['edit'] = "";
        $data['title'] = 'PLH';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_pegawai->selectPlh();
        $data['satuankerja'] = $this->M_satuan_kerja->select();
        $data['jabatan'] = $this->M_jabatan->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('plh/index', $data);
        $this->load->view('templates/footer');
    }
	public function edit_plh()
    {
        if ($this->session->userdata('username')) {	
            $this->load->library('form_validation');
			$id_pegawai=$this->session->userdata('id');
            $this->form_validation->set_rules('idplh', 'PLH', 'required');
			
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"><b>Pilih pegawai !</b></div>');
                redirect('Plh/index');
            } else {

				if(isset($_POST['simpan'])){
					
                    $data = array(
                        'idplh'    => $_POST['idplh']
                    );
					$this->M_pegawai->update($data, $id_pegawai);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">PLH <b>berhasil </b> dipilih</div>');
					
					$data_session = array(
						'idplh' => $_POST['idplh'],
					);
				}
				if(isset($_POST['reset'])){
					
                    $data = array(
                        'idplh'    => 0
                    );
					$this->M_pegawai->update($data, $id_pegawai);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">PLH <b>berhasil </b> direset</div>');
					
					$data_session = array(
						'idplh' => 0,
					);
				}
					$this->session->set_userdata($data_session);
                    
					redirect('Plh/index');
            }
        } else {
            redirect('Auth');
        }
    }
    
}
