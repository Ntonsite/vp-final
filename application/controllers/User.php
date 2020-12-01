<?php
/**
* Written by Ntonsite Mwamlima. 
   May 2019
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
        $id = $this->session->set_userdata('user_id');
	}

	public function index()
	{
		$this->load->view('admin');
	}
	public function login()
	{
		$user_login=array(

		'user_name'=>$this->input->post('user_name'),
		'user_password'=>md5($this->input->post('user_password'))
	     );
	  $data = $this->user_model->login_user($user_login['user_name'],$user_login['user_password']);
	  
	    if($data)
	    {
	      $this->session->set_userdata('user_id',$data['user_id']);
	      $this->session->set_userdata('user_email',$data['user_email']);
	      $this->session->set_userdata('user_name',$data['user_name']);
	      $this->session->set_userdata('role', $data['role']);

	      // Redirects where a user should go
	      
	      if($data['role']=='2'){
				redirect("admin");
			}else{
				//redirecting and displaying message to the user
				$this->session->set_flashdata('$success_msg;', 'Loggedin Successfully.');
				redirect('dashboard');
			}
	    }
	    else{
	    	$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
	    	$this->load->view('login');
	    }
	}

	public function changePassword()
	{
        $oldpass       = md5($this->input->post('old_password'));
        $new_cpassword = md5($this->input->post('new_cpassword'));   
        $id = $this->session->userdata('user_id');
       
        $user_data = md5($this->input->post('new_password'));


        if($this->user_model->updatePassword($id, $user_data)){

        	redirect('user/logout');
        }else
        {
        	return false;
        }       
	}

	public function password_check($oldpass)
	{
	    $id = $this->session->userdata('user_id');
	    $user = $this->user_model->getData($id);

	    if($user->user_password == $oldpass) {
	        
	        return true;
	    }

	    return false;
	}
	
	public function logout(){

	  $this->session->sess_destroy();
	  redirect('user');
	}
}
