<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $this->login();
        } else {
            $this->load->view('auth/index');
        }
    }
    public function login()
    {
        $this->load->model('M_user');
        $this->load->model('M_surat');


        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $u = $this->db->where('username', $username)
            ->get('tb_user');

        // jika usernya ada
        if ($u->num_rows() == 1) {
            // cek password
            $p = $this->db->select('u.id as id_user, p.id as id_pegawai, p.*, p.level,p.idplh,j.jabatan, j.id_satuan_kerja, u.id_grup, sk.nama_unit ')
                ->from('tb_user as u')
                ->join('tb_pegawai as p', 'u.id_pegawai = p.id', 'left')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id', 'left')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
                ->where('username', $username)
                ->where('password', $password)
                ->get();


            $i = $p->result_array();

            if ($p->num_rows() == 1) {
                $data = array(
                    'id' => $i[0]['id_pegawai'],
                    'level' => $i[0]['level'],
                    'unit' => $i[0]['id_satuan_kerja'],
                    'grup' => $i[0]['id_grup'],
                    'idplh' => $i[0]['idplh'],
                    'jabatan' => $i[0]['jabatan'],
                    'username' => $username,
                    'password' => $password,
                    'iduser' => $i[0]['id_user'],
                    'nip' => $i[0]['nip'],
                    'nama' => $i[0]['nama_lengkap'],
                    'namasingkat' => $i[0]['nama_singkat'],
                    'alamat' => $i[0]['alamat'],
                    'telp' => $i[0]['telp'],
                    'jk' => $i[0]['jenis_kelamin'],
                    'golongan' => $i[0]['golongan'],
                    'agama' => $i[0]['agama'],
                    'tempatlahir' => $i[0]['tempat_lahir'],
                    'tgllahir' => $i[0]['tgl_lahir'],
                    'struktur' => $i[0]['nama_unit']


                );
                date_default_timezone_set('Asia/Jakarta');
                $tgl = array(
                    'tgl_login' => date("Y-m-d H:i:s")
                );
                $this->M_user->update_user($tgl, $i[0]['id_user']);
                $this->session->set_userdata($data);
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Password salah !</div>');
                redirect('');
            }
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Username belum terdaftar!</div>');
            redirect('');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}
