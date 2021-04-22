<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_keluar extends CI_Controller
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

        $data['title'] = 'Disposisi Keluar';

        $data['user'] = $this->session->userdata('username');
        $data['jumlah_disposisi'] = count($this->M_disposisi->select_untukpengirim());
        $data['jumlah_terbaca'] = $this->M_disposisi->get_JumlahDisposisiTerbaca();
        $data['jumlah_belum_terbaca'] = $this->M_disposisi->get_JumlahDisposisiBelumTerbaca();
        $data['jumlah_ditolak'] = $this->M_disposisi->get_JumlahDisposisiDitolak();
        $data['data'] = $this->M_disposisi->select_untukpengirim();
        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_keluar/disposisi_keluar', $data);
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
        if ($data['data'] == NULL) {
        } else {

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
    public function del($id)
    {
        $q = $this->M_disposisi->select_DisposisiMasukById($id);

        if($this->M_disposisi->del($id)){
        $c = count($this->M_disposisi->select_ByIdSurat($q[0]['id_surat']));
        if ($c == 0) {
            $this->M_surat->update_DisposisiBatal($q[0]['id_surat']);
        }
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data <b>berhasil </b> dihapus</div>');
        }else{
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Data <b>gagal </b> dihapus</div>');
        }
        redirect('Disposisi_keluar');
    }
}
