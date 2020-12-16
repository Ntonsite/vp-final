<?php
/*
 * Audit Controller fetch audit data and display it into restricted view
 * @Author Ntonsite Mwamlima
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Audit extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('audit_model');

		$this->load->library('session');

		//session capturing
		$data['id'] = $this->session->userdata('user_id');
		$this->load->view('includes/header', $data);
	}
	public function index(){
		$data['result'] = $this->audit_model->getAudits();

		$this->load->view('audit', $data);
	}
}
