<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
//-----------------------------------RUAS JALAN-----------------------
     function kehadiran(){
        $query = $this->db->query('SELECT *,pegawai.nama, kehadiran.nip FROM `kehadiran` LEFT JOIN keterangan on keterangan.id_ket=kehadiran.id_ket LEFT JOIN sub_keterangan on sub_keterangan.id_sub=kehadiran.id_sub LEFT JOIN pegawai on pegawai.nip=kehadiran.nip');
        return $query->result_array();
    }

    function tambah_data($data){
       $this->db->insert('kehadiran', $data);
       return TRUE;
    }
//--------------------------------------------------------------------

//-----------------------------------LOGIN-----------------------------------------------
 function login($username, $password) {
        
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('pass', MD5($password));
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }
//----------------------------------------------------------------------------------------

}