<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Overview_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	public function retrieve_scenarios()
	{
			return R::find('scenarios');
	}	
}