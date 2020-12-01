<?php
/**
* Written by Ntonsite Mwamlima.
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('Contract_model');
        $this->load->model('License_model');
        $this->load->library('email');
        $this->load->model('Vendor_model');
        $this->load->library('session');

        //session ID capturing
        $data['id'] = $this->session->userdata('user_id');
        $data['title'] = "Vendor Management Portal";
        $this->load->view('includes/header', $data);
    }
	public function index() {      
        
        $id                   = $this->session->userdata('user_id');
        $data['result']       = $this->Contract_model->getCount($id);
        $data['lresult']      = $this->License_model->getCount($id);
        $data['overContract'] = $this->Contract_model->getOverdue($id);
        $data['overLicense']  = $this->License_model->getOverdue($id);
        $data['vendorNo']     = $this->Vendor_model->getCountVendor($id);
        $data['contractD']    = $this->Contract_model->contractOnDeadlines($id);
        $data['lcsD']         = $this->License_model->licenseOnDeadlines($id);
        
        //passing data to a view
        $this->load->view('dashView', $data);
    }
}
