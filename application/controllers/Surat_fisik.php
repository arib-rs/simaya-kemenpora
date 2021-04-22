<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_fisik extends CI_Controller
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
        $data['title'] = 'Surat Fisik';

        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_surat->select_SuratFisik();
        $data['jumlah_surat'] = $this->M_surat->get_JumlahSuratFisik();
        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_fisik/index', $data);
        $this->load->view('templates/footer');
    }
    public function entri()
    {
        $data['edit'] = "";
        $this->load->model('M_jenis_surat');
        $this->load->model('M_pegawai');
        $data['title'] = 'Entri - Surat Fisik';

        $data['user'] = $this->session->userdata('username');
        $data['id'] = $this->session->userdata('id');

        $data['penerima'] = $this->M_pegawai->select_PenerimaDinas();
        //    $data['nondinas'] = $this->M_pegawai->select_PenerimaNonDinas();
        //   $data['pengirim'] = $this->M_pegawai->select_all();
        $data['jenis'] = $this->M_jenis_surat->select();
        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_fisik/entri', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        $data['edit'] = $this->M_surat->select_SuratMasukbyId($id);

        $this->load->model('M_jenis_surat');
        $this->load->model('M_pegawai');
        $data['title'] = 'Entri - Surat Fisik';

        $data['user'] = $this->session->userdata('username');
        $data['id'] = $this->session->userdata('id');

        $data['penerima'] = $this->M_pegawai->select_PenerimaDinas();
        // $data['pengirim'] = $this->M_pegawai->select_all();
        $data['jenis'] = $this->M_jenis_surat->select();
        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_fisik/entri', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('username')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('no_agenda', 'No Agenda');
            $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
            $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
            $this->form_validation->set_rules('perihal', 'Perihal', 'required');
            $this->form_validation->set_rules('urgensi', 'Urgensi', 'required');
            $this->form_validation->set_rules('sifat_surat', 'Sifat Surat', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"><b>Lengkapi form</b> terlebih dahulu</div>');
                redirect('Surat_fisik/entri');
            } else {
                $no = $_POST['no_surat'];

                $is_unique = $this->M_surat->get_JumlahSuratByNoSurat($no);
                $is_unique_no = $this->M_surat->get_JumlahSuratByNoAgenda($_POST['no_agenda']);

                $lampiran1 = $_FILES['lampiran1']['name'];
                $lampiran2 = $_FILES['lampiran2']['name'];
                $lampiran3 = $_FILES['lampiran3']['name'];
                $lampiran4 = $_FILES['lampiran4']['name'];
                $lampiran5 = $_FILES['lampiran5']['name'];
                // $dinas = $_POST['satuan_kerja'];
                // $nondinas = $_POST['non_dinas'];
                $surat = '';
                $status = '';

                if (!empty($lampiran1)) {
                    if ($this->M_surat->_upload('lampiran1', $_POST['no_agenda']) == NULL) {

                        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Surat <b>gagal</b> disimpan. <b>Lampiran 1 tidak sesuai format</b></div>');
                        redirect('Surat_fisik/entri');
                    }
                }
                if (!empty($lampiran2)) {
                    if ($this->M_surat->_upload('lampiran2', $_POST['no_agenda']) == NULL) {
                        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Surat <b>gagal</b> disimpan. <b>Lampiran 2 tidak sesuai format</b></div>');
                        redirect('Surat_fisik/entri');
                    }
                }
                if (!empty($lampiran3)) {
                    if ($this->M_surat->_upload('lampiran3', $_POST['no_agenda']) == NULL) {
                        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Surat <b>gagal</b> disimpan. <b>Lampiran 3 tidak sesuai format</b></div>');
                        redirect('Surat_fisik/entri');
                    }
                }
                if (!empty($lampiran4)) {
                    if ($this->M_surat->_upload('lampiran4', $_POST['no_agenda']) == NULL) {
                        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Surat <b>gagal</b> disimpan. <b>Lampiran 4 tidak sesuai format</b></div>');
                        redirect('Surat_fisik/entri');
                    }
                }
                if (!empty($lampiran5)) {
                    if ($this->M_surat->_upload('lampiran5', $_POST['no_agenda']) == NULL) {
                        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Surat <b>gagal</b> disimpan. <b>Lampiran 5 tidak sesuai format</b></div>');
                        redirect('Surat_fisik/entri');
                    }
                }

                if (empty($_POST['id_edit'])) {

                    $penerima = $_POST['penerima'];
                    $count = 0;
                    foreach ($penerima as $p) {
                        $surat = array(
                            'no_agenda'    => $_POST['no_agenda'],
                            'no_surat'    => $_POST['no_surat'],

                            'perihal'    => $_POST['perihal'],
                            'urgensi'    => $_POST['urgensi'],
                            'sifat_surat'    => $_POST['sifat_surat'],
                            'isi'    => '',
                            'keterangan'    => $_POST['keterangan'],

                            'tgl_entri' => date("Y-m-d H:i:s"),
                            'tgl_terima_surat' => date("Y-m-d", strtotime($_POST['tgl_terima'])),
                            'tgl_surat' => date("Y-m-d", strtotime($_POST['tgl_surat'])),
                            'id_registrator' => $_POST['registrator'],
                            'kategori' => 'Surat Fisik',
                            'id_jenis_surat' => $_POST['jenis_surat'],
                            'lampiran1' => (!empty($lampiran1)) ? 'surat_' . $_POST['no_agenda'] . '_lampiran1.' . pathinfo($lampiran1, PATHINFO_EXTENSION) : NULL,
                            'lampiran2' => (!empty($lampiran2)) ? 'surat_' . $_POST['no_agenda'] . '_lampiran2.' . pathinfo($lampiran2, PATHINFO_EXTENSION) : NULL,
                            'lampiran3' => (!empty($lampiran3)) ? 'surat_' . $_POST['no_agenda'] . '_lampiran3.' . pathinfo($lampiran3, PATHINFO_EXTENSION) : NULL,
                            'lampiran4' => (!empty($lampiran4)) ? 'surat_' . $_POST['no_agenda'] . '_lampiran4.' . pathinfo($lampiran4, PATHINFO_EXTENSION) : NULL,
                            'lampiran5' => (!empty($lampiran5)) ? 'surat_' . $_POST['no_agenda'] . '_lampiran5.' . pathinfo($lampiran5, PATHINFO_EXTENSION) : NULL
                        );
                        if ($is_unique == 0) {
                            // if ($is_unique_no == 0) {

                            $this->M_surat->add_SuratFisik($surat);

                            $idsurat = $this->M_surat->select_SuratFisikByNoSurat($no);

                            if($this->session->userdata('grup') == '3'){
                                $status = array(
                                    'id_surat' => $idsurat[$count]['id'],
                                    'no_agenda_disposisi' => $_POST['no_agenda'],
                                    'pengirim' => $_POST['pengirim'],
                                    'penerima' => $p,
                                    'approver' => $this->session->userdata('id'),
                                    'diterima' => '1',
                                    'tgl_diterima' => null                                    
                                );
                            }else{
                                 $status = array(
                                    'id_surat' => $idsurat[$count]['id'],
                                    'pengirim' => $_POST['pengirim'],
                                    'penerima' => $p,
                                    'diterima' => '0',
                                    'tgl_diterima' => null
                                );
                            }
                           
                            $this->M_surat->add_StatusSurat($status);
                            $count++;
                            // } else {
                            //     $this->session->set_flashdata('flash', '<div class="alert alert-warning" role="alert">No Agenda <b>sudah terpakai</b></div>');
                            //     redirect('Surat_fisik/entri');
                            // }
                        } else {
                            $this->session->set_flashdata('flash', '<div class="alert alert-warning" role="alert">No Surat <b>sudah terpakai</b></div>');
                            redirect('Surat_fisik/entri');
                        }
                    }
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Surat <b>tersimpan</b></div>');
                    redirect('Surat_fisik/');
                } else {
					

                    if ($_POST['oldnosurat'] == $_POST['no_surat']) {
					    
						$surat = array(
                            // 'no_agenda'    => $_POST['no_agenda'],
                            // 'no_surat'    => $_POST['no_surat'],
                            'perihal'    => $_POST['perihal'],
                            'urgensi'    => $_POST['urgensi'],
                            'sifat_surat'    => $_POST['sifat_surat'],
                            'isi'    => '',
                            'keterangan'    => $_POST['keterangan'],
                            'tgl_terima_surat' => date("Y-m-d", strtotime($_POST['tgl_terima'])),
                            'tgl_surat' => date("Y-m-d", strtotime($_POST['tgl_surat'])),
                            'tgl_update' => date("Y-m-d H:i:s"),
                            'id_registrator_update' => $_POST['registrator'],
                            'kategori' => 'Surat Fisik',
                            'id_jenis_surat' => $_POST['jenis_surat'],
							'lampiran1' => (!empty($lampiran1)) ? 'surat_' . $_POST['no_agenda'] . '_lampiran1.' . pathinfo($lampiran1, PATHINFO_EXTENSION) : $_POST['lampiran1_info'],
                            'lampiran2' => (!empty($lampiran2)) ? 'surat_' . $_POST['no_agenda'] . '_lampiran2.' . pathinfo($lampiran2, PATHINFO_EXTENSION) : $_POST['lampiran2_info'],
                            'lampiran3' => (!empty($lampiran3)) ? 'surat_' . $_POST['no_agenda'] . '_lampiran3.' . pathinfo($lampiran3, PATHINFO_EXTENSION) : $_POST['lampiran3_info'],
                            'lampiran4' => (!empty($lampiran4)) ? 'surat_' . $_POST['no_agenda'] . '_lampiran4.' . pathinfo($lampiran4, PATHINFO_EXTENSION) : $_POST['lampiran4_info'],
                            'lampiran5' => (!empty($lampiran5)) ? 'surat_' . $_POST['no_agenda'] . '_lampiran5.' . pathinfo($lampiran5, PATHINFO_EXTENSION) : $_POST['lampiran5_info']
                        );
                    } else {
                        if ($is_unique == 0) {
                            $surat = array(
                                'no_surat'    => $_POST['no_surat'],
                                'perihal'    => $_POST['perihal'],
                                'urgensi'    => $_POST['urgensi'],
                                'sifat_surat'    => $_POST['sifat_surat'],
                                'isi'    => '',
                                'keterangan'    => $_POST['keterangan'],
                                'tgl_terima_surat' => date("Y-m-d", strtotime($_POST['tgl_terima'])),
                                'tgl_surat' => date("Y-m-d", strtotime($_POST['tgl_surat'])),
                                'tgl_update' => date("Y-m-d H:i:s"),
                                'id_registrator_update' => $_POST['registrator'],
                                'kategori' => 'Surat Fisik',
                                'id_jenis_surat' => $_POST['jenis_surat']
								
                            );
                        } else {
                            $this->session->set_flashdata('flash', '<div class="alert alert-warning" role="alert">No Surat <b>sudah terpakai</b></div>');
                            redirect('Surat_fisik/edit/' . $_POST['id_edit']);
                        }
                    }
                    $this->M_surat->update_Surat($surat, $_POST['id_edit']);

                    $idsurat = $this->M_surat->select_SuratFisikByNoSurat($no);
                    // if (empty($dinas) && empty($nondinas)) {
                    //     $status = array(
                    //         'pengirim' => $_POST['pengirim']
                    //     );
                    // } else {

                    $status = array(
                        'pengirim' => $_POST['pengirim'],
                        'penerima' => $_POST['penerima']

                    );
                    // }
                    $this->M_surat->update_StatusSurat($status, $_POST['id_edit']);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Surat <b>tersimpan</b></div>');
                    redirect('Surat_fisik/');
                }
            }
        } else {
            redirect('Auth');
        }
    }
    public function del($id)
    {
        $c = count($this->M_disposisi->select_ByIdSurat($id));
        if ($c == 0) {
            $q = $this->M_surat->select_SuratMasukbyId($id);
            $q2 = $this->M_surat->select_SuratFisikByNoSurat($q[0]['no_surat']);
            $this->M_surat->del_StatusSurat($id);
            if (count($q2) <= 1) {
                unlink(FCPATH . 'upload' . DIRECTORY_SEPARATOR . $q[0]['lampiran1']);
                unlink(FCPATH . 'upload' . DIRECTORY_SEPARATOR . $q[0]['lampiran2']);
                unlink(FCPATH . 'upload' . DIRECTORY_SEPARATOR . $q[0]['lampiran3']);
                unlink(FCPATH . 'upload' . DIRECTORY_SEPARATOR . $q[0]['lampiran4']);
                unlink(FCPATH . 'upload' . DIRECTORY_SEPARATOR . $q[0]['lampiran5']);
                $this->M_surat->del_Surat($id);
            }


            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data <b>berhasil </b> dihapus</div>');
        } else {

            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Data <b>gagal </b> dihapus. Surat sudah didisposisi.</div>');
        }

        redirect('Surat_fisik/');
    }
    public function cetak_tandaterima($id)
    {
        // // Require composer autoload
        // require_once '/vendor/autoload.php';
        // Create an instance of the class:

        $data['data'] = $this->M_surat->select_SuratMasukbyIdCetak($id);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);


        $html = $this->load->view('surat_masuk/tanda_terima', $data, true);

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output();
    }
}
