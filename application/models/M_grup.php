 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class M_grup extends CI_Model
    {

        public function select()
        {
            $q = $this->db
                ->select('*')
                ->from('tb_grup')
                // ->where()
                ->get();


            return $q->result_array();
        }
        public function add($data)
        {
            $this->db->insert('tb_grup', $data);
        }
        public function del($id)
        {
            if($this->db->delete('tb_grup', array('id' => $id))){
            return true;
            }else{
                return false;
            }
            
        }
    }
