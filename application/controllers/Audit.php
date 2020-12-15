<?php
/*
 * Audit Controller fetch audit data and display it into restricted view
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Audit extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('User_model');
		$this->load->model('Group_model');
		$this->load->model('Role_model');
		$this->load->library('session');
	}
	public function index(){
		echo "all set";
	}
}
