 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class M_satuan_kerja extends CI_Model
    {

        public function select()
        {
            $q = $this->db
                ->select('*')
                ->from('tb_satuan_kerja')
                ->where("id != 1")
                ->get();


            return $q->result_array();
        }
        public function select_SatuanKerjaById($id)
        {
            $q = $this->db
                ->select('*')
                ->from('tb_satuan_kerja')
                ->where("id = '" . $id . "'")
                ->get();


            return $q->result_array();
        }
        public function add($data)
        {
            $this->db->insert('tb_satuan_kerja', $data);
        }
        public function update($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('tb_satuan_kerja', $data);
        }
        public function del($id)
        {
            if ($this->db->delete('tb_satuan_kerja', array('id' => $id))) {
                return true;
            } else {
                return false;
            }
        }
    }
