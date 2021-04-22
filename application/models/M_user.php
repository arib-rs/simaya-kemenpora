<?php
class M_user extends CI_Model
{

    public function bisaLogin()
    {
        $pass = md5($this->input->post('password'));
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $pass);
        $query = $this->db->get('tb_user');
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function Select_UserById($id)
    {

        $q = $this->db
            ->select('u.id as id_user, p.id as id_pegawai, u.username,u.password,u.id_grup,nip,nama_lengkap, nama_singkat, alamat, nama_unit, id_jabatan')
            ->from('tb_user as u')
            ->join('tb_pegawai as p', 'p.id = u.id_pegawai')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id ')
            ->where("u.id = '" . $id . "'")
            ->get();


        return $q->result_array();
    }

    public function Select_UserByUsername($username)
    {

        $q = $this->db
            ->select('u.id as id_user, nip, nama_lengkap, nama_singkat, alamat, nama_unit, id_jabatan')
            ->from('tb_user as u')
            ->join('tb_pegawai as p', 'p.id = u.id_pegawai')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id ')
            ->where("u.username = '" . $username . "'")
            ->get();


        return $q->result_array();
    }
    public function Select_User()
    {

        $q = $this->db
            ->select('u.id as id_user,u.username, p.id as id_pegawai, nip, nama_lengkap, nama_singkat, alamat, 
             nama_unit, id_jabatan,j.jabatan,level,g.grup')
            ->from('tb_user as u')
            ->join('tb_pegawai as p', 'p.id = u.id_pegawai')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id ')
            ->join('tb_grup as g', 'g.id = u.id_grup')
            // ->where("u.id = '" . $id . "'")
            ->where("NOT (level = '0')")
            ->get();


        return $q->result_array();
    }
    public function add($data)
    {
        $this->db->insert('tb_user', $data);
    }
    public function update_pass($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);
    }
    public function update_user($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);
    }
    public function del($id)
    {
        $this->db->delete('tb_user', array('id' => $id));
    }
}
