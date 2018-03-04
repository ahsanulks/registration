<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Spipu\Html2Pdf\Html2Pdf;

class Register extends CI_Controller {

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('pages/registration_member');
		$this->load->view('layouts/footer');
	}

	public function register_action(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->generate_input_validation());

		if ($this->form_validation->run() == FALSE){
            $this->load->view('layouts/header');
			$this->load->view('pages/registration_member');
			$this->load->view('layouts/footer');
        }
        else{
        	$data = array(
        		'nik' => $this->input->post('nik'),
        		'nama' => $this->input->post('nama'),
        		'tempat_lahir' => $this->input->post('tempat_lahir'),
        		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        		'golongan' => $this->input->post('golongan'),
        		'jabatan' => $this->input->post('jabatan'),
        		'alamat' => $this->input->post('alamat')
        	);
        	$query = http_build_query($data);
        	$pdf = $this->generate_form_registration_pdf($query, $this->input->post('nik'));
        	// $this->send_mail('ahsanulkh996@gmail.com', $this->input->post('nik'));
        	redirect(base_url('registration'));
        }
	}

	public function form(){
		$data['nama'] = $this->input->get('nama'). ' /' .$this->input->get('nik');
		$data['ttl'] = $this->input->get('tempat_lahir'). ', '.$this->input->get('tanggal_lahir');
		$data['golongan'] = $this->input->get('golongan');
		$data['jabatan'] = $this->input->get('jabatan');
		$data['alamat'] = $this->input->get('alamat');
		$this->load->view('pages/form', $data);
	}

	public function generate_form_registration_pdf($query, $nik){
		$html2pdf = new Html2Pdf('P', 'A4', 'en');
        $html2pdf->pdf->SetTitle('Pendaftaran');
        $html2pdf->pdf->SetSubject('Permohonan Menjadi Anggota Koperasi \"BUDI SETIA\"');
        $page = file_get_contents(base_url('register/form?'.$query));
        $html2pdf->pdf->SetMargins(20, 5, 20);
        $html2pdf->pdf->SetFont('Times', '', 10);
        $html2pdf->pdf->AddPage();
        $html2pdf->pdf->WriteHTML($page, true, false, true, false, '');
        $html2pdf->pdf->lastPage();
       	$html2pdf->output('C:\xampp\htdocs\registrasi/assets/pdf/'.$nik.'.pdf', 'F');
	}

	public function generate_input_validation(){
		$config = array(
		        array('field' => 'nik','label' => 'NIK', 'rules' => 'required'),
		        array('field' => 'nama', 'label' => 'Nama', 'rules' => 'required'),
		        array('field' => 'tempat_lahir', 'label' => 'Tempat Lahir', 'rules' => 'required'),
		        array('field' => 'tanggal_lahir', 'label' => 'Tanggal Lahir', 'rules' => 'required'),
		        array('field' => 'golongan', 'label' => 'Grade', 'rules' => 'required'),
		        array('field' => 'jabatan', 'label' => 'Jabatan', 'rules' => 'required'),
		        array('field' => 'alamat', 'label' => 'Alamat rumah', 'rules' => 'required')
		);
		return $config;
	}

	public function send_mail($email, $nik){
		$config = Array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'ahsanulkh996@gmail.com',
		    'smtp_pass' => 'sugnncblgivhchro',
		    'mailtype'  => 'html', 
		    'charset'   => 'utf-8'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

        $this->email->from('ahsanulkh996@gmail.com', 'hello');
        $this->email->to($email); 

        $this->email->subject('Email Test');
        $this->email->message('hello');
        $this->email->attach(base_url('assets/pdf/'.$nik.'.pdf'));  
		$this->email->send();
	}
}