<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends DM_UI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/install
	 *	- or -  
	 * 		http://example.com/index.php/install/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/overview/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Install_model', '', TRUE);
	} 
	 
	public function index()
	{
		$data['modules'] = $this->Install_model->getModules();
		$this->viewloader("install/install", $data);
	}
	
	public function app($place, $module)
	{
		$this->Install_model->install_module($place, $module);
		$this->index();
	}	
}

/* End of file install.php */
/* Location: ./application/modules/controllers/install.php */