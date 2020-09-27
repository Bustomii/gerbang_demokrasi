<?php namespace App\Controllers;

use App\Models\AdminModel;

class AdminControllers extends BaseController
{
    
    protected $modelName    = 'App\Models\AdminModel';

    function __construct() {
        $this->adminmodel = new AdminModel();

	}

	public function index()
	{
		return redirect()->to(base_url('/admin') );
    }
    
    public function dashboard()
	{
        $active = 'dashboard';
        return view('admin/dashboard', ['active'=>$active]);
	}

    public function calonPasangan()
	{
        $data = $this->adminmodel->dataPasanganCalon("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode AND a.id_pasangan = c.id_pasangan AND c.ketua = d.id_calon AND c.wakil = e.id_calon ORDER BY a.id_provinsi ASC")->getResultArray();
        $active = 'pasangan_calon';
        return view('admin/lihat_calon', [
            'active'    =>$active,
            'data'      =>$data,
        ]);
    }

    public function tambahCalon()
	{
        // $data = $this->adminmodel->dataPasanganCalon("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode AND a.id_pasangan = c.id_pasangan AND c.ketua = d.id_calon AND c.wakil = e.id_calon ORDER BY a.id_provinsi ASC")->getResultArray();
        $active = 'tambah_calon';
        return view('admin/tambah_calon', [
            'active'    =>$active,
            // 'data'      =>$data,
        ]);
    }
    
    public function panitia()
	{   
        $data = $this->adminmodel->dataPanitia("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode AND concat(a.id_provinsi,'.',a.id_kab_kota,'.', a.id_kecamatan) = c.kode AND concat(a.id_provinsi,'.',a.id_kab_kota,'.', a.id_kecamatan,'.',a.id_kelurahan) = d.kode ORDER BY username ASC")->getResultArray();
        
        $active = 'panitia';
        return view('admin/lihat_panitia', [
            'active'    =>$active,
            'data'      =>$data,
            ]);
	}
    
    public function suara()
	{   
        // $data = $this->adminmodel->dataSuara("")->getResultArray();
        
        $active = 'suara';
        return view('admin/suara', [
            'active'    =>$active,
            // 'data'      =>$data,
            ]);
    }

    public function generate()
	{   
        $data = $this->adminmodel->generatePanitia("ORDER BY id_tps ASC")->getResultArray();
        
        $active = 'generate';
        return view('admin/generate', [
            'active'    =>$active,
            'data'      =>$data,
            ]);
    }
    
    public function createPanitia()
	{   
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
            session()->setFlashdata('success', 'Created product successfully');
            return redirect()->to(base_url('product')); 
        }
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
        $id_provinsi = 18;
        $id_kab_kota = 71;
        
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
    }
    // end createCalon

}
