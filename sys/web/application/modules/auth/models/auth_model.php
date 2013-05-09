<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * Auth_model
	 * Written by: John de Kroon
	 */

class Auth_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	//getting user while loggin in
	public function auth($pw, $email)
	{
		$this->db->select('id, email, active, role');
		$query = $this->db->get_where('users', array('email' => $email, 'password' => $pw), 1);
		echo "test";
		return $query;		
	}
	
	//log attempt	
	public function insert_attempt($data)
	{
		$this->db->insert('loginAttempts', $data); 
	}
	
	//prevent bruteforing
	public function get_last_logs($id)
	{
		$this->db->select('reason');
  		$this->db->where('uid', $id);
		$this->db->order_by("time", "desc"); 
		$query = $this->db->get('loginAttempts', 5);
		
				foreach ($query->result() as $row)
				  {
						 if(($row->reason)!=3)
						 {
							return 1;
							die;
						 }
				  }
		$query->free_result();
	}
	
	//ban a user
	public function ban_user($id)
	{
		$this->db->where('id', $id);
		$this->db->update('users', array('active' => 0)); 	
	}
	
	//log when inlog fails
	public function login_fail($email, $reason, $ip)
	{
		$id = NULL;
		$this->db->select('id');
		$query = $this->db->get_where('users', array('email' => $email));
		$row = $query->row(0);
		$id = $row->id;			
		$data = array('uid' =>  $id, 'reason' => $reason, 'ip' => $ip);			
		$this->db->insert('loginAttempts', $data); 
		return $id;
		$query->free_result();
	}
	
	//look for rights
	public function check_admin_rights($id)
	{
		$this->db->select('role');
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		$row = $query->row(0);
		return $row->role;
	}
}

?>