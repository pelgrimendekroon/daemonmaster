<?php
session_start(); // start up your PHP session! 
require_once('header.php');

error_reporting(E_NONE); //Setting this to E_ALL showed that that cause of not redirecting were few blank lines added in some php files.

$db_config_path = '../../application/config/database.php';

// Only load the classes in case the user submitted the form
if($_POST) {

	// Load the classes and create the new objects
	require_once('includes/core_class.php');
	require_once('includes/database_class.php');

	$core = new Core();
	$database = new Database();


	// Validate the post data
	if($core->validate_post($_POST) == true)
	{

		// First create the database, then create tables, then write config file
		if($database->create_database($_POST) == false) {
			$message = $core->show_message('error',"The database could not be created, please verify your settings.");
		} else if ($database->create_tables($_POST) == false) {
			$message = $core->show_message('error',"The database tables could not be created, please verify your settings.");
		} else if ($core->write_config($_POST) == false) {
			$message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
		}

		// If no errors, redirect to registration page
		if(!isset($message)) {
		  $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
      $redir .= "://".$_SERVER['HTTP_HOST'];
      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      $redir = str_replace('install/','',$redir); 
		}

	}
	else {
		$message = $core->show_message('error','Not all fields have been filled in correctly. The host, username, password, and database name are required.');
	}
}

if(isset($message))
{
	header('Location: index.php?error='.$message);
}

$_SESSION['hostname'] = $_POST['hostname']; 
$_SESSION['username'] = $_POST['username']; 
$_SESSION['password'] = $_POST['password']; 
$_SESSION['database'] = $_POST['database']; 

?>



		  <form id="install_form" class="form-signin" method="post" action="done.php">
          <?php if(is_writable($db_config_path)){?>

		  <?php if(isset($message)) {echo '<p class="error">' . $message . '</p>';}?>
          <h1>Create an user</h1>
        <fieldset>
          <legend>Database settings</legend>    
          <label for="name">Name</label><input type="text" id="name" class="input_text" name="name" />
          <label for="email">E-mail address</label><input type="text" id="email" class="input_text" name="email" />
          <label for="password">Password</label><input type="password" id="password" class="input_text" name="password" />
          <br />
          <button class="btn btn-large btn-primary" type="submit">Install Database</button>
        </fieldset>
		  </form>

	  <?php } else { ?>
      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></p>
	  <?php } ?>

	</body>
</html>