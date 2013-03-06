<?php
require_once('header.php');
$message = $_GET['error'];
error_reporting(E_NONE); //Setting this to E_ALL showed that that cause of not redirecting were few blank lines added in some php files.

$db_config_path = '../../application/config/database.php';

?>

		  <form id="install_form" class="form-signin" method="post" action="user.php">
          <?php if(is_writable($db_config_path)){?>

		  <?php if(isset($message)) {echo '<p class="error">' . $message . '</p>';}?>
          <h1>Install Daemon Master</h1>
        <fieldset>
          <legend>Database settings</legend>
          <label for="hostname">Hostname</label><input type="text" id="hostname" value="localhost" class="input_text" name="hostname" />
          <label for="username">Username</label><input type="text" id="username" class="input_text" name="username" />
          <label for="password">Password</label><input type="password" id="password" class="input_text" name="password" />
          <label for="database">Database Name</label><input type="text" id="database" class="input_text" name="database" />
          <br />
          <button class="btn btn-large btn-primary" type="submit">Install Database</button>
        </fieldset>
		  </form>

	  <?php } else { ?>
      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></p>
	  <?php } ?>

	</body>
</html>