 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class M_surat extends CI_Model
    {


        public function select_SuratMasuk()
        {
            $idpegawai = $this->session->userdata('id');

            $z = $this->db->select('*')
                ->from('tb_pegawai')
                ->where('idplh =', $idpegawai)
                ->get()->result();
            $idpegawai1 = 0;
            foreach ($z as $row) {
                $idpegawai1 = $row->id;
            }
            //var_dump($z); die();
            $q = $this->db
                ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.tgl_entri, s.tgl_surat,s.tgl_terima_surat,
                s.urgensi, s.sifat_surat,s.isi,ss.no_agenda_disposisi,ss.pengirim,ss.penerima, ss.diterima, 
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, p.nama_lengkap as nama_penerima, r.nama_lengkap as registrator')
                ->from('tb_surat as s')
                ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
                ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
                ->join('tb_pegawai as p', 'p.id = ss.penerima')
                ->join('tb_user as u', 'p.id = u.id_pegawai')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
                ->join('tb_pegawai as r', 's.id_registrator = r.id')
                //->where("p.level >= '" . $this->session->userdata('level') . "'")
                ->order_by('s.id', 'DESC');

            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {

                if ($this->session->userdata('grup') == '3' || $this->session->userdata('grup') == '1') {
                    $r = $q
                        ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                        ->get();
                } else {

                    $r = $q->where("ss.diterima = '1'
                          AND j.id_satuan_kerja = " . $this->session->userdata('unit') . "
                          AND (ss.penerima=" . $idpegawai1 . " 
                          OR p.id= " . $idpegawai . ")")
                        ->get();

                    //var_dump($r); die();

                }
            }

            return $r->result_array();
        }
        public function select_SuratMasukBelumTerbaca()
        {
            $idpegawai = $this->session->userdata('id');

            $z = $this->db->select('*')
                ->from('tb_pegawai')
                ->where('idplh =', $idpegawai)
                ->get()->result();
            $idpegawai1 = 0;
            foreach ($z as $row) {
                $idpegawai1 = $row->id;
            }
            $q = $this->db
                ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.tgl_entri,s.tgl_surat,s.tgl_terima_surat,
                s.urgensi, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima,
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, p.nama_lengkap as nama_penerima, r.nama_lengkap as registrator')
                ->from('tb_surat as s')
                ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
                ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
                ->join('tb_pegawai as p', 'p.id = ss.penerima')
                ->join('tb_user as u', 'u.id_pegawai = ss.penerima')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
                // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
                ->join('tb_pegawai as r', 's.id_registrator = r.id')
                //->where("p.level >= '" . $this->session->userdata('level') . "'")
                //->where("p.level < '10'")
                ->where('ss.terbaca = 0')
                ->order_by('s.tgl_terima_surat', 'DESC');
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {

                if ($this->session->userdata('grup') == '3' || $this->session->userdata('grup') == '1') {
                    $r = $q->where("ss.diterima = '0'")
                        ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                        ->get();
                } else {
                    $r = $q->where("ss.diterima = '1'
                          AND j.id_satuan_kerja = " . $this->session->userdata('unit') . "
                          AND (ss.penerima=" . $idpegawai1 . " 
                          OR p.id= " . $idpegawai . ")")
                        ->get();
                }
            }


            return $r->result_array();
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
        public function get_JumlahSuratDisposisi()
        {
            $idpegawai = $this->session->userdata('id');

            $z = $this->db->select('*')
                ->from('tb_pegawai')
                ->where('idplh =', $idpegawai)
                ->get()->result();
            $idpegawai1 = 0;
            foreach ($z as $row) {
                $idpegawai1 = $row->id;
            }

            $q = $this->db
                ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.tgl_entri,s.tgl_surat,s.tgl_terima_surat,
                s.urgensi, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima,
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, p.nama_lengkap as nama_penerima, r.nama_lengkap as registrator')
                ->from('tb_surat as s')
                ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
                ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
                ->join('tb_pegawai as p', 'p.id = ss.penerima')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
                // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
                ->join('tb_pegawai as r', 's.id_registrator = r.id')
                //->where("p.level >= '" . $this->session->userdata('level') . "'")
                //->where("p.level < '10'")
                ->where('ss.disposisi = 1');
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {

                if ($this->session->userdata('grup') == '3' || $this->session->userdata('grup') == '1') {
                    $r = $q->where("ss.diterima = '0'")
                        ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                        ->get();
                } else {
                    $r = $q->where("ss.diterima = '1'
                          AND j.id_satuan_kerja = " . $this->session->userdata('unit') . "
                          AND (ss.penerima=" . $idpegawai1 . " 
                          OR p.id= " . $idpegawai . ")")
                        ->get();
                }
            }
            // ->where("p.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
            //    ->get();


            return $r->num_rows();
        }

        public function get_JumlahSuratTerbaca()
        {
            $idpegawai = $this->session->userdata('id');

            $z = $this->db->select('*')
                ->from('tb_pegawai')
                ->where('idplh =', $idpegawai)
                ->get()->result();
            $idpegawai1 = 0;
            foreach ($z as $row) {
                $idpegawai1 = $row->id;
            }
            $q = $this->db
                ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.tgl_entri,s.tgl_surat,s.tgl_terima_surat,
                s.urgensi, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima,
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, p.nama_lengkap as nama_penerima, r.nama_lengkap as registrator')
                ->from('tb_surat as s')
                ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
                ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
                ->join('tb_pegawai as p', 'p.id = ss.penerima')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
                // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
                ->join('tb_pegawai as r', 's.id_registrator = r.id')
                //->where("p.level >= '" . $this->session->userdata('level') . "'")
                //->where("p.level < '10'")
                ->where('ss.terbaca = 1');
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {

                if ($this->session->userdata('grup') == '3' || $this->session->userdata('grup') == '1') {
                    $r = $q->where("ss.diterima = '0'")
                        ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                        ->get();
                } else {
                    $r = $q->where("ss.diterima = '1'
                          AND j.id_satuan_kerja = " . $this->session->userdata('unit') . "
                          AND (ss.penerima=" . $idpegawai1 . " 
                          OR p.id= " . $idpegawai . ")")
                        ->get();
                }
            }

            return $r->num_rows();
        }
        public function get_JumlahSuratBelumTerbaca()
        {
            $q = $this->db
                ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.tgl_entri,s.tgl_surat,s.tgl_terima_surat,
                s.urgensi, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima,
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, p.nama_lengkap as nama_penerima, r.nama_lengkap as registrator')
                ->from('tb_surat as s')
                ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
                ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
                ->join('tb_pegawai as p', 'p.id = ss.penerima')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
                // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
                ->join('tb_pegawai as r', 's.id_registrator = r.id')
                ->where("p.level >= '" . $this->session->userdata('level') . "'")
                ->where("p.level < '10'")
                ->where('ss.terbaca = 0');
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {
                $r = $q->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                    ->where("ss.penerima = '" . $this->session->userdata('id') . "'")
                    ->get();
            }


            return $r->num_rows();
        }
        public function select_SuratMasukbyId($id)
        {
            $q = $this->db
                ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.id_jenis_surat,s.tgl_surat,s.tgl_terima_surat,
                s.urgensi,s.keterangan, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima, ss.no_agenda_disposisi,
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, s.lampiran1,s.lampiran2,s.lampiran3,s.lampiran4,s.lampiran5,
                p.nama_lengkap as nama_penerima')
                ->from('tb_surat as s')
                ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
                ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
                ->join('tb_pegawai as p', 'p.id = ss.penerima')
                // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
                ->where("s.id = '" . $id . "'")
                ->get();
            if ($q->num_rows() > 0) {
                return $q->result_array();
            } else {
                return NULL;
            }
        }

        public function select_SuratMasukbyIdCetak($id)
        {
            $q = $this->db
                ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.id_jenis_surat,s.tgl_surat,s.tgl_terima_surat,
                s.urgensi,s.keterangan, s.sifat_surat, s.isi, s.id_registrator, ss.pengirim,ss.penerima, ss.diterima, ss.no_agenda_disposisi,
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, s.lampiran1,s.lampiran2,s.lampiran3,s.lampiran4,s.lampiran5,
                p.nama_lengkap as nama_registrator')
                ->from('tb_surat as s')
                ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
                ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
                ->join('tb_pegawai as p', 'p.id = s.id_registrator')
                // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
                ->where("s.id = '" . $id . "'")
                ->get();
            if ($q->num_rows() > 0) {
                return $q->result_array();
            } else {
                return NULL;
            }
        }

        public function get_JumlahSuratFisik()
        {
            $q = $this->db
                ->select('*')
                ->from('tb_surat as s')
                ->join('tb_status_surat as ss', 's.id=ss.id_surat', 'inner')
                // ->where()
                ->get();
            return $q->num_rows();
        }
        public function select_SuratFisik()
        {
            $q = $this->db
                ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.tgl_entri,s.tgl_surat,s.tgl_terima_surat,
                s.urgensi, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima, ss.id as id_status,
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, p.nama_lengkap as nama_penerima,  r.nama_lengkap as registrator')
                ->from('tb_surat as s')
                ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
                ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
                ->join('tb_pegawai as p', 'p.id = ss.penerima')
                ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
                ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
                // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
                ->join('tb_pegawai as r', 's.id_registrator = r.id')
                ->where("p.level >= '" . $this->session->userdata('level') . "'")
                ->where("p.level < '10'")
                ->order_by("s.id", "desc");
            $r = '';
            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
                $r = $q->get();
            } else {
                $r = $q->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                    ->get();
            }
            // ->where("p.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
            // ->get();


            return $r->result_array();
        }
        public function select_SuratFisikByNoSurat($nosurat)
        {
            $q = $this->db
                ->select('*')
                ->from('tb_surat')
                ->where("no_surat = '" . $nosurat . "'")
                ->get();


            return $q->result_array();
        }
        public function get_JumlahSuratByNoSurat($nosurat)
        {
            $q = $this->db->where('no_surat', $nosurat)
                ->get('tb_surat');
            return $q->num_rows();
        }
        public function get_JumlahSuratByNoAgenda($nosurat)
        {
            $q = $this->db->where('no_agenda', $nosurat)
                ->get('tb_surat');
            return $q->num_rows();
        }
        public function get_JumlahStatusSuratByNoAgenda($nosurat)
        {
            $q = $this->db->where('no_agenda_disposisi', $nosurat)
                ->get('tb_status_surat');
            return $q->num_rows();
        }
        public function add_SuratFisik($surat)
        {
            $this->db->insert('tb_surat', $surat);
        }
        public function add_SuratFisik2($surat)
        {
            $this->db->insert('tb_status_surat', $surat);
        }
        public function del_StatusSurat($surat)
        {
            $this->db->delete('tb_status_surat', array('id_surat' => $surat));
        }
        public function del_Surat($surat)
        {
            $this->db->delete('tb_surat', array('id' => $surat));
        }
        public function add_StatusSurat($status)
        {
            $this->db->insert('tb_status_surat', $status);
        }
        public function update_Surat($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('tb_surat', $data);
        }
        public function update_StatusSurat($data, $id)
        {
            $this->db->where('id_surat', $id);
            $this->db->update('tb_status_surat', $data);
        }
        public function update_Terbaca($id)
        {
            date_default_timezone_set('Asia/Jakarta');
            $data = array(

                'terbaca' => '1',
                'tgl_dibaca' => date("Y-m-d H:i:s")
            );
            $this->db->where('id_surat', $id);
            $this->db->update('tb_status_surat', $data);
        }
        public function update_Disposisi($id)
        {
            date_default_timezone_set('Asia/Jakarta');
            $data = array(

                'disposisi' => '1',
                'tgl_disposisi' => date("Y-m-d H:i:s")
            );
            $this->db->where('id_surat', $id);
            $this->db->update('tb_status_surat', $data);
        }
        public function update_DisposisiBatal($id)
        {
            date_default_timezone_set('Asia/Jakarta');
            $data = array(

                'disposisi' => '0'
                // 'tgl_disposisi' => date("Y-m-d H:i:s")
            );
            $this->db->where('id_surat', $id);
            $this->db->update('tb_status_surat', $data);
        }
        public function add_Tindaklanjut($id)
        {
            date_default_timezone_set('Asia/Jakarta');
            $this->db->where('id_surat', $id);
            $this->db->update('tb_disposisi');
        }
        public function _upload($file, $no)
        {
            $config['upload_path']          = 'upload/';
            $config['allowed_types']        = 'png|jpg|pdf|doc|docx';
            $config['file_name']            = 'surat_' . $no . '_' . $file;
            $config['overwrite']            = true;
            $config['max_size']             = 5120; // 5MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload');
            $this->upload->initialize($config);
            $this->upload->do_upload($file);
            if ($this->upload->do_upload($file)) {
                return $this->upload->data("file_name");
            } else {

                return NULL;
            }
        }
        public function get_JumlahByBulan($bulan)
        {
            date_default_timezone_set('Asia/Jakarta');
            $q = $this->db
                ->select('*')
                ->from('tb_surat as s')
                ->join('tb_status_surat as ss', 's.id=ss.id_surat')
                ->where("MONTH(s.tgl_entri)=" . $bulan)
                ->where("YEAR(s.tgl_entri)=" . date("Y"))
                ->get();
            return $q->num_rows();
        }
        public function select_JumlahSuratPerUnit()
        {
            $q = $this->db
                ->select('sk.id,sk.nama_unit,sk.nama_unit_singkat, COUNT(ss.id_surat) as jumlah')
                ->from('tb_satuan_kerja as sk')
                ->join('tb_jabatan as j', 'j.id_satuan_kerja = sk.id', 'left')
                ->join('tb_pegawai as p', 'p.id_jabatan=j.id', 'left')

                ->join('tb_status_surat as ss', 'ss.penerima = p.id', 'left')
                ->where('sk.id != 1')
                ->group_by('sk.nama_unit')
                ->order_by('jumlah', 'desc')
                ->get();

            return $q->result_array();
        }
        public function select_JumlahSuratPerUnitPerBulan($bln, $unit)
        {
            date_default_timezone_set('Asia/Jakarta');
            $q = $this->db
                ->select('sk.nama_unit,sk.nama_unit_singkat')
                ->from('tb_satuan_kerja as sk')
                ->join('tb_jabatan as j', 'j.id_satuan_kerja = sk.id', 'left')
                ->join('tb_pegawai as p', 'p.id_jabatan=j.id', 'left')

                ->join('tb_status_surat as ss', 'ss.penerima = p.id', 'left')
                ->join('tb_surat as s', 's.id = ss.id_surat', 'left')
                ->where("sk.id ='" . $unit . "'")
                ->where("MONTH(s.tgl_surat)=" . $bln)
                ->where("YEAR(s.tgl_surat)=" . date("Y"))
                ->get();
            return $q->result_array();
        }
    }
