<?php 
 
class M_datatamu extends CI_Model{

	function data($number,$offset){
		return $query = $this->db->get('buku_tamu',$number,$offset)->result();		
	}

	
 
	function jumlah_data(){
		return $this->db->get('buku_tamu')->num_rows();
	}

}
?>