<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail {

    public function send_to($email, $subject, $message, $attach = null)
    {
    	$CI =& get_instance();
    	$config = Array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => '',
		    'smtp_pass' => '',
		    'mailtype'  => 'html', 
		    'charset'   => 'utf-8'
			);
			$CI->load->library('email', $config);
			$CI->email->set_newline("\r\n");

	    $CI->email->from('ahsanulkh996@gmail.com', 'hello');
	    $CI->email->to($email); 

	    $CI->email->subject($subject);
	    $CI->email->message($message);

	    if ($attach != null) {
	    	$CI->email->attach($attach);
	    } 

		$CI->email->send();
    }
}