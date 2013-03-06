<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

#############################################
#											#
#	Auth_lib v0.1							#
#	Written by John	de Kroon				#
#	For more info: johndekroon.nl			#
#											#
#############################################			

class Auth_lib {

    public function __construct()
    {
        // Do something with $params
    }
	
	public function check_logged_in()
	{
		$CI =& get_instance();
		if($CI->session->userdata('active'))
		  {
			return 1;
		  }
		else
		  {
			redirect(site_url('auth/login'));
			die();
		  }
	}
	
	public function return_rights()
	{
		$CI =& get_instance();
		$CI->load->model('auth_model', '', TRUE);
		$id = $CI->session->userdata('id');
		$user_lvl = $CI->auth_model->check_admin_rights($id);
		return $user_lvl;
	}
	
	public function check_admin_rights($lvl)
	{
		$CI =& get_instance();
		$CI->load->model('auth_model', '', TRUE);
		$id = $CI->session->userdata('id');
		$user_lvl = $CI->auth_model->check_admin_rights($id);
		if($lvl>=$user_lvl)
		{
			return 1;
		}
		else
		{
			echo("U heeft onvoldoende rechten om deze pagina te bekijken.");
			die();
		}
	}
	
	public function generate_hash($user, $pass)
	{
		$pw_hashed = sha1($pass);
		$salt = "ahjg#&gojt!fJfgH6#@$";
		$pre_hash = $pw_hashed.$salt.$user;
		return sha1($pre_hash);
	}
	
	public function process_inlog($query)
	{
		$CI =& get_instance();
		$CI->load->model('auth_model', '', TRUE);
		$row = $query->first_row('array');
		$CI->session->set_userdata($query->first_row('array'));
			
		if(($CI->session->userdata('id')>0)&&($CI->session->userdata('active')))
		  {
			  $data = array('uid' => $CI->session->userdata('id'), 'reason' => '1' , 'ip' => $CI->input->ip_address());	
			  $CI->auth_model->insert_attempt($data);
			  $id=$CI->session->userdata('id');
			  $query = $query->row(0);
			   return(1);
			  exit(0);
		  }
		elseif(($CI->session->userdata('id')>0)&&($CI->session->userdata('active')==0))
		  {
			  $data = array('uid' =>  $CI->session->userdata('id'), 'reason' => '2' , 'ip' => $CI->input->ip_address());	
			  $CI->auth_model->insert_attempt($data);
			  return(2);
			  exit(0);
		  }
		else
		  {
			  $id = $CI->auth_model->login_fail($un, 3, $CI->input->ip_address());
			  if($id!=NULL)
			  {
				 $is_not_failure = $CI->auth_model->get_last_logs($id);
				if($is_not_failure!=1)
				{
					print("You are a failure! <br />");
					print_r($is_not_failure);
					$CI->auth_model->ban_user($id);
				}
				
			  }
			  return(3);
			  exit(0);	
		  }
	}
}

?>