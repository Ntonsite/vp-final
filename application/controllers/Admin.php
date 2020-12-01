 <?php
/**
* Written by Ntonsite Mwamlima. 
   May 2019
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() 
    {
        parent:: __construct();
        $this->load->model('User_model');
        $this->load->model('Group_model');
        $this->load->model('Role_model');
        $this->load->library('session');
    }

	public function index() {

        $data['result'] = $this->User_model->getUsers();
        $data['role'] = $this->Role_model->getRoles();
        $data['group'] = $this->Group_model->getGroups();
        $this->load->view('includes/header');
        $this->load->view('main', $data);        
    }
    public function create() {
      
        $user_data = array (
            'user_name'   => $this->input->post('name'),
            'role'=> $this->input->post('role'),
            'groups'=> $this->input->post('group')
        );
        
        $this->User_model->createData($user_data);
        redirect("admin");
    }

    public function edit($id) {
        $data['row'] = $this->User_model->getData($id);
        $data['role'] = $this->Role_model->getRoles();
        $data['group'] = $this->Group_model->getGroups();
        $this->load->view('includes/header_admin');
        $this->load->view('UserEdit', $data);
    }

    public function update($id) {
        $user_data = array (
            'user_name'  => $this->input->post('user_name'),
            'role'  => $this->input->post('role'),
            'user_id'=> $this->input->post('id'),
            'groups'  => $this->input->post('group'),
            'is_active'  => $this->input->post('status')
        );

        $this->User_model->updateData($id, $user_data);
        redirect("admin");
    }



    public function delete($id) {
        $this->User_model->deleteData($id); 
        redirect("admin");
    }

}
