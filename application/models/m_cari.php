<?php
class M_cari extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function cari()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from surat_masuk where tanggal_masuk like '%$cari%' ");
		return $data->result();
	}

	public function cari_tamu()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from buku_tamu where tanggal like '%$cari%' ");
		return $data->result();
	}
}
?>