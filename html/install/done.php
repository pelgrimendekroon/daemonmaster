<?php
session_start(); // start up your PHP session! 

require_once("header.php");
$_POST['hostname'] = $_SESSION['hostname']; 
$_POST['username'] = $_SESSION['username']; 
$_POST['password'] = $_SESSION['password']; 
$_POST['database'] = $_SESSION['database']; 

$undb = $_SESSION['username'];
$pwdb = $_SESSION['password'];
$host = $_SESSION['hostname'];
$mysql_user = $_SESSION['database'];

echo $undb;
echo $pwdb;
echo $host;
echo $mysql_user;

$mysql = mysql_connect($host,$undb,$pwdb) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!"); 
mysql_select_db($mysql_user,$mysql) or die("Fout: Het openen van de database is mislukt!");

$email = $_POST['email'];
$name = $_POST['name'];
$plain_pass = $_POST['password'];

$pw_hashed = sha1($plain_pass);
$salt = "ahjg#&gojt!fJfgH6#@$";
$pre_hash = $pw_hashed.$salt.$email;
$pass = sha1($pre_hash);

mysql_query("INSERT INTO dm_users (name, email, password, active) VALUES ('$name', '$email', '$pass', 1)", $mysql) or die("There was an error......");

?>
<center><h1>Congratz. The installation was successful.</h1></center>
<br />
<a href="/"><button class="btn btn-large btn-primary" type="button">Go to the app</button></a>