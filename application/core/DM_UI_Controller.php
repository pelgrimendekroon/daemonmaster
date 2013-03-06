<?php
class DM_UI_Controller extends DM_Base_Controller
{
 function __construct()
 {
  parent::__construct();
		$this->load->view('base/header');	
 }


	public function viewloader($views)
	{
		if(isset($views))
		{
			//If array user wants to load multiple views
			if(is_array($views))
			{
				//code to load more views
			}
			//user wants to load a single view
			else
			{
				$this->load->view('base/header');
				$this->load->view($views);
				$this->load->view('base/footer');	
			}
		}
		else
			show_404();
	}
}
?>