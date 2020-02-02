
<?php
class M_caritamu extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}


	public function cari_tamu()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from buku_tamu where tanggal like '%$cari%' ");
		return $data->result();
	}
}
?>