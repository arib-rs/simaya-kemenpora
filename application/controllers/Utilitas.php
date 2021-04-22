<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Utilitas extends CI_Controller
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
    public function jenis_surat()
    {
        $data['edit'] = '';
        $data['title'] = 'Jenis Surat';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_jenis_surat->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/jenis_surat', $data);
        $this->load->view('templates/footer');
    }
    public function edit_jenis_surat($id)
    {
        $data['edit'] = $this->M_jenis_surat->select_JenisSuratById($id);
        $data['title'] = 'Jenis Surat';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_jenis_surat->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/jenis_surat', $data);
        $this->load->view('templates/footer');
    }
    public function satuan_kerja()
    {
        $data['edit'] = '';
        $data['title'] = 'Satuan Unit Kerja';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_satuan_kerja->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/satuan_kerja', $data);
        $this->load->view('templates/footer');
    }
    public function edit_satuan_kerja($id)
    {

        $data['edit'] = $this->M_satuan_kerja->select_SatuanKerjaById($id);
        $data['title'] = 'Satuan Unit Kerja';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_satuan_kerja->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/satuan_kerja', $data);
        $this->load->view('templates/footer');
    }
    public function jabatan()
    {
        $data['edit'] = '';
        $data['title'] = 'Jabatan';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_jabatan->select();

        $data['satuankerja'] = $this->M_satuan_kerja->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/jabatan', $data);
        $this->load->view('templates/footer');
    }
    public function edit_jabatan($id)
    {

        $data['edit'] = $this->M_jabatan->select_JabatanById($id);
        $data['title'] = 'Jabatan';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_jabatan->select();

        $data['satuankerja'] = $this->M_satuan_kerja->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/jabatan', $data);
        $this->load->view('templates/footer');
    }
    public function pegawai()
    {

        $data['edit'] = "";
        $data['title'] = 'Pegawai';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_pegawai->select();
        $data['satuankerja'] = $this->M_satuan_kerja->select();
        $data['jabatan'] = $this->M_jabatan->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/pegawai', $data);
        $this->load->view('templates/footer');
    }
    public function edit_pegawai($id)
    {

        $data['edit'] = $this->M_pegawai->select_PegawaiById($id);
        $data['title'] = 'Pegawai';
        $data['user'] = $this->session->userdata('username');
        $data['data'] = $this->M_pegawai->select();
        $data['satuankerja'] = $this->M_satuan_kerja->select();
        $data['jabatan'] = $this->M_jabatan->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/pegawai', $data);
        $this->load->view('templates/footer');
    }
    public function edit_user($id)
    {

        $data['edit'] = $this->M_user->Select_UserById($id);

        $data['title'] = 'User';
        $data['user'] = $this->session->userdata('username');

        $data['data'] = $this->M_user->Select_User();
        $data['pegawai'] = $this->M_pegawai->select_BelumAdaAkun();
        $data['grup'] = $this->M_grup->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/user', $data);
        $this->load->view('templates/footer');
    }
    public function user()
    {
        $data['edit'] = "";
        $data['title'] = 'User';
        $data['user'] = $this->session->userdata('username');

        $data['data'] = $this->M_user->Select_User();
        $data['pegawai'] = $this->M_pegawai->select_BelumAdaAkun();
        $data['grup'] = $this->M_grup->select();

        $data['notifsurat'] = $this->M_surat->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_disposisi->select_DisposisiBelumTerbaca();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/user', $data);
        $this->load->view('templates/footer');
    }
    public function del_JenisSurat($id)
    {

        if ($this->M_jenis_surat->del($id)) {
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data <b>berhasil </b> dihapus</div>');
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Data <b>tidak bisa </b> dihapus. Data sedang digunakan.</div>');
        }


        redirect('Utilitas/jenis_surat');
    }
    public function del_SatuanKerja($id)
    {
        if ($this->M_satuan_kerja->del($id)) {
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data <b>berhasil </b> dihapus</div>');
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Data <b>tidak bisa </b> dihapus. Data sedang digunakan.</div>');
        }

        redirect('Utilitas/satuan_kerja');
    }
    public function del_Jabatan($id)
    {
        if ($this->M_jabatan->del($id)) {
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data <b>berhasil </b> dihapus</div>');
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Data <b>tidak bisa </b> dihapus. Data sedang digunakan.</div>');
        }
        redirect('Utilitas/jabatan');
    }
    public function del_Pegawai($id)
    {
        if ($this->M_pegawai->del($id)) {
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data <b>berhasil </b> dihapus</div>');
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Data <b>tidak bisa </b> dihapus. Data sedang digunakan.</div>');
        }
        redirect('Utilitas/pegawai');
    }
    public function del_User($id)
    {
        if ($this->M_user->del($id)) {
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data <b>berhasil </b> dihapus</div>');
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Data <b>tidak bisa </b> dihapus. Data sedang digunakan.</div>');
        }
        redirect('Utilitas/user');
    }
    public function add_JenisSurat()
    {
        if ($this->session->userdata('username')) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"><b>Lengkapi data</b> terlebih dahulu</div>');
                redirect('Utilitas/jenis_surat');
            } else {

                $data = array(
                    'jenis_surat'    => $_POST['jenis_surat'],
                    'keterangan'    => $_POST['keterangan']
                );
                if (empty($_POST['id_edit'])) {
                    $this->M_jenis_surat->add($data);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Jenis surat <b>berhasil </b> disimpan</div>');
                } else {
                    $this->M_jenis_surat->update($data, $_POST['id_edit']);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Jenis surat <b>berhasil </b> diubah</div>');
                }
                redirect('Utilitas/jenis_surat');
            }
        } else {
            redirect('Auth');
        }
    }
    public function add_SatuanKerja()
    {
        if ($this->session->userdata('username')) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_unit', 'Nama Unit', 'required');
            $this->form_validation->set_rules('nama_unit_singkat', 'Nama Unit Singkat', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"><b>Lengkapi data</b> terlebih dahulu</div>');
                redirect('Utilitas/satuan_kerja');
            } else {
                $data = array(
                    'nama_unit'    => $_POST['nama_unit'],
                    'nama_unit_singkat'    => $_POST['nama_unit_singkat']

                );
                if (empty($_POST['id_edit'])) {
                    $this->M_satuan_kerja->add($data);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Satuan unit kerja <b>berhasil </b> disimpan</div>');
                } else {
                    $this->M_satuan_kerja->update($data, $_POST['id_edit']);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Satuan unit kerja <b>berhasil </b> diubah</div>');
                }
                redirect('Utilitas/satuan_kerja');
            }
        } else {
            redirect('Auth');
        }
    }
    public function add_Jabatan()
    {
        if ($this->session->userdata('username')) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_unit', 'Satuan Kerja', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"><b>Lengkapi data</b> terlebih dahulu</div>');
                redirect('Utilitas/jabatan');
            } else {
                $data = array(
                    'jabatan'    => $_POST['jabatan'],
                    'id_satuan_kerja'    => $_POST['nama_unit']

                );
                if (empty($_POST['id_edit'])) {
                    $this->M_jabatan->add($data);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Jabatan <b>berhasil </b> disimpan</div>');
                } else {
                    $this->M_jabatan->update($data, $_POST['id_edit']);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Jabatan <b>berhasil </b> diubah</div>');
                }
                redirect('Utilitas/jabatan');
            }
        } else {
            redirect('Auth');
        }
    }
    public function ubah_PassUser($id)
    {
        if ($this->session->userdata('username')) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('oldpassword', 'Password Lama', 'required');
            $this->form_validation->set_rules('newpassword', 'Password Baru', 'required');
            $this->form_validation->set_rules('newpasswordconf', 'Ulangi Password Baru', 'required');
            if ($this->form_validation->run() == FALSE) {
                redirect($_POST['url']);
            } else {
                if (md5($_POST['oldpassword']) == $this->session->userdata('password') && $_POST['newpassword'] == $_POST['newpasswordconf']) {

                    $data = array(
                        'password'    => md5($_POST['newpassword'])
                    );


                    $this->M_user->update_pass($data, $id);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Password <b>berhasil </b> diubah. Silahkan login kembali.</div>');
                    $this->session->sess_destroy();
                    redirect('Auth');
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Password <b>gagal </b> diubah. Password salah.</div>');
                    redirect($_POST['url']);
                }
            }
        } else {
            redirect('Auth');
        }
    }
    public function add_Pegawai()
    {
        if ($this->session->userdata('username')) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('nip', 'NIP', 'required');
            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('nama_singkat', 'Nama Singkat', '');
            $this->form_validation->set_rules('alamat', 'Alamat', '');
            $this->form_validation->set_rules('telp', 'Telp', '');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', '');
            $this->form_validation->set_rules('golongan', 'Golongan', '');
            $this->form_validation->set_rules('agama', 'Agama', '');
            $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', '');
            $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', '');
            if (empty($_POST['id_edit'])) {
			$this->form_validation->set_rules('satuan_kerja', 'Satuan Kerja', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $this->form_validation->set_rules('level', 'Level', 'required');
			}
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"><b>Lengkapi data</b> terlebih dahulu</div>');
                redirect('Utilitas/pegawai');
            } else {

                if (strlen($_POST['nip']) == 18) {
                    $data = array(
                        'nip'    => $_POST['nip'],
                        'nama_lengkap'    => $_POST['nama_lengkap'],
                        'nama_singkat'    => $_POST['nama_singkat'],
                        'alamat'    => $_POST['alamat'],
                        'telp'    => $_POST['telp'],
                        'jenis_kelamin'    => $_POST['jenis_kelamin'],
                        'golongan'    => $_POST['golongan'],
                        'agama'    => $_POST['agama'],
                        'tempat_lahir'    => $_POST['tempat_lahir'],
                        'tgl_lahir'    => date("Y-m-d", strtotime($_POST['tgl_lahir']))
                    );


                    if (empty($_POST['id_edit'])) {
                        $this->M_pegawai->add($data);
                        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data <b>berhasil </b> disimpan</div>');
                    } else {
                        $this->M_pegawai->update($data, $_POST['id_edit']);
                        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data <b>berhasil </b> diubah</div>');
                    }
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"><b>NIP </b>harus terdiri dari 18 digit</div>');
                }

				
                redirect('Utilitas/pegawai');
            }
        } else {
            redirect('Auth');
        }
    }
    public function add_User()
    {
        if ($this->session->userdata('username')) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"><b>Lengkapi data</b> terlebih dahulu</div>');
                redirect('Utilitas/user');
            } else {
                $is_unique = count($this->M_user->select_UserByUsername($_POST['username']));
                if (empty($_POST['id_edit'])) {

                    if ($is_unique == 0) {
                        $data = array(
                            'id_pegawai'    => $_POST['pegawai'],
                            'username'    => $_POST['username'],
                            'password'    => md5($_POST['password']),
                            'id_grup' => $_POST['grup']
                        );
                        $this->M_user->add($data);
                        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Akun <b>berhasil </b> disimpan</div>');
                        redirect('Utilitas/user');
                    } else {
                        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Username <b>sudah dipakai.</b> Gunakan username lain.</div>');
                        redirect('Utilitas/user');
                    }
                } else {
                    $data = '';
                    if ($_POST['username'] == $_POST['oldusername'] && $_POST['password'] == $_POST['oldpassword']) {
                        $data = array(
                            'id_grup' => $_POST['grup']
                        );
                    } else if ($_POST['username'] == $_POST['oldusername'] && $_POST['password'] != $_POST['oldpassword']) {
                        $data = array(
                            'password'    => md5($_POST['password']),
                            'id_grup' => $_POST['grup']
                        );
                    } else if ($_POST['username'] != $_POST['oldusername'] && $_POST['password'] == $_POST['oldpassword']) {
                        if ($is_unique == 0) {
                            $data = array(
                                'username'    => $_POST['username'],
                                'id_grup' => $_POST['grup']
                            );
                        } else {
                            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Username <b>sudah dipakai.</b> Gunakan username lain.</div>');
                            redirect('Utilitas/edit_user/' . $_POST['id_edit']);
                        }
                    } else {
                        $data = array(
                            'username'    => $_POST['username'],
                            'password'    => md5($_POST['password']),
                            'id_grup' => $_POST['grup']
                        );
                    }
                    $this->M_user->update_user($data, $_POST['id_edit']);
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data akun <b>berhasil </b> diubah</div>');
                    redirect('Utilitas/user');
                }
            }
        } else {
            redirect('Auth');
        }
    }
    public function select_JabatanBySatuanKerja()
    {

        if ($_POST['id_satker'] != '') {
            $data = $this->M_jabatan->select_JabatanBySatuanKerja($this->input->post('id_satker'));

            if (count($data) != 0) {
                foreach ($data as $d) {
                    if ($d['id'] == $_POST['id_jbtn']) {
                        echo "<option value='" . $d['id'] . "' selected>" . $d['jabatan'] . "</option>";
                    } else {
                        echo "<option value='" . $d['id'] . "'>" . $d['jabatan'] . "</option>";
                    }
                }
            } else {
                echo "<option value='' selected disabled>-- Jabatan Tidak Tersedia --</option>";
            }
        } else {
            echo "<option value='' selected disabled>-- Pilih Struktur Organisasi --</option>";
        }
    }
    public function bagan()
    {

        $data = $this->M_pegawai->select_PegawaiBySatuanKerja($this->input->post('id_satker'));
        if (count($data) != 0) {
            echo "
       
                        <ul>
                            <li class='jstree-open'><h3>" . $data[0]['nama_unit'] . "</h3>
                                <ul>
                                ";

            $lvl = array('-', 'Administrator', 'Menteri', 'Eselon 1', 'Eselon 2', 'Eselon 3', 'Eselon 4');
            for ($i = 2; $i < 7; $i++) {
                $data = $this->M_pegawai->select_PegawaiBySatuanKerjaLv($this->input->post('id_satker'), $i);
                if (count($data) != 0) {
                    echo " <li style='border:1px solid gainsboro;'><span class=' label label-info'>" . $lvl[$i] . "</span>
                    <ul style='margin:10px; '>";

                    foreach ($data as $d) {
                        echo "<li style='margin:3px; border:1px solid gainsboro; padding:15px; border-radius:5px; display:inline-block;'>" . $d['nama_lengkap'] . " <br/> " . $d['jabatan'] . "</li>";
                    }

                    echo " </ul>
            </li>";
                }
            }




            echo "
                                </ul>
                            </li>
                        </ul>
       
        ";
        } else {
            echo "<h3>Data pegawai tidak tersedia</h3>";
        }
    }
}
