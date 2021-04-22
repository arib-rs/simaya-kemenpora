 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class M_pegawai extends CI_Model
    {
        public function select_PenerimaDisposisi()
        {
            $lvl = $this->session->userdata('level');
			$unit = $this->session->userdata('unit');
            // if ($lvl < 3) {
            //     $lvl += 1;
            // } else {
            //     $lvl += 1;
            // }
            $q = $this->db
                ->select('p.id as id_pegawai, nip, nama_lengkap, nama_singkat, alamat,telp, id_satuan_kerja, nama_unit, id_jabatan, jabatan')
                ->from('tb_pegawai as p')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id ', 'left')
                ->join('tb_user as u', 'u.id_pegawai = p.id ', 'left')

                ->where('u.id_grup > 3')
                ->where("p.id != '" . $this->session->userdata('id') . "'");

            if ($lvl < 3) {
                $q = $q->where("p.level >= '" . $lvl . "'")
                    ->where("p.level <= '" . 3 . "' OR jabatan='INSPEKTUR' OR jabatan='KEPALA SUBBAGIAN KEPROTOKOLAN' OR
					 jabatan='KEPALA SUBBAGIAN TU MENTERI'" )
                    ->get();
            } else {
                $lvl += 1;
                $q = $q->where("p.level >= '" . $lvl . "'")
					->where("j.id_satuan_kerja =  '" . $unit . "'")
                    ->get();
            }



            return $q->result_array();
        }
		public function selectPlh()
        {
            $lvl = $this->session->userdata('level');
			$level = $lvl+1;
			//var_dump($lvl); die();
			$unit = $this->session->userdata('unit');
            $q = $this->db
                ->select('p.id,p.nip,p.nama_lengkap,p.nama_singkat,p.alamat,p.telp,
                p.jenis_kelamin,p.golongan,p.agama,p.tempat_lahir,p.tgl_lahir,j.id_satuan_kerja,
               p.id_jabatan,j.jabatan,p.level,p.idplh,sk.id as id_sk,sk.nama_unit')
                ->from('tb_pegawai as p')
                ->join('tb_jabatan as j', 'j.id=p.id_jabatan')
                ->join('tb_satuan_kerja as sk', 'sk.id=j.id_satuan_kerja')
                ->where("NOT (level = '0')")
                ->where("p.level = " . $level ."")
				->where("j.id_satuan_kerja =  '" . $unit . "'")
                ->get();
            return $q->result_array();
        }
        public function select_PenerimaDinas()
        {
            $q = $this->db
                ->select('p.id as id_pegawai, nip, nama_lengkap, nama_singkat, alamat, j.id_satuan_kerja, nama_unit, id_jabatan, jabatan')
                ->from('tb_pegawai as p')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id ', 'left')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id ', 'left')
                ->join('tb_user as u', 'u.id_pegawai = p.id ', 'left')
                ->where('u.id_grup > 3')
                ->where("p.id != '" . $this->session->userdata('id') . "'")
                // ->where("sk.dinas = '1'")
                ->where("p.level >= '" . $this->session->userdata('level') . "'")
                ->where("p.level < '10'")
                ->get();


            return $q->result_array();
        }
        // public function select_PenerimaNonDinas()
        // {
        //     $q = $this->db
        //         ->select('p.id as id_pegawai, nip, nama_lengkap, nama_singkat, alamat, id_satuan_kerja, nama_unit, jabatan_non_dinas, jabatan_dinas')
        //         ->from('tb_pegawai as p')
        //         ->join('tb_satuan_kerja as sk', 'p.id_satuan_kerja = sk.id ', 'left')
        //         ->where("sk.dinas = '0'")
        //         ->where("p.level >= '" . $this->session->userdata('level') . "'")
        //         ->where("p.level < '10'")
        //         ->get();


        //     return $q->result_array();
        // }
        public function select_all()
        {
            $q = $this->db
                ->select('p.id as id_pegawai, nip, nama_lengkap, nama_singkat, alamat, id_satuan_kerja, nama_unit, id_jabatan')
                ->from('tb_pegawai as p')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id ', 'left')
                // ->where("sk.dinas = '0'")
                ->get();


            return $q->result_array();
        }
        public function Select_PegawaiById($id)
        {

            $q = $this->db
                ->select('p.id as id_pegawai, nip, nama_lengkap, nama_singkat, alamat, 
                id_satuan_kerja, nama_unit, p.id_jabatan,level,
                telp, jenis_kelamin, golongan, agama, tempat_lahir, tgl_lahir')
                ->from('tb_pegawai as p')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id ')
                ->where("p.id = '" . $id . "'")
                ->get();


            return $q->result_array();
        }
        public function Select_PegawaiBySatuanKerja($id)
        {

            $q = $this->db
                ->select('p.id as id_pegawai, nip, nama_lengkap, nama_singkat, alamat, 
                id_satuan_kerja, nama_unit, p.id_jabatan,level, nama_unit
                telp, jenis_kelamin, golongan, agama, tempat_lahir, tgl_lahir')
                ->from('tb_pegawai as p')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id ')
                ->order_by('p.level', 'ASC')
                ->where("sk.id = '" . $id . "'")
                ->get();


            return $q->result_array();
        }
        public function Select_PegawaiBySatuanKerjaLv($id, $lv)
        {

            $q = $this->db
                ->select('p.id as id_pegawai, nip, nama_lengkap, nama_singkat, alamat, 
                id_satuan_kerja, nama_unit, p.id_jabatan, j.jabatan, level, nama_unit
                telp, jenis_kelamin, golongan, agama, tempat_lahir, tgl_lahir')
                ->from('tb_pegawai as p')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id ')
                ->order_by('p.nama_lengkap', 'ASC')
                ->where("sk.id = '" . $id . "'")
                ->where("p.level = '" . $lv . "'")
                ->get();


            return $q->result_array();
        }
        public function select()
        {
            $q = $this->db
                ->select('p.id,p.nip,p.nama_lengkap,p.nama_singkat,p.alamat,p.telp,
                p.jenis_kelamin,p.golongan,p.agama,p.tempat_lahir,p.tgl_lahir,j.id_satuan_kerja,
               p.id_jabatan,j.jabatan,p.level,sk.id as id_sk,sk.nama_unit')
                ->from('tb_pegawai as p')
                ->join('tb_jabatan as j', 'j.id=p.id_jabatan')
                ->join('tb_satuan_kerja as sk', 'sk.id=j.id_satuan_kerja')
                ->where("NOT (level = '0')")
                ->get();


            return $q->result_array();
        }
        public function select_BelumAdaAkun()
        {
            $q = $this->db
                ->select('p.id,p.nip,p.nama_lengkap,p.nama_singkat,p.alamat,p.telp,
                p.jenis_kelamin,p.golongan,p.agama,p.tempat_lahir,p.tgl_lahir,j.id_satuan_kerja,
                p.level,sk.id as id_sk,sk.nama_unit,j.jabatan')
                ->from('tb_pegawai as p')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'sk.id=j.id_satuan_kerja')
                ->join('tb_user as u', 'u.id_pegawai=p.id', 'left')
                ->where("NOT (level = '0') AND u.id_pegawai IS NULL")
                ->get();


            return $q->result_array();
        }

        public function add($data)
        {
            $this->db->insert('tb_pegawai', $data);
        }
        public function update($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('tb_pegawai', $data);
        }
        public function del($id)
        {

            if ($this->db->delete('tb_pegawai', array('id' => $id))) {

                return true;
            } else {
                return false;
            }
        }
    }
