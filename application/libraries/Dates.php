<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dates {

    public function change_format($date, $toggle = true){
    	$time = strtotime($date);
		return $newformat = $toggle ? date('Y-m-d',$time) : date('d-m-Y',$time);
    }
}