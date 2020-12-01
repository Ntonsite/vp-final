<?php
/**
* Written by Ntonsite Mwamlima. 
   May 2019
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class ContractOverdue extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('Contract_model');
       
    }
	public function index() {      
        
        $data['result'] = $this->Contract_model->getOverdues();
        $this->load->view('includes/header');
        $this->load->view('conOverdue', $data);
        
    }

    public function edit($id) {
        $data['row'] = $this->Contract_model->getData($id);
        $this->load->view('includes/header');
        $this->load->view('conEdit', $data);
    }

    public function update($id) {
        if(!empty($_FILES['file']['name'])){
            
            // Set preference
            $config['upload_path'] = 'uploads/contracts/';    
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
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
        $contract_data = array (
            'contract_name'  => $this->input->post('contract_name'),
            'description'    => $this->input->post('description'),
            'date_of_expiry' => $this->input->post('date_of_expiry'),
            'file'           => $filename
        );

        $this->Contract_model->updateData($id, $contract_data);
        redirect("Contract");
    }

    public function delete($id) {
        $this->Contract_model->deleteData($id);
        redirect("ContractOverdue");
    }
    
}