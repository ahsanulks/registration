<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('pages/registration_member');
		$this->load->view('layouts/footer');
	}

	public function register_action(){
		$this->form_validation->set_rules($this->generate_input_validation());
		
		if ($this->form_validation->run() == FALSE){
            $this->load->view('layouts/header');
			$this->load->view('pages/registration_member');
			$this->load->view('layouts/footer');
        }
        else{
            $this->load->view('formsuccess');
        }
	}

	public function generate_input_validation(){
		$config = array(
		        array(
	                'field' => 'nik',
	                'label' => 'NIK',
	                'rules' => 'required'
		        ),
		        array(
	                'field' => 'nama',
	                'label' => 'Nama',
	                'rules' => 'required'
		        ),
		        array(
	                'field' => 'tempat_lahir',
	                'label' => 'Tempat Lahir',
	                'rules' => 'required'
		        ),
		        array(
	                'field' => 'tanggal_lahir',
	                'label' => 'Tanggal Lahir',
	                'rules' => 'required'
		        ),
		        array(
	                'field' => 'grade',
	                'label' => 'Grade',
	                'rules' => 'required'
		        ),
		        array(
	                'field' => 'jabatan',
	                'label' => 'Jabatan',
	                'rules' => 'required'
		        ),
		        array(
	                'field' => 'alamat',
	                'label' => 'Alamat rumah',
	                'rules' => 'required'
		        )
		);
		return $config;
	}
}