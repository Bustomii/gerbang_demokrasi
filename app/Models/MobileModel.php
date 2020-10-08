<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class MobileModel extends Model {

    protected $table = 'tps';

    public function getPasanganCalon($id = false)
    {
        if($id == false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_kota' => $id])->getRowArray();
        }  
    }
    public function getPasangan($where = ''){
        return $this->db->query("select a.*, b.nama as kabupaten, c.*, d.foto as foto_ketua, 
        d.nama_lengkap as nama_ketua, e.foto as foto_wakil, e.nama_lengkap as nama_wakil 
        from calon_aktif a, wilayah b, pasangan_calon c, nama_pasangan d, nama_pasangan e $where");   
    } 

    //done
    public function cekPanitia($where = ''){
        return $this->db->query("select * from tps $where");   
    } 

    //Done
    public function detailPanitia1($where = ''){
        return $this->db->query("select a.username, a.no_tps, a.dpt, b.nama as kabupaten, c.nama as kecamatan, d.nama as kelurahan, e.nama as provinsi from tps a, wilayah b, wilayah c, wilayah d, wilayah e $where");   
    } 

    public function getSuaraMasuk($where = ''){
        return $this->db->query("select a.*, b.id_detail, b.id_pasangan, b.hasil_suara, d.foto as foto_ketua, d.nama_lengkap as nama_ketua, f.nama_lengkap as nama_wakil, f.foto as foto_wakil, b.created_at FROM suara a, detail_suara b, pasangan_calon c, nama_pasangan d, nama_pasangan f, calon_aktif e $where");   
    } 

    public function cekData($where = ''){
        return $this->db->query("select * from suara a, detail_suara b $where");   
    }

    //start update suara
    public function updateSuara($where = ''){
        return $this->db->query("update suara $where");
    }

    public function updateDetailSuara($where = ''){
        return $this->db->query("update detail_suara $where");
    }

    public function updateSuaraTemporary($where = ''){
        return $this->db->query("update suara_temporary $where");
    }

    public function updateDetailSuaraTemporary($where = ''){
        return $this->db->query("update detail_suara_temporary $where");
    }
    //end update suara
    
    //start Detail DPT
    public function kecamatan($where = ''){
        return $this->db->query("select a.id_kecamatan, b.nama as kecamata From kecamatan a, wilayah b $where");
    }
    public function kelurahan($where = ''){
        return $this->db->query("select substr(kode,10,4) as id_kelurahan, nama as kelurahan From wilayah $where");
    }
    public function tps($where = ''){
        return $this->db->query("select * From tps $where");
    }
    public function searchTPS($where = ''){
        return $this->db->query("select * From dpt a, tps b $where");
    }
}