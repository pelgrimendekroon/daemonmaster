<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Overview extends DM_UI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/overview
	 *	- or -  
	 * 		http://example.com/index.php/overview/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/overview/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->viewloader('overview/overview');
	}
}

/* End of file overview.php */
/* Location: ./application/controllers/overview.php */