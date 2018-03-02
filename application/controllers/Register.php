<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('pages/registration_member');
		$this->load->view('layouts/footer');
	}

	public function register_action(){
		var_dump($this->input->post(NULL, TRUE));
	}
}