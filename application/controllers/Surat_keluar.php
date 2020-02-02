<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library('pagination');
		$this->load->database();
		$this->load->model('m_carik');
		$this->load->model('m_keluar');
	}
	public function index()
	{
		// konfigurasi class pagination
		// $config['base_url']=base_url()."surat_keluar/index";
		// $config['total_rows']= $this->db->query("SELECT * FROM surat_keluar;")->num_rows();
		// $from = $this->uri->segment(3);
		// $config['per_page']=15;
		// $config['num_links'] = 2;
		// $config['uri_segment']=3;
		// $config['first_link']='< Pertama ';
		// $config['last_link']='Terakhir > ';
		// $config['next_link']='> ';
		// $config['prev_link']='< ';

		// //Tambahan untuk styling
		// $config['full_tag_open'] = "<ul class='pagination'>";
		// $config['full_tag_close'] ="</ul>";
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';
		// $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		// $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		// $config['next_tag_open'] = "<li>";
		// $config['next_tagl_close'] = "</li>";
		// $config['prev_tag_open'] = "<li>";
		// $config['prev_tagl_close'] = "</li>";
		// $config['first_tag_open'] = "<li>";
		// $config['first_tagl_close'] = "</li>";
		// $config['last_tag_open'] = "<li>";
		// $config['last_tagl_close'] = "</li>";
		// $config['first_link']='< Pertama ';
		// $config['last_link']='Terakhir > ';
		// $config['next_link']='> ';
		// $config['prev_link']='< ';
		// $this->pagination->initialize($config);

		// // konfigurasi model dan view untuk menampilkan data
		// $this->load->model('m_keluar');
		// $data['user']=$this->m_keluar->getAll($config);
		$this->load->database();
		$jumlah_data = $this->m_keluar->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . "surat_keluar/index";
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 15;
		$from = $this->uri->segment(3);

		//Tambahan untuk styling
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['first_link'] = '< Pertama ';
		$config['last_link'] = 'Terakhir > ';
		$config['next_link'] = '> ';
		$config['prev_link'] = '< ';
		$this->pagination->initialize($config);
		$data['user'] = $this->m_keluar->data($config['per_page'], $from);
		$this->load->view('surat_keluar', $data);
	}
	public function action_add()
	{
		$no_surat =  $this->input->post('no_surat');
		$tanggal = $this->input->post('tanggal');
		$pengirim = $this->input->post('pengirim');
		$tujuan = $this->input->post('tujuan');
		$perihal = $this->input->post('perihal');
		$lampiran = $this->input->post('lampiran');

		//uplod file
		$config['upload_path']          = './uploads/surat_keluar/';
		$config['allowed_types']        = 'doc|docx|pdf';
		$config['file_name'] 			= $no_surat;
		$config['overwrite']			= TRUE;
		$config['max_size']             = 9000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		
		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('upload_form', $error);
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				$data = array(
					'no_surat' => $no_surat,
					'tanggal' => $tanggal,
					'pengirim' => $pengirim,
					'tujuan' => $tujuan,
					'perihal' => $perihal,
					'lampiran' => $lampiran,
					'pdf_keluar'=>$no_surat
				);
				
				$this->db->insert('surat_keluar', $data);
				redirect('surat_keluar');
				
		}

		
	}
	//Update one item
	public function update($id = NULL)
	{
		$this->db->where('id', $id);
		$data['content'] = $this->db->get('surat_keluar');
		$this->load->view('admin/update_keluar', $data);
	}
	public function action_update($id = '')
	{
		$data = array(
			'no_surat' => $this->input->post('no_surat'),
			'tanggal' => $this->input->post('tanggal'),
			'pengirim' => $this->input->post('pengirim'),
			'tujuan' => $this->input->post('tujuan'),
			'perihal' => $this->input->post('perihal'),
			'lampiran' => $this->input->post('lampiran')
		);
		$this->db->where('id', $id);
		$this->db->update('surat_keluar', $data);
		redirect('surat_keluar');
	}
	//Delete one item
	public function delete($id = NULL)
	{
		$this->db->where('id', $id);
		$this->db->delete('surat_keluar');
		redirect('surat_keluar');
	}
	public function hasil()
	{
		$data2['user'] = $this->a_cari_keluar->cari();
		$this->load->view('surat_keluar', $data2);
	}
	function search_keyword()
	{
		$keyword    	= $this->input->post('keyword');
		$data['user']   = $this->m_carik->search($keyword);
		$this->load->view('surat_keluar', $data);
	}
}
