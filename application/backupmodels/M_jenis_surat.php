 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class M_jenis_surat extends CI_Model
    {

        public function select()
        {
            $q = $this->db
                ->select('*')
                ->from('tb_jenis_surat')
                // ->where()
                ->get();


            return $q->result_array();
        }
        public function select_JenisSuratById($id)
        {
            $q = $this->db
                ->select('*')
                ->from('tb_jenis_surat')
                ->where("id = '" . $id . "'")
                ->get();


            return $q->result_array();
        }
        public function add($data)
        {
            $this->db->insert('tb_jenis_surat', $data);
        }
        public function update($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('tb_jenis_surat', $data);
        }
        public function del($id)
        {

            if($this->db->delete('tb_jenis_surat', array('id' => $id))){

                        return true;
            }else{
                return false;
            }
           
        }
    }
