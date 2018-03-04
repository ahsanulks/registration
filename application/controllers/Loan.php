<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Spipu\Html2Pdf\Html2Pdf;

class Loan extends CI_Controller {

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('pages/loan');
		$this->load->view('layouts/footer');
	}

	public function loan_acction(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->generate_input_validation());

		if ($this->form_validation->run() == FALSE){
            $this->load->view('layouts/header');
			$this->load->view('pages/loan');
			$this->load->view('layouts/footer');
        }
        else{
        	$data = array(
        		'ktp' => $this->input->post('ktp'),
        		'nama' => strtoupper($this->input->post('nama')),
        		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        		'alamat' => $this->input->post('alamat'),
        		'gender' => $this->input->post('gender'),
        		'pasangan' => $this->input->post('pasangan'),
        		'unit_kerja' => $this->input->post('unit_kerja'),
        		'unit' => $this->input->post('unit'),
        		'nik' => $this->input->post('nik'),
        		'jabatan' => $this->input->post('jabatan'),
        		'golongan' => $this->input->post('golongan'),
        		'pinjaman' => $this->input->post('pinjaman'),
        		'pinjaman_deskripsi' => $this->input->post('pinjaman_deskripsi'),
        		'waktu' => $this->input->post('waktu'),
        		'jenis_pinjaman' => $this->input->post('jenis_pinjaman'),
        		'keperluan' => $this->input->post('keperluan'),
        	);
        	$query = http_build_query($data);
        	$this->generate_pdf($query, $data['nik']);

			$this->load->library('sendmail');
			$this->sendmail->send_to('ahsanulkh996@gmail.com', 'testing', 'testing bosq', base_url('assets/pdf/pinjaman-'.$data['nik'].'.pdf'));
			redirect(base_url('permohonan-pinjaman'));
        }
	}

	public function generate_input_validation(){
		$config = array(
	        array('field' => 'ktp','label' => 'KTP', 'rules' => 'required'),
	        array('field' => 'nama', 'label' => 'Nama', 'rules' => 'required'),
	        array('field' => 'tanggal_lahir', 'label' => 'Tanggal Lahir', 'rules' => 'required'),
	        array('field' => 'alamat', 'label' => 'Alamat rumah', 'rules' => 'required'),
	        array('field' => 'gender', 'label' => 'Jenis Kelamin', 'rules' => 'required'),
	        array('field' => 'pasangan', 'label' => 'Nama Pasangan', 'rules' => 'required'),
	        array('field' => 'unit', 'label' => 'Unit', 'rules' => 'required'),
			array('field' => 'nik','label' => 'NIK', 'rules' => 'required'),
	        array('field' => 'jabatan', 'label' => 'Jabatan', 'rules' => 'required'),
	        array('field' => 'golongan', 'label' => 'Grade', 'rules' => 'required'),
	        array('field' => 'pinjaman', 'label' => 'Uang Pinjaman', 'rules' => 'required'),
	        array('field' => 'pinjaman_deskripsi', 'label' => 'Uang Pinjaman (huruf)', 'rules' => 'required'),
	        array('field' => 'keperluan', 'label' => 'Keperluan', 'rules' => 'required'),
	        array('field' => 'policy', 'label' => 'Pernyataan', 'rules' => 'required'),
		);
		return $config;
	}

	public function generate_pdf($query, $nik){
		$html2pdf = new Html2Pdf('P', 'A4', 'en');
        $html2pdf->pdf->SetTitle('Pengajuan Pinjaman');
        $html2pdf->pdf->SetSubject('Permohonan Pegajuan Pinjaman Koperasi \"BUDI SETIA\"');
        $html2pdf->pdf->SetMargins(15, 10, 15);
        $html2pdf->pdf->SetFont('Times', '', 12);

        $pages = array(
        	'loan/persetujuan_credit?'.$query,
        	'loan/pengajuan_pinjaman?'.$query,
        	'loan/pernyataan?'.$query,
        	'loan/surat_kuasa?'.$query,
        	'loan/surat_kuasa_pemotongan_penghasilan?'.$query,
        	'loan/surat_persetujuan_pasangan?'.$query
        );

        foreach ($pages as $page) {
	        $html2pdf->pdf->AddPage();
	        $html2pdf->pdf->WriteHTML(file_get_contents(base_url($page)), true, false, true, false, '');
	        $html2pdf->pdf->lastPage();
        }
       	$html2pdf->output(SAVE_PDF.'pinjaman-'.$nik.'.pdf', 'F');
	}

	public function persetujuan_credit(){
		$data = array(
			'nama' => $this->input->get('nama'),
			'unit' => $this->input->get('unit'),
			'jenis_pinjaman' => $this->input->get('jenis_pinjaman'),
			'pinjaman' => $this->input->get('pinjaman')
		);
		$this->load->view('loan/persetujuan_kredit', $data); 
	}

	public function pengajuan_pinjaman(){ 
		$data = array(
			'nama' => $this->input->get('nama'),
			'unit_kerja' => $this->input->get('unit_kerja'),
			'unit' => $this->input->get('unit'),
			'golongan' => $this->input->get('golongan'),
			'jabatan' => $this->input->get('jabatan'),
			'jenis_pinjaman' => $this->input->get('jenis_pinjaman'),
			'pinjaman' => $this->input->get('pinjaman'),
			'pinjaman_deskripsi' => $this->input->get('pinjaman_deskripsi'),
			'keperluan' => $this->input->get('keperluan'),
			'waktu' => $this->input->get('waktu')
		);
		$this->load->view('loan/pengajuan_pinjaman', $data); 
	}

	public function pernyataan(){
	 	$data = array(
			'nama' => $this->input->get('nama'),
			'nik' => $this->input->get('nik'),
			'unit_kerja' => $this->input->get('unit_kerja'),
			'unit' => $this->input->get('unit'),
			'golongan' => $this->input->get('golongan'),
			'jabatan' => $this->input->get('jabatan')
		);
		$this->load->view('loan/surat_pernyataan', $data); 
	}

	public function surat_kuasa(){ 
		$data = array(
			'nama' => $this->input->get('nama'),
			'nik' => $this->input->get('nik'),
			'unit_kerja' => $this->input->get('unit_kerja'),
			'unit' => $this->input->get('unit'),
			'golongan' => $this->input->get('golongan'),
			'jabatan' => $this->input->get('jabatan')
		);
		$this->load->view('loan/surat_kuasa', $data); 
	}

	public function surat_kuasa_pemotongan_penghasilan(){ 
		$data = array(
			'nama' => $this->input->get('nama'),
			'nik' => $this->input->get('nik'),
			'unit_kerja' => $this->input->get('unit_kerja'),
			'unit' => $this->input->get('unit'),
			'golongan' => $this->input->get('golongan'),
			'jabatan' => $this->input->get('jabatan')
		);
		$this->load->view('loan/surat_kuasa_pemotongan_gaji', $data); 
	}

	public function surat_persetujuan_pasangan(){ 
		$data = array(
			'nama' => $this->input->get('nama'),
			'nik' => $this->input->get('nik'),
			'unit_kerja' => $this->input->get('unit_kerja'),
			'unit' => $this->input->get('unit'),
			'golongan' => $this->input->get('golongan'),
			'jabatan' => $this->input->get('jabatan'),
			'pasangan' => $this->input->get('pasangan'),
			'alamat' => $this->input->get('alamat'),
			'gender' => $this->input->get('gender'),
			'ktp' => $this->input->get('ktp')
		);
		$this->load->view('loan/surat_persetujuan_pasangan', $data); 
	}
}