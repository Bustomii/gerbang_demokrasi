<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class MobileModel extends Model {

    protected $table = 'panitia';

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

    public function cekPanitia($where = ''){
        return $this->db->query("select * from panitia $where");   
    } 
    
    public function detailPanitia($id = false)
    {
        if($id == false){
            return $this->findAll();
        } else {
            return $this->getWhere(['username' => $id])->getRowArray();
        }
    }

    public function detailPanitia1($where = ''){
        return $this->db->query("select a.username, a.no_tps, b.nama as kabupaten, c.nama as kecamatan, d.nama as kelurahan, e.nama as provinsi from panitia a, wilayah b, wilayah c, wilayah d, wilayah e $where");   
    } 

    public function getSuaraMasuk($where = ''){
        return $this->db->query("select a.*, b.id_detail, b.id_pasangan, b.hasil_suara, d.foto as foto_ketua, d.nama_lengkap as nama_ketua, f.nama_lengkap as nama_wakil, f.foto as foto_wakil, b.created_at FROM suara a, detail_suara b, pasangan_calon c, nama_pasangan d, nama_pasangan f, calon_aktif e $where");   
    } 

    public function cekData($where = ''){
        return $this->db->query("select * from suara a, detail_suara b $where");   
    }

    public function updateSuara($where = ''){
        return $this->db->query("update suara $where");
    }

    public function updateDetailSuara($where = ''){
        return $this->db->query("update detail_suara $where");
    }
}