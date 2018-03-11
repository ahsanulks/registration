<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads {

    public function upload_file($file, $allowed_type){
    	$config['upload_path']          = './uploads/';
    	$config['file_name']			= 'confirmation-'.time();
        $config['allowed_types']        = $allowed_type;
        $config['max_size']             = 2000;
        $CI =& get_instance();
        $CI->load->library('upload', $config);
    	if ( ! $CI->upload->do_upload($file))
        {
            return false;
        }
        else
        {
        	return $CI->upload->data('full_path');
        }
    }
}