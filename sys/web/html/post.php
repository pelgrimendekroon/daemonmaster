<?php
if(isset($_POST['ok']))
	echo "Oke: ".$_POST['ok'];
else if(isset($_POST['warning']))
	echo "Aiii: ".$_POST['warning'];
else if(isset($_POST['error']))
	echo "Serious trouble: ".$_POST['error'];