<?php
/**
*@author Ntonsit Mwamlima
*
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract extends CI_Controller
{
    public function __construct()
	{
        parent:: __construct();
        $this->load->database();
        $this->load->model('Contract_model');
        $this->load->model('vendor_model');

        //load some library
        $this->load->library('Auth_AD');
        $this->load->library('session');

         //session capturing
        $data['TRUE'] = $this->session->userdata('logged_in');
        $data['id'] = $this->session->userdata('user_id');
        $data['title'] = 'Vendor Management Portal';
        $this->load->view('includes/header', $data);        
       
    }

	public function index () {

            $id             = $this->session->userdata('user_id');
            $data['vendor'] = $this->vendor_model->getVendors();
            $data['result'] = $this->Contract_model->getData($id);

            $this->load->view('conView', $data);

    }

    public function create() {
        if(!empty($_FILES['file']['name'])){
            
            // Set preference
            $config['upload_path']   = 'uploads/contracts/';    
            $config['allowed_types'] = 'pdf|docx|doc';
            $config['max_size']      = '100000';
            $config['file_name']     = $_FILES['file']['name'];

            // utilizing the upload library
            $this->load->library('upload', $config);


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
            $contract_data = array (
                'contract_name'   => $this->input->post('contract_name'),
                'description'     => $this->input->post('description'),
                'date_of_start'    => $this->input->post('date_of_start'),
                'date_of_expiry'  => $this->input->post('date_of_expiry'),
                'vendorID'        => $this->input->post('vendor'),
                'user_id'         => $this->session->userdata('user_id'),
                'file'            => $filename
            );
        }

        // calling a model and post Data
        if (!empty($contract_data)) {
            $this->Contract_model->createData($contract_data);

            $this->session->set_flashdata('contract_save','success');
            redirect('Contract');
        }


    }

    /**
     * @param $id
     */
    public function edit($id) {
        $data['vendor'] = $this->vendor_model->getVendors($id);
        $data['row']    = $this->Contract_model->getContract($id);
        
        
        $this->load->view('conEdit', $data);
    }

    /**
     * @param $id
     */

    public function update($id) {
        if(!empty($_FILES['file']['name'])){
            
            // Set preference
            $config['upload_path'] = 'uploads/contracts/';    
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
        $data['row']    = $this->Contract_model->getContract($id);

        if(!$filename){
            $contract_data = array (
                'contract_name'  => $this->input->post('contract_name'),
                'description'    => $this->input->post('description'),
                'date_of_start'  => $this->input->post('date_of_start'),
                'date_of_expiry' => $this->input->post('date_of_expiry'),
                'vendorID'       => $row->vendorID,
                'user_id'        => $this->session->userdata('user_id'),
                'file'           => $row->file
            );
            $this->Contract_model->updateData($id, $contract_data);
            $this->session->set_flashdata('contract_update','success');
            redirect("Contract");
        }else{
            $contract_data = array (
                'contract_name'  => $this->input->post('contract_name'),
                'description'    => $this->input->post('description'),
                'date_of_start'  => $this->input->post('date_of_start'),
                'date_of_expiry' => $this->input->post('date_of_expiry'),
                'vendorID'       => $row->vendorID,
                'user_id'        => $this->session->userdata('user_id'),
                'file'           => $filename
            );
            $this->Contract_model->updateData($id, $contract_data);
            $this->session->set_flashdata('contract_update','success');
            redirect("Contract");
        }
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $this->Contract_model->deleteData($id);
        redirect("Contract");
    } 
}
