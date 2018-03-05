<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulation extends CI_Controller {

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('pages/simulation');
		$this->load->view('layouts/footer');
	}

	public function calculate_loan(){
		$pinjaman = $this->input->get('pinjaman');
		$bunga = $this->input->get('bunga');
		$waktu = $this->input->get('waktu');

		$loan = $pinjaman + ($pinjaman * str_replace(',', '.', $bunga)/100);
		$response['loan'] = number_format($loan,2,",",".");
		$response['installment'] = $this->calculate_installment($loan, $waktu);

		echo json_encode($response);
	}

	public function calculate_installment($loan, $waktu){
		return number_format($loan/$waktu,0,",",".").',00';
	}
}

	