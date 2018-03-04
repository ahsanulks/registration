<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Spipu\Html2Pdf\Html2Pdf;

class Loan extends CI_Controller {

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('pages/loan');
		$this->load->view('layouts/footer');
	}

	public function generate_pdf(){
		$html2pdf = new Html2Pdf('P', 'A4', 'en');
        $html2pdf->pdf->SetTitle('Pengajuan Pinjaman');
        $html2pdf->pdf->SetSubject('Permohonan Pegajuan Pinjaman Koperasi \"BUDI SETIA\"');
        $page = file_get_contents(base_url('loan/persetujuan_credit'));
        $html2pdf->pdf->SetMargins(15, 10, 15);
        $html2pdf->pdf->SetFont('Times', '', 12);

        $pages = array(
        	'loan/persetujuan_credit',
        	'loan/pengajuan_pinjaman',
        	'loan/pernyataan',
        	'loan/surat_kuasa',
        	'loan/surat_kuasa_pemotongan_penghasilan',
        	'loan/surat_persetujuan_pasangan'
        );

        foreach ($pages as $page) {
	        $html2pdf->pdf->AddPage();
	        $html2pdf->pdf->WriteHTML(file_get_contents(base_url($page)), true, false, true, false, '');
	        $html2pdf->pdf->lastPage();
        }
       	$html2pdf->output('C:\xampp\htdocs\registrasi/assets/pdf/'.'tes123'.'.pdf', 'F');
	}

	public function persetujuan_credit(){ $this->load->view('loan/persetujuan_kredit'); }

	public function pengajuan_pinjaman(){ $this->load->view('loan/pengajuan_pinjaman'); }
	public function pernyataan(){ $this->load->view('loan/surat_pernyataan'); }
	public function surat_kuasa(){ $this->load->view('loan/surat_kuasa'); }
	public function surat_kuasa_pemotongan_penghasilan(){ $this->load->view('loan/surat_kuasa_pemotongan_gaji'); }
	public function surat_persetujuan_pasangan(){ $this->load->view('loan/surat_persetujuan_pasangan'); }
}