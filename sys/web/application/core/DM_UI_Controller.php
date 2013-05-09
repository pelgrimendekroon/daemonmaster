<?php
class DM_UI_Controller extends DM_Base_Controller
{
 function __construct()
 {
  parent::__construct();
 }

	public function viewloader($views, $parms = NULL)
	{
		if(isset($views))
		{
			$header['un'] = $this->session->userdata('email');
			//If array user wants to load multiple views
			if(is_array($views))
			{
				$this->load->view('base/header', $header);
				foreach ($views as $key => $view) 
				{
					echo $key;
					$data = $parms[$key];
    				$this->load->view($view, $data);
				}
				$this->load->view('base/footer');	
			}
			//user wants to load a single view
			else
			{
				$this->load->view('base/header', $header);
				$this->load->view($views, $parms);
				$this->load->view('base/footer');	
			}
		}
		else
			show_404();
	}
}
?>