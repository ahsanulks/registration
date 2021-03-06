<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Spipu\Html2Pdf\Html2Pdf;

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('users');
		$this->load->model('confirmations');
		$this->load->library('dates');
		$this->load->library('sendmail');
	}

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('pages/registration_member');
		$this->load->view('layouts/footer');
	}

	public function register_action(){
		$recaptcha = new \ReCaptcha\ReCaptcha(SECRET);
		$resp = $recaptcha->verify($this->input->post('g-recaptcha-response'), $this->input->server('REMOTE_ADDR'));
		if ($resp->isSuccess() === FALSE) {
			$this->session->set_userdata('notif', false);
        	redirect(base_url('registration'));
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->generate_input_validation());
		if ($this->form_validation->run() == FALSE){
        	$this->session->set_userdata('notif', false);
        	redirect(base_url('registration'));
        }
        else{
        	$data = $this->get_post_data();	
        	$query = http_build_query($data);
        	$this->generate_form_registration_pdf($query, $this->input->post('nik'));

        	$data['tanggal_lahir'] = $this->dates->change_format($data['tanggal_lahir']);
        	$this->users->create($data);

        	$this->sendmail->send_to(ADMIN_EMAIL, 'testing', 'testing bosq', base_url('assets/pdf/'.$this->input->post('nik').'.pdf'));
        	$this->sendmail->send_to($data['email'], 'testing', 'testing bosq');
        	$this->session->set_userdata('notif', true);
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
       	$html2pdf->output(SAVE_PDF.$nik.'.pdf', 'F');
	}

	public function generate_input_validation(){
		$config = array(
		        array('field' => 'nik','label' => 'NIK', 'rules' => 'required'),
		        array('field' => 'nama', 'label' => 'Nama', 'rules' => 'required'),
		        array('field' => 'tempat_lahir', 'label' => 'Tempat Lahir', 'rules' => 'required'),
		        array('field' => 'tanggal_lahir', 'label' => 'Tanggal Lahir', 'rules' => 'required'),
		        array('field' => 'golongan', 'label' => 'Grade', 'rules' => 'required'),
		        array('field' => 'jabatan', 'label' => 'Jabatan', 'rules' => 'required'),
		        array('field' => 'alamat', 'label' => 'Alamat rumah', 'rules' => 'required'),
		        array('field' => 'email', 'label' => 'Email', 'rules' => 'required')
		);
		return $config;
	}

	public function get_post_data(){
		return $data = array(
        		'nik' => $this->input->post('nik'),
        		'nama' => $this->input->post('nama'),
        		'tempat_lahir' => $this->input->post('tempat_lahir'),
        		'tanggal_lahir' =>$this->input->post('tanggal_lahir'),
        		'golongan' => $this->input->post('golongan'),
        		'jabatan' => $this->input->post('jabatan'),
        		'alamat' => $this->input->post('alamat'),
        		'email' => $this->input->post('email')
        	);
	}

	public function register_confirmation(){
		$this->load->view('layouts/header');
		$this->load->view('pages/registration_confirmation');
		$this->load->view('layouts/footer');
	}

	public function register_confirmation_action(){
		$recaptcha = new \ReCaptcha\ReCaptcha(SECRET);
		$resp = $recaptcha->verify($this->input->post('g-recaptcha-response'), $this->input->server('REMOTE_ADDR'));
		if ($resp->isSuccess() != TRUE) {
			$this->session->set_userdata('notif', false);
        	redirect(base_url('confirmation-registration'));
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->validation_confirmation());
		if ($this->form_validation->run() === FALSE){
        	$this->session->set_userdata('notif', false);
            redirect(base_url('confirmation-registration'));
        }
        else{
			$data = $this->get_post_confirmation();
			$this->load->library('uploads');
			$path = $this->uploads->upload_file('file', 'pdf|zip');
			if ($path === FALSE) {
				$this->session->set_userdata('notif', false);
            	redirect(base_url('confirmation-registration'));
			}

			$data['file_path'] = $path;
			$data['action'] = 'registration_confirmation';
			$this->confirmations->create($data);
			
			$this->load->library('sendmail');
			$this->sendmail->send_to(ADMIN_EMAIL, 'testing', 'testing bosq', $path);
        	$this->session->set_userdata('notif', true);
			redirect(base_url('confirmation-registration'));
		}
	}

	public function get_post_confirmation(){
		return $data = array(
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'unit_kerja' => $this->input->post('unit_kerja'),
	        'unit' => $this->input->post('unit')
		);
	}

	public function validation_confirmation(){
		$config = array(
	        array('field' => 'nama', 'label' => 'Nama', 'rules' => 'required'),
	        array('field' => 'unit', 'label' => 'Unit', 'rules' => 'required'),
			array('field' => 'nik','label' => 'NIK', 'rules' => 'required')
		);
		return $config;
	}
}