<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Report extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		
		$this->load->model('m_report');
	}
	
    
    public function laporan_pdf(){

        $data ['surat_masuk'] = $this->m_report->report_suratmasuk()->result();

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'Landscape');
        $this->pdf->filename = "laporan-surat-masuk.pdf";
        $this->pdf->load_view('table_report', $data);
    
    
    }

    public function laporan_keluar(){

        $data ['surat_keluar'] = $this->m_report->report_suratkeluar()->result();
    
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'Landscape');
        $this->pdf->filename = "laporan-surat-keluar.pdf";
        $this->pdf->load_view('report_surat_keluar', $data);
    
    
    }

    public function laporan_bukutamu(){

        $data ['buku_tamu'] = $this->m_report->report_bukutamu()->result();
    
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'Landscape');
        $this->pdf->filename = "laporan-buku-tamu.pdf";
        $this->pdf->load_view('report_buku_tamu', $data);
    
    
    }
}
?>