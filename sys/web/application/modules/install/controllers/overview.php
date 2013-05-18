<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Overview extends DM_UI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('Install_model', '', TRUE);		
	}
			
	public function index()
	{
		$data['modules'] = $this->Install_model->retrieve_overview();
		$this->viewloader("install/overview", $data);
	}
	
	public function toggle_app($appid, $status)
	{	
		$this->Install_model->toggle_app($appid, $status);
		$this->index();
	}
}
?>