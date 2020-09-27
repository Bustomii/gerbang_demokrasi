<?php namespace App\Controllers;

use App\Models\PasanganCalonModel;

use CodeIgniter\RESTful\ResourceController;
 
class PasanganCalonController extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\PasanganCalonModel';
    function __construct() 
    {
        $this->db = db_connect();
        $this->pasangan = new PasanganCalonModel();
    }

    public function pasanganCalon($id)
    {
        $push = array();
        //query membaca pasangan calon walikota
        $data = $this->pasangan->getPasangan("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode AND a.id_pasangan = c.id_pasangan AND c.ketua = d.id_calon AND c.wakil = e.id_calon AND a.id_kab_kota = '".$id."' ORDER BY a.no_urut ASC")->getResultArray();
        foreach ($data as $x){
            $output = array(
                'id_pasangan'       => $x['id_pasangan'],
                'no_urut'           => $x['no_urut'],
                'kota_kabupaten'    => $x['kabupaten'],
                'foto_ketua'        => $x['foto_ketua'],
                'foto_wakil'        => $x['foto_wakil'],
                'nama_ketua'        => $x['nama_ketua'],
                'nama_wakil'        => $x['nama_wakil'],
            );
            array_push($push, $output);
        }
        if($data!=NULL){
            return $this->respond(array("error"=>false,
            "response_code"=>200,
            "records" =>$push), 200);
        }else{
            return $this->respond(array("error"=>false,
            "response_code"=>400,
            "message" =>"Tidak ada produk"), 400);
        }
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
            'c4'            => $c4,
            'status'        => 0
        ];

        $cekData = $this->pasangan->cekData("WHERE a.id_suara = b.id_suara AND a.id_panitia = '".$id_panitia."'");
        $row = $cekData->getRow();

        //Cek data Array
        foreach($cekData->getResultArray() as $a){
            $detailID = array(
            'idDetail'  => $a['id_detail'],
            'status'    => $a['status'],
            'cekid'     => $a['id_suara']
            );
            $detail_id[]= $a['id_detail'];
        }

        if($row != NULL){

            if($detailID['status'][0] == '1'){
                $respon = array("error"=>false,
                    "response_code"=>200,
                    "message" =>"Anda Sudah Memasukan Data");
    
                    return $this->respond($respon, 200);
            }
            else{
                //query update suara
                $update_suara = $this->pasangan->updateSuara('SET id_panitia = "'.$id_panitia.'", total_suara = "'.$jumlah_suara.'",
                                                c4 = "'.$c4.'" WHERE id_suara = "'.$detailID['cekid'].'"');

                    //Update Data Array 
                    for ($x=0; $x<count($detail_id); $x++){  
                        //query update detail suara
                        $update_detail_suara = $this->pasangan->updateDetailSuara('SET hasil_suara = "'.$hasil_suara[$x].'"
                        WHERE id_detail = "'.$detail_id[$x].'"');
                    }   

                if ($update_suara != false && $update_detail_suara !=false){
                    $respon = array("error"=>false,
                        "response_code"=>200,
                        "message" =>"Suara Berhasil Diupdate");
                        
                    return $this->respond($respon, 200);
                } 
                else {
                    $respon = array("error"=>true,
                        "response_code"=>400,
                        "message" =>"Suara Gagal Update");
                        
                    return $this->respond($respon, 400);
                }
            }
        }
        else{
            //query tambah suara
            $tambah_suara = $this->db->table('suara')->insert($suara);
            
            //Menyimpan id suara terakhir
            $last_id = $this->db->insertID();

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
            
            if ($tambah_suara != false && $tambah_detail_suara != false){
                $respon = array("error"=>false,
                    "response_code"=>200,
                    "message" =>"Suara Berhasil Ditambah");
                    
                return $this->respond($respon, 200);
            } else {
                $respon = array("error"=>true,
                    "response_code"=>400,
                    "message" =>"Suara Gagal Ditambah");
                    
                return $this->respond($respon, 400);
            }
        }

    }

    public function getSuara($id){

        $push = array();
        //query membaca pasangan calon walikota
        $data = $this->pasangan->getSuaraMasuk("WHERE 
        a.id_suara = b.id_suara 
        AND a.id_panitia = '".$id."'
        AND b.id_pasangan = c.id_pasangan
        AND c.ketua = d.id_calon
        AND c.wakil = f.id_calon
        AND c.id_pasangan = e.id_pasangan
        ORDER BY e.no_urut ASC")->getResultArray();
        foreach ($data as $x){
            $output = array(
                'id_detail'      => $x['id_detail'],
                'id_pasangan'    => $x['id_pasangan'],
                'suara_masuk'    => $x['hasil_suara'],
                'foto_ketua'     => $x['foto_ketua'],
                'foto_wakil'     => $x['foto_wakil'],
                'nama_ketua'     => $x['nama_ketua'],
                'nama_wakil'     => $x['nama_wakil']
            );
            array_push($push, $output);
        }
        
        if($data!=NULL){
            return $this->respond(array("error"=>false,
            "response_code"=>200,
            "c4"=>$x['c4'],
            "records" =>$push), 200);
        }else{
            return $this->respond(array("error"=>false,
            "response_code"=>400,
            "message" =>"Tidak ada produk"), 400);
        }
    }

    public function Login(){
 
        $id_panitia   = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $this->pasangan->cekPanitia("WHERE username = '".$id_panitia."' AND password = MD5('".$password."') LIMIT 1");
        if($data->getRow()==1){
        foreach ($data->getResult() as $x);
            $id_panitiaa = $x->username;
            $passwordd = $x->password;

            $respon = array("error"=>false,
                "response_code"=>200,
                "message" =>"Login Berhasil",
                "id_panitia"=> $id_panitiaa);    
                
            return $this->respond($respon, 200); 
        }
        else {
            $respon = array("error"=>true,
                "response_code"=>400,
                "message" =>"Login Gagal");    
                
            return $this->respond($respon, 200);
        }
    }

    public function detailPanitia($username){
        
        $data = $this->pasangan->detailPanitia1("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode 
        AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan) = c.kode 
        AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan,'.',a.id_kelurahan) = d.kode 
        AND a.id_provinsi = e.kode 
        AND a.username = '".$username."'")->getResultArray();
        foreach ($data as $x){
            $output = array(
                'username'          => $x['username'],
                'no_tps'            => $x['no_tps'],
                'provinsi'          => $x['provinsi'],
                'kota_kabupaten'    => $x['kabupaten'],
                'kecamatan'         => $x['kecamatan'],
                'kelurahan'         => $x['kelurahan'],
            );
        } 

        if ($data!=NULL){
            $respon = array("error"=>false,
                "response_code"=>200,
                "records"=> $output);    
                
            return $this->respond($respon, 200); 
        }
        else {
            $respon = array("error"=>true,
                "response_code"=>400,
                "message" =>"Tidak ada produk");    
                
            return $this->respond($respon, 400);
        }
    }
}