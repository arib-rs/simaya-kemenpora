<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('username') != TRUE) {

            redirect(base_url());
        }
        $this->load->model('M_surat');
        $this->load->model('M_user');
        $this->load->model('M_pegawai');
        $this->load->model('M_disposisi');
    }
    public function index()
    {

        $data['title'] = 'Dashboard';

        $data['user'] = $this->session->userdata('username');
        $data['jumlah_terbaca'] = $this->M_surat->get_JumlahSuratTerbaca();
        $data['jumlah_surat'] = count($this->M_surat->select_SuratMasuk());
        $data['jumlah_disposisi'] = count($this->M_disposisi->select());
        $data['jumlah_ditolak'] = $this->M_disposisi->get_JumlahDisposisiDitolak();
        $data['suratperbulan'] = '';
        for ($i = 1; $i <= 12; $i++) {
            $data['suratperbulan'][$i] = $this->M_surat->get_JumlahByBulan($i);
            // $data['rekapsurat'][$i] = $this->M_surat->select_JumlahSuratPerUnitPerBulan($i);
        }
        $data['suratunit'] = $this->M_surat->select_JumlahSuratPerUnit();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
        // $data['data'] = $this->select();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function select()
    {
        // $q = $this->db
        //     ->select('s.id as id, ss.id_surat as id_surat, no_agenda, tgl_diterima, no_surat,id_jenis_surat,perihal,pengirim ')
        //     ->from('tb_status_surat as ss')
        //     ->join('tb_surat as s', 'ss.id_surat = s.id ')
        //     // ->where()
        //     ->get();


        // return $q->result_array();
    }
}
