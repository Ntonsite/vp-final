<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attachment extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('attachment_model');
        $this->load->model('vendor_model');
        $this->load->library('session');
        $this->load->library('toastr');
        $data['title'] = "Vendor Management Portal";

        $this->load->view('includes/header', $data);
    }

    public function index(){
//        load all vendors available to add attachments
        $data['result']      = $this->vendor_model->getVendors();
        $data['attachments'] = $this->attachment_model->getAllData();
        $this->load->view('attachment_view', $data);
    }

    public function create(){
//    function to create attachment for a specific vendor
        if(!empty($_FILES['file']['name'])){

            // Set preference
            $config['upload_path']   = 'uploads/attachments/';
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
            $attachment_data = array (
                'name'   => $this->input->post('attach_name'),
                'vendorID'      => $this->input->post('vendor'),
                'file'          => $filename
            );
        }

        // calling a modal and post Data
        // calling a model and post Data
        if (!empty($attachment_data)) {
            $this->attachment_model->createData($attachment_data);

            $this->session->set_flashdata('attachment_save','success');
            redirect('attachment');
        }
    }

    public function edit($id) {

        $data['result'] = $this->vendor_model->getVendors();
        $data['row']    = $this->attachment_model->getData($id);

        $this->load->view('attach_edit', $data);
    }

    public function update($id) {
        if(!empty($_FILES['file']['name'])){

            // Set preference
            $config['upload_path'] = 'uploads/attachments/';
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
        $data['row']    = $this->attachment_model->getData($id);

        if (!empty($filename)) {
            if(!$filename){

                $attachment_data = array (
                    'name'   => $this->input->post('attach_name'),
                    'vendorID'      => $this->input->post('vendor'),
                    'file'          => $filename

                );
                $this->attachment_model->updateData($id, $attachment_data);
                redirect("Contract");
            }else{
                $attachment_data = array (
                    'name'   => $this->input->post('attach_name'),
                    'vendorID'      => $this->input->post('vendor')

                );
                $this->attachment_model->updateData($id, $attachment_data);
                $this->session->set_flashdata('attachment_update','success');
                redirect("attachment");
            }
        }
    }

    public function delete($id) {
        $this->attachment_model->deleteData($id);
        redirect("attachment");
    }
}
