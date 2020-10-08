<?php namespace App\Controllers;

use App\Models\MobileModel;
use App\Models\AdminModel;

class AdminControllers extends BaseController
{
    
    protected $modelName    = 'App\Models\AdminModel';

    function __construct() {
        $this->adminmodel = new AdminModel();
        $this->pasangan = new MobileModel(); 
        $this->session = session();
        $this->db = db_connect();
	}

    //form login
	public function index()
	{
        if (!isset($_SESSION['admin'])) {
            $sessio = '';
            return view('login', [
                'session'=> $sessio,
            ]);
        }else {return redirect()->to(base_url('/admin'));}
    }

    //proses logout end session
    public function logout(){
		$array_items = array('admin', 'username', 'id_provinsi','id_kab_kota');
		$this->session->remove($array_items);
		return redirect()->to(base_url('/'));
	}

    //proses login admin start session
    public function AdminLogin()
	{
		$username 	= $this->request->getPost('username');
		$password 	= $this->request->getPost('password');

		$login = $this->adminmodel->userlogin("WHERE username ='".$username."' AND password = MD5('".$password."')")->getResult();
		foreach ($login as $x);

		if ($login!=NULL){
			$login_session = array(
				'admin' 	    => $x->admin,
                'username' 	    => $x->username,
                'id_provinsi'   => $x->id_provinsi,
                'id_kab_kota'   => $x->id_kab_kota,
			);
            $this->session->set($login_session);
            session()->setFlashData('success', 'Selamat Datang '.$login_session['admin'].'!');
			return redirect()->to(base_url('/admin'));
		}else {
		$sessio = 'Login Gagal';
		return view('login', [
			'session'=> $sessio,
		]);
		}
	}
    
    //halaman depan gerbang demokrasi
    public function dashboard()
	{
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $active = 'dashboard';
            //Total DPT
            $total_dpt = $this->adminmodel->total_dpt("WHERE id_kab_kota = '".$kota_kab."'")->getResult();
                foreach ($total_dpt as $a); $dpt = $a->total_dpt;
            //Total TPS
            $total_tps = $this->adminmodel->total_tps("WHERE id_kab_kota = '".$kota_kab."' ORDER BY id DESC LIMIT 1")->getResult();
                foreach ($total_tps as $b); $tps = $b->id;
            //Suara Rusak
            $total_suara_rusak = $this->adminmodel->total_suara_rusak("WHERE SUBSTR(id_panitia,3,2) = '".$kota_kab."'")->getResult();
                foreach ($total_suara_rusak as $c); $suara_rusak = $c->rusak;
            //suara masuk
            $total_suara_masuk = $this->adminmodel->total_suara_masuk("WHERE SUBSTR(id_panitia,3,2) = '".$kota_kab."'")->getResult();
            foreach ($total_suara_masuk as $d); $suara_masuk = $d->masuk;
            //suara sah
            $total_suara_sah = $this->adminmodel->total_suara_sah("WHERE SUBSTR(id_panitia,3,2) = '".$kota_kab."'")->getResult();
            foreach ($total_suara_sah as $d); $suara_sah = $d->sah;
            //suara DPT
            $total_suara_DPT = $this->adminmodel->total_suara_dpt("WHERE SUBSTR(id_panitia,3,2) = '".$kota_kab."'")->getResult();
            foreach ($total_suara_DPT as $d); $suara_dpt = $d->dpt;

            $grafik_temporary = $this->adminmodel->grafik_temporary("WHERE z.id_pasangan = a.id_pasangan)as jumlah_suara FROM detail_suara_temporary a, suara_temporary b, calon_aktif c, pasangan_calon d, nama_pasangan e, nama_pasangan f, suara_temporary g where a.id_suara = b.id_suara AND a.id_pasangan = c.id_pasangan AND c.id_pasangan = d.id_pasangan AND e.id_calon = d.ketua AND f.id_calon = d.wakil AND g.id_suara = a.id_suara AND g.status = 0 GROUP BY d.no_urut ORDER BY d.no_urut ASC");

            $pasangan = $this->adminmodel->dataPasanganCalon("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode AND a.id_pasangan = c.id_pasangan AND c.ketua = d.id_calon AND c.wakil = e.id_calon 
            AND a.id_kab_kota = '".$kota_kab."' ORDER BY a.no_urut ASC");
            
                // $total_dptk = $this->adminmodel->total_dptk("WHERE $id_kab_kota = '".$id_kab_kota."'")->getResult();

            return view('admin/dashboard', [
                'active'        => $active,
                'total_dpt'     => $dpt,
                'total_tps'     => $tps,
                'suara_rusak'   => $suara_rusak,
                'suara_masuk'   => $suara_masuk,
                'suara_sah'     => $suara_sah,
                'suara_dpt'     => $suara_dpt,
                'grafik'        => $grafik_temporary,
                'calon'         => $pasangan,
                'cekgrafik'     => 1,
                'user'          => $user,
            ]);
        }else {return redirect()->to(base_url('/'));}
	}

