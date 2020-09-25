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


}
