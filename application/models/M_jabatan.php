 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class M_jabatan extends CI_Model
    {

        public function select()
        {
            $q = $this->db
                ->select('j.id, j.jabatan, sk.nama_unit')
                ->from('tb_jabatan as j')
                ->join('tb_satuan_kerja as sk', 'sk.id = j.id_satuan_kerja')
                ->where("sk.id != 1")
                ->order_by('sk.nama_unit', 'ASC')
                ->order_by('j.jabatan', 'ASC')
                ->get();


            return $q->result_array();
        }
        public function select_JabatanById($id)
        {
            $q = $this->db
                ->select('j.id, j.jabatan, sk.nama_unit')
                ->from('tb_jabatan as j')
                ->join('tb_satuan_kerja as sk', 'sk.id = j.id_satuan_kerja')
                ->where("j.id = '" . $id . "'")
                ->get();


            return $q->result_array();
        }
        public function select_JabatanBySatuanKerja($id)
        {
            $q = $this->db
                ->select('j.id, j.jabatan, sk.nama_unit')
                ->from('tb_jabatan as j')
                ->join('tb_satuan_kerja as sk', 'sk.id = j.id_satuan_kerja')
                ->where("j.id_satuan_kerja = '" . $id . "'")
                ->get();


            return $q->result_array();
        }
        public function add($data)
        {
            $this->db->insert('tb_jabatan', $data);
        }
        public function update($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('tb_jabatan', $data);
        }
        public function del($id)
        {
            if ($this->db->delete('tb_jabatan', array('id' => $id))) {
                return true;
            } else {
                return false;
            }
        }
    }
