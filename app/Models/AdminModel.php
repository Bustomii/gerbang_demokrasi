<?php
namespace App\Models;
 
use CodeIgniter\Model;
 
class AdminModel extends Model {

    function userlogin($where = ''){
        return $this->db->query("select * FROM user $where");
    }

    function dataPanitia($where = ''){
        return $this->db->query("select a.username,
        (SELECT nama as provinsi FROM wilayah b WHERE b.kode = a.id_provinsi)as provinsi,
        (SELECT nama as kab FROM wilayah c WHERE c.kode = concat(a.id_provinsi,'.',a.id_kab_kota))as kabupaten ,
        (SELECT nama as kec FROM wilayah d WHERE d.kode = concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan))as kecamatan ,
        (SELECT nama as kel FROM wilayah e WHERE e.kode = concat(a.id_provinsi,'.',a.id_kab_kota,'.',a.id_kecamatan,'.',a.id_kelurahan)) as kelurahan,
        a.no_tps, a.password, a.id $where");
    }
    
    function dataPasanganCalon($where = ''){
        return $this->db->query("select a.*, b.nama as kabupaten, c.*, d.foto as foto_ketua, 
        d.nama_lengkap as nama_ketua, e.foto as foto_wakil, e.nama_lengkap as nama_wakil 
        from calon_aktif a, wilayah b, pasangan_calon c, nama_pasangan d, nama_pasangan e $where");
    }

    function hasilsuara($where = ''){
        return $this->db->query("select a.id_detail, b.admin, a.id_pasangan, d.no_urut, e.nama_lengkap as walikota, f.nama_lengkap as wakilwalikota,
        a.hasil_suara FROM detail_suara a, suara b, calon_aktif c, pasangan_calon d, nama_pasangan e, 
        nama_pasangan f, suara g $where");
    }
    
    function generatePanitia($where = ''){
        return $this->db->query("select * FROM tps $where");
    }
    
    //Done
    function createPanitia($colomn){
        return $this->db->table('tps')->insert($colomn);
    }

    //Start Suara Final
    function dataSuara($where  = ''){
        return $this->db->query("select f.*, a.username, a.no_tps, b.nama as kabupaten, c.nama as kecamatan, d.nama as kelurahan, e.nama as provinsi from tps a, wilayah b, wilayah c, wilayah d, wilayah e, suara f  $where");   
    }
    function validasisuara($where = ''){
        return $this->db->query("update suara $where");
    }
    function batalvalidasi($where = ''){
        return $this->db->query("update suara $where");
    }
    function cekEvaluasi($where = ''){
        return $this->db->query("select * FROM suara $where");
    }
    //end Suara Final

    function lastvalid($where = ''){
        return $this->db->query("select * FROM kirim $where");
    }

    // add createCalon by fuad
    function createCalon($data1, $data2){
        return $this->db->table('nama_pasangan')->insert($data1);
        return $this->db->table('nama_pasangan')->insert($data2);
   }
    // end createCalon

    //Suara Validasi
    function total_dpt($where = ''){
        return $this->db->query("select SUM(dpt) as total_dpt FROM tps $where");
    }
    function total_tps($where = ''){
        return $this->db->query("select * FROM tps $where");
    }
    function total_suara_rusak($where = ''){
        return $this->db->query("select SUM(suara_tidak_sah) as rusak FROM suara $where");
    }
    function total_suara_masuk($where = ''){
        return $this->db->query("select SUM(total_suara) as masuk FROM suara $where");
    }
    function total_suara_sah($where = ''){
        return $this->db->query("select SUM(suara_sah) as sah FROM suara $where");
    }
    function total_suara_dpt($where = ''){
        return $this->db->query("select SUM(pengguna_DPT) as dpt FROM suara $where");
    }
    function grafik_temporary($where = ''){
        return $this->db->query("select a.id_pasangan, d.no_urut, e.nama_lengkap as walikota, f.nama_lengkap as wakilwalikota,(
            SELECT SUM(z.hasil_suara) as hasil_suara FROM detail_suara_temporary z $where");
    }

    //kirim database
    function kirimSuara(){
        return $this->db->query("select * from suara");
    }
    function kirimDetailSuara(){
        return $this->db->query("select * from detail_suara");
    }
    //end kirim database
}