<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_surat->select_SuratMasuk();
        $data['jumlah_surat'] = count($this->M_surat->select_SuratMasuk());
        $data['jumlah_disposisi'] = $this->M_surat->get_JumlahSuratDisposisi();
        $data['jumlah_terbaca'] = $this->M_surat->get_JumlahSuratTerbaca();
        $data['jumlah_belum_terbaca'] = $this->M_surat->get_JumlahSuratBelumTerbaca();
        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id)
    {

        $data['title'] = 'Detail Surat';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_surat->select_SuratMasukbyId($id);
        $data['disposisi'] = $this->M_disposisi->select_DisposisiMasukbyId($id);
        $data['histori'] = $this->M_disposisi->select_historidisposisi($id);
        if ($data['data'] == NULL) {
        } else {
            if ($data['data'][0]['terbaca'] == 0 && $data['data'][0]['penerima'] == $this->session->userdata('id')) {

                $this->M_surat->update_Terbaca($id);
            }
            $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
            $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/detail', $data);
            $this->load->view('templates/footer');
        }
    }
    public function detail_disposisi($id)
    {
        $data['title'] = 'Detail Disposisi';
        $data['user'] = $this->session->userdata('username');

        $no_agenda = $this->M_disposisi->select_ByIdSurat($id);


        $data['data'] = $this->M_disposisi->select_DisposisiMasukbyId($no_agenda[0]['id']);
        $tmp = $this->M_disposisi->select_DisposisiMasukbyId($no_agenda[0]['id']);
        $data['tujuan'] = $this->M_disposisi->select_DisposisiMasukbyNoAgenda($tmp[0]['agenda_disposisi']);

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
        if ($data['data'] == NULL) {
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/detail_disposisi', $data);
            $this->load->view('templates/footer');
        }
    }

    public function form_tindaklanjut($id)
    {
        $data['title'] = 'Tindak Lanjut';
        $data['user'] = $this->session->userdata('username');
        $data['id'] = $this->session->userdata('id');
        $data['detailuser'] = $this->M_pegawai->select_PegawaiById($this->session->userdata('id'));
        $data['penerima'] = $this->M_pegawai->select_PenerimaDisposisi();
        $data['data'] = $this->M_surat->select_SuratMasukbyId($id);
        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
        if ($data['data'] == NULL) {
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/form_tindaklanjut', $data);
            $this->load->view('templates/footer');
        }
    }

    public function form_disposisi($id)
    {
        $data['title'] = 'Buat Disposisi';
        $data['user'] = $this->session->userdata('username');
        $data['id'] = $this->session->userdata('id');
        $data['detailuser'] = $this->M_pegawai->select_PegawaiById($this->session->userdata('id'));
        $data['penerima'] = $this->M_pegawai->select_PenerimaDisposisi();
        $data['data'] = $this->M_surat->select_SuratMasukbyId($id);
        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
        if ($data['data'] == NULL) {
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/form_disposisi', $data);
            $this->load->view('templates/footer');
        }
    }
    public function approve_surat()
    {
        date_default_timezone_set('Asia/Jakarta');

        $is_unique_surat = $this->M_surat->get_JumlahSuratByNoAgenda($_POST['no_agenda_disposisi']);
        $is_unique_status = $this->M_surat->get_JumlahStatusSuratByNoAgenda($_POST['no_agenda_disposisi']);
        if ($this->session->userdata('username')) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('no_agenda_disposisi', 'No Agenda Disposisi', 'required');
            if ($this->form_validation->run() == FALSE) {
                redirect('Surat_masuk');
            } else {


                if ($is_unique_surat == 0 && $is_unique_status == 0) {

                    $data = array(
                        'no_agenda_disposisi'    => $_POST['no_agenda_disposisi'],
                        'approver' => $this->session->userdata('id'),
                        'diterima' => '1',
                        'tgl_diterima' => date("Y-m-d H:i:s")
                    );


                    $this->M_surat->update_StatusSurat($data, $_POST['id_surat']);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Surat <b>berhasil </b> disetujui</div>');

                    redirect('Surat_masuk');
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"><b>No Agenda</b> sudah digunakan. Gunakan No Agenda lain.</div>');
                    redirect('Surat_masuk');
                }
            }
        } else {
            redirect('Auth');
        }
    }
    public function add_disposisi()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('username')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('penerima[]', 'Penerima', 'required');
            $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
            $this->form_validation->set_rules('penting', 'Penting', 'required');
            $this->form_validation->set_rules('urgensi', 'Urgensi', 'required');
            $this->form_validation->set_rules('sifat_disposisi', 'Sifat Disposisi', 'required');
            $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');
            $this->form_validation->set_rules('pesan', 'Pesan', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"><b>Lengkapi data</b> terlebih dahulu</div>');
                redirect('Surat_masuk/form_disposisi/' . $_POST['id_surat']);
            } else {
                $no = $_POST['no_agenda'];
                $is_unique = $this->M_disposisi->get_JumlahDisposisiByNo_Agenda($no);
                if ($is_unique == 0) {
                    $penerima = $_POST['penerima'];
                    foreach ($penerima as $p) {
                        $disposisi = array(
                            'id_surat'    => $_POST['id_surat'],
                            'no_agenda'    => date("YmdHis"),
                            'pengirim'    => $_POST['pengirim'],
                            'penerima'    => $p,
                            'pesan'    => $_POST['pesan'],
                            'tgl_disposisi'    => date("Y-m-d H:i:s"),
                            'tgl_selesai'    => date("Y-m-d", strtotime($_POST['tgl_selesai'])),
                            'urgensi'    => $_POST['urgensi'],
                            'sifat_disposisi'    => $_POST['sifat_disposisi'],
                            'penting'    => $_POST['penting'],
                            'dijawab'   => (isset($_POST['dijawab'])) ? $_POST['dijawab'] : '0',
                            'ditindak_lanjuti'   => (isset($_POST['ditindak_lanjuti'])) ? $_POST['ditindak_lanjuti'] : '0',
                            'ditanggapi_tertulis'   => (isset($_POST['ditanggapi_tertulis'])) ? $_POST['ditanggapi_tertulis'] : '0',
                            'disiapkan_makalah'   => (isset($_POST['disiapkan_makalah'])) ? $_POST['disiapkan_makalah'] : '0',
                            'koordinasikan'   => (isset($_POST['koordinasikan'])) ? $_POST['koordinasikan'] : '0',
                            'diwakili'   => (isset($_POST['diwakili'])) ? $_POST['diwakili'] : '0',
                            'dihadiri'   => (isset($_POST['dihadiri'])) ? $_POST['dihadiri'] : '0',
                            'disiapkan_surat'   => (isset($_POST['disiapkan_surat'])) ? $_POST['disiapkan_surat'] : '0',
                            'arsip'   => (isset($_POST['arsip'])) ? $_POST['arsip'] : '0',
                            'agendakan'   => (isset($_POST['agendakan'])) ? $_POST['agendakan'] : '0',
                            'diperhatikan'   => (isset($_POST['diperhatikan'])) ? $_POST['diperhatikan'] : '0',
                            'dijelaskan'   => (isset($_POST['dijelaskan'])) ? $_POST['dijelaskan'] : '0',
                            'diperbaiki'   => (isset($_POST['diperbaiki'])) ? $_POST['diperbaiki'] : '0',
                            'diproses'   => (isset($_POST['diproses'])) ? $_POST['diproses'] : '0',
                            'diketahui'   => (isset($_POST['diketahui'])) ? $_POST['diketahui'] : '0',
                            'dibicarakan'   => (isset($_POST['dibicarakan'])) ? $_POST['dibicarakan'] : '0',
                            'lainlain'   => (isset($_POST['lainlain'])) ? $_POST['lainlain'] : '0'
                        );
                        $this->M_disposisi->add($disposisi);

                        $this->M_surat->update_Disposisi($_POST['id_surat']);
                    }
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Disposisi <b>sudah terkirim</b></div>');
                    redirect('Disposisi_keluar');
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-warning" role="alert">No Agenda <b>sudah terpakai</b></div>');
                    redirect('Surat_masuk/form_disposisi/' . $_POST['id_surat']);
                }
            }
        } else {
            redirect('Auth');
        }
    }

    public function add_tindaklanjut()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('username')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');
            $foto = $this->upload_foto(); 

                        $disposisi = array(
                            'id_surat'         => $_POST['id_surat'],
                            'statusjawaban'    => $_POST['statusjawaban'],
                            'jawaban'          => $_POST['jawaban'],
                            'lampiranjawaban'  => $foto['file_name'],                            
                        );

                       // echo print_r($disposisi);

                        $this->db->set($disposisi);
                        $this->M_surat->add_Tindaklanjut($_POST['id_surat']);
                    
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Disposisi <b>sudah terkirim</b></div>');
                    redirect('Disposisi_keluar');

        }
    }

    function upload_foto(){
        $config['upload_path']          = './upload/tindaklanjut';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('lampiranjawaban');
        return $this->upload->data();
    }

    public function cetak_disposisi($id)
    {
        // // Require composer autoload
        // require_once '/vendor/autoload.php';
        // Create an instance of the class:
        $data['data'] = $this->M_disposisi->select_DisposisiMasukbyId($id);
        $tmp = $this->M_disposisi->select_DisposisiMasukbyId($id);
        $data['tujuan'] = $this->M_disposisi->select_DisposisiMasukbyNoAgenda($tmp[0]['agenda_disposisi']);
        $data['surat'] = $this->M_surat->select_SuratMasukbyId($tmp[0]['id_surat']);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);

        $mpdf->useSubstitutions = true;

        $mpdf->simpleTables = true;


        $html = $this->load->view('surat_masuk/hasil_disposisi', $data, true);

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output();
    }

}