    //get pasangan calon walikota dan walikota
    public function calonPasangan()
	{
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $data = $this->adminmodel->dataPasanganCalon("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode AND a.id_pasangan = c.id_pasangan AND c.ketua = d.id_calon AND c.wakil = e.id_calon 
            AND a.id_kab_kota = '".$kota_kab."' ORDER BY a.no_urut ASC")->getResultArray();
            $active = 'pasangan_calon';
            return view('admin/lihat_calon', [
                'active'    =>$active,
                'data'      =>$data,
                'cekgrafik' =>0,
                'user'          => $user,
            ]);
        }else {return redirect()->to(base_url('/'));}
    }

    //tambah pasangan calon walikota dan wakil walikota
    public function tambahCalon()
	{
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $data = $this->adminmodel->dataPasanganCalon("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode AND a.id_pasangan = c.id_pasangan AND c.ketua = d.id_calon AND c.wakil = e.id_calon ORDER BY a.id_provinsi ASC")->getResultArray();
            $active = 'tambah_calon';
            return view('admin/tambah_calon', [
                'active'    =>$active,
                'data'      =>$data,
                'cekgrafik' =>0,
                'user'      => $user,
            ]);
        }else {return redirect()->to(base_url('/'));}
    }
    
    //get panitia
    public function panitia()
	{   
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $data = $this->adminmodel->dataPanitia("FROM tps a WHERE a.id_kab_kota = '".$kota_kab."' ORDER BY a.username ASC")->getResultArray();
            
            $active = 'panitia';
            return view('admin/lihat_panitia', [
                'active'    =>$active,
                'data'      =>$data,
                'cekgrafik' =>0,
                'user'      => $user,
                ]);
        }else {return redirect()->to(base_url('/'));}
	}
    
    //start suara

    //get suara belum validasi
    public function getSuara()
	{   
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $data = $this->adminmodel->dataSuara("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode 
            AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan) = c.kode 
            AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan,'.',a.id_kelurahan) = d.kode 
            AND a.id_provinsi = e.kode AND a.username = f.id_panitia
            AND a.id_kab_kota = '".$kota_kab."' AND f.status = 0
            ORDER BY f.updated_at DESC, f.status ASC")->getResultArray();
            
            $active = 'suara_masuk';
            return view('admin/suara', [
                'active'    =>$active,
                'data'      =>$data,
                'cekgrafik' =>0,
                'user'      => $user,
                ]);
        }else {return redirect()->to(base_url('/'));}
    }

    //form validasi suara
    public function formValidasi($id_suara)
    {
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $cek_evaluasi = $this->adminmodel->cekEvaluasi("WHERE id_suara = '".$id_suara."'")->getResult();
            foreach($cek_evaluasi as $cek);

            if($cek->cek == 0){

            $update_evaluasi = $this->adminmodel->validasisuara("SET cek = 1, admin = '".$user."' WHERE id_suara = '".$id_suara."'");

            $data = $this->adminmodel->dataSuara("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode 
            AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan) = c.kode 
            AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan,'.',a.id_kelurahan) = d.kode 
            AND a.id_provinsi = e.kode AND a.username = f.id_panitia
            AND a.id_kab_kota = '".$kota_kab."' AND f.status = 0
            AND f.id_suara = '".$id_suara."' LIMIT 1")->getResult();

            $pasangan = $this->adminmodel->hasilsuara("WHERE a.id_suara = b.id_suara AND a.id_pasangan = c.id_pasangan 
            AND c.id_pasangan = d.id_pasangan AND e.id_calon = d.ketua AND f.id_calon = d.wakil 
            AND g.id_suara = a.id_suara AND g.status = 0
            AND a.id_suara = '".$id_suara."'")->getResultArray();
            
            $active = 'suara_masuk';
            return view('admin/form_validasi', [
                'active'    => $active,
                'data'      => $data,
                'cekgrafik' => 0,
                'user'      => $user,
                'pasangan'  => $pasangan
                ]);

            }else if($cek->cek == 1 && $cek->admin == $user){

                $update_evaluasi = $this->adminmodel->validasisuara("SET cek = 1, admin = '".$user."' WHERE id_suara = '".$id_suara."'");
    
                $data = $this->adminmodel->dataSuara("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode 
                AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan) = c.kode 
                AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan,'.',a.id_kelurahan) = d.kode 
                AND a.id_provinsi = e.kode AND a.username = f.id_panitia
                AND a.id_kab_kota = '".$kota_kab."' AND f.status = 0
                AND f.id_suara = '".$id_suara."' LIMIT 1")->getResult();
    
                $pasangan = $this->adminmodel->hasilsuara("WHERE a.id_suara = b.id_suara AND a.id_pasangan = c.id_pasangan 
                AND c.id_pasangan = d.id_pasangan AND e.id_calon = d.ketua AND f.id_calon = d.wakil 
                AND g.id_suara = a.id_suara AND g.status = 0
                AND a.id_suara = '".$id_suara."'")->getResultArray();
                
                $active = 'suara_masuk';
                return view('admin/form_validasi', [
                    'active'    => $active,
                    'data'      => $data,
                    'cekgrafik' => 0,
                    'user'      => $user,
                    'pasangan'  => $pasangan
                    ]);
    
            }else {
                session()->setFlashData('warning', 'Suara Sedang Dievaluasi Oleh '.$cek->admin.' '.'!');
                return redirect()->to(base_url('/suara_masuk'));
            }

        }else {return redirect()->to(base_url('/'));}
    }

    //validasi suara
    public function validasiSuara()
    {
        if (isset($_SESSION['admin'])) {

            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            //Suara
            $id_suara = $this->request->getPost('id_suara');
            $status = $this->request->getPost('status');
            $suara_sah = $this->request->getPost('suara_sah');
            $suara_tidak_sah = $this->request->getPost('suara_tidak_sah');
            $DPT = $this->request->getPost('DPT');
            $DPTb = $this->request->getPost('DPTb');
            $DPTk = $this->request->getPost('DPTk');
            $total_DPT = $this->request->getPost('total_DPT');
            $pengguna_DPT = $this->request->getPost('pengguna_DPT');
            $pengguna_DPTb = $this->request->getPost('pengguna_DPTb');
            $pengguna_DPTk = $this->request->getPost('pengguna_DPTk');
            $jumlah_pengguna = $this->request->getPost('jumlah_pengguna');
            $disabilitas = $this->request->getPost('disabilitas');
            $disabilitas_pemilih = $this->request->getPost('disabilitas_pemilih');
            $total_surat_suara = $this->request->getPost('total_surat_suara');
            $surat_suara_kembali = $this->request->getPost('surat_suara_kembali');
            $surat_suara_sisa = $this->request->getPost('surat_suara_sisa');
            $surat_suara_guna = $this->request->getPost('surat_suara_guna');
            $jumlah_suara = $this->request->getPost('total_suara');
            //Detail Suara
            $hasil_suara = $this->request->getPost('hasil_suara');
            $id_detail = $this->request->getPost('id_detail');

            $validasi = $this->pasangan->updateSuara("SET 
                total_suara           = '".$jumlah_suara."',
                suara_sah             = '".$suara_sah."',
                suara_tidak_sah       = '".$suara_tidak_sah."',
                DPT                   = '".$DPT."',
                DPTb                  = '".$DPTb."',
                DPTk                  = '".$DPTk."',
                total_DPT             = '".$total_DPT."',
                pengguna_DPT          = '".$pengguna_DPT."',
                pengguna_DPTb         = '".$pengguna_DPTb."',
                pengguna_DPTk         = '".$pengguna_DPTk."',
                jumlah_pengguna       = '".$jumlah_pengguna."',
                disabilitas           = '".$disabilitas."',
                disabilitas_pemilih   = '".$disabilitas_pemilih."',
                total_surat_suara     = '".$total_surat_suara."',
                surat_suara_kembali   = '".$surat_suara_kembali."',
                surat_suara_sisa      = '".$surat_suara_sisa."',
                surat_suara_guna      = '".$surat_suara_guna."', 
                status                = '".$status."' , 
                admin                 = '".$user."', 
                updated_at = CURRENT_TIMESTAMP 
                Where id_suara = '".$id_suara."'");
            
            // $validasi_temporary = $this->pasangan->updateSuaraTemporary("SET 
            //     total_suara           = '".$jumlah_suara."',
            //     suara_sah             = '".$suara_sah."',
            //     suara_tidak_sah       = '".$suara_tidak_sah."',
            //     DPT                   = '".$DPT."',
            //     DPTb                  = '".$DPTb."',
            //     DPTk                  = '".$DPTk."',
            //     total_DPT             = '".$total_DPT."',
            //     pengguna_DPT          = '".$pengguna_DPT."',
            //     pengguna_DPTb         = '".$pengguna_DPTb."',
            //     pengguna_DPTk         = '".$pengguna_DPTk."',
            //     jumlah_pengguna       = '".$jumlah_pengguna."',
            //     disabilitas           = '".$disabilitas."',
            //     disabilitas_pemilih   = '".$disabilitas_pemilih."',
            //     total_surat_suara     = '".$total_surat_suara."',
            //     surat_suara_kembali   = '".$surat_suara_kembali."',
            //     surat_suara_sisa      = '".$surat_suara_sisa."',
            //     surat_suara_guna      = '".$surat_suara_guna."', 
            //     updated_at = CURRENT_TIMESTAMP 
            //     Where id_suara = '".$id_suara."'");
            
            for ($i=0; $i<count($id_detail); $i++){

                 //query update detail suara
                $update_detail_suara = $this->pasangan->updateDetailSuara('SET 
                        hasil_suara = "'.$hasil_suara[$i].'"
                        WHERE id_detail = "'.$id_detail[$i].'"');

                        //query update detail suara temporary
                        // $update_detail_suara_temporary = $this->pasangan->updateDetailSuaraTemporary('SET 
                        // hasil_suara = "'.$hasil_suara[$i].'"
                        // WHERE id_detail = "'.$id_detail[$i].'"');
            }
            session()->setFlashData('success', 'Suara Berhasil Divalidasi!');
            return redirect()->to(base_url('/suara_masuk'));            

        }else {return redirect()->to(base_url('/'));}
    }

    //batal validasi suara

    public function batalValidasi($id_suara){
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $data = $this->adminmodel->batalvalidasi("SET cek = 0, admin = NULL WHERE id_suara = '".$id_suara."'");

            session()->setFlashData('danger', 'Evaluasi Suara Dibatalkan!');
            return redirect()->to(base_url('/suara_masuk'));

        }else {return redirect()->to(base_url('/'));}
    }

    //get suara tervalidasi
    public function getSuaraValidasi()
	{   
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $data = $this->adminmodel->dataSuara("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode 
            AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan) = c.kode 
            AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan,'.',a.id_kelurahan) = d.kode 
            AND a.id_provinsi = e.kode AND a.username = f.id_panitia
            AND a.id_kab_kota = '".$kota_kab."' AND f.status = 1
            ORDER BY f.updated_at DESC, f.status ASC")->getResultArray();

            $last_valid = $this->adminmodel->lastvalid("ORDER BY id DESC LIMIT 1")->getResult();
            foreach ($last_valid as $last);

            $active = 'suara_validasi';
            return view('admin/suara_validasi', [
                'active'    => $active,
                'data'      => $data,
                'cekgrafik' => 0,
                'user'      => $user,
                'last_valid'=> $last->pengirim,
                ]);
        }else {return redirect()->to(base_url('/'));}
    }

    //Detail Suara Tervalidasi
    public function detailSuara($id_suara)
    {
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $data = $this->adminmodel->dataSuara("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode 
            AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan) = c.kode 
            AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan,'.',a.id_kelurahan) = d.kode 
            AND a.id_provinsi = e.kode AND a.username = f.id_panitia
            AND a.id_kab_kota = '".$kota_kab."' AND f.status = 1
            AND f.id_suara = '".$id_suara."' LIMIT 1")->getResult();

            $pasangan = $this->adminmodel->hasilsuara("WHERE a.id_suara = b.id_suara AND a.id_pasangan = c.id_pasangan 
            AND c.id_pasangan = d.id_pasangan AND e.id_calon = d.ketua AND f.id_calon = d.wakil 
            AND g.id_suara = a.id_suara AND g.status = 1
            AND a.id_suara = '".$id_suara."'")->getResultArray();
            
            $active = 'suara_validasi';
            return view('admin/detail_suara', [
                'active'    => $active,
                'data'      => $data,
                'cekgrafik' => 0,
                'user'      => $user,
                'pasangan'  => $pasangan
                ]);

        }else {return redirect()->to(base_url('/'));}
    }

    //end suara

    public function generate()
	{   
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $data = $this->adminmodel->generatePanitia("ORDER BY id_tps ASC")->getResultArray();
            
            $active = 'generate';
            return view('admin/generate', [
                'active'    =>$active,
                'data'      =>$data,
                'cekgrafik' =>0,
                'user'      => $user,
                ]);
        }else {return redirect()->to(base_url('/'));}
    }
    
    public function createPanitia()
	{   
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            
            for($x=0; $x<count($username); $x++){
                $colomn[$x] = [
                    'username' => $username[$x],
                    'password' => MD5($password)[$x]
                ];
                
                $insert = $this->adminmodel->createPanitia($colomn[$x]);    
            }
    
            if($insert)
            {
                session()->setFlashdata('success', 'Berhasil Menambah panitia');
                return redirect()->to(base_url('panitia')); 
            }
        }else {return redirect()->to(base_url('/'));}
    }
    // add createCalon by fuad
    // Fungsi untuk validasi form tambah dan ubah
    // public function validation($mode){
    //     $this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
        
    //     // Tambahkan if apakah $mode save atau update
    //     // Karena ketika update, NIS tidak harus divalidasi
    //     // Jadi NIS di validasi hanya ketika menambah data siswa saja
    //     if($mode == "save")
    //     $this->form_validation->set_rules('nama_lengkap1', 'Nama', 'required|numeric|max_length[11]');
    //     $this->form_validation->set_rules('nik1', 'NIK', 'required|max_length[50]');
    //     $this->form_validation->set_rules('tempat_lahir1', 'Tempat Lahir', 'required');
    //     $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|numeric|max_length[15]');
    //     $this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
        
    //     if($this->form_validation->run()) // Jika validasi benar
    //     return TRUE; // Maka kembalikan hasilnya dengan TRUE
    //     else // Jika ada data yang tidak sesuai validasi
    //     return FALSE; // Maka kembalikan hasilnya dengan FALSE
    // }
    
    // Fungsi untuk melakukan simpan data ke tabel nama_pasangan
    public function save(){
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];
            
                $nama1 = $this->request->getPost('nama_lengkap1');
                $no_ktp1 = $this->request->getPost('nik1');
                $jenis_kelamin1 = $this->request->getPost('jenis_kelamin1');
                $tempat_lahir1 = $this->request->getPost('tempat_lahir1');
                $tanggal_lahir1 = $this->request->getPost('tgl_lahir1');
                $alamat_lengkap1 = $this->request->getPost('alamat_rumah1');
                $pekerjaan1 = $this->request->getPost('pekerjaan1');
                $agama1 = $this->request->getPost('agama1');
                $id_provinsi1 = $this->request->getPost('id_provinsi1');
                $kawin1 = $this->request->getPost('status-kawin1');
                $email1 = $this->request->getPost('email1');
                $no_hp1 = $this->request->getPost('no_hp1');

                $nama2 = $this->request->getPost('nama_lengkap2');
                $no_ktp2 = $this->request->getPost('nik2');
                $jenis_kelamin2 = $this->request->getPost('jenis_kelamin2');
                $tempat_lahir2 = $this->request->getPost('tempat_lahir2');
                $tanggal_lahir2 = $this->request->getPost('tgl_lahir2');
                $alamat_lengkap2 = $this->request->getPost('alamat_rumah2');
                $pekerjaan2 = $this->request->getPost('pekerjaan2');
                $agama2 = $this->request->getPost('agama2');
                $id_provinsi2 = $this->request->getPost('id_provinsi2');
                $kawin2 = $this->request->getPost('status-kawin2');
                $email2 = $this->request->getPost('email2');
                $no_hp2 = $this->request->getPost('no_hp2');

                $data1 = array (
                    "nama_lengkap" =>$nama1,
                    "no_ktp" => $no_ktp1,
                    "jenis_kelamin" =>$jenis_kelamin1,
                    "tempat_lahir" =>$tempat_lahir1,
                    "tanggal_lahir" =>$tanggal_lahir1,
                    "alamat_lengkap" =>$alamat_lengkap1,
                    "pekerjaan" =>$pekerjaan1,
                    "agama" =>$agama1,
                    "id_provinsi" =>$id_provinsi,
                    "kawin" =>$kawin1,
                    "email" =>$email1,
                    "no_hp" =>$no_hp1
                );
                $data2 = array(
                    "nama_lengkap" =>$nama2,
                    "no_ktp" => $no_ktp2,
                    "jenis_kelamin" =>$jenis_kelamin2,
                    "tempat_lahir" =>$tempat_lahir2,
                    "tanggal_lahir" =>$tanggal_lahir2,
                    "alamat_lengkap" =>$alamat_lengkap2,
                    "pekerjaan" =>$pekerjaan2,
                    "agama" =>$agama2,
                    "id_provinsi" =>$id_provinsi,
                    "kawin" =>$kawin2,
                    "email" =>$email2,
                    "no_hp" =>$no_hp2
                );
                
                // echo "<pre>";
                // print_r($data1);
                // echo "</pre>";

                // echo "<pre>";
                // print_r($data2);
                // echo "</pre>";
            // $data2 = array(
            //     "nama_lengkap" => $this->input->post('nama_lengkap2'),
            //     "no_ktp" => $this->input->post('nik2'),
            //     "jenis_kelamin" => $this->input->post('jenis_kelamin2'),
            //     "tempat_lahir" => $this->input->post('tempat_lahir2'),
            //     "tanggal_lahir" => $this->input->post('tanggal_lahir2'),
            //     "alamat_lengkap" => $this->input->post('alamat_lengkap2'),
            //     "pekerjaan" => $this->input->post('pekerjaan2'),
            //     "agama" => $this->input->post('agama2'),
            //     "id_provinsi" => $this->input->post('id_provinsi2'),
            //     "kawin" => $this->input->post('kawin2'),
            //     "email" => $this->input->post('email2'),
            //     "no_hp" => $this->input->post('no_hp2')
            // );
            $this->adminmodel->createCalon($data1, $data2);
            
        return redirect()->to(base_url('pasangan_calon'));
            // $this->db->insert('nama_pasangan', $data); // Untuk mengeksekusi perintah insert data
            // $this->db->insert('nama_pasangan', $data2); // Untuk mengeksekusi perintah insert data
        }else { return redirect()->to(base_url('/'));}
    } 
    // end createCalon

    //Kirim Database 
    function kirimDatabase(){
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            $id_provinsi = $_SESSION['id_provinsi'];
            $kota_kab = $_SESSION['id_kab_kota'];
        
                $suara = $this->adminmodel->kirimSuara("WHERE substr(id_panitia,1,4) = concat($id_provinsi, $kota_kab)")->getResultArray();
            
                $detail_suara = $this->adminmodel->kirimDetailSuara("ORDER BY id_detail ASC")->getResultArray();
                
                $url = "https://kpu-bandarlampungkota.go.id/terima.php";
                    
                $curlHandle = curl_init();
                    
                curl_setopt($curlHandle, CURLOPT_URL, $url); 
                curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "detail_suara=".json_encode($detail_suara)."&suara=".json_encode($suara));
                curl_setopt($curlHandle, CURLOPT_HEADER,0);
                curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlHandle, CURLOPT_TIMEOUT,3000);
                curl_setopt($curlHandle, CURLOPT_POST, 1);
                curl_exec($curlHandle);
                curl_close($curlHandle);
                
            $pengirim = array(
                'pengirim' => $user,
                'status'   => 'Terkirim'
            );
            
            $kirim_data = $this->db->table('kirim')->insert($pengirim);

            session()->setFlashdata('success', 'Berhasil Mengirim Data ke Server KPU');
            return redirect()->to(base_url('/suara_validasi'));

        }else { return redirect()->to(base_url('/'));}
    }

}
