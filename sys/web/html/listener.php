<?php
if($_POST['pass'] == "dfjao$fdoikgjTYUrjfw4") //since it is on Github it isn't safe anymore -_-'
{
	require("../../daemon/core/rb.php");
	if(isset($_POST['ok']))
		invoke_action("OK", $_POST);
	else if(isset($_POST['warning']))
		invoke_action("WARNING", $_POST);
	else if(isset($_POST['error']))
		invoke_action("ERROR", $_POST);
	else	
		echo "Enjoy your wasted minute...";
}
else
	echo "Enjoy your wasted minute...";
	
function invoke_action($status, $input)
{
	R::setup('mysql:host=localhost;dbname=daemonmaster', 'daemonmaster','LE8wvQ6mGhch2tKX'); //mysql
	$scenario = R::getRow("SELECT * FROM modules INNER JOIN `scenarios` on scenarios.mon_id = modules.id where module=?", array($input['mon']));
	
	$act = R::load("modules", $scenario['act_id']);
	
	if($status !== $scenario['last_status'])
	{
		system("../../../action/".$act->module."/".$act->invoke." --module online --status $status");
		$scenario = R::load("scenarios", $scenario['id']);
		$scenario->last_status = $status;
		R::store($scenario);
	}
}