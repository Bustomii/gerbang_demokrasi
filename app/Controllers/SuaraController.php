<?php namespace App\Controllers;

use App\Models\PasanganCalonModel;

use CodeIgniter\RESTful\ResourceController;
 
class SuaraController extends ResourceController
{
    
    function __construct() 
    {
        $this->db = db_connect();
        $this->pasangan = new PasanganCalonModel();
    }

    public function index()
    {
   
    }

    public function kirimSuara(){
        $validation =  \Config\Services::validation();
 
        $id_panitia   = $this->request->getPost('id_panitia');
        $c4 = $this->request->getPost('c4');
        $id_pasangan = $this->request->getPost('id_pasangan');
        $hasil_suara = $this->request->getPost('hasil_suara');
        
        $jumlah_suara = array_sum($hasil_suara);
        //Deklarasi colomn tabel suara
        $suara = [
            'id_panitia'    => $id_panitia,
            'total_suara'   => $jumlah_suara,
            'c4'            => $c4
        ];
        //query tambah suara
        $tambah_suara = $this->db->table('suara')->insert($suara);
        $last_id = $this->db->insertID();
        // $last_id = [16,16,16];

        for ($x=0; $x<count($id_pasangan); $x++){
            //Deklarasi colomn tabel detail suara
            $detail_suara = [
                'id_suara'      => $last_id,
                'id_pasangan'   => $id_pasangan[$x],
                'hasil_suara'   => $hasil_suara[$x]
            ];
            //query tambah detail suara
            $tambah_detail_suara = $this->db->table('detail_suara')->insert($detail_suara);
            
        }

        if ($tambah_suara != NULL && $tambah_detail_suara != NULL){
            $respon = array("error"=>false,
                "response_code"=>200,
                "message" =>"Suara Berhasil Ditambah");
        return $this->respond($respon, 200);
        }
        $validation->getErrors();
    }
}