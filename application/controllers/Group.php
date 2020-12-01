<?php 
/**
* Written by Ntonsite Mwamlima
*/
class Group extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Group_model');

		$this->load->library('session');

        //session capturing
        $data['id'] = $this->session->userdata('user_id');
		$this->load->view('includes/header', $data);
	}

	public function index(){

		$data['result'] = $this->Group_model->getGroups();
	
		$this->load->View('groupView', $data);
	}

	public function createGroup() {
	  
	    $group_data = array (
	        'name'   => $this->input->post('group_name')
	    );
	    
	    $this->Group_model->createData($group_data);
	    redirect("group");
	}

	public function editGroup($id) {
	    $data['row'] = $this->Group_model->getGroup($id);
	   
	    $this->load->view('groupEdit', $data);
	}

	public function update($id) {

	    $group_data = array (
	        'name'  => $this->input->post('name')
	    );
	    $this->Group_model->updateData($id, $group_data);
	    redirect("group");
	}

	public function delete($id) {
	    $this->Group_model->deleteData($id);
	    redirect("group");
	}
}
?>
