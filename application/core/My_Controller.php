<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*@author Ntonsite Mwamlima
*@version 1.0
*/
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('Auth_AD');
		$this->load->model('user');
	}

	public function isLoggedIn(){
		/*Checking if a user data is available in a session*/
		if(!$this->session->has_userdata('logged_in'))
		{
			redirect('user');
		}
	}

	public function isExpire(){
		// check against the AD if account has expired.
	}
}
?>