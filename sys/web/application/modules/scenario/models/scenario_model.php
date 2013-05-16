<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Scenario_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	public function retrieve_mods($mode)
	{
		if($mode==="mon")
			return R::find('modules', 'type = "mon" AND enabled = 1');
		else if($mode==="act")
			return R::find('modules', 'type = "act" AND enabled = 1');
		else
			show_error('No valid mod type!' , 500);
	}
	
	public function create_scenario($input)
	{
		if(isset($input['name'], $input['description'], $input['mon'], $input['act']))
		{
				$scenario = R::dispense('scenarios');
				$scenario->name = $input['name'];
				$scenario->description = $input['description'];
				R::store($scenario);
				$scenario->mon = R::load('modules', $input['mon']);
				$scenario->act = R::load('modules', $input['act']);
				R::store($scenario);				
		}
		else
			show_error('Please fill in all the fields.' , 500);
	}
	
}