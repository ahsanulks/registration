<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Spipu\Html2Pdf\Html2Pdf;

class Loan extends CI_Controller {

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('pages/loan');
		$this->load->view('layouts/footer');
	}
}