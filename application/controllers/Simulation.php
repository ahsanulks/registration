<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulation extends CI_Controller {

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('pages/simulation');
		$this->load->view('layouts/footer');
	}

	public function calculate_loan(){
		$pinjaman = str_replace('.', '', $this->input->get('pinjaman'));
		$waktu = $this->input->get('waktu');
		$bunga = $this->get_interest($waktu, $this->input->get('jenis_pinjaman'));
		$response['installment'] = $this->calculate_installment($pinjaman, $waktu, $bunga);

		echo json_encode($response);
	}

	public function calculate_installment($loan, $time, $interest){
		$installment = ($loan*$interest/100*12)/$time;
		return number_format($installment,0,",",".").',00';
	}

	public function get_interest($time, $loan_type){
		if ($loan_type == 'berjaminan' && 1 <= $time && $time <= 6) {
			return 1.5;
		}
		else if ($loan_type == 'berjangka' && 12 <= $time && $time <= 36) {
			return 0.833;
		}
		else if ($loan_type == 'multiguna' && 48 <= $time && $time <= 84) {
			return 0.75;
		}
		else if ($loan_type == 'multiguna' && 96 <= $time && $time <= 120) {
			return 0.867;
		}
		else{
			return 1;
		}
	}

	public function get_time(){
		$loan_type = $this->input->get('jenis_pinjaman');
		switch ($loan_type) {
			case 'berjaminan':
				$time = [6];
				break;
			case 'berjangka':
				$time = [12,24,36];
				break;
			case 'multiguna':
				$time = [48,60,72,84];
				break;
			default:
				$time = [96,108,120];
				break;
		}
		echo json_encode($time);
	}
}