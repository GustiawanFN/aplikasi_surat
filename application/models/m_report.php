<?php 
 
class M_report extends CI_Model{

    function report_suratmasuk(){
        return $this->db->get('surat_masuk');

        // $result=$query->result_array();
    }

    
    function report_suratkeluar(){
        return $this->db->get('surat_keluar');

        // $result=$query->result_array();
    }

    
    function report_bukutamu(){
        return $this->db->get('buku_tamu');

        // $result=$query->result_array();
    }

    

 

}
?>