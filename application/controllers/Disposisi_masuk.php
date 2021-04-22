<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') != TRUE) {

            redirect(base_url());
        }
        $this->load->model('M_surat');
        $this->load->model('M_disposisi');
    }
    public function index()
    {

        $data['title'] = 'Disposisi Masuk';

        $data['user'] = $this->session->userdata('username');
        $data['jumlah_disposisi'] = count($this->M_disposisi->select());
        $data['jumlah_terbaca'] = $this->M_disposisi->get_JumlahDisposisiTerbaca();
        $data['jumlah_belum_terbaca'] = $this->M_disposisi->get_JumlahDisposisiBelumTerbaca();
        $data['jumlah_ditolak'] = $this->M_disposisi->get_JumlahDisposisiDitolak();
        $data['data'] = $this->M_disposisi->select();
        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/disposisi_masuk', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Disposisi';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_disposisi->select_DisposisiMasukbyId($id);
        $tmp = $this->M_disposisi->select_DisposisiMasukbyId($id);
        $data['tujuan'] = $this->M_disposisi->select_DisposisiMasukbyNoAgenda($tmp[0]['agenda_disposisi']);
        $data['histori'] = $this->M_disposisi->select_historidisposisi($tmp[0]['id_surat']);
        if ($data['data'] == NULL) { } else {

            if ($data['data'][0]['terbaca'] == 0 && $data['data'][0]['penerima'] == $this->session->userdata('id')) {
                $this->M_disposisi->update_Terbaca($id);
            }
            $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
            $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/detail_disposisi', $data);
            $this->load->view('templates/footer');
        }
    }
    public function tolak($id)
    {
        $this->M_disposisi->update_Ditolak($id);
        redirect('Disposisi_masuk');
    }
}
