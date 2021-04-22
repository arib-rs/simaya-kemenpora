<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_api extends CI_Model
{
    public function loginApi($username, $password)
    {
        $p = $this->db->select('u.id as id_user, p.id as id_pegawai, level ,username , nama_lengkap ,j.id_satuan_kerja ,u.id_grup,j.jabatan,p.idplh')
            ->from('tb_user as u')
            ->join('tb_pegawai as p', 'u.id_pegawai = p.id')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->where('username', $username)
            ->where('password', $password)
            ->get();


        return $p->result_array();
        // return $i->result();
    }

    public function selectPlh($lvl, $unit, $jabatan)
    {

        $level = $lvl + 1;
        //var_dump($lvl); die();
        //var_dump($jabatan); die();
        $q = $this->db
            ->select('p.id,p.nip,p.nama_lengkap,p.nama_singkat,p.alamat,p.telp,
                p.jenis_kelamin,p.golongan,p.agama,p.tempat_lahir,p.tgl_lahir,j.id_satuan_kerja,
               p.id_jabatan,j.jabatan,p.level,p.idplh,sk.id as id_sk,sk.nama_unit')
            ->from('tb_pegawai as p')
            ->join('tb_jabatan as j', 'j.id=p.id_jabatan')
            ->join('tb_satuan_kerja as sk', 'sk.id=j.id_satuan_kerja')
            ->where("NOT (level = '0')")
            ->where("p.level = " . $level . "");
        //->where("j.id_satuan_kerja =  '" . $unit . "'");

        if ($jabatan == 'SEKRETARIS KEMENTERIAN PEMUDA DAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIRO PERENCANAAN DAN ORGANISASI' OR jabatan='KEPALA BIRO KEUANGAN DAN RUMAH TANGGA' OR jabatan='KEPALA BIRO HUMAS DAN HUKUM' OR jabatan='DIREKTUR LPDUK' OR jabatan='DIREKTUR RUMAH SAKIT OLAHRAGA NASIONAL' OR jabatan='INSPEKTUR'")
                ->get();
        } elseif ($jabatan == 'MENTERI') {
            $q = $q->where("level<>1")
                ->where("(level>=2 AND level <=3) OR jabatan='INSPEKTUR' OR jabatan='KEPALA SUBBAGIAN KEPROTOKOLAN' OR
                     jabatan='KEPALA SUBBAGIAN TU MENTERI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIRO PERENCANAAN DAN ORGANISASI') {
            $q = $q->where("jabatan='KEPALA BAGIAN PROGRAM DAN ANGGARAN' OR jabatan='KEPALA BAGIAN EVALUASI DAN PENILAIAN KINERJA' 
                    OR jabatan='KEPALA BAGIAN SUMBER DAYA MANUSIA APARATUR' OR jabatan='KEPALA BAGIAN ORGANISASI, TATA LAKSANA DAN KERJASAMA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN PROGRAM DAN ANGGARAN') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PROGRAM DAN ANGGARAN KEOLAHRAGAAN' OR jabatan='KEPALA SUBBAGIAN PROGRAM DAN ANGGARAN KEPEMUDAAN'
                    OR jabatan='KEPALA SUBBAGIAN PROGRAM DAN ANGGARAN PENDUKUNG'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN EVALUASI DAN PENILAIAN KINERJA') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN EVALUASI DAN PENILAIAN KINERJA KEOLAHRAGAAN' OR jabatan='KEPALA SUBBAGIAN EVALUASI DAN PENILAIAN KINERJA KEPEMUDAAN'
                    OR jabatan='KEPALA SUBBAGIAN EVALUASI DAN PENILAIAN KINERJA PENDUKUNG'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN SUMBER DAYA MANUSIA APARATUR') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERENCANAAN SUMBER DAYA APARATUR' OR jabatan='KEPALA SUBBAGIAN MUTASI DAN KEPANGKATAN SUMBER DAYA MANUSIA APARATUR'
                    OR jabatan='KEPALA SUBBAGIAN PENGEMBANGAN SUMBER DAYA MANUSIA APARATUR'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN ORGANISASI, TATA LAKSANA DAN KERJASAMA') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN ORGANISASI' OR jabatan='KEPALA SUBBAGIAN TATA LAKSANA' OR jabatan='KEPALA SUBBAGIAN KERJASAMA ANTAR LEMBAGA'")
                ->get();
            //OR jabatan=''
        } elseif ($jabatan == 'KEPALA BIRO KEUANGAN DAN RUMAH TANGGA') {
            $q = $q->where("jabatan='KEPALA BAGIAN KEUANGAN' or jabatan='KEPALA BAGIAN VERIFIKASI PELAKSANAAN ANGGARAN' OR jabatan='KEPALA BAGIAN PERLENGKAPAN DAN PENGELOLAAN BARANG MILIK NEGARA'
                    OR jabatan='KEPALA BAGIAN RUMAH TANGGA'")
                ->get();
            //OR jabatan=''
        } elseif ($jabatan == 'KEPALA BAGIAN KEUANGAN') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN KAS DAN PEMBAYARAN' OR jabatan='KEPALA SUBBAGIAN AKUNTANSI DAN PELAPORAN' 
                    OR jabatan='KEPALA SUBBAGIAN PENGELOLAAN PNBP'")
                ->get();
            //OR jabatan=''
        } elseif ($jabatan == 'KEPALA BAGIAN VERIFIKASI PELAKSANAAN ANGGARAN') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN VERIFIKASI PELAKSANAAN ANGGARAN KEOLAHRAGAAN' OR jabatan='KEPALA SUBBAGIAN VERIFIKASI PELAKSANAAN ANGGARAN KEPEMUDAAN'
                    OR jabatan='KEPALA SUBBAGIAN VERIFIKASI PELAKSANAAN ANGGARAN PENDUKUNG'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN PERLENGKAPAN DAN PENGELOLAAN BARANG MILIK NEGARA') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN LAYANAN PENGADAAN' or jabatan='KEPALA SUBBAGIAN PENGELOLAAN BARANG MILIK NEGARA'
                    or jabatan='KEPALA SUBBAGIAN PENGHAPUSAN DAN HIBAH'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN RUMAH TANGGA') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN URUSAN DALAM' or jabatan='KEPALA SUBBAGIAN KEAMANAN DAN KETERTIBAN' 
                    or jabatan='KEPALA SUBBAGIAN PERJALANAN DINAS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIRO HUMAS DAN HUKUM') {
            $q = $q->where("jabatan='KEPALA BAGIAN HUBUNGAN MASYARAKAT' or jabatan='KEPALA BAGIAN SISTEM INFORMASI' or jabatan='KEPALA BAGIAN HUKUM'
                    or jabatan='KEPALA BAGIAN TATA USAHA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN HUBUNGAN MASYARAKAT') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PELIPUTAN DAN PUBLIKASI' or jabatan='KEPALA SUBBAGIAN DOKUMENTASI DAN PERPUSTAKAAN'
                    or jabatan='KEPALA SUBBAGIAN KOMUNIKASI DAN KEMITRAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN SISTEM INFORMASI') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PENGEMBANGAN DAN KEAMANAN SISTEM INFORMASI' or jabatan='KEPALA SUBBAGIAN PENGELOLA INFORMASI'
                    or jabatan='KEPALA SUBBAGIAN SISTEM JARINGAN DAN PIRANTI KERAS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN HUKUM') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERATURAN PERUNDANG-UNDANGAN' or jabatan='KEPALA SUBBAGIAN PERJANJIAN HUKUM'
                    or jabatan='KEPALA SUBBAGIAN LAYANAN HUKUM'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN TATA USAHA') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERSURATAN DAN ARSIP' or jabatan='KEPALA SUBBAGIAN KEPROTOKOLAN' or jabatan='KEPALA SUBBAGIAN TU MENTERI'
                    or jabatan='KEPALA SUBBAGIAN TU SESMEN' or jabatan='KEPALA SUBBAGIAN TU STAF AHLI'")
                ->get();
        } elseif ($jabatan == 'DEPUTI BIDANG PEMBERDAYAAN PEMUDA') {
            $q = $q->where("jabatan='SEKRETARIS DEPUTI BIDANG PEMBERDAYAAN PEMUDA' or jabatan='ASISTEN DEPUTI TENAGA DAN PENINGKATAN SUMBER DAYA PEMUDA'
                    or jabatan='ASISTEN DEPUTI PENINGKATAN WAWASAN PEMUDA' or jabatan='ASISTEN DEPUTI PENINGKATAN KAPASITAS PEMUDA' or jabatan='ASISTEN DEPUTI PENINGKATAN IPTEK DAN IMTAK PEMUDA'
                    or jabatan='ASISTEN DEPUTI PENINGKATAN KREATIVITAS PEMUDA'")
                ->get();
        } elseif ($jabatan == 'SEKRETARIS DEPUTI BIDANG PEMBERDAYAAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP' or jabatan='KEPALA BAGIAN HUBUNGAN MASYARAKAT'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERENCANAAN' or jabatan='KEPALA SUBBAGIAN SUMBER DAYA MANUSIA APARATUR DAN ARSIP'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN HUBUNGAN MASYARAKAT') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN HUBUNGAN MASYARAKAT DAN SISTEM INFORMASI' or jabatan='KEPALA SUBBAGIAN HUKUM'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI TENAGA DAN PENINGKATAN SUMBER DAYA PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG PENGKAJIAN TENAGA DAN SUMBER DAYA PEMUDA' or jabatan='KEPALA BIDANG TENAGA KEPEMUDAAN FORMAL DAN NONFORMAL'
                    or jabatan='KEPALA BIDANG TENAGA KEPEMUDAAN LAYANAN KHUSUS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGKAJIAN TENAGA DAN SUMBER DAYA PEMUDA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGKAJIAN TENAGA PEMUDA' or jabatan='KEPALA SUBBIDANG PENGKAJIAN SUMBER DAYA PEMUDA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG TENAGA KEPEMUDAAN FORMAL DAN NONFORMAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG FORMAL' or jabatan='KEPALA SUBBIDANG NONFORMAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG TENAGA KEPEMUDAAN LAYANAN KHUSUS') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG DIFABEL' or jabatan='KEPALA SUBBIDANG KEMAMPUAN KHUSUS'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENINGKATAN WAWASAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG WAWASAN POLITIK, PERTAHANAN DAN KEAMANAN' or jabatan='KEPALA BIDANG WAWASAN LINGKUNGAN STRATEGIS DAN PENCEGAHAN BAHAYA DESTRUKTIF'
                    or jabatan='KEPALA BIDANG WAWASAN SOSIAL, BUDAYA DAN HUKUM'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG WAWASAN POLITIK, PERTAHANAN DAN KEAMANAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG WAWASAN POLITIK DAN PERTAHANAN' or jabatan='KEPALA SUBBIDANG PERTAHANAN DAN KEAMANAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG WAWASAN LINGKUNGAN STRATEGIS DAN PENCEGAHAN BAHAYA DESTRUKTIF') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG WAWASAN LINGKUNGAN STRATEGIS' or jabatan='KEPALA SUBBIDANG PENCEGAHAN BAHAYA DESTRUKTIF'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG WAWASAN SOSIAL, BUDAYA DAN HUKUM') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG WAWASAN SOSIAL DAN BUDAYA' or jabatan='KEPALA SUBBIDANG WAWASAN HUKUM'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENINGKATAN KAPASITAS PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG PARIWISATA DAN KEMARITIMAN' or jabatan='KEPALA BIDANG INDUSTRI DAN KEMANDIRIAN EKONOMI'
                    or jabatan='KEPALA BIDANG KEDAULATAN PANGAN, ENERGI DAN LINGKUNGAN HIDUP'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PARIWISATA DAN KEMARITIMAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PARIWISATA' or jabatan='KEPALA SUBBIDANG MARITIM'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG INDUSTRI DAN KEMANDIRIAN EKONOMI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMAHAMAN INDUSTRI' or jabatan='KEPALA SUBBIDANG KEMANDIRIAN EKONOMI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEDAULATAN PANGAN, ENERGI DAN LINGKUNGAN HIDUP') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG KEDAULATAN PANGAN DAN ENERGI' or jabatan='KEPALA SUBBIDANG LINGKUNGAN HIDUP'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENINGKATAN IPTEK DAN IMTAK PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG PEMETAAN DAN PENELUSURAN IPTEK' or jabatan='KEPALA BIDANG PEMANFAATAN IPTEK'
                    or jabatan='KEPALA SUBBIDANG PENGAMALAN IMTAK'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMETAAN DAN PENELUSURAN IPTEK') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENELUSURAN IPTEK' or jabatan='KEPALA SUBBIDANG PEMETAAN IPTEK")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMANFAATAN IPTEK') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG TEKNOLOGI TEPAT GUNA' or jabatan='KEPALA SUBBIDANG TEKNOLOGI INDUSTRI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGHAYATAN DAN PENGAMALAN IMTAK') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGHAYATAN IMTAK' or jabatan='KEPALA SUBBIDANG PENGAMALAN IMTAK'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENINGKATAN KREATIVITAS PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG KREATIVITAS GRAFIKA DAN KRIYA' or jabatan='KEPALA BIDANG KREATIVITAS FASHION DAN FILM'
                    or jabatan='KEPALA BIDANG KREATIVITAS TEKNOLOGI INFORMASI' or jabatan='KEPALA BIDANG KREATIVITAS MUSIK DAN KULINER'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KREATIVITAS GRAFIKA DAN KRIYA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG GRAFIKA' or jabatan='KEPALA SUBBIDANG KRIYA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KREATIVITAS GRAFIKA DAN KRIYA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG GRAFIKA' or jabatan='KEPALA SUBBIDANG KRIYA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KREATIVITAS FASHION DAN FILM') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG FASHION' or jabatan' or jabatan='KEPALA SUBBIDANG FILM'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KREATIVITAS TEKNOLOGI INFORMASI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PIRANTI LUNAK' or jabatan='KEPALA SUBBIDANG PERANGKAT KERAS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KREATIVITAS MUSIK DAN KULINER') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG MUSIK' or jabatan='KEPALA SUBBIDANG KULINER'")
                ->get();
        } elseif ($jabatan == 'DEPUTI BIDANG PENGEMBANGAN PEMUDA') {
            $q = $q->where("jabatan='ASISTEN DEPUTI KEPEMINPINAN DAN KEPELOPORAN PEMUDA' or jabatan='ASISTEN DEPUTI KEWIRAUSAHAAN PEMUDA'
                    or jabatan='ASISTEN DEPUTI ORGANISASI KEPEMUDAAN DAN KEPRAMUKAAN' or jabatan='ASISTEN DEPUTI STANDARISASI DAN INFRASTRUKTUR PEMUDA'
                    or jabatan='ASISTEN DEPUTI KEMITRAAN DAN PENGHARGAAN OLAHRAGA' or jabatan='SEKRETARIS DEPUTI BIDANG PENGEMBANGAN PEMUDA'")
                ->get();
        } elseif ($jabatan == 'SEKRETARIS DEPUTI BIDANG PENGEMBANGAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP' or jabatan='KEPALA BAGIAN HUBUNGAN MASYARAKAT, HUKUM, DAN SISTEM INFORMASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERENCANAAN' or jabatan='KEPALA SUBBAGIAN SUMBER DAYA MANUSIA APARATUR DAN ARSIP'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI KEPEMINPINAN DAN KEPELOPORAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG KADERISASI DAN PENDAYAGUNAAN KEPEMIMPINAN' or jabatan='KEPALA BIDANG KEPELOPORAN TANGGAP BENCANA DAN RAWAN SOSIAL'
                    or jabatan='KEPALA BIDANG KEPELOPORAN DESA DAN DAERAH KHUSUS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KADERISASI DAN PENDAYAGUNAAN KEPEMIMPINAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG KADERISASI' or jabatan='KEPALA SUBBIDANG PENDAYAGUNAAN KEPEMIMPINAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEPELOPORAN TANGGAP BENCANA DAN RAWAN SOSIAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG TANGGAP BENCANA' or jabatan='KEPALA SUBBIDANG RAWAN SOSIAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEPELOPORAN DESA DAN DAERAH KHUSUS') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN DESA' or jabatan='KEPALA SUBBIDANG DAERAH TERLUAR DAN TERTINGGAL'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI KEWIRAUSAHAAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG PENELUSURAN DAN PEMETAAN POTENSI KEWIRAUSAHAAN PEMUDA' or jabatan='KEPALA BIDANG PENDAMPINGAN DAN PENGEMBANGAN POTENSI'
                    or jabatan='KEPALA BIDANG AKSES PERMODALAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENELUSURAN DAN PEMETAAN POTENSI KEWIRAUSAHAAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENELUSURAN' or jabatan='KEPALA SUBBIDANG PEMETAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENDAMPINGAN DAN PENGEMBANGAN POTENSI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENDAMPINGAN' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN POTENSI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG AKSES PERMODALAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG FASILITAS PERMODALAN' or jabatan='KEPALA SUBBIDANG FASILITAS KELEMBAGAAN LPKP'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI ORGANISASI KEPEMUDAAN DAN KEPRAMUKAAN') {
            $q = $q->where("jabatan='KEPALA BIDANG ORGANISASI KEPELAJARAN' or jabatan='KEPALA BIDANG ORGANISASI KEMAHASISWAAN' 
                    or jabatan='KEPALA BIDANG ORGANISASI KEPEMUDAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG ORGANISASI KEPELAJARAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG INTRA BIDANG ORGANISASI KEPELAJARAN' or jabatan='KEPALA SUBBAGIAN EXTRA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG ORGANISASI KEMAHASISWAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG INTRA BIDANG ORGANISASI KEMAHASISWAAN' or jabatan='KEPALA SUBBAGIAN EXTRA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG ORGANISASI KEPEMUDAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG INTRA BIDANG ORGANISASI KEPEMUDAAN' or jabatan='KEPALA SUBBAGIAN EXTRA'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI STANDARISASI DAN INFRASTRUKTUR PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG STANDARISASI ORGANISASI DAN SARANA KEPEMUDAAN' or jabatan='KEPALA BIDANG PRASARANA DAN SARANA INDONESIA TIMUR'
                    or jabatan='KEPALA BIDANG PRASARANA DAN SARANA INDONESIA TENGAH' or jabatan='KEPALA BIDANG PRASARANA DAN SARANA INDONESIA BARAT'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG STANDARISASI ORGANISASI DAN SARANA KEPEMUDAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA PENDIDIKAN' or jabatan='KEPALA SUBBIDANG ORGANISASI KEPEMUDAAN'
                    or jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA PRESTASI' or jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA REKREASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PRASARANA DAN SARANA INDONESIA TIMUR') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG SARANA INDONESIA TIMUR' or jabatan='KEPALA SUBBIDANG PRASARANA INDONESIA TIMUR'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PRASARANA DAN SARANA INDONESIA TENGAH') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG SARANA INDONESIA TENGAH' or jabatan='KEPALA SUBBIDANG PRASARANA INDONESIA TENGAH'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PRASARANA DAN SARANA INDONESIA BARAT') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG SARANA INDONESIA BARAT' or jabatan='KEPALA SUBBIDANG PRASARANA INDONESIA BARAT'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI KEMITRAAN DAN PENGHARGAAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG KEMITRAAN DALAM NEGERI' or jabatan='KEPALA BIDANG KEMITRAAN LUAR NEGERI'
                    or jabatan='KEPALA BIDANG PROMOSI DAN PENGHARGAAN KEPEMUDAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEMITRAAN DALAM NEGERI') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN KEMITRAAN PUSAT DAN DAERAH' or jabatan='KEPALA SUBBIDANG KEMITRAAN LINTAS SEKTOR DAN SWASTA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEMITRAAN LUAR NEGERI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG BILATERAL' or jabatan='KEPALA SUBBIDANG MULTILATERAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PROMOSI DAN PENGHARGAAN KEPEMUDAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PROMOSI KEPEMUDAAN' or jabatan='KEPALA SUBBIDANG PENGHARGAAN KEPEMUDAAN'")
                ->get();
        } elseif ($jabatan == 'DEPUTI BIDANG PEMBUDAYAAN OLAHRAGA') {
            $q = $q->where("jabatan='ASISTEN DEPUTI PENGELOLAAN OLAHRAGA PENDIDIKAN' or jabatan='ASISTEN DEPUTI PENGELOLAAN OLAHRAGA REKREASI'
                    or jabatan='ASISTEN DEPUTI PENGELOLAAN PEMBINAAN SENTRA DAN SEKOLAH KHUSUS OLAHRAGA' or jabatan='ASISTEN DEPUTI PENGEMBANGAN OLAHRAGA TRADISIONAL DAN LAYANAN KHUSUS'
                    or jabatan='ASISTEN DEPUTI KEMITRAAN DAN PENGHARGAAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENGELOLAAN OLAHRAGA PENDIDIKAN') {
            $q = $q->where("jabatan='KEPALA BIDANG OLAHRAGA PENDIDIKAN DASAR' or jabatan='KEPALA BIDANG OLAHRAGA PENDIDIKAN MENENGAH'
                    or jabatan='KEPALA BIDANG OLAHRAGA PENDIDIKAN TINGGI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PENDIDIKAN DASAR') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN BIDANG OLAHRAGA PENDIDIKAN DASAR' or jabatan='KEPALA SUBBIDANG KOMPETISI BIDANG OLAHRAGA PENDIDIKAN DASAR'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PENDIDIKAN MENENGAH') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN BIDANG OLAHRAGA PENDIDIKAN MENENGAH' or jabatan='KEPALA SUBBIDANG KOMPETISI BIDANG OLAHRAGA PENDIDIKAN MENENGAH'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PENDIDIKAN TINGGI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN BIDANG OLAHRAGA PENDIDIKAN TINGGI' or jabatan='KEPALA SUBBIDANG KOMPETISI BIDANG OLAHRAGA PENDIDIKAN TINGGI'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENGELOLAAN OLAHRAGA REKREASI') {
            $q = $q->where("jabatan='KEPALA BIDANG PEMBINAAN OLAHRAGA MASSAL DAN KESEHATAN OLAHRAGA' or jabatan='KEPALA BIDANG PENGEMBANGAN SANGGAR DAN PUSAT KEBUGARAN'
                    or jabatan='KEPALA BIDANG PENGELOLAAN OLAHRAGA PETUALANGAN, TANTANGAN DAN WISATA' or jabatan='KEPALA BIDANG PENGEMBANGAN RUANG PUBLIK OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMBINAAN OLAHRAGA MASSAL DAN KESEHATAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN OLAHRAGA MASSAL' or jabatan='KEPALA SUBBIDANG KESEHATAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGEMBANGAN SANGGAR DAN PUSAT KEBUGARAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN SANGGAR OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN PUSAT KEBUGARAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGELOLAAN OLAHRAGA PETUALANGAN, TANTANGAN DAN WISATA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGELOLAAN OLAHRAGA PETUALANGAN DAN TANTANGAN' or jabata='KEPALA SUBBIDANG PENGELOLAAN OLAHRAGA WISATA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGEMBANGAN RUANG PUBLIK OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN RUANG PUBLIK OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENGKAJIAN RUANG PUBLIK OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENGELOLAAN PEMBINAAN SENTRA DAN SEKOLAH KHUSUS OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG SENTRA DAN PERKUMPULAN OLAHRAGA' or jabatan='KEPALA BIDANG SEKOLAH KHUSUS OLAHRAGA'
                    or jabatan='KEPALA BIDANG PEMBINAAN PPLP' or jabatan='KEPALA BIDANG PEMBINAAN PPLM'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG SENTRA DAN PERKUMPULAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGELOLAAN SENTRA DAN PERKUMPULAN OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN SENTRA DAN PERKUMPULAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG SEKOLAH KHUSUS OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGELOLAAN SEKOLAH KHUSUS OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN SEKOLAH KHUSUS OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMBINAAN PPLP') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN PPLP' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN PPLP'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMBINAAN PPLM') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN PPLM' or jabatan='KEPALA SUBBIDANG PEMBINAAN PPLM'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENGEMBANGAN OLAHRAGA TRADISIONAL DAN LAYANAN KHUSUS') {
            $q = $q->where("jabatan='KEPALA BIDANG OLAHRAGA TRADISIONAL' or jabatan='KEPALA BIDANG OLAHRAGA USIA DINI, LANJUT USIA DAN OLAHRAGA KHUSUS'
                    or jabatan='KEPALA BIDANG OLAHRAGA PENYANDANG CACAT'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA TRADISIONAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGKAJIAN OLAHRAGA TRADISIONAL' or jabatan='KEPALA SUBBIDANG PENGELOLAAN OLAHRAGA TRADISIONAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA USIA DINI, LANJUT USIA DAN OLAHRAGA KHUSUS') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN OLAHRAGA USIA DINI DAN LANJUT USIA' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN OLAHRAGA KHUSUS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PENYANDANG CACAT') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN OLAHRAGA PENYANDANG CACAT' or jabatan='KEPALA SUBBIDANG KOMPETISI OLAHRAGA PENYANDANG CACAT'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI KEMITRAAN DAN PENGHARGAAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG KEMITRAAN DALAM NEGERI DAN LUAR NEGERI' or jabatan='KEPALA BIDANG BIMBINGAN DAN PENGEMBANGAN KARIER ATLIT'
                    or jabatan='KEPALA BIDANG PENGHARGAAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEMITRAAN DALAM NEGERI DAN LUAR NEGERI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG KEMITRAAN DALAM NEGERI' or jabatan='KEPALA SUBBIDANG KEMITRAAN LUAR NEGERI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG BIMBINGAN DAN PENGEMBANGAN KARIER ATLIT') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG BIMBINGAN' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN KARIER'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGHARGAAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENELUSURAN PENGHARGAAN OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENYELENGGARAAN PENGHARGAAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'DEPUTI BIDANG PENINGKATAN PRESTASI OLAHRAGA') {
            $q = $q->where("jabatan='SEKRETARIS DEPUTI BIDANG PENINGKATAN PRESTASI OLAHRAGA' or jabatan='ASISTEN DEPUTI PEMBIBITAN DAN IPTEK OLAHRAGA'
                    or jabatan='ASISTEN DEPUTI PENINGKATAN TENAGA DAN ORGANISASI KEOLAHRAGAAN' or jabatan='ASISTEN DEPUTI INDUSTRI DAN PROMOSI OLAHRAGA'
                    or jabatan='ASISTEN DEPUTI OLAHRAGA PRESTASI' or jabatan='ASISTEN DEPUTI STANDARISASI DAN INFRASTRUKTUR OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'SEKRETARIS DEPUTI BIDANG PENINGKATAN PRESTASI OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP' or jabatan='KEPALA BAGIAN HUBUNGAN MASYARAKAT, HUKUM, DAN SISTEM INFORMASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERENCANAAN' or jabatan='KEPALA SUBBAGIAN SUMBER DAYA MANUSIA APARATUR DAN ARSIP'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN HUBUNGAN MASYARAKAT, HUKUM, DAN SISTEM INFORMASI') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN HUBUNGAN MASYARAKAT DAN SISTEM INFORMASI' or jabatan='KEPALA SUBBAGIAN HUKUM'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PEMBIBITAN DAN IPTEK OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG PEMANDUAN DAN PENGEMBANGAN BAKAT' or jabatan='KEPALA BIDANG KOMPETISI USIA MUDA'
                    or jabatan='KEPALA BIDANG PENGEMBANGAN IPTEK OLAHRAGA' or jabatan='KEPALA BIDANG PEMANFAATAN IPTEK OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMANDUAN DAN PENGEMBANGAN BAKAT') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMANDUAN BAKAT' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN BAKAT'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KOMPETISI USIA MUDA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG KOMPETISI DAERAH DAN NASIONAL' or jabatan='KEPALA SUBBIDANG KOMPETISI INTERNASIONAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGEMBANGAN IPTEK OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN ILMU PENGETAHUAN KEOLAHRAGAAN' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN TEKNOLOGI KEOLAHRAGAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMANFAATAN IPTEK OLAHRAGA') {
            $q = $q->where("jabatan='EPALA SUBBIDANG DISEMINASI' or jabatan='KEPALA SUBBIDANG PENERAPAN'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENINGKATAN TENAGA DAN ORGANISASI KEOLAHRAGAAN') {
            $q = $q->where("jabatan='KEPALA BIDANG PENINGKATAN MUTU PELATIH DAN INSTRUKTUR' or jabatan='KEPALA BIDANG PENINGKATAN MUTU WASIT, JURI DAN TENAGA PENDUKUNG'
                    or jabatan='KEPALA BIDANG ORGANISASI KEOLAHRAGAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENINGKATAN MUTU PELATIH DAN INSTRUKTUR') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENINGKATAN MUTU PELATIH' or jabatan='KEPALA SUBBIDANG PENINGKATAN MUTU INSTRUKTUR'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENINGKATAN MUTU WASIT, JURI DAN TENAGA PENDUKUNG') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENINGKATAN MUTU WASIT DAN JURI' or jabatan='KEPALA SUBBIDANG PENINGKATAN MUTU TENAGA PENDUKUNG'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG ORGANISASI KEOLAHRAGAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGELOLAAN INDUK ORGANISASI CABANG OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENGELOLAAN ORGANISASI FUNGSIONAL DAN PROFESIONAL'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI INDUSTRI DAN PROMOSI OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG PRODUK BARANG DAN JASA INDUSTRI OLAHRAGA' or jabatan='KEPALA SUBBIDANG INVENTARISASI INDUSTRI OLAHRAGA'
                    or jabatan='KEPALA BIDANG PROMOSI DAN PEMASARAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PRODUK BARANG DAN JASA INDUSTRI OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PRODUK BARANG INDUSTRI OLAHRAGA' or jabatan='KEPALA SUBBIDANG PRODUK JASA INDUSTRI OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA SUBBIDANG INVENTARISASI INDUSTRI OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG INVENTARISASI INDUSTRI OLAHRAGA' or jabatan='KEPALA SUBBIDANG MANAJEMEN INDUSTRI OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PROMOSI DAN PEMASARAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PROMOSI OLAHRAGA' or jabatan='KEPALA SUBBIDANG PEMASARAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI OLAHRAGA PRESTASI') {
            $q = $q->where("jabatan='KEPALA BIDANG OLAHRAGA PRESTASI DAERAH' or jabatan='KEPALA BIDANG OLAHRAGA PRESTASI NASIONAL'
                    or jabatan='KEPALA BIDANG OLAHRAGA PRESTASI INTERNASIONAL' or jabatan='KEPALA BIDANG PENGELOLAAN PEMUSATAN PELATIHAN OLAHRAGA NASIONAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PRESTASI DAERAH') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN PRESTASI DAERAH' or jabatan='KEPALA SUBBIDANG PEKAN DAN KEJUARAAN OLAHRAGA PRESTASI DAERAH'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PRESTASI NASIONAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEKAN DAN KEJUARAAN OLAHRAGA PRESTASI NASIONAL' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN PRESTASI NASIONAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PRESTASI INTERNASIONAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEKAN DAN KEJUARAAN OLAHRAGA PRESTASI INTERNASIONAL' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN PRESTASI INTERNASIONAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGELOLAAN PEMUSATAN PELATIHAN OLAHRAGA NASIONAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN ATLET ANDALAN NASIONAL' or jabatan='KEPALA SUBBIDANG TATA KELOLA KONTINGEN'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI STANDARISASI DAN INFRASTRUKTUR OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG STANDARISASI, AKREDITASI, DAN SERTIFIKASI KEOLAHRAGAAN' or jabatan='KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA PENDIDIKAN'
                    or jabatan='KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA REKREASI' or jabatan='KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA PRESTASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG STANDARISASI, AKREDITASI, DAN SERTIFIKASI KEOLAHRAGAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG STANDARISASI' or jabatan='KEPALA SUBBIDANG AKREDITASI DAN SERTIFIKASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA PENDIDIKAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA PENDIDIKAN' or jabatan='KEPALA SUBBIDANG PRASARANA OLAHRAGA PENDIDIKAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA REKREASI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PRASARANA OLAHRAGA REKREASI' or jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA REKREASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA PRESTASI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PRASARANA OLAHRAGA PRESTASI' or jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA PRESTASI'")
                ->get();
        } else {
            $q = $q->get();
        }


        return $q->result_array();
    }

    public function select_SuratMasuk()
    {
        $q = $this->db
            ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.tgl_entri, s.tgl_surat,s.tgl_terima_surat,
                s.urgensi, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima, 
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, p.nama_lengkap as nama_penerima, r.nama_lengkap as registrator')
            ->from('tb_surat as s')
            ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
            ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
            ->join('tb_pegawai as p', 'p.id = ss.penerima')
            ->join('tb_user as u', 'p.id = u.id_pegawai')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
            // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
            ->join('tb_pegawai as r', 's.id_registrator = r.id')
            ->where("p.level >= '" . $this->session->userdata('level') . "'")
            ->where("p.level < '10'")
            ->order_by('s.tgl_terima_surat', 'DESC');
        $r = '';
        if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
            $r = $q->get();
        } else {

            if ($this->session->userdata('grup') == '3' || $this->session->userdata('grup') == '1') {
                $r = $q
                    ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                    ->get();
            } else {
                $r = $q->where("ss.diterima = '1'")
                    ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                    ->where("ss.penerima = '" . $this->session->userdata('id') . "'")
                    ->get();
            }
        }
        // ->where("p.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
        // ->get();


        return $r->result_array();
    }


    public function select_SuratMasuk_API($level, $unit, $grup, $id_pegawai, $id_plh)
    {
        $q = $this->db
            ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.tgl_entri, s.tgl_surat,s.tgl_terima_surat,
                s.urgensi, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima, 
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, p.nama_lengkap as nama_penerima, r.nama_lengkap as registrator , s.lampiran1 ,s.lampiran2 ,s.lampiran3,s.lampiran4,s.lampiran5,ss.no_agenda_disposisi')
            ->from('tb_surat as s')
            ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
            ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
            ->join('tb_pegawai as p', 'p.id = ss.penerima')
            ->join('tb_user as u', 'p.id = u.id_pegawai')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
            // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
            ->join('tb_pegawai as r', 's.id_registrator = r.id')
            ->where("p.level >= '" . $level . "'")
            ->where("p.level < '10'")
            ->order_by('s.tgl_terima_surat', 'DESC');
        $r = '';
        if ($grup == '1' || $grup == '2') {
            $r = $q->get();
        } else {

            if ($grup == '3' || $grup == '1') {
                $r = $q
                    ->where("j.id_satuan_kerja = '" . $unit . "'")
                    ->get();
            } else {
                $r = $q->where("ss.diterima = '1'")
                    ->where(" j.id_satuan_kerja = " . $unit . "")
                    ->where("ss.penerima=" . $id_pegawai . "")
                    ->or_where("ss.penerima= " . $id_plh . "")
                    ->get();
            }
        }

        return $r->result_array();
    }


    public function select_SuratMasuk_Search_API($level, $unit, $grup, $id_pegawai, $id_plh, $search)
    {
        $q = $this->db
            ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.tgl_entri, s.tgl_surat,s.tgl_terima_surat,
                s.urgensi, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima, 
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, p.nama_lengkap as nama_penerima, r.nama_lengkap as registrator , s.lampiran1 ,s.lampiran2 ,s.lampiran3,s.lampiran4,s.lampiran5,ss.no_agenda_disposisi')
            ->from('tb_surat as s')
            ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
            ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
            ->join('tb_pegawai as p', 'p.id = ss.penerima')
            ->join('tb_user as u', 'p.id = u.id_pegawai')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
            // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
            ->join('tb_pegawai as r', 's.id_registrator = r.id')
            ->where("p.level >= '" . $level . "'")
            ->where("p.level < '10'")
            ->like("s.no_agenda", $search)
            ->order_by('s.tgl_terima_surat', 'DESC');
        $r = '';
        if ($grup == '1' || $grup == '2') {
            $r = $q->get();
        } else {

            if ($grup == '3' || $grup == '1') {
                $r = $q
                    ->where("j.id_satuan_kerja = '" . $unit . "'")
                    ->get();
            } else {
                $r = $q->where("ss.diterima = '1'")
                    ->where(" j.id_satuan_kerja = " . $unit . "")
                    ->where("ss.penerima=" . $id_pegawai . "")
                    //->or_where("ss.penerima= " . $id_plh . "")
                    ->get();
            }
        }
        // ->where("p.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
        // ->get();


        return $r->result_array();
    }

    public function select_SuratMasukBelumTerbaca_API($level, $unit, $grup, $id_pegawai, $id_plh)
    {

        $q = $this->db
            ->select('s.id, s.perihal, s.keterangan, s.no_agenda, s.no_surat, s.tgl_entri, s.tgl_surat,s.tgl_terima_surat,
                s.urgensi, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima, 
                ss.tgl_diterima,ss.terbaca,ss.tgl_dibaca,ss.disposisi, ss.tgl_disposisi,ss.ditolak,ss.tgl_ditolak,
                js.jenis_surat, p.nama_lengkap as nama_penerima, r.nama_lengkap as registrator , s.lampiran1 ,s.lampiran2 ,s.lampiran3,s.lampiran4,s.lampiran5,ss.no_agenda_disposisi')
            ->from('tb_surat as s')
            ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
            ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
            ->join('tb_pegawai as p', 'p.id = ss.penerima')
            ->join('tb_user as u', 'u.id_pegawai = ss.penerima')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id')
            // ->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
            ->join('tb_pegawai as r', 's.id_registrator = r.id')
            //->where("p.level >= '" . $level . "'")
            //->where("p.level < '10'")
            ->where('ss.terbaca = 0')
            ->order_by('s.tgl_terima_surat', 'DESC');
        $r = '';
        if ($grup == '1' || $grup == '2') {
            $r = $q->get();
        } else {

            if ($grup == '3' || $grup == '1') {
                $r = $q->where("ss.diterima = '0'")
                    ->where("j.id_satuan_kerja = '" . $unit . "'")
                    ->get();
            } else {
                $r = $q->where("ss.diterima = '1'")
                    ->where(" j.id_satuan_kerja = " . $unit . "")
                    ->where("ss.penerima=" . $id_pegawai . "")
                    ->or_where("ss.penerima= " . $id_plh . "")
                    ->get();
            }
        }


        return $r->result_array();
    }

    public function get_JumlahSuratBelumTerbaca_API($level, $grup, $unit, $id, $id_plh)
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
            ->where("p.level >= '" . $level . "'")
            ->where("p.level < '10'")
            ->where('ss.terbaca = 0')
			->where('ss.diterima = 1');
        $r = '';
        if ($grup == '1' || $grup == '2') {
            $r = $q->get();
        } else {
            $r = $q->where("j.id_satuan_kerja = '" . $unit . "'")
                ->where("ss.penerima = '" . $id . "'")
                //->or_where("ss.penerima = '" . $id_plh . "'")
                ->get();
        }


        return $r->num_rows();
    }

    public function select_SuratMasukBelumTerbaca()
    { {
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
                ->where("p.level >= '" . $this->session->userdata('level') . "'")
                ->where("p.level < '10'")
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
                    $r = $q->where("ss.diterima = '1'")
                        ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                        ->where("ss.penerima = '" . $this->session->userdata('id') . "'")
                        ->get();
                }
            }


            return $r->result_array();
        }
    }
    public function get_JumlahSuratDisposisi()
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
            ->where('ss.disposisi = 1');
        $r = '';
        if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2') {
            $r = $q->get();
        } else {
            $r = $q->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                ->where("ss.penerima = '" . $this->session->userdata('id') . "'")
                ->get();
        }
        // ->where("p.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
        //    ->get();


        return $r->num_rows();
    }

    public function get_JumlahSuratTerbaca()
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
            ->where('ss.terbaca = 1');
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
            //->join('tb_pegawai as pp', 'ss.pengirim = pp.id')
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
                s.urgensi, s.sifat_surat,s.isi,ss.pengirim,ss.penerima, ss.diterima,
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
            ->where("p.level < '10'");
        $r = '';
        if ($this->session->userdata('unit') == '1' || $this->session->userdata('unit') == '2') {
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
    public function _upload($file, $no)
    {
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'pdf|doc|docx';
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



    public function select()
    {
        $q = $this->db
            ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi, d.terbaca,d.ditolak, ss.no_agenda_disposisi,
                        s.no_surat, s.perihal,p.nama_lengkap')
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
                ->where("d.penerima = '" . $this->session->userdata('id') . "'")
                ->get();
        }

        return $r->result_array();
    }

    public function select_API($unit, $grup, $id_pegawai)
    {
        $z = $this->db->select('*')
            ->from('tb_pegawai')
            ->where('idplh =', $id_pegawai)
            ->get()->result();
        $idpegawai1 = 0;
        foreach ($z as $row) {
            $idpegawai1 = $row->id;
        }
        $q = $this->db
            ->select('d.id as id_disposisi, d.id_surat, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi,d.penting, d.terbaca,d.tgl_dibaca,d.ditolak, d.tgl_ditolak,
                        d.dijawab,d.ditindak_lanjuti,d.ditanggapi_tertulis,d.disiapkan_makalah,d.koordinasikan,d.diwakili,
                        d.dihadiri,d.disiapkan_surat,d.arsip,d.agendakan,d.diperhatikan,d.dijelaskan,d.diperbaiki,d.diproses,
                        d.diketahui,d.dibicarakan,d.lainlain,ss.no_agenda_disposisi,
                        s.*, s.perihal,p.nama_lengkap,js.jenis_surat,ss.tgl_diterima,ss.terbaca as surat_terbaca,p.nama_lengkap as nama_pengirim,pp.nama_lengkap as nama_penerima')
            ->from('tb_disposisi as d')
            ->join('tb_surat as s', 'd.id_surat = s.id')
            ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
            ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
            ->join('tb_pegawai as p', 'd.pengirim = p.id')
            ->join('tb_pegawai as pp', 'd.penerima = pp.id')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->order_by('d.tgl_disposisi', 'DESC');
        $r = '';
        if ($grup == '1' || $grup == '2') {
            $r = $q->get();
        } else {
            $r = $q
                // ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                ->where("d.penerima = '" . $idpegawai1 . "' OR d.penerima= " . $id_pegawai)
                ->get();
        }

        return $r->result_array();
    }


    public function select_Search_API($unit, $grup, $id_pegawai, $search)
    {
        $z = $this->db->select('*')
            ->from('tb_pegawai')
            ->where('idplh =', $id_pegawai)
            ->get()->result();
        $idpegawai1 = 0;
        foreach ($z as $row) {
            $idpegawai1 = $row->id;
        }
        $q = $this->db
            ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi,d.penting, d.terbaca,d.tgl_dibaca,d.ditolak, d.tgl_ditolak,
                        d.dijawab,d.ditindak_lanjuti,d.ditanggapi_tertulis,d.disiapkan_makalah,d.koordinasikan,d.diwakili,
                        d.dihadiri,d.disiapkan_surat,d.arsip,d.agendakan,d.diperhatikan,d.dijelaskan,d.diperbaiki,d.diproses,
                        d.diketahui,d.dibicarakan,d.lainlain,ss.no_agenda_disposisi,
                        s.*, s.perihal,p.nama_lengkap,js.jenis_surat,ss.tgl_diterima,ss.terbaca as surat_terbaca, ss.penerima as tujuan')
            ->from('tb_disposisi as d')
            ->join('tb_surat as s', 'd.id_surat = s.id')
            ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
            ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
            ->join('tb_pegawai as p', 'd.pengirim = p.id')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->order_by('d.tgl_disposisi', 'DESC')
            ->like("d.no_agenda", $search);
        $r = '';
        if ($grup == '1' || $grup == '2') {
            $r = $q->get();
        } else {
            $r = $q
                // ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                ->where("d.penerima = '" . $idpegawai1 . "' OR d.penerima= " . $id_pegawai)
                ->get();
        }

        return $r->result_array();
    }

    public function select_DisposisiBelumTerbaca_API($grup, $unit, $id_pegawai)
    {
        $z = $this->db->select('*')
            ->from('tb_pegawai')
            ->where('idplh =', $id_pegawai)
            ->get()->result();
        $idpegawai1 = 0;
        foreach ($z as $row) {
            $idpegawai1 = $row->id;
        }
        $q = $this->db
            ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi,d.penting, d.terbaca,d.tgl_dibaca,d.ditolak, d.tgl_ditolak,
                        d.dijawab,d.ditindak_lanjuti,d.ditanggapi_tertulis,d.disiapkan_makalah,d.koordinasikan,d.diwakili,
                        d.dihadiri,d.disiapkan_surat,d.arsip,d.agendakan,d.diperhatikan,d.dijelaskan,d.diperbaiki,d.diproses,
                        d.diketahui,d.dibicarakan,d.lainlain,ss.no_agenda_disposisi,
                        s.*, s.perihal,p.nama_lengkap,js.jenis_surat,ss.tgl_diterima,ss.terbaca as surat_terbaca')
            ->from('tb_disposisi as d')
            ->join('tb_surat as s', 'd.id_surat = s.id')
            ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
            ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
            ->join('tb_pegawai as p', 'd.pengirim = p.id')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->where('d.terbaca = 0')
            ->order_by('d.tgl_disposisi', 'DESC');
        $r = '';
        if ($grup == '1' || $grup == '2') {
            $r = $q->get();
        } else {
            $r = $q->where('d.terbaca = 0')
                ->where("d.penerima = " . $id_pegawai . "")
                //->or_where("d.penerima= " . $id_pegawai."")
                ->get();
        }

        return $r->result_array();
    }

    public function select_untukpengirim_API($unit, $grup, $id_pegawai)
    {
        $z = $this->db->select('*')
            ->from('tb_pegawai')
            ->where('idplh =', $id_pegawai)
            ->get()->result();
        $idpegawai1 = 0;
        foreach ($z as $row) {
            $idpegawai1 = $row->id;
        }
        $q = $this->db
            ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi,d.penting, d.terbaca,d.tgl_dibaca,d.ditolak, d.tgl_ditolak,
                        d.dijawab,d.ditindak_lanjuti,d.ditanggapi_tertulis,d.disiapkan_makalah,d.koordinasikan,d.diwakili,
                        d.dihadiri,d.disiapkan_surat,d.arsip,d.agendakan,d.diperhatikan,d.dijelaskan,d.diperbaiki,d.diproses,
                        d.diketahui,d.dibicarakan,d.lainlain,ss.no_agenda_disposisi,
                        s.*, s.perihal,p.nama_lengkap,js.jenis_surat,ss.tgl_diterima,ss.terbaca as surat_terbaca,p.nama_lengkap as nama_pengirim,pp.nama_lengkap as nama_penerima')
            ->from('tb_disposisi as d')
            ->join('tb_surat as s', 'd.id_surat = s.id')
            ->join('tb_status_surat as ss', 'ss.id_surat = s.id')
            ->join('tb_pegawai as p', 'd.pengirim = p.id')
            ->join('tb_pegawai as pp', 'd.penerima = pp.id')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
            ->order_by('d.tgl_disposisi', 'DESC');
        $r = '';
        if ($grup == '1' || $grup == '2') {
            $r = $q->get();
        } else {
            $r = $q
                // ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                ->where("d.pengirim = '" . $idpegawai1 . "' OR d.pengirim= " . $id_pegawai)
                ->get();
        }

        return $r->result_array();
    }

    public function select_untukpengirim_Search_API($unit, $grup, $id_pegawai, $search)
    {
        $z = $this->db->select('*')
            ->from('tb_pegawai')
            ->where('idplh =', $id_pegawai)
            ->get()->result();
        $idpegawai1 = 0;
        foreach ($z as $row) {
            $idpegawai1 = $row->id;
        }
        $q = $this->db
            ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi,d.penting, d.terbaca,d.tgl_dibaca,d.ditolak, d.tgl_ditolak,
                        d.dijawab,d.ditindak_lanjuti,d.ditanggapi_tertulis,d.disiapkan_makalah,d.koordinasikan,d.diwakili,
                        d.dihadiri,d.disiapkan_surat,d.arsip,d.agendakan,d.diperhatikan,d.dijelaskan,d.diperbaiki,d.diproses,
                        d.diketahui,d.dibicarakan,d.lainlain,ss.no_agenda_disposisi,
                        s.*, s.perihal,p.nama_lengkap,js.jenis_surat,ss.tgl_diterima,ss.terbaca as surat_terbaca')
            ->from('tb_disposisi as d')
            ->join('tb_surat as s', 'd.id_surat = s.id')
            ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id')
            ->join('tb_status_surat as ss', 'ss.id_surat=s.id')
            ->join('tb_pegawai as p', 'd.pengirim = p.id')
            ->join('tb_jabatan as j', 'p.id_jabatan = j.id')
            ->order_by('d.tgl_disposisi', 'DESC')
            ->like("d.no_agenda", $search);
        $r = '';
        if ($grup == '1' || $grup == '2') {
            $r = $q->get();
        } else {
            $r = $q
                // ->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                ->where("d.pengirim = '" . $idpegawai1 . "' OR d.pengirim= " . $id_pegawai)
                ->get();
        }

        return $r->result_array();
    }

    public function get_JumlahDisposisiBelumTerbaca_API($grup, $id)
    {
        $q = $this->db
            ->select('d.id as id_disposisi, d.no_agenda, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi, d.sifat_disposisi, d.terbaca, d.ditolak,
                        s.no_surat, s.perihal,p.nama_lengkap')
            ->from('tb_disposisi as d')
            ->join('tb_surat as s', 'd.id_surat = s.id')
            ->join('tb_pegawai as p', 'd.pengirim = p.id')
            //->join('tb_pegawai as pp', 'd.penerima = pp.id')
            //->join('tb_jabatan as j', 'p.id_jabatan = j.id');
            ->where('d.terbaca = 0');
        $r = '';
        if ($grup == '1' || $grup == '2') {
            $r = $q->get();
        } else {
            $r = $q->where('d.terbaca = 0')
                ->where("d.penerima = " . $id . "")
                //->or_where("d.penerima= " . $id_plh ."")
                ->get();
        }

        return $r->num_rows();
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
                ->where("d.pengirim = '" . $this->session->userdata('id') . "'")
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
            $r = $q->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                ->where("d.penerima = '" . $this->session->userdata('id') . "'")
                ->get();
        }

        return $r->num_rows();
    }
    public function get_JumlahDisposisiBelumTerbaca()
    {
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
            $r = $q->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                ->where("d.penerima = '" . $this->session->userdata('id') . "'")
                ->get();
        }

        return $r->num_rows();
    }
    public function select_DisposisiBelumTerbaca()
    {
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
            $r = $q->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                ->where("d.penerima = '" . $this->session->userdata('id') . "'")
                ->get();
        }

        return $r->result_array();
    }
    public function get_JumlahDisposisiDitolak()
    {
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
            $r = $q->where("j.id_satuan_kerja = '" . $this->session->userdata('unit') . "'")
                ->where("d.penerima = '" . $this->session->userdata('id') . "'")
                ->get();
        }

        return $r->num_rows();
    }

    public function select_DisposisiMasukById($id)
    {
        $q = $this->db
            ->select('d.id as id_disposisi, d.no_agenda as agenda_disposisi, d.pesan, d.pengirim, d.penerima, d.tgl_disposisi,
                        d.tgl_selesai, d.urgensi as urgensi_disposisi, d.sifat_disposisi,d.terbaca,d.ditolak, d.dijawab, d.ditindak_lanjuti,
                        d.ditanggapi_tertulis, d.disiapkan_makalah ,d.koordinasikan, d.diwakili, d.dihadiri, d.disiapkan_surat,
                        d.arsip, d.agendakan, d.diperhatikan, d.dijelaskan, d.diperbaiki, d.diproses, d.diketahui, d.dibicarakan, d.lainlain, 
                        s.id as id_surat, s.no_surat, s.no_agenda as agenda_surat, s.perihal, s.tgl_entri,s.tgl_surat,ss.no_agenda_disposisi, js.jenis_surat, s.urgensi as urgensi_surat, s.sifat_surat,
                        p.nama_lengkap,g.nama_lengkap as tujuan')
            ->from('tb_disposisi as d')
            ->join('tb_surat as s', 'd.id_surat = s.id', 'left')
            ->join('tb_status_surat as ss', 'ss.id_surat = s.id')
            ->join('tb_jenis_surat as js', 's.id_jenis_surat = js.id', 'left')
            ->join('tb_pegawai as p', 'd.pengirim = p.id', 'left')
            ->join('tb_pegawai as g', 'd.penerima = g.id')
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


    public function select_PenerimaDisposisi_API($lvl, $unit, $jabatan, $id_pegawai)
    {

        $z = $this->db->select('*')
            ->from('tb_pegawai')
            ->where('id =', $id_pegawai)
            ->get()->result();
        $id_jabatan = 0;
        foreach ($z as $row) {
            $id_jabatan = $row->id_jabatan;
        }

        $z = $this->db->select('*')
            ->from('tb_jabatan')
            ->where('id =', $id_jabatan)
            ->get()->result();
        $jabatan = 0;
        foreach ($z as $row) {
            $jabatan = $row->jabatan;
        }

        $q = $this->db
            ->select('p.id as id_pegawai,p.nip,p.nama_lengkap,p.nama_singkat,p.alamat,p.telp,
                p.jenis_kelamin,p.golongan,p.agama,p.tempat_lahir,p.tgl_lahir,j.id_satuan_kerja,
               p.id_jabatan,j.jabatan,p.level,p.idplh,sk.id as id_sk,sk.nama_unit')
            ->from('tb_pegawai as p')
            ->join('tb_jabatan as j', 'j.id=p.id_jabatan')
            ->join('tb_satuan_kerja as sk', 'j.id_satuan_kerja = sk.id ', 'left')
            ->join('tb_user as u', 'u.id_pegawai = p.id ', 'left')
            ->where('u.id_grup > 3')
            ->where("id_pegawai != '" . $id_pegawai . "'")
            ->order_by('nama_lengkap', 'asc');

        if ($jabatan == 'SEKRETARIS KEMENTERIAN PEMUDA DAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIRO PERENCANAAN DAN ORGANISASI' OR jabatan='KEPALA BIRO KEUANGAN DAN RUMAH TANGGA' OR jabatan='KEPALA BIRO HUMAS DAN HUKUM' OR jabatan='DIREKTUR LPDUK' OR jabatan='DIREKTUR RUMAH SAKIT OLAHRAGA NASIONAL' OR jabatan='INSPEKTUR'")
                ->get();
        } elseif ($jabatan == 'MENTERI') {
            $q = $q->where("level<>1")
                ->where("(level>=2 AND level <=3) OR jabatan='INSPEKTUR' OR jabatan='KEPALA SUBBAGIAN KEPROTOKOLAN' OR
					 jabatan='KEPALA SUBBAGIAN TU MENTERI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIRO PERENCANAAN DAN ORGANISASI') {
            $q = $q->where("jabatan='KEPALA BAGIAN PROGRAM DAN ANGGARAN' OR jabatan='KEPALA BAGIAN EVALUASI DAN PENILAIAN KINERJA' 
					OR jabatan='KEPALA BAGIAN SUMBER DAYA MANUSIA APARATUR' OR jabatan='KEPALA BAGIAN ORGANISASI, TATA LAKSANA DAN KERJASAMA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN PROGRAM DAN ANGGARAN') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PROGRAM DAN ANGGARAN KEOLAHRAGAAN' OR jabatan='KEPALA SUBBAGIAN PROGRAM DAN ANGGARAN KEPEMUDAAN'
					OR jabatan='KEPALA SUBBAGIAN PROGRAM DAN ANGGARAN PENDUKUNG'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN EVALUASI DAN PENILAIAN KINERJA') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN EVALUASI DAN PENILAIAN KINERJA KEOLAHRAGAAN' OR jabatan='KEPALA SUBBAGIAN EVALUASI DAN PENILAIAN KINERJA KEPEMUDAAN'
					OR jabatan='KEPALA SUBBAGIAN EVALUASI DAN PENILAIAN KINERJA PENDUKUNG'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN SUMBER DAYA MANUSIA APARATUR') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERENCANAAN SUMBER DAYA APARATUR' OR jabatan='KEPALA SUBBAGIAN MUTASI DAN KEPANGKATAN SUMBER DAYA MANUSIA APARATUR'
					OR jabatan='KEPALA SUBBAGIAN PENGEMBANGAN SUMBER DAYA MANUSIA APARATUR'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN ORGANISASI, TATA LAKSANA DAN KERJASAMA') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN ORGANISASI' OR jabatan='KEPALA SUBBAGIAN TATA LAKSANA' OR jabatan='KEPALA SUBBAGIAN KERJASAMA ANTAR LEMBAGA'")
                ->get();
            //OR jabatan=''
        } elseif ($jabatan == 'KEPALA BIRO KEUANGAN DAN RUMAH TANGGA') {
            $q = $q->where("jabatan='KEPALA BAGIAN KEUANGAN' or jabatan='KEPALA BAGIAN VERIFIKASI PELAKSANAAN ANGGARAN' OR jabatan='KEPALA BAGIAN PERLENGKAPAN DAN PENGELOLAAN BARANG MILIK NEGARA'
					OR jabatan='KEPALA BAGIAN RUMAH TANGGA'")
                ->get();
            //OR jabatan=''
        } elseif ($jabatan == 'KEPALA BAGIAN KEUANGAN') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN KAS DAN PEMBAYARAN' OR jabatan='KEPALA SUBBAGIAN AKUNTANSI DAN PELAPORAN' 
					OR jabatan='KEPALA SUBBAGIAN PENGELOLAAN PNBP'")
                ->get();
            //OR jabatan=''
        } elseif ($jabatan == 'KEPALA BAGIAN VERIFIKASI PELAKSANAAN ANGGARAN') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN VERIFIKASI PELAKSANAAN ANGGARAN KEOLAHRAGAAN' OR jabatan='KEPALA SUBBAGIAN VERIFIKASI PELAKSANAAN ANGGARAN KEPEMUDAAN'
					OR jabatan='KEPALA SUBBAGIAN VERIFIKASI PELAKSANAAN ANGGARAN PENDUKUNG'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN PERLENGKAPAN DAN PENGELOLAAN BARANG MILIK NEGARA') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN LAYANAN PENGADAAN' or jabatan='KEPALA SUBBAGIAN PENGELOLAAN BARANG MILIK NEGARA'
					or jabatan='KEPALA SUBBAGIAN PENGHAPUSAN DAN HIBAH'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN RUMAH TANGGA') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN URUSAN DALAM' or jabatan='KEPALA SUBBAGIAN KEAMANAN DAN KETERTIBAN' 
					or jabatan='KEPALA SUBBAGIAN PERJALANAN DINAS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIRO HUMAS DAN HUKUM') {
            $q = $q->where("jabatan='KEPALA BAGIAN HUBUNGAN MASYARAKAT' or jabatan='KEPALA BAGIAN SISTEM INFORMASI' or jabatan='KEPALA BAGIAN HUKUM'
					or jabatan='KEPALA BAGIAN TATA USAHA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN HUBUNGAN MASYARAKAT') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PELIPUTAN DAN PUBLIKASI' or jabatan='KEPALA SUBBAGIAN DOKUMENTASI DAN PERPUSTAKAAN'
					or jabatan='KEPALA SUBBAGIAN KOMUNIKASI DAN KEMITRAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN SISTEM INFORMASI') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PENGEMBANGAN DAN KEAMANAN SISTEM INFORMASI' or jabatan='KEPALA SUBBAGIAN PENGELOLA INFORMASI'
					or jabatan='KEPALA SUBBAGIAN SISTEM JARINGAN DAN PIRANTI KERAS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN HUKUM') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERATURAN PERUNDANG-UNDANGAN' or jabatan='KEPALA SUBBAGIAN PERJANJIAN HUKUM'
					or jabatan='KEPALA SUBBAGIAN LAYANAN HUKUM'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN TATA USAHA') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERSURATAN DAN ARSIP' or jabatan='KEPALA SUBBAGIAN KEPROTOKOLAN' or jabatan='KEPALA SUBBAGIAN TU MENTERI'
					or jabatan='KEPALA SUBBAGIAN TU SESMEN' or jabatan='KEPALA SUBBAGIAN TU STAF AHLI'")
                ->get();
        } elseif ($jabatan == 'DEPUTI BIDANG PEMBERDAYAAN PEMUDA') {
            $q = $q->where("jabatan='SEKRETARIS DEPUTI BIDANG PEMBERDAYAAN PEMUDA' or jabatan='ASISTEN DEPUTI TENAGA DAN PENINGKATAN SUMBER DAYA PEMUDA'
					or jabatan='ASISTEN DEPUTI PENINGKATAN WAWASAN PEMUDA' or jabatan='ASISTEN DEPUTI PENINGKATAN KAPASITAS PEMUDA' or jabatan='ASISTEN DEPUTI PENINGKATAN IPTEK DAN IMTAK PEMUDA'
					or jabatan='ASISTEN DEPUTI PENINGKATAN KREATIVITAS PEMUDA'")
                ->get();
        } elseif ($jabatan == 'SEKRETARIS DEPUTI BIDANG PEMBERDAYAAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP' or jabatan='KEPALA BAGIAN HUBUNGAN MASYARAKAT'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERENCANAAN' or jabatan='KEPALA SUBBAGIAN SUMBER DAYA MANUSIA APARATUR DAN ARSIP'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN HUBUNGAN MASYARAKAT') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN HUBUNGAN MASYARAKAT DAN SISTEM INFORMASI' or jabatan='KEPALA SUBBAGIAN HUKUM'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI TENAGA DAN PENINGKATAN SUMBER DAYA PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG PENGKAJIAN TENAGA DAN SUMBER DAYA PEMUDA' or jabatan='KEPALA BIDANG TENAGA KEPEMUDAAN FORMAL DAN NONFORMAL'
					or jabatan='KEPALA BIDANG TENAGA KEPEMUDAAN LAYANAN KHUSUS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGKAJIAN TENAGA DAN SUMBER DAYA PEMUDA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGKAJIAN TENAGA PEMUDA' or jabatan='KEPALA SUBBIDANG PENGKAJIAN SUMBER DAYA PEMUDA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG TENAGA KEPEMUDAAN FORMAL DAN NONFORMAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG FORMAL' or jabatan='KEPALA SUBBIDANG NONFORMAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG TENAGA KEPEMUDAAN LAYANAN KHUSUS') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG DIFABEL' or jabatan='KEPALA SUBBIDANG KEMAMPUAN KHUSUS'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENINGKATAN WAWASAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG WAWASAN POLITIK, PERTAHANAN DAN KEAMANAN' or jabatan='KEPALA BIDANG WAWASAN LINGKUNGAN STRATEGIS DAN PENCEGAHAN BAHAYA DESTRUKTIF'
					or jabatan='KEPALA BIDANG WAWASAN SOSIAL, BUDAYA DAN HUKUM'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG WAWASAN POLITIK, PERTAHANAN DAN KEAMANAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG WAWASAN POLITIK DAN PERTAHANAN' or jabatan='KEPALA SUBBIDANG PERTAHANAN DAN KEAMANAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG WAWASAN LINGKUNGAN STRATEGIS DAN PENCEGAHAN BAHAYA DESTRUKTIF') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG WAWASAN LINGKUNGAN STRATEGIS' or jabatan='KEPALA SUBBIDANG PENCEGAHAN BAHAYA DESTRUKTIF'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG WAWASAN SOSIAL, BUDAYA DAN HUKUM') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG WAWASAN SOSIAL DAN BUDAYA' or jabatan='KEPALA SUBBIDANG WAWASAN HUKUM'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENINGKATAN KAPASITAS PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG PARIWISATA DAN KEMARITIMAN' or jabatan='KEPALA BIDANG INDUSTRI DAN KEMANDIRIAN EKONOMI'
					or jabatan='KEPALA BIDANG KEDAULATAN PANGAN, ENERGI DAN LINGKUNGAN HIDUP'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PARIWISATA DAN KEMARITIMAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PARIWISATA' or jabatan='KEPALA SUBBIDANG MARITIM'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG INDUSTRI DAN KEMANDIRIAN EKONOMI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMAHAMAN INDUSTRI' or jabatan='KEPALA SUBBIDANG KEMANDIRIAN EKONOMI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEDAULATAN PANGAN, ENERGI DAN LINGKUNGAN HIDUP') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG KEDAULATAN PANGAN DAN ENERGI' or jabatan='KEPALA SUBBIDANG LINGKUNGAN HIDUP'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENINGKATAN IPTEK DAN IMTAK PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG PEMETAAN DAN PENELUSURAN IPTEK' or jabatan='KEPALA BIDANG PEMANFAATAN IPTEK'
					or jabatan='KEPALA SUBBIDANG PENGAMALAN IMTAK'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMETAAN DAN PENELUSURAN IPTEK') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENELUSURAN IPTEK' or jabatan='KEPALA SUBBIDANG PEMETAAN IPTEK")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMANFAATAN IPTEK') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG TEKNOLOGI TEPAT GUNA' or jabatan='KEPALA SUBBIDANG TEKNOLOGI INDUSTRI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGHAYATAN DAN PENGAMALAN IMTAK') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGHAYATAN IMTAK' or jabatan='KEPALA SUBBIDANG PENGAMALAN IMTAK'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENINGKATAN KREATIVITAS PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG KREATIVITAS GRAFIKA DAN KRIYA' or jabatan='KEPALA BIDANG KREATIVITAS FASHION DAN FILM'
					or jabatan='KEPALA BIDANG KREATIVITAS TEKNOLOGI INFORMASI' or jabatan='KEPALA BIDANG KREATIVITAS MUSIK DAN KULINER'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KREATIVITAS GRAFIKA DAN KRIYA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG GRAFIKA' or jabatan='KEPALA SUBBIDANG KRIYA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KREATIVITAS GRAFIKA DAN KRIYA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG GRAFIKA' or jabatan='KEPALA SUBBIDANG KRIYA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KREATIVITAS FASHION DAN FILM') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG FASHION' or jabatan' or jabatan='KEPALA SUBBIDANG FILM'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KREATIVITAS TEKNOLOGI INFORMASI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PIRANTI LUNAK' or jabatan='KEPALA SUBBIDANG PERANGKAT KERAS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KREATIVITAS MUSIK DAN KULINER') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG MUSIK' or jabatan='KEPALA SUBBIDANG KULINER'")
                ->get();
        } elseif ($jabatan == 'DEPUTI BIDANG PENGEMBANGAN PEMUDA') {
            $q = $q->where("jabatan='ASISTEN DEPUTI KEPEMINPINAN DAN KEPELOPORAN PEMUDA' or jabatan='ASISTEN DEPUTI KEWIRAUSAHAAN PEMUDA'
					or jabatan='ASISTEN DEPUTI ORGANISASI KEPEMUDAAN DAN KEPRAMUKAAN' or jabatan='ASISTEN DEPUTI STANDARISASI DAN INFRASTRUKTUR PEMUDA'
					or jabatan='ASISTEN DEPUTI KEMITRAAN DAN PENGHARGAAN OLAHRAGA' or jabatan='SEKRETARIS DEPUTI BIDANG PENGEMBANGAN PEMUDA'")
                ->get();
        } elseif ($jabatan == 'SEKRETARIS DEPUTI BIDANG PENGEMBANGAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP' or jabatan='KEPALA BAGIAN HUBUNGAN MASYARAKAT, HUKUM, DAN SISTEM INFORMASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERENCANAAN' or jabatan='KEPALA SUBBAGIAN SUMBER DAYA MANUSIA APARATUR DAN ARSIP'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI KEPEMINPINAN DAN KEPELOPORAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG KADERISASI DAN PENDAYAGUNAAN KEPEMIMPINAN' or jabatan='KEPALA BIDANG KEPELOPORAN TANGGAP BENCANA DAN RAWAN SOSIAL'
					or jabatan='KEPALA BIDANG KEPELOPORAN DESA DAN DAERAH KHUSUS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KADERISASI DAN PENDAYAGUNAAN KEPEMIMPINAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG KADERISASI' or jabatan='KEPALA SUBBIDANG PENDAYAGUNAAN KEPEMIMPINAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEPELOPORAN TANGGAP BENCANA DAN RAWAN SOSIAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG TANGGAP BENCANA' or jabatan='KEPALA SUBBIDANG RAWAN SOSIAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEPELOPORAN DESA DAN DAERAH KHUSUS') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN DESA' or jabatan='KEPALA SUBBIDANG DAERAH TERLUAR DAN TERTINGGAL'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI KEWIRAUSAHAAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG PENELUSURAN DAN PEMETAAN POTENSI KEWIRAUSAHAAN PEMUDA' or jabatan='KEPALA BIDANG PENDAMPINGAN DAN PENGEMBANGAN POTENSI'
					or jabatan='KEPALA BIDANG AKSES PERMODALAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENELUSURAN DAN PEMETAAN POTENSI KEWIRAUSAHAAN PEMUDA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENELUSURAN' or jabatan='KEPALA SUBBIDANG PEMETAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENDAMPINGAN DAN PENGEMBANGAN POTENSI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENDAMPINGAN' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN POTENSI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG AKSES PERMODALAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG FASILITAS PERMODALAN' or jabatan='KEPALA SUBBIDANG FASILITAS KELEMBAGAAN LPKP'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI ORGANISASI KEPEMUDAAN DAN KEPRAMUKAAN') {
            $q = $q->where("jabatan='KEPALA BIDANG ORGANISASI KEPELAJARAN' or jabatan='KEPALA BIDANG ORGANISASI KEMAHASISWAAN' 
					or jabatan='KEPALA BIDANG ORGANISASI KEPEMUDAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG ORGANISASI KEPELAJARAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG INTRA BIDANG ORGANISASI KEPELAJARAN' or jabatan='KEPALA SUBBAGIAN EXTRA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG ORGANISASI KEMAHASISWAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG INTRA BIDANG ORGANISASI KEMAHASISWAAN' or jabatan='KEPALA SUBBAGIAN EXTRA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG ORGANISASI KEPEMUDAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG INTRA BIDANG ORGANISASI KEPEMUDAAN' or jabatan='KEPALA SUBBAGIAN EXTRA'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI STANDARISASI DAN INFRASTRUKTUR PEMUDA') {
            $q = $q->where("jabatan='KEPALA BIDANG STANDARISASI ORGANISASI DAN SARANA KEPEMUDAAN' or jabatan='KEPALA BIDANG PRASARANA DAN SARANA INDONESIA TIMUR'
					or jabatan='KEPALA BIDANG PRASARANA DAN SARANA INDONESIA TENGAH' or jabatan='KEPALA BIDANG PRASARANA DAN SARANA INDONESIA BARAT'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG STANDARISASI ORGANISASI DAN SARANA KEPEMUDAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA PENDIDIKAN' or jabatan='KEPALA SUBBIDANG ORGANISASI KEPEMUDAAN'
					or jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA PRESTASI' or jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA REKREASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PRASARANA DAN SARANA INDONESIA TIMUR') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG SARANA INDONESIA TIMUR' or jabatan='KEPALA SUBBIDANG PRASARANA INDONESIA TIMUR'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PRASARANA DAN SARANA INDONESIA TENGAH') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG SARANA INDONESIA TENGAH' or jabatan='KEPALA SUBBIDANG PRASARANA INDONESIA TENGAH'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PRASARANA DAN SARANA INDONESIA BARAT') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG SARANA INDONESIA BARAT' or jabatan='KEPALA SUBBIDANG PRASARANA INDONESIA BARAT'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI KEMITRAAN DAN PENGHARGAAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG KEMITRAAN DALAM NEGERI' or jabatan='KEPALA BIDANG KEMITRAAN LUAR NEGERI'
					or jabatan='KEPALA BIDANG PROMOSI DAN PENGHARGAAN KEPEMUDAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEMITRAAN DALAM NEGERI') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN KEMITRAAN PUSAT DAN DAERAH' or jabatan='KEPALA SUBBIDANG KEMITRAAN LINTAS SEKTOR DAN SWASTA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEMITRAAN LUAR NEGERI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG BILATERAL' or jabatan='KEPALA SUBBIDANG MULTILATERAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PROMOSI DAN PENGHARGAAN KEPEMUDAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PROMOSI KEPEMUDAAN' or jabatan='KEPALA SUBBIDANG PENGHARGAAN KEPEMUDAAN'")
                ->get();
        } elseif ($jabatan == 'DEPUTI BIDANG PEMBUDAYAAN OLAHRAGA') {
            $q = $q->where("jabatan='ASISTEN DEPUTI PENGELOLAAN OLAHRAGA PENDIDIKAN' or jabatan='ASISTEN DEPUTI PENGELOLAAN OLAHRAGA REKREASI'
					or jabatan='ASISTEN DEPUTI PENGELOLAAN PEMBINAAN SENTRA DAN SEKOLAH KHUSUS OLAHRAGA' or jabatan='ASISTEN DEPUTI PENGEMBANGAN OLAHRAGA TRADISIONAL DAN LAYANAN KHUSUS'
					or jabatan='ASISTEN DEPUTI KEMITRAAN DAN PENGHARGAAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENGELOLAAN OLAHRAGA PENDIDIKAN') {
            $q = $q->where("jabatan='KEPALA BIDANG OLAHRAGA PENDIDIKAN DASAR' or jabatan='KEPALA BIDANG OLAHRAGA PENDIDIKAN MENENGAH'
					or jabatan='KEPALA BIDANG OLAHRAGA PENDIDIKAN TINGGI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PENDIDIKAN DASAR') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN BIDANG OLAHRAGA PENDIDIKAN DASAR' or jabatan='KEPALA SUBBIDANG KOMPETISI BIDANG OLAHRAGA PENDIDIKAN DASAR'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PENDIDIKAN MENENGAH') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN BIDANG OLAHRAGA PENDIDIKAN MENENGAH' or jabatan='KEPALA SUBBIDANG KOMPETISI BIDANG OLAHRAGA PENDIDIKAN MENENGAH'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PENDIDIKAN TINGGI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN BIDANG OLAHRAGA PENDIDIKAN TINGGI' or jabatan='KEPALA SUBBIDANG KOMPETISI BIDANG OLAHRAGA PENDIDIKAN TINGGI'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENGELOLAAN OLAHRAGA REKREASI') {
            $q = $q->where("jabatan='KEPALA BIDANG PEMBINAAN OLAHRAGA MASSAL DAN KESEHATAN OLAHRAGA' or jabatan='KEPALA BIDANG PENGEMBANGAN SANGGAR DAN PUSAT KEBUGARAN'
					or jabatan='KEPALA BIDANG PENGELOLAAN OLAHRAGA PETUALANGAN, TANTANGAN DAN WISATA' or jabatan='KEPALA BIDANG PENGEMBANGAN RUANG PUBLIK OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMBINAAN OLAHRAGA MASSAL DAN KESEHATAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN OLAHRAGA MASSAL' or jabatan='KEPALA SUBBIDANG KESEHATAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGEMBANGAN SANGGAR DAN PUSAT KEBUGARAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN SANGGAR OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN PUSAT KEBUGARAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGELOLAAN OLAHRAGA PETUALANGAN, TANTANGAN DAN WISATA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGELOLAAN OLAHRAGA PETUALANGAN DAN TANTANGAN' or jabata='KEPALA SUBBIDANG PENGELOLAAN OLAHRAGA WISATA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGEMBANGAN RUANG PUBLIK OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN RUANG PUBLIK OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENGKAJIAN RUANG PUBLIK OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENGELOLAAN PEMBINAAN SENTRA DAN SEKOLAH KHUSUS OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG SENTRA DAN PERKUMPULAN OLAHRAGA' or jabatan='KEPALA BIDANG SEKOLAH KHUSUS OLAHRAGA'
					or jabatan='KEPALA BIDANG PEMBINAAN PPLP' or jabatan='KEPALA BIDANG PEMBINAAN PPLM'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG SENTRA DAN PERKUMPULAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGELOLAAN SENTRA DAN PERKUMPULAN OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN SENTRA DAN PERKUMPULAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG SEKOLAH KHUSUS OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGELOLAAN SEKOLAH KHUSUS OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN SEKOLAH KHUSUS OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMBINAAN PPLP') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN PPLP' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN PPLP'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMBINAAN PPLM') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN PPLM' or jabatan='KEPALA SUBBIDANG PEMBINAAN PPLM'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENGEMBANGAN OLAHRAGA TRADISIONAL DAN LAYANAN KHUSUS') {
            $q = $q->where("jabatan='KEPALA BIDANG OLAHRAGA TRADISIONAL' or jabatan='KEPALA BIDANG OLAHRAGA USIA DINI, LANJUT USIA DAN OLAHRAGA KHUSUS'
					or jabatan='KEPALA BIDANG OLAHRAGA PENYANDANG CACAT'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA TRADISIONAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGKAJIAN OLAHRAGA TRADISIONAL' or jabatan='KEPALA SUBBIDANG PENGELOLAAN OLAHRAGA TRADISIONAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA USIA DINI, LANJUT USIA DAN OLAHRAGA KHUSUS') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN OLAHRAGA USIA DINI DAN LANJUT USIA' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN OLAHRAGA KHUSUS'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PENYANDANG CACAT') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMBINAAN OLAHRAGA PENYANDANG CACAT' or jabatan='KEPALA SUBBIDANG KOMPETISI OLAHRAGA PENYANDANG CACAT'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI KEMITRAAN DAN PENGHARGAAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG KEMITRAAN DALAM NEGERI DAN LUAR NEGERI' or jabatan='KEPALA BIDANG BIMBINGAN DAN PENGEMBANGAN KARIER ATLIT'
					or jabatan='KEPALA BIDANG PENGHARGAAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KEMITRAAN DALAM NEGERI DAN LUAR NEGERI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG KEMITRAAN DALAM NEGERI' or jabatan='KEPALA SUBBIDANG KEMITRAAN LUAR NEGERI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG BIMBINGAN DAN PENGEMBANGAN KARIER ATLIT') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG BIMBINGAN' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN KARIER'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGHARGAAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENELUSURAN PENGHARGAAN OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENYELENGGARAAN PENGHARGAAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'DEPUTI BIDANG PENINGKATAN PRESTASI OLAHRAGA') {
            $q = $q->where("jabatan='SEKRETARIS DEPUTI BIDANG PENINGKATAN PRESTASI OLAHRAGA' or jabatan='ASISTEN DEPUTI PEMBIBITAN DAN IPTEK OLAHRAGA'
					or jabatan='ASISTEN DEPUTI PENINGKATAN TENAGA DAN ORGANISASI KEOLAHRAGAAN' or jabatan='ASISTEN DEPUTI INDUSTRI DAN PROMOSI OLAHRAGA'
					or jabatan='ASISTEN DEPUTI OLAHRAGA PRESTASI' or jabatan='ASISTEN DEPUTI STANDARISASI DAN INFRASTRUKTUR OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'SEKRETARIS DEPUTI BIDANG PENINGKATAN PRESTASI OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP' or jabatan='KEPALA BAGIAN HUBUNGAN MASYARAKAT, HUKUM, DAN SISTEM INFORMASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN PERENCANAAN , SUMBER DAYA MANUSIA APARATUR DAN ARSIP') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN PERENCANAAN' or jabatan='KEPALA SUBBAGIAN SUMBER DAYA MANUSIA APARATUR DAN ARSIP'")
                ->get();
        } elseif ($jabatan == 'KEPALA BAGIAN HUBUNGAN MASYARAKAT, HUKUM, DAN SISTEM INFORMASI') {
            $q = $q->where("jabatan='KEPALA SUBBAGIAN HUBUNGAN MASYARAKAT DAN SISTEM INFORMASI' or jabatan='KEPALA SUBBAGIAN HUKUM'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PEMBIBITAN DAN IPTEK OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG PEMANDUAN DAN PENGEMBANGAN BAKAT' or jabatan='KEPALA BIDANG KOMPETISI USIA MUDA'
					or jabatan='KEPALA BIDANG PENGEMBANGAN IPTEK OLAHRAGA' or jabatan='KEPALA BIDANG PEMANFAATAN IPTEK OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMANDUAN DAN PENGEMBANGAN BAKAT') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEMANDUAN BAKAT' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN BAKAT'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG KOMPETISI USIA MUDA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG KOMPETISI DAERAH DAN NASIONAL' or jabatan='KEPALA SUBBIDANG KOMPETISI INTERNASIONAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGEMBANGAN IPTEK OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN ILMU PENGETAHUAN KEOLAHRAGAAN' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN TEKNOLOGI KEOLAHRAGAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PEMANFAATAN IPTEK OLAHRAGA') {
            $q = $q->where("jabatan='EPALA SUBBIDANG DISEMINASI' or jabatan='KEPALA SUBBIDANG PENERAPAN'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI PENINGKATAN TENAGA DAN ORGANISASI KEOLAHRAGAAN') {
            $q = $q->where("jabatan='KEPALA BIDANG PENINGKATAN MUTU PELATIH DAN INSTRUKTUR' or jabatan='KEPALA BIDANG PENINGKATAN MUTU WASIT, JURI DAN TENAGA PENDUKUNG'
					or jabatan='KEPALA BIDANG ORGANISASI KEOLAHRAGAAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENINGKATAN MUTU PELATIH DAN INSTRUKTUR') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENINGKATAN MUTU PELATIH' or jabatan='KEPALA SUBBIDANG PENINGKATAN MUTU INSTRUKTUR'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENINGKATAN MUTU WASIT, JURI DAN TENAGA PENDUKUNG') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENINGKATAN MUTU WASIT DAN JURI' or jabatan='KEPALA SUBBIDANG PENINGKATAN MUTU TENAGA PENDUKUNG'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG ORGANISASI KEOLAHRAGAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGELOLAAN INDUK ORGANISASI CABANG OLAHRAGA' or jabatan='KEPALA SUBBIDANG PENGELOLAAN ORGANISASI FUNGSIONAL DAN PROFESIONAL'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI INDUSTRI DAN PROMOSI OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG PRODUK BARANG DAN JASA INDUSTRI OLAHRAGA' or jabatan='KEPALA SUBBIDANG INVENTARISASI INDUSTRI OLAHRAGA'
					or jabatan='KEPALA BIDANG PROMOSI DAN PEMASARAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PRODUK BARANG DAN JASA INDUSTRI OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PRODUK BARANG INDUSTRI OLAHRAGA' or jabatan='KEPALA SUBBIDANG PRODUK JASA INDUSTRI OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA SUBBIDANG INVENTARISASI INDUSTRI OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG INVENTARISASI INDUSTRI OLAHRAGA' or jabatan='KEPALA SUBBIDANG MANAJEMEN INDUSTRI OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PROMOSI DAN PEMASARAN OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PROMOSI OLAHRAGA' or jabatan='KEPALA SUBBIDANG PEMASARAN OLAHRAGA'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI OLAHRAGA PRESTASI') {
            $q = $q->where("jabatan='KEPALA BIDANG OLAHRAGA PRESTASI DAERAH' or jabatan='KEPALA BIDANG OLAHRAGA PRESTASI NASIONAL'
					or jabatan='KEPALA BIDANG OLAHRAGA PRESTASI INTERNASIONAL' or jabatan='KEPALA BIDANG PENGELOLAAN PEMUSATAN PELATIHAN OLAHRAGA NASIONAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PRESTASI DAERAH') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN PRESTASI DAERAH' or jabatan='KEPALA SUBBIDANG PEKAN DAN KEJUARAAN OLAHRAGA PRESTASI DAERAH'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PRESTASI NASIONAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEKAN DAN KEJUARAAN OLAHRAGA PRESTASI NASIONAL' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN PRESTASI NASIONAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG OLAHRAGA PRESTASI INTERNASIONAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PEKAN DAN KEJUARAAN OLAHRAGA PRESTASI INTERNASIONAL' or jabatan='KEPALA SUBBIDANG PENGEMBANGAN PRESTASI INTERNASIONAL'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG PENGELOLAAN PEMUSATAN PELATIHAN OLAHRAGA NASIONAL') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PENGEMBANGAN ATLET ANDALAN NASIONAL' or jabatan='KEPALA SUBBIDANG TATA KELOLA KONTINGEN'")
                ->get();
        } elseif ($jabatan == 'ASISTEN DEPUTI STANDARISASI DAN INFRASTRUKTUR OLAHRAGA') {
            $q = $q->where("jabatan='KEPALA BIDANG STANDARISASI, AKREDITASI, DAN SERTIFIKASI KEOLAHRAGAAN' or jabatan='KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA PENDIDIKAN'
					or jabatan='KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA REKREASI' or jabatan='KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA PRESTASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG STANDARISASI, AKREDITASI, DAN SERTIFIKASI KEOLAHRAGAAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG STANDARISASI' or jabatan='KEPALA SUBBIDANG AKREDITASI DAN SERTIFIKASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA PENDIDIKAN') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA PENDIDIKAN' or jabatan='KEPALA SUBBIDANG PRASARANA OLAHRAGA PENDIDIKAN'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA REKREASI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PRASARANA OLAHRAGA REKREASI' or jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA REKREASI'")
                ->get();
        } elseif ($jabatan == 'KEPALA BIDANG SARANA DAN PRASARANA OLAHRAGA PRESTASI') {
            $q = $q->where("jabatan='KEPALA SUBBIDANG PRASARANA OLAHRAGA PRESTASI' or jabatan='KEPALA SUBBIDANG SARANA OLAHRAGA PRESTASI'")
                ->get();
        } else {
            $q = $q->get();
        }



        return $q->result_array();
    }
}
