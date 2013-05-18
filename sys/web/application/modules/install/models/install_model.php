<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Install_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	public function retrieve_overview()
	{
		return R::find('modules');
	}
	
	public function getModules()
	{
		$result = $this->getModulesFromDir(array(0 => 'mon', 1 => 'action'));
		return $result;
	}
	
	private function getModulesFromDir($places)
	{
		$count = 0;
		foreach($places as $place)
		{
			$dirs = array_filter(glob("../../../".$place."/*"), 'is_dir');
			foreach($dirs as $dir)
			{
					$module = end(explode("/", $dir));			
					$result[$module] = $this->getModule($dir, $module, $place);
			}
		}
		return $result;
	}
	
	private function getModule($dir, $module, $type = null)
	{
		  $module = end(explode("/", $dir));
		  $result['errors'] = 0;
		  if(is_dir($dir."/install"))
		  {
			  $manifest = simplexml_load_file($dir."/install/manifest.xml") or die("kan niet laden");
			  $result['module'] = $module;
			  $result['type'] = (string) $manifest->type;
			  $result['invoke'] = (string) $manifest->invoke;
			  $result['description'] = (string) $manifest->description[0];
			  $result['version'] = (int) $manifest->version;
			  $i = 0;

				  foreach((array) $manifest->inputs as $input)
				  {
						$result['parms'][$i]['required'] = (bool) $input['required'];
						$result['parms'][$i]['parm'] = (string)$input->parm;
						$result['parms'][$i]['name'] = (string)$input->name;
						$result['parms'][$i]['description'] = (string)$input->description;
						$i++;
				  }

			  $result['installed'] = R::count('modules','module = ?', array($module));
		  }
		  else
		  {
			  $result['module'] = $module;
			  $result['errors'] = 1;
			  $result['description'] = "Deze applicatie kan niet worden ge&iuml;nstalleerd";
			  $result['type'] = $type;
		  }
		  return $result;
	}
	
	public function install_module($place, $module)
	{
		$dir = "../../../".$place."/".$module;
		$info = $this->getModule($dir, $module);
		if(R::count('modules','module = ?', array($module)) > 0)
		{
			show_error("Module is al ge&iuml;nstalleerd!", 500);
		}
		else
		{
			
			if($info['errors']==0)
			{
				$newmod = R::dispense('modules');
				$newmod->module = $info['module'];
				$newmod->type = $info['type'];
				$newmod->invoke = $info['invoke'];
				$newmod->description = $info['description'];
				$newmod->version = $info['version'];
				$newmod->enabled = 0;
				R::store($newmod);

				foreach($info['parms'] as $parm)
				{
					$newparm = R::dispense('parms');
					$newparm->name = $parm['name'];
					$newparm->parm = $parm['parm'];
					$newparm->desc = $parm['description'];
					R::store($newparm);
					$newparm->modules = $newmod;
					R::store($newparm);
				}
			}
		}
	}
	
	public function toggle_app($appid, $state)
	{
		$this->db->update('modules', array('enabled' => $state), "id = ".$appid);			
	}
}