<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_tamu extends CI_Controller {
    public function __construct()
	{
		parent ::__construct();
		//Load Dependencies
		$this->load->helper('url');
        $this->load->library('pagination');
        $this->load->database();
        $this->load->model('m_datatamu');
		$this->load->model('m_caritamu');
    }
    

    public function index(){
        $this->load->database();
		$jumlah_data = $this->m_datatamu->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'buku_tamu/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 15;
		$from = $this->uri->segment(3);
		
		//Tambahan untuk styling
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
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
        $config['first_link']='< Pertama ';
        $config['last_link']='Terakhir > ';
        $config['next_link']='> ';
        $config['prev_link']='< ';
		$this->pagination->initialize($config);		
		$data['user'] = $this->m_datatamu->data($config['per_page'],$from);
		$this->load->view('buku_tamu',$data);

	}


    
	public function action_add()
	{

        
        $tanggal = $this->input->post('tanggal');
        $nama_tamu = $this ->input->post('nama_tamu');
        $pekerjaan_tamu = $this ->input->post('pekerjaan_tamu');
        $alamat_tamu = $this ->input->post('alamat_tamu');
        $keperluan = $this->input->post('keperluan');
        $saran_tamu = $this->input->post('saran_tamu');

		$data = array(
			
            
            'tanggal' => $tanggal,
            'nama_tamu' => $nama_tamu,
            'pekerjaan_tamu' => $pekerjaan_tamu,
            'alamat_tamu' => $alamat_tamu,
            'keperluan' => $keperluan,
            'saran_tamu' =>$saran_tamu

		);

		$this -> db-> insert('buku_tamu',$data);
		redirect ('buku_tamu');
	}


	//Update one item
	public function update($id = NULL)
	{
		$this -> db-> where('id',$id);
		$data['content'] = $this -> db-> get('buku_tamu');
		$this -> load -> view('admin/update_tamu',$data);	
	}
	public function action_update($id='')
	{
        $tanggal = $this->input->post('tanggal');
        $nama_tamu = $this ->input->post('nama_tamu');
        $pekerjaan_tamu = $this ->input->post('pekerjaan_tamu');
        $alamat_tamu = $this ->input->post('alamat_tamu');
        $keperluan = $this->input->post('keperluan');
        $saran_tamu = $this->input->post('saran_tamu');

		$data = array(
			
            
            'tanggal' => $tanggal,
            'nama_tamu' => $nama_tamu,
            'pekerjaan_tamu' => $pekerjaan_tamu,
            'alamat_tamu' => $alamat_tamu,
            'keperluan' => $keperluan,
            'saran_tamu' =>$saran_tamu

		);
		$this -> db-> where('id',$id);
		$this -> db-> update('buku_tamu',$data);
		redirect ('buku_tamu');
	}
	//Delete one item
	public function delete($id = NULL)
	{
		$this -> db-> where('id',$id);
		$this -> db-> delete('buku_tamu');

		redirect ('buku_tamu');	
	}
	//Search item
	public function hasil()
	{
		$data3['user'] = $this->m_caritamu->cari_tamu();
		$this->load->view('buku_tamu', $data3);
	}
}