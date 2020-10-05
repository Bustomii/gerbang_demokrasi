<?php namespace App\Controllers;

use App\Models\MobileModel;
use \Firebase\JWT\JWT;
use App\Controllers\AuthController;
use CodeIgniter\RESTful\ResourceController;

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class MobileController extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\MobileModel';
    function __construct() 
    {
        $this->db = db_connect();
        $this->pasangan = new MobileModel(); 
        $this->protect = new AuthController();
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
            "message" =>"Tidak ada produk"), 200);
        }
    }

    public function kirimSuara(){
 
        $id_panitia   = $this->request->getPost('id_panitia');
        $c1 = $this->request->getPost('c1');   
        $selfi = $this->request->getPost('selfi');
        $id_pasangan = $this->request->getPost('id_pasangan');
        $hasil_suara = $this->request->getPost('hasil_suara');
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
        
        if ($id_panitia !=NULL && $c1 !=NULL && $selfi !=NULL && $id_pasangan !=NULL && $hasil_suara !=NULL && $suara_sah !=NULL &&
            $suara_tidak_sah !=NULL && $DPT !=NULL && $DPTk !=NULL && $total_DPT !=NULL && $pengguna_DPT !=NULL && $pengguna_DPTb !=NULL &&
            $pengguna_DPTk !=NULL && $jumlah_pengguna !=NULL && $disabilitas !=NULL && $disabilitas_pemilih !=NULL && $total_surat_suara !=NULL &&
            $surat_suara_kembali !=NULL && $surat_suara_sisa !=NULL && $surat_suara_guna !=NULL && $jumlah_suara !=NULL
        ){
        //Deklarasi colomn tabel suara
        $suara = [
            'id_panitia'            => $id_panitia,
            'total_suara'           => $jumlah_suara,
            'c1'                    => $c1,
            'selfi'                 => $selfi,
            'suara_sah'             => $suara_sah,
            'suara_tidak_sah'       => $suara_tidak_sah,
            'DPT'                   => $DPT,
            'DPTb'                  => $DPTb,
            'DPTk'                  => $DPTk,
            'total_DPT'             => $total_DPT,
            'pengguna_DPT'          => $pengguna_DPT,
            'pengguna_DPTb'         => $pengguna_DPTb,
            'pengguna_DPTk'         => $pengguna_DPTk,
            'jumlah_pengguna'       => $jumlah_pengguna,
            'disabilitas'           => $disabilitas,
            'disabilitas_pemilih'   => $disabilitas_pemilih,
            'total_surat_suara'     => $total_surat_suara,
            'surat_suara_kembali'   => $surat_suara_kembali,
            'surat_suara_sisa'      => $surat_suara_sisa,
            'surat_suara_guna'      => $surat_suara_guna 
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
                $update_suara = $this->pasangan->updateSuara('SET 
                id_panitia          = "'.$id_panitia.'", 
                total_suara         = "'.$jumlah_suara.'",
                c1                  = "'.$c1.'",
                selfi               = "'.$selfi.'",
                suara_sah           = "'.$suara_sah.'",
                suara_tidak_sah     = "'.$suara_tidak_sah.'",
                DPT                 = "'.$DPT.'",
                DPTb                = "'.$DPTb.'",
                DPTk                = "'.$DPTk.'",
                total_DPT           = "'.$total_DPT.'",
                pengguna_DPT        = "'.$pengguna_DPT.'",
                pengguna_DPTb       = "'.$pengguna_DPTb.'",
                pengguna_DPTk       = "'.$pengguna_DPTk.'",
                jumlah_pengguna     = "'.$jumlah_pengguna.'",
                disabilitas         = "'.$disabilitas.'",
                disabilitas_pemilih = "'.$disabilitas_pemilih.'",
                total_surat_suara   = "'.$total_surat_suara.'",
                surat_suara_kembali = "'.$surat_suara_kembali.'",
                surat_suara_sisa    = "'.$surat_suara_sisa.'",
                surat_suara_guna    = "'.$surat_suara_guna.'",
                updated_at          = CURRENT_TIMESTAMP
                WHERE id_suara      = "'.$detailID['cekid'].'"'
                );

                //query update suara temporary
                $update_suara_temporary = $this->pasangan->updateSuaraTemporary('SET 
                id_panitia          = "'.$id_panitia.'", 
                total_suara         = "'.$jumlah_suara.'",
                c1                  = "'.$c1.'",
                selfi               = "'.$selfi.'",
                suara_sah           = "'.$suara_sah.'",
                suara_tidak_sah     = "'.$suara_tidak_sah.'",
                DPT                 = "'.$DPT.'",
                DPTb                = "'.$DPTb.'",
                DPTk                = "'.$DPTk.'",
                total_DPT           = "'.$total_DPT.'",
                pengguna_DPT        = "'.$pengguna_DPT.'",
                pengguna_DPTb       = "'.$pengguna_DPTb.'",
                pengguna_DPTk       = "'.$pengguna_DPTk.'",
                jumlah_pengguna     = "'.$jumlah_pengguna.'",
                disabilitas         = "'.$disabilitas.'",
                disabilitas_pemilih = "'.$disabilitas_pemilih.'",
                total_surat_suara   = "'.$total_surat_suara.'",
                surat_suara_kembali = "'.$surat_suara_kembali.'",
                surat_suara_sisa    = "'.$surat_suara_sisa.'",
                surat_suara_guna    = "'.$surat_suara_guna.'",
                updated_at          = CURRENT_TIMESTAMP
                WHERE id_suara      = "'.$detailID['cekid'].'"'
                );

                    //Update Data Array 
                    for ($x=0; $x<count($detail_id); $x++){  
                        //query update detail suara
                        $update_detail_suara = $this->pasangan->updateDetailSuara('SET 
                        hasil_suara = "'.$hasil_suara[$x].'"
                        WHERE id_detail = "'.$detail_id[$x].'"');

                        //query update detail suara temporary
                        $update_detail_suara_temporary = $this->pasangan->updateDetailSuaraTemporary('SET 
                        hasil_suara = "'.$hasil_suara[$x].'"
                        WHERE id_detail = "'.$detail_id[$x].'"');
                    }   
                //bug
                if ($update_suara && $update_detail_suara && $update_suara_temporary && $update_detail_suara_temporary){
                    $respon = array("error"=>false,
                        "response_code"=>200,
                        "message" =>"Suara Berhasil Diupdate");
                        
                    return $this->respond($respon, 200);
                } 
                else {
                    $respon = array("error"=>true,
                        "response_code"=>400,
                        "message" =>"Suara Gagal Update");
                        
                    return $this->respond($respon, 200);
                    }
                }
            }
            else{
                //query tambah suara
                $tambah_suara = $this->db->table('suara')->insert($suara);
                //query tambah suara temporary
                $tambah_suara_temporary = $this->db->table('suara_temporary')->insert($suara);
                
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

                    //query tambah detail suara temporary
                    $tambah_detail_suara_temporary = $this->db->table('detail_suara_temporary')->insert($detail_suara);
                    
                }
                //bug
                if ($tambah_suara && $tambah_detail_suara && $tambah_suara_temporary && $tambah_detail_suara_temporary){
                    $respon = array("error"=>false,
                        "response_code"=>200,
                        "message" =>"Suara Berhasil Ditambah");
                        
                    return $this->respond($respon, 200);
                } else {
                    $respon = array("error"=>true,
                        "response_code"=>400,
                        "message" =>"Suara Gagal Ditambah");
                        
                    return $this->respond($respon, 200);
                }
            }
        }else{
            
            $respon = array("error"=>true,
            "response_code"=>500,
            "message" =>"Data Incompleted");
            
        return $this->respond($respon, 200);
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
            "status"                => $x['status'],
            "suara_sah"             => $x['suara_sah'],
            "suara_tidak_sah"       => $x['suara_tidak_sah'],
            "DPT"                   => $x['DPT'],
            "DPTb"                  => $x['DPTb'],
            "DPTk"                  => $x['DPTk'],
            "total_DPT"             => $x['total_DPT'],
            "pengguna_DPT"          => $x['pengguna_DPT'],
            "pengguna_DPTb"         => $x['pengguna_DPTb'],
            "pengguna_DPTk"         => $x['pengguna_DPTk'],
            "jumlah_pengguna"       => $x['jumlah_pengguna'],
            "disabilitas"           => $x['disabilitas'],
            "disabilitas_pemilih"   => $x['disabilitas_pemilih'],
            "total_surat_suara"     => $x['total_surat_suara'],
            "surat_suara_kembali"   => $x['surat_suara_kembali'],
            "surat_suara_sisa"      => $x['surat_suara_sisa'],
            "surat_suara_guna"      => $x['surat_suara_guna'], 
            "total_suara"           => $x['total_suara'],
            "c1"                    => $x['c1'],
            "selfi"                    => $x['selfi'],
            "records" =>$push), 200);
        }else{
            return $this->respond(array("error"=>false,
            "response_code"=>400,
            "status"    => -1,
            "message" =>"Tidak ada produk"), 200);
        }
    }

    public function Login(){
 
        $id_panitia   = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $this->pasangan->cekPanitia("WHERE username = '".$id_panitia."' LIMIT 1");
        if($data->getRow()!=NULL){
        foreach ($data->getResult() as $x);
            $id_panitiaa = $x->username;
            $md5 = $x->password;

            if($password == substr($md5,-6,7)){
            $respon = array("error"=>false,
                "response_code"=>200,
                "message" =>"Login Berhasil",
                "id_panitia"=> $id_panitiaa);    
                
            return $this->respond($respon, 200); 
            }else{
                $respon = array("error"=>true,
                    "response_code"=>400,
                    "message" =>"Password Salah");    
                    
                return $this->respond($respon, 200);
            } 
        }
        else {
            $respon = array("error"=>true,
                "response_code"=>400,
                "message" =>"Username Salah");    
                
            return $this->respond($respon, 200);
        }
    }

    public function detailPanitia($username){
        
        // $secret_key = $this->protect->privateKey();
        // $token = null;
        // $authHeader = $this->request->getServer('HTTP_AUTHORIZATION');
        // $arr = explode(" ", $authHeader);
        // $token = $arr[1];
        // if($token){
        //     try {
        //         $decoded = JWT::decode($token, $secret_key, array('HS256'));
        //         // Access is granted. Add code of the operation here 
        //         if($decoded){
        
                    $data = $this->pasangan->detailPanitia1("WHERE concat(a.id_provinsi,'.',a.id_kab_kota) = b.kode 
                    AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan) = c.kode 
                    AND concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan,'.',a.id_kelurahan) = d.kode 
                    AND a.id_provinsi = e.kode 
                    AND a.username = '".$username."'")->getResultArray();
                    foreach ($data as $x){
                        $output = array(
                            'username'          => $x['username'],
                            'no_tps'            => $x['no_tps'],
                            'dpt'               => $x['dpt'],
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
                            
                        return $this->respond($respon, 200);
                    }
                // }
        //     }catch (\Exception $e){
 
        //         $output = [
        //             'message' => 'Access denied',
        //             "error" => $e->getMessage()
        //         ];
         
        //         return $this->respond($output, 401);
        //     }
        // }
    }

    //start detail DPT kecamatan
    public function getKecamatanDPT(){
        $id_provinsi = 18;
        $id_kab_kota = 71;

            $kecamatan = $this->pasangan->kecamatan("where b.kode LIKE '$id_provinsi.$id_kab_kota%' ORDER BY b.nama ASC")->getResultArray();
            $push = array();
            foreach ($kecamatan as $x){
                $output = array(
                    'kecamatan'  => $x['kecamata'],
                    'id_kecamatan'  => $x['id_kecamatan'],
                );
                array_push($push, $output);
            }

            if ($kecamatan!=NULL){
                $respon = array("error"=>false,
                    "response_code"=>200,
                    "records"=> $push);    
                    
                return $this->respond($respon, 200); 
            }
            else {
                $respon = array("error"=>true,
                    "response_code"=>400,
                    "message" =>"Tidak ada produk");    
                    
                return $this->respond($respon, 200);
            }
    }

    public function getJumlahKelurahan($id_kecamatan){
        $id_provinsi = 18;
        $id_kab_kota = 71;
            $kelurahan = $this->pasangan->kelurahan("where kode LIKE '$id_provinsi.$id_kab_kota.$id_kecamatan.%'
            ORDER BY nama ASC")->getResultArray();
            
            if (count($kelurahan)!=NULL){
                $respon = array("error"=>false,
                    "response_code"=>200,
                    "jumlah_kelurahan"=> count($kelurahan));    
                    
                return $this->respond($respon, 200); 
            }
            else {
                $respon = array("error"=>true,
                    "response_code"=>400,
                    "jumlah_kelurahan" =>count($kelurahan));    
                    
                return $this->respond($respon, 200);
            }
        }

    public function getKelurahanDPT($id_kecamatan){
        $id_provinsi = 18;
        $id_kab_kota = 71;
            $kelurahan = $this->pasangan->kelurahan("where kode LIKE '$id_provinsi.$id_kab_kota.$id_kecamatan.%'
            ORDER BY nama ASC")->getResultArray();
            $push = array();
            foreach ($kelurahan as $x){
                $output = array(
                    'kelurahan'  => $x['kelurahan'],
                    'id_kelurahan'  => $x['id_kelurahan'],
                );
                array_push($push, $output);
            }

            if ($kelurahan!=NULL){
                $respon = array("error"=>false,
                    "response_code"=>200,
                    "records"=> $push);    
                    
                return $this->respond($respon, 200); 
            }
            else {
                $respon = array("error"=>true,
                    "response_code"=>400,
                    "message" =>"Tidak ada produk");    
                    
                return $this->respond($respon, 200);
            }
        }
    
    public function getJumlahTps($id_kecamatan, $id_kelurahan){
            $id_provinsi = 18;
            $id_kab_kota = 71;
                $kelurahan = $this->pasangan->tps("where username LIKE '$id_provinsi$id_kab_kota$id_kecamatan$id_kelurahan%'
                ORDER BY no_tps ASC")->getResultArray();
                
                if (count($kelurahan)!=NULL){
                    $respon = array("error"=>false,
                        "response_code"=>200,
                        "jumlah_kelurahan"=> count($kelurahan));    
                        
                    return $this->respond($respon, 200); 
                }
                else {
                    $respon = array("error"=>true,
                        "response_code"=>400,
                        "jumlah_kelurahan" =>count($kelurahan));    
                        
                    return $this->respond($respon, 200);
                }
            }

    public function getDPT($id_kecamatan, $id_kelurahan){
        $id_provinsi = 18;
        $id_kab_kota = 71;
        $kelurahan = $this->pasangan->tps("where username LIKE '$id_provinsi$id_kab_kota$id_kecamatan$id_kelurahan%'
        ORDER BY no_tps ASC")->getResultArray();
        $push = array();
            foreach ($kelurahan as $x){
                $output = array(
                    'no_tps'  => $x['no_tps'],
                    'total_dpt'  => $x['dpt'],
                    'dpt_lakilaki'  => $x['laki_laki'],
                    'dpt_perempuan'  => $x['perempuan'],
                );
                array_push($push, $output);
            }
    
            if ($kelurahan!=NULL){
                $respon = array("error"=>false,
                    "response_code"=>200,
                    "records"=> $push);    

                return $this->respond($respon, 200); 
            }
            else {
                $respon = array("error"=>true,
                    "response_code"=>400,
                    "message" =>"Tidak ada produk");    

                return $this->respond($respon, 200);
            }
        }
    
}