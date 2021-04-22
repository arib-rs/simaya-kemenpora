 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class M_disposisi extends CI_Model
    {

        public function select()
        {
            $idpegawai=$this->session->userdata('id');  
            
            $z=$this->db->select('*')
               ->from('tb_pegawai')
               ->where('idplh =',$idpegawai)
               ->get()->result();
            $idpegawai1=0;
            foreach ($z as $row)
            {  
                $idpegawai1=$row->id;  
                
            } 

          
            $q = $this->db
                ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.statusjawaban, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi, d.terbaca,d.ditolak, ss.no_agenda_disposisi,
                        s.no_surat, s.perihal,p.nama_lengkap,p.idplh')
                ->from('tb_disposisi as d')
                ->join('tb_surat as s', 'd.id_surat = s.id')
                ->join('tb_status_surat as ss', 'ss.id_surat = s.id')
                ->join('tb_pegawai as p', 'd.pengirim = p.id')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->order_by('d.tgl_disposisi', 'DESC');
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {
                $r = $q
                    // ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                    ->where("d.penerima = '" . $idpegawai1 . "' OR d.penerima= " . $idpegawai)
                    ->get();
            }

            return $r->result_array();
        }
        public function select_historidisposisi($id)
        {
                
            $q = $this->db
                ->select('d.tgl_disposisi, p.nama_lengkap as pengirim, j.jabatan as jabatan_pengirim, sk.nama_unit as unit_pengirim,
                        pp.nama_lengkap as penerima, jj.jabatan as jabatan_penerima, skk.nama_unit as unit_penerima')
                ->from('tb_disposisi as d')
                ->join('tb_pegawai as p', 'd.pengirim = p.id')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
                ->join('tb_pegawai as pp', 'd.penerima = pp.id')
                ->join('tb_jabatan as jj', 'pp.id_jabatan = jj.id')
                ->join('tb_satuan_kerja as skk', 'jj.id_satuan_kerja = skk.id')
                ->where("d.id_surat ='" . $id . "'")
                ->order_by('d.tgl_disposisi', 'ASC')
                ->get();

            return $q->result_array();
        }
        public function select_untukpengirim()
        {
            $idpegawai=$this->session->userdata('id');  
            
            $z=$this->db->select('*')
               ->from('tb_pegawai')
               ->where('idplh =',$idpegawai)
               ->get()->result();
            $idpegawai1=0;
            foreach ($z as $row)
            {  
                $idpegawai1=$row->id;  
                
            }   
            $q = $this->db
                ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi, d.terbaca,d.ditolak,ss.no_agenda_disposisi,
                        s.id as id_surat, s.no_surat, s.perihal,p.nama_lengkap')
                ->from('tb_disposisi as d')
                ->join('tb_surat as s', 'd.id_surat = s.id')
                ->join('tb_status_surat as ss', 'ss.id_surat = s.id')
                ->join('tb_pegawai as p', 'd.penerima = p.id')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->order_by('d.tgl_disposisi', 'DESC');
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {
                $r = $q
                    // ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                    ->where("d.pengirim = '" . $idpegawai1 . "' OR d.pengirim= " . $idpegawai)
                    ->get();
            }

            return $r->result_array();
        }
        public function select_ByIdSurat($id)
        {
            $q = $this->db->select('*')
                ->from('tb_disposisi')
                ->where("id_surat = '" . $id . "'")
                ->where("pengirim = '" . $this->session->userdata('id') . "'")
                ->get();
            return $q->result_array();
        }
        public function get_JumlahDisposisiTerbaca()
        {
            $idpegawai=$this->session->userdata('id');  
            
            $z=$this->db->select('*')
               ->from('tb_pegawai')
               ->where('idplh =',$idpegawai)
               ->get()->result();
            $idpegawai1=0;
            foreach ($z as $row)
            {  
                $idpegawai1=$row->id;  
                
            }   
            $q = $this->db
                ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi, d.terbaca, d.ditolak,
                        s.no_surat, s.perihal,p.nama_lengkap')
                ->from('tb_disposisi as d')
                ->join('tb_surat as s', 'd.id_surat = s.id')
                ->join('tb_pegawai as p', 'd.pengirim = p.id')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->where('d.terbaca = 1');
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {
                $r = $q
                    // ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                    ->where("d.penerima = '" . $idpegawai1 . "' OR d.penerima= " . $idpegawai." AND d.terbaca = 1")
                    ->get();
            }

            return $r->num_rows();
        }
        public function get_JumlahDisposisiBelumTerbaca()
        {
            $idpegawai=$this->session->userdata('id');  
            
            $z=$this->db->select('*')
               ->from('tb_pegawai')
               ->where('idplh =',$idpegawai)
               ->get()->result();
            $idpegawai1=0;
            foreach ($z as $row)
            {  
                $idpegawai1=$row->id;  
                
            }   
            $q = $this->db
                ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi, d.terbaca, d.ditolak,
                        s.no_surat, s.perihal,p.nama_lengkap')
                ->from('tb_disposisi as d')
                ->join('tb_surat as s', 'd.id_surat = s.id')
                ->join('tb_pegawai as p', 'd.pengirim = p.id')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->where('d.terbaca = 0');
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {
                $r = $q
                    // ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                    ->where("d.penerima = '" . $idpegawai1 . "' OR d.penerima= " . $idpegawai." AND d.terbaca = 0")
                    ->get();
            }

            return $r->num_rows();
        }
        public function select_DisposisiBelumTerbaca()
        {
            $idpegawai=$this->session->userdata('id');  
            
            $z=$this->db->select('*')
               ->from('tb_pegawai')
               ->where('idplh =',$idpegawai)
               ->get()->result();
            $idpegawai1=0;
            foreach ($z as $row)
            {  
                $idpegawai1=$row->id;  
                
            }   
            $q = $this->db
                ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi, d.terbaca, d.ditolak,
                        s.no_surat, s.perihal,p.nama_lengkap')
                ->from('tb_disposisi as d')
                ->join('tb_surat as s', 'd.id_surat = s.id')
                ->join('tb_pegawai as p', 'd.pengirim = p.id')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->where('d.terbaca = 0')
                ->order_by('d.tgl_disposisi', 'DESC');
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {
                $r = $q
                    // ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                    ->where("d.penerima = '" . $idpegawai1 . "' OR d.penerima= " . $idpegawai." AND d.terbaca = 0")
                    ->get();
            }

            return $r->result_array();
        }
        public function get_JumlahDisposisiDitolak()
        {
            $idpegawai=$this->session->userdata('id');  
            
            $z=$this->db->select('*')
               ->from('tb_pegawai')
               ->where('idplh =',$idpegawai)
               ->get()->result();
            $idpegawai1=0;
            foreach ($z as $row)
            {  
                $idpegawai1=$row->id;  
                
            }   
            $q = $this->db
                ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi, d.terbaca, d.ditolak,
                        s.no_surat, s.perihal,p.nama_lengkap')
                ->from('tb_disposisi as d')
                ->join('tb_surat as s', 'd.id_surat = s.id')
                ->join('tb_pegawai as p', 'd.pengirim = p.id')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->where('d.ditolak = 1');
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {
                $r = $q
                    // ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                    ->where("d.penerima = '" . $idpegawai1 . "' OR d.penerima= " . $idpegawai." AND d.ditolak = 1")
                    ->get();
            }

            return $r->num_rows();
        }

        public function select_DisposisiMasukById($id)
        {
            $q = $this->db
                ->select('d.id as id_disposisi, d.no_agenda as agenda_disposisi, d.pesan, d.statusjawaban, d.jawaban, d.lampiranjawaban, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi as urgensi_disposisi, d.sifat_disposisi,d.terbaca,d.ditolak, d.dijawab, d.ditindak_lanjuti,
                        d.ditanggapi_tertulis, d.disiapkan_makalah ,d.koordinasikan, d.diwakili, d.dihadiri, d.disiapkan_surat,
                        d.arsip, d.agendakan, d.diperhatikan, d.dijelaskan, d.diperbaiki, d.diproses, d.diketahui, d.dibicarakan, d.lainlain, 
                        s.id as id_surat, s.no_surat, s.no_agenda as agenda_surat, s.perihal, s.tgl_entri,s.tgl_surat,ss.no_agenda_disposisi, js.jenis_surat, s.urgensi as urgensi_surat, s.sifat_surat,
                        p.nama_lengkap')
                ->from('tb_disposisi as d')
                ->join('tb_surat as s', 'd.id_surat = s.id', 'left')
                ->join('tb_status_surat as ss', 'ss.id_surat = s.id')
                ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id', 'left')
                ->join('tb_pegawai as p', 'd.pengirim = p.id', 'left')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->where("d.id = '" . $id . "'")
                ->get();
            return $q->result_array();
        }
        public function select_DisposisiMasukByNoAgenda($no)
        {
            $q = $this->db
                ->select('d.id as id_disposisi, d.no_agenda as agenda_disposisi, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi as urgensi_disposisi, d.sifat_disposisi, d.dijawab, d.ditindak_lanjuti,
                        d.ditanggapi_tertulis, d.disiapkan_makalah ,d.koordinasikan, d.diwakili, d.dihadiri, d.disiapkan_surat,
                        d.arsip, d.agendakan, d.diperhatikan, d.dijelaskan, d.diperbaiki, d.diproses, d.diketahui, d.dibicarakan, d.lainlain, 
                        s.no_surat, s.no_agenda as agenda_surat, s.perihal, s.tgl_entri,s.tgl_surat, js.jenis_surat, s.urgensi as urgensi_surat, s.sifat_surat,
                        p.nama_lengkap as nama_pengirim, g.nama_lengkap as nama_penerima, j.jabatan, sk.nama_unit')
                ->from('tb_disposisi as d')
                ->join('tb_surat as s', 'd.id_surat = s.id', 'left')
                ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id', 'left')
                ->join('tb_pegawai as p', 'd.pengirim = p.id')
                ->join('tb_pegawai as g', 'd.penerima = g.id')
                ->join('tb_jabatan as j', 'g.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
                ->where("d.no_agenda = '" . $no . "'")
                ->get();
            return $q->result_array();
        }
        public function add($disposisi)
        {
            $this->db->insert('tb_disposisi', $disposisi);
        }

        public function del($id)
        {
            if ($this->db->delete('tb_disposisi', array('id' => $id))) {
                return true;
            } else {
                return false;
            }
        }
        public function get_JumlahDisposisiByNo_Agenda($no)
        {
            $q = $this->db
                ->select('*')
                ->from('tb_disposisi')
                ->where("no_agenda = '" . $no . "'")
                ->get();
            return $q->num_rows();
        }
        public function update_Terbaca($id)
        {
            date_default_timezone_set('Asia/Jakarta');
            $data = array(

                'terbaca' => '1',
                'tgl_dibaca' => date("Y-m-d H:i:s")
            );
            $this->db->where('id', $id);
            $this->db->update('tb_disposisi', $data);
        }
        public function update_Ditolak($id)
        {
            date_default_timezone_set('Asia/Jakarta');
            $data = array(

                'ditolak' => '1',
                'tgl_ditolak' => date("Y-m-d H:i:s")
            );
            $this->db->where('id', $id);
            $this->db->update('tb_disposisi', $data);
        }
    }
