<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package         Auth_AD
 * @subpackage      example
 * @author          Ntonsite Mwamlima
 */

class Auth extends CI_Controller
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('User_model');
		
		// this loads the Auth_AD library. You can also choose to autoload it (see config/autoload.php)
		$this->load->library('Auth_AD');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('login');
	}
	
	public function login()
	{
		// read the form fields, lowercase the username for neatness
		$username = strtolower($this->input->post('user_name'));

		$password = sha1($this->input->post('user_password'));
		
		$data = $this->auth_ad->login($username, $password);
		$localUser = $this->User_model->check_local_user($username);

		// check the login
		if($data || $localUser)
		{			
			$this->session->set_userdata('user_id', $localUser['user_id']);
			$this->session->set_userdata('cn');
			$this->session->set_userdata('username', $localUser['user_name']);
			$this->session->set_userdata('dn');
			$this->session->set_userdata('logged_in');

			$this->session->set_userdata('role', $localUser['role']);
			$this->session->set_userdata('group', $localUser['groups']);

			// Redirects where a user should go after loggedIn after session Role identified
			
			if($localUser['role']=='1'){
				$this->session->set_flashdata('$success_msg;', 'Loggedin Successfully.');
				redirect("dashboard");
			}else{
				//redirecting and displaying message to the user
				$this->session->set_flashdata('$success_msg;', 'Loggedin Successfully.');
				redirect('dashboard');				
			}
		}
		else
		{
			$this->session->set_flashdata('error_msg', 'You can not login, Check your account.');
			redirect('auth');
		}
	}

    /**
     * Function to logout a user
     */
	public function logout()
	{
		// perform the logout
		if($this->session->userdata('logged_in')) 
		{
			$data['name'] = $this->session->userdata('cn');
			$data['username'] = $this->session->userdata('username');
			$data['logged_in'] = true;
			$this->load->view('login');
		} 
		else 
		{
			$this->session->sess_destroy();
			$this->load->view('login');
			$data['logged_in'] = false;
		}
		
		// now that the logout is done, you can add code for the next step(s) here
	}
	
	public function checkloginstatus()
	{
		// check if the user is already logged in
		if(!$this->auth_ad->is_authenticated())
		{
			redirect('auth');
		}
		else 
		{
			redirect('dashboard');

		}
	}
	
	public function useringroup()
	{
		// check if the user is a member of a particular group (recursive search)
        if (!empty($username)) {
            if (!empty($groupname)) {
                if ($this->auth_ad->in_group($username, $groupname))
                {
                    // the user is a member of the group
                }
                else
                {
                    // nope, not a member
                }
            }
        }
	}

	public function restrict(){
		$this->load->view('restricted');
	}
}
