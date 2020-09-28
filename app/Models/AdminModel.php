<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class AdminModel extends Model {

    function dataPanitia($where = ''){
        return $this->db->query("select b.nama as kabupaten, c.nama as kecamatan, d.nama as kelurahan, 
        a.id_panitia, a.nama_lengkap, a.username, a.no_tps, a.foto, a.no_ktp FROM panitia a, wilayah b, 
        wilayah c, wilayah d $where;");
    }
    
    function dataPasanganCalon($where = ''){
        return $this->db->query("select a.*, b.nama as kabupaten, c.*, d.foto as foto_ketua, 
        d.nama_lengkap as nama_ketua, e.foto as foto_wakil, e.nama_lengkap as nama_wakil 
        from calon_aktif a, wilayah b, pasangan_calon c, nama_pasangan d, nama_pasangan e $where");
    }
    
    function generatePanitia($where = ''){
        return $this->db->query("select * FROM tps $where");
    }
    
    function createPanitia($colomn){
        return $this->db->table('panitia')->insert($colomn);
    }

    function dataSuara($where  = ''){
        return $this->db->query("select f.*, a.username, a.no_tps, b.nama as kabupaten, c.nama as kecamatan, d.nama as kelurahan, e.nama as provinsi from panitia a, wilayah b, wilayah c, wilayah d, wilayah e, suara f  $where");   
    }

    // add createCalon by fuad
    function createCalon($data1, $data2){
        return $this->db->table('nama_pasangan')->insert($data1);
        return $this->db->table('nama_pasangan')->insert($data2);
   }

    // end createCalon

}