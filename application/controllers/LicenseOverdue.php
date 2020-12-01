<?php
/**
* Written by Ntonsite Mwamlima. 
   May 2019
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class LicenseOverdue extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('License_model');
    }

	public function index() {
        $data['result'] = $this->License_model->getOverdues();
        $this->load->view('includes/header');
		$this->load->view('lcOverdue', $data);
    }
    
    public function edit($id) {
        $data['row'] = $this->License_model->getData($id);
        $this->load->view('includes/header');
        $this->load->view('lcEdit', $data);
    }

    public function update($id) {
        if(!empty($_FILES['file']['name'])){
            
            // Set preference
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
        $license_data = array (
            'license_name'       => $this->input->post('license_name'),
            'description'        => $this->input->post('description'),
            'activations_number' => $this->input->post('activations_number'),
            'date_of_expiry'     => $this->input->post('date_of_expiry'),
            'file'               => $filename
        );
        $this->License_model->updateData($id,$license_data);
        redirect("License");
    }

    public function delete($id) {
        $this->License_model->deleteData($id);
        redirect("LicenseOverdue");
    }
    
}