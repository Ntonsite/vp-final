<?php
/**
*@author  Ntonsite Mwamlima. 
   May 2020
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class License extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('Vendor_model');
        $this->load->model('License_model');
        $this->load->library('session');

        //session capturing
        $data['id'] = $this->session->userdata('user_id');
        $data['title'] = "Vendor Management Portal";
        $this->load->view('includes/header', $data);
    }
	public function index() {

        $id             = $this->session->userdata('user_id');
        $data['result'] = $this->License_model->getAllData($id);
        $data['vendor'] = $this->Vendor_model->getVendors($id);
     
		$this->load->view('lcView', $data);
    }

    public function create() {
        if(!empty($_FILES['file']['name'])){
            
            // Set preferences
            $config['upload_path'] = 'uploads/licenses/';    
            $config['allowed_types'] = 'pdf|docx|doc';
            $config['max_size']    = '100000'; // max_size in kb
            $config['file_name'] = $_FILES['file']['name'];
                
            //Load upload library
            $this->load->library('upload',$config);         
            
            // File upload
            if($this->upload->do_upload('file')){
                // Get data about the file
                $uploadData = $this->upload->data();
                
                $filename = $uploadData['file_name'];
                $data['response'] = 'successfully uploaded '.$filename;
            }else{
                $data['response'] = 'failed';
            }
        }else{
            $data['response'] = 'failed';

        }
        if (!empty($filename)) {
            $license_data = array (
                'license_name'       => $this->input->post('license_name'),
                'description'        => $this->input->post('description'),
                'activations_number' => $this->input->post('activations_number'),
                'date_of_expiry'     => $this->input->post('date_of_expiry'),
                'vendorID'           => $this->input->post('vendor'),
                'user_id'            => $this->session->userdata('user_id'),
                'file'               => $filename
            );
        }

        // calling a model and post Data
        if (!empty($license_data)) {
            $this->License_model->createData($license_data);

            $this->session->set_flashdata('license_save','success');
            redirect('license');
        }
    }

    public function edit($id) {
        $data['row']    = $this->License_model->getData($id);
        $data['vendor'] = $this->Vendor_model->getVendors($id);
     
        $this->load->view('lcEdit', $data);
    }


    public function update($id) {
        if(!empty($_FILES['file']['name'])){
            
            // Set preference
            $config['upload_path'] = 'uploads/licenses/';    
            $config['allowed_types'] = 'pdf|docx|doc';
            $config['max_size']    = '100000';
            $config['file_name'] = $_FILES['file']['name'];
                
            //Load upload library
            $this->load->library('upload',$config);         
            
            // File upload
            if($this->upload->do_upload('file')){
                // Get data about the file
                $uploadData = $this->upload->data();
                
                $filename = $uploadData['file_name'];
                $data['response'] = 'successfully uploaded '.$filename;
            }else{
                $data['response'] = 'failed';
            }
        }else{
            $data['response'] = 'failed';

        }
        $data['row']    = $this->License_model->getData($id);

        if (!empty($filename)) {
            if($filename){
                $license_data = array (
                    'license_name'       => $this->input->post('license_name'),
                    'description'        => $this->input->post('description'),
                    'activations_number' => $this->input->post('activations_number'),
                    'date_of_expiry'     => $this->input->post('date_of_expiry'),
                    'vendorID'           => $this->input->post('vendor'),
                    'user_id'            => $this->session->userdata('user_id'),
                    'file'               => $filename
                );
                $this->License_model->updateData($id,$license_data);
                $this->session->set_flashdata('license_update','success');
                redirect("License");
            }else
            {
                $license_data = array (
                    'license_name'       => $this->input->post('license_name'),
                    'description'        => $this->input->post('description'),
                    'activations_number' => $this->input->post('activations_number'),
                    'date_of_expiry'     => $this->input->post('date_of_expiry'),
                    'vendorID'           => $this->input->post('vendor'),
                    'user_id'            => $this->session->userdata('user_id'),
                    'file'               => $filename
                );
                $this->License_model->updateData($id,$license_data);
                $this->session->set_flashdata('license_update','success');
                redirect("License");

            }
        }
    }

    public function delete($id) {
        $this->License_model->deleteData($id);
        redirect("License");
    }    
}
