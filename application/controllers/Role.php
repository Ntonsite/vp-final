<?php 
/**
* Written by Ntonsite Mwamlima
*/
class Role extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Role_model');
		$this->load->library('session');

        //session capturing
        $data['id'] = $this->session->userdata('user_id');
		$this->load->view('includes/header', $data);
	}

	/*Role CRUD functions*/
	public function index(){

		$data['result'] = $this->Role_model->getRoles();
		$this->load->View('roleView', $data);
	}

	public function createRole() {
	  
	    $role_data = array (
	        'name'   => $this->input->post('role_name')
	    );
	    
	    $this->Role_model->createData($role_data);
	    redirect("role");
	}

	public function editRole($id) {
	    $data['row'] = $this->Role_model->getRole($id);
	    $this->load->view('roleEdit', $data);
	}

	public function update($id) {

	    $role_data = array (
	        'name'  => $this->input->post('role_name')
	    );
	    $this->Role_model->updateData($id, $role_data);
	    redirect("role");
	}

	public function delete($id) {
	    $this->Role_model->deleteData($id);
	    redirect("role");
	}
}
?>
