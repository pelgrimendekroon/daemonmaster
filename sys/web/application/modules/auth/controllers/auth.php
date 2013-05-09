<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Auth controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/overview
	 *	- or -  
	 * 		http://example.com/index.php/overview/index
	 */

	public function index()
	{
		$this->viewloader("auth/loginform");
		
	}
	
		public function login()
	{
		$this->load->helper('url');	

		$this->load->view("auth/loginform");
	}
	
	public function check_login()
	{
		$this->load->helper('url');	  
  		$this->load->library('session');
		$this->load->library('auth_lib');
		$this->load->model('auth_model', '', TRUE);
		$this->session->sess_destroy();
		
		$pw = $this->input->post('password',TRUE);
		$un = $this->input->post('username',TRUE);
		
		if($un==NULL)
		{
		  echo("did you forget to enter your username?"); 
		  die();
		}
		
		if($pw==NULL)
		{
		  echo("did you forget to use a password?"); 
		  die();
		}
		
		$hash = $this->auth_lib->generate_hash($un, $pw);
		echo $hash;
		$query = $this->auth_model->auth($hash, $un);
		echo "test";
		$status = $this->auth_lib->process_inlog($query);
		
		if($status==1)
			redirect(site_url('overview'));
		elseif($status==2)
			echo("Account is niet actief!");
		else
			echo("Inloggen mislukt");
	}

	public function logout()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$this->session->sess_destroy();	
		redirect('auth/login');
		exit(0);
	}
}

/* End of file overview.php */
/* Location: ./application/controllers/overview.php */