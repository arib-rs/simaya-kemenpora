<?php 

/**
* 
*/
defined('BASEPATH') or exit('No direct script access allowed');
class User_rest extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api');
        $this->load->model('M_disposisi');
        $this->load->model('M_surat');
        $this->load->model('M_pegawai');
    }

	public function LoginApi()
    {
         $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $user1 = count($this->M_api->loginApi($username, $password));
        $user = $this->M_api->loginApi($username, $password);
        if($user1 == '1'){
        $result['error'] = false;
        foreach ($user as $key) {
            $level  = $key['level'];
            $id_user = $key['id_user'];
            $id_pegawai = $key['id_pegawai'];
            $username = $key['username'];
            $nama_lengkap = $key['nama_lengkap'];
            $id_satuan_kerja = $key['id_satuan_kerja'];
            $id_grup   = $key['id_grup'];
            $jabatan = $key['jabatan'];
            $idplh = $key['idplh'];
        }
        $result['id_user'] = $id_user;
        $result['id_pegawai'] = $id_pegawai;
        $result['level'] = $level;
        $result['username'] = $username;
        $result['nama_lengkap'] = $nama_lengkap;
        $result['id_satuan_kerja'] = $id_satuan_kerja;
        $result['id_grup'] = $id_grup;
        $result['jabatan'] = $jabatan;
        $result['idplh'] = $idplh;
        }else{
             $result['error'] = true;
        }
        echo json_encode($result);
    }

    public function surat_masuk_all(){
        $level = $this->input->get('level');
        $unit = $this->input->get('unit');
        $grup = $this->input->get('id_grup');
        $id_pegawai = $this->input->get('id_pegawai');
		$id_plh = $this->input->get('id_plh');
        // $result['suratmasuk'] = "suratmasuk";
        $result1 = $this->M_api->select_SuratMasuk_API($level,$unit,$grup,$id_pegawai,$id_plh);
        if($result1 == null){
          $result['kosong'] = "true";
        }else{
          $result = $this->M_api->select_SuratMasuk_API($level,$unit,$grup,$id_pegawai,$id_plh);  
        }
        echo json_encode($result);
    }

    public function search_surat_masuk_all(){
        $level = $this->input->get('level');
        $unit = $this->input->get('unit');
        $grup = $this->input->get('id_grup');
        $id_pegawai = $this->input->get('id_pegawai');
		$id_plh = $this->input->get('id_plh');
        $search = $this->input->get('search');
        $result = $this->M_api->select_SuratMasuk_Search_API($level,$unit,$grup,$id_pegawai,$id_plh,$search);
        echo json_encode($result);
    }

    public function surat_masuk_notif(){
        $level = $this->input->get('level');
        $unit = $this->input->get('unit');
        $grup = $this->input->get('id_grup');
        $id_pegawai = $this->input->get('id_pegawai');
		$id_plh = $this->input->get('id_plh');
        // $result['suratmasuk'] = "suratmasuk";
        $result = $this->M_api->select_SuratMasukBelumTerbaca_API($level,$unit,$grup,$id_pegawai,$id_plh);
        echo json_encode($result);
    }

      public function disposisi_masuk_all(){
        $unit = $this->input->get('unit');
		$grup = $this->input->get('id_grup');
        $id_pegawai = $this->input->get('id_pegawai');
        $result1 = $this->M_api->select_API($unit,$grup,$id_pegawai);
        if($result1 == null){
          $result['kosong'] = "true";
        }else{
          $result = $this->M_api->select_API($unit,$grup,$id_pegawai);
        }
        echo json_encode($result);
    }

     public function search_disposisi_masuk_all(){
        $unit = $this->input->get('unit');
		$grup = $this->input->get('id_grup');
        $id_pegawai = $this->input->get('id_pegawai');
        $search = $this->input->get('search');
        $result = $this->M_api->select_Search_API($unit,$grup,$id_pegawai,$search);       
        echo json_encode($result);
    }

    public function disposisi_masuk_notif(){
        $unit = $this->input->get('unit');
		$grup = $this->input->get('id_grup');
        $id_pegawai = $this->input->get('id_pegawai');
        $result = $this->M_api->select_DisposisiBelumTerbaca_API($unit,$grup,$id_pegawai);
        echo json_encode($result);
    }

     public function disposisi_keluar_all(){
        $unit = $this->input->get('unit');
		$grup = $this->input->get('id_grup');
        $id_pegawai = $this->input->get('id_pegawai');
        $result1 = $this->M_api->select_untukpengirim_API($unit,$grup,$id_pegawai);
        if($result1 == null){
          $result['kosong'] = "true";
        }else{
         $result = $this->M_api->select_untukpengirim_API($unit,$grup,$id_pegawai);
        }
        echo json_encode($result);
    }

    public function hapus_disposisi(){
        $id = $this->input->post('id');
        $result['data'] = $this->M_disposisi->del($id);
        $result['status'] = "success";
        echo json_encode($result);
    }

    public function search_disposisi_keluar_all(){
        $unit = $this->input->get('unit');
		$grup = $this->input->get('id_grup');
        $id_pegawai = $this->input->get('id_pegawai');
        $search = $this->input->get('search');
        $result = $this->M_api->select_untukpengirim_Search_API($unit,$grup,$id_pegawai,$search);
        echo json_encode($result);
    }


    public function history_surat(){
        $id_disposisi = $this->input->get('id_disposisi');
        $tmp = $this->M_api->select_DisposisiMasukbyId($id_disposisi);
        $data['histori'] = $this->M_api->select_historidisposisi($tmp[0]['id_surat']);
        $this->load->view('templates/header2', $data);
        $this->load->view('API/history_disposisi', $data);
    }


     
    public function count_surat_masuk_blm_dibaca(){
        $level = $this->input->get('level');
        $unit = $this->input->get('unit');
        $id   = $this->input->get('id_pegawai');
		$grup = $this->input->get('id_grup');
		$id_plh = $this->input->get('id_plh');
        $result['count'] = $this->M_api->get_JumlahSuratBelumTerbaca_API($level,$grup,$unit,$id,$id_plh);
        echo json_encode($result);

    }

    public function count_disposisi_blm_dibaca(){
        $unit = $this->input->get('unit');
        $id   = $this->input->get('id_pegawai');
		$grup = $this->input->get('id_grup');
		$id_plh = $this->input->get('id_plh');
        $result['count'] = $this->M_api->get_JumlahDisposisiBelumTerbaca_API($grup,$id,$id_plh);
        echo json_encode($result);

    }


     public function count_notif(){
        $level = $this->input->post('level');
        $unit = $this->input->post('unit');
		$grup = $this->input->get('id_grup');
        $id   = $this->input->post('id_pegawai');
		$grup = $this->input->get('id_grup');
		$id_plh = $this->input->get('id_plh');
        $data1 = $this->M_api->get_JumlahSuratBelumTerbaca_API($level,$grup,$unit,$id,$id_plh);
        $data2 = $this->M_api->get_JumlahDisposisiBelumTerbaca_API($grup,$id);
        $result['count'] = $data1 + $data2;
        $result['status'] = "success";
        echo json_encode($result);

    }
    

     public function surat_dibaca(){
        $id = $this->input->post('id');
        $result['data'] = $this->M_surat->update_Terbaca($id);
        $result['status'] = "success";
        echo json_encode($result);
    }

    public function disposisi_dibaca(){
        $id = $this->input->post('id');
        $result['data'] = $this->M_disposisi->update_Terbaca($id);
        $result['status'] = "success";
        echo json_encode($result);
    }

    public function approve_surat(){
        $id = $this->input->post('id_pegawai');
        $no_agenda_disposisi = $this->input->post('no_agenda_disposisi');
        $id_surat = $this->input->post('id_surat');
        $data = array(
                        'no_agenda_disposisi'    => $no_agenda_disposisi,
                        'approver' => $id,
                        'diterima' => '1',
                        'tgl_diterima' => date("Y-m-d H:i:s")
                    );
        
        $this->M_api->update_StatusSurat($data,  $id_surat);
        $result['status'] = "success";
        echo json_encode($result);
    }


     public function cetak_disposisi($id)
    {
        // // Require composer autoload
        // require_once '/vendor/autoload.php';
        // Create an instance of the class:
        $data['data'] = $this->M_api->select_DisposisiMasukbyId($id);
        $tmp = $this->M_api->select_DisposisiMasukbyId($id);
        $data['tujuan'] = $this->M_api->select_DisposisiMasukbyNoAgenda($tmp[0]['agenda_disposisi']);
        $data['surat'] = $this->M_api->select_SuratMasukbyId($tmp[0]['id_surat']);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);


        $html = $this->load->view('surat_masuk/hasil_disposisi', $data, true);

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output();
    }

    public function penerima_disposisi(){
        $lvl = $this->input->get('level');
		$unit = $this->input->get('unit');
        $id_pegawai = $this->input->get('id_pegawai');
		$jabatan = $this->input->get('jabatan');
        $result = $this->M_api->select_PenerimaDisposisi_API($lvl,$unit,$jabatan,$id_pegawai);
        echo json_encode($result);
        
        
    }

      public function select_plh(){
        $lvl = $this->input->get('level');
        $unit = $this->input->get('unit');
        $jabatan = $this->input->get('jabatan');
        $result = $this->M_api->selectPlh($lvl,$unit,$jabatan);
        echo json_encode($result);
        
        
    }

    public function dashboard(){
        $data['suratperbulan'] = '';
        for ($i = 1; $i <= 12; $i++) {
            $data['suratperbulan'][$i] = $this->M_api->get_JumlahByBulan($i);
            // $data['rekapsurat'][$i] = $this->M_api->select_JumlahSuratPerUnitPerBulan($i);
        }
        $data['suratunit'] = $this->M_api->select_JumlahSuratPerUnit();

        $data['notifsurat'] = $this->M_api->select_SuratMasukBelumTerbaca();
        $data['notifdisposisi'] = $this->M_api->select_DisposisiBelumTerbaca();
        // $data['data'] = $this->select();
        $this->load->view('templates/header', $data);
        $this->load->view('API/dashboard2', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_disposisi(){
          $no = $_POST['no_agenda'];
                $is_unique = $this->M_api->get_JumlahDisposisiByNo_Agenda($no);
                if ($is_unique == 0) {
                    
                    $penerima2 = $_POST['penerima'];
					$penerima = array_slice($penerima2, 1, 1000);
                    foreach ($penerima2 as $p) {
                        $disposisi = array(
                            'id_surat'    => $_POST['id_surat'],
                            'no_agenda'    => date("YmdHis"),
                            'pengirim'    => $_POST['pengirim'],
                            'penerima'    => $p,
                            'pesan'    => $_POST['pesan'],
                            'tgl_disposisi'    => date("Y-m-d H:i:s"),
                            'tgl_selesai'    => date("Y-m-d H:i:s"),
                            'urgensi'    => $_POST['urgensi'],
                            'sifat_disposisi'    => $_POST['sifat_disposisi'],
                            'penting'    => $_POST['penting'],
                            'dijawab'   => $_POST['dijawab'],
                            'ditindak_lanjuti'   =>  $_POST['ditindak_lanjuti'] ,
                            'ditanggapi_tertulis'   =>$_POST['ditanggapi_tertulis'],
                            'disiapkan_makalah'   =>  $_POST['disiapkan_makalah'],
                            'koordinasikan'   => $_POST['koordinasikan'] ,
                            'diwakili'   =>  $_POST['diwakili'] ,
                            'dihadiri'   =>  $_POST['dihadiri'] ,
                            'disiapkan_surat'   =>  $_POST['disiapkan_surat'] ,
                            'arsip'   => $_POST['arsip'] ,
                            'agendakan'   => $_POST['agendakan'] ,
                            'diperhatikan'   =>  $_POST['diperhatikan'] ,
                            'dijelaskan'   =>  $_POST['dijelaskan'] ,
                            'diperbaiki'   =>  $_POST['diperbaiki'],
                            'diproses'   => $_POST['diproses'] ,
                            'diketahui'   => $_POST['diketahui'] ,
                            'dibicarakan'   => $_POST['dibicarakan'] ,
                            'lainlain'   => $_POST['lainlain'] 
                        );
                        $this->M_api->add($disposisi);

                        $this->M_api->update_Disposisi($_POST['id_surat']);
                    }

                    $result['status'] = "success";
                    $result['penerima'] = $penerima2;
                    echo json_encode($result);
    }

    

    
    
}


public function editplh()
{
    $id_pegawai = $_POST['id_pegawai'];
	//$id_pegawai = $this->input->get('id_pegawai');
    $plh2 = $_POST['plh'];
    $plh = array_slice($plh2, 1, 300);
    
                $data = array(
                'idplh'    => $plh2[1]
                );

                $this->M_pegawai->update($data, $id_pegawai);
  
    $result['status'] = "success";
    $result['plh'] = $plh2[0];
    echo json_encode($result);
}



public function cetak_tandaterima($id)
    {
        // // Require composer autoload
        // require_once '/vendor/autoload.php';
        // Create an instance of the class:

        $data['data'] = $this->M_api->select_SuratMasukbyId($id);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);


        $html = $this->load->view('surat_masuk/tanda_terima', $data, true);

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $mpdf->Output();
    }

}

 ?>