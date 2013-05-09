<?php
//$headers = get_headers("http://johndekroon.nl");
//print_r($headers[0]);
$url = "http://daemonmaster.johndekroon.nl/post.php";

	$postdata = http_build_query(array('test' => 'some content', 'var2' => 'doh'));
	
	$opts = array('http' =>
		array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'content' => $postdata
		)
	);
	$context = stream_context_create($opts);

	print_r(file_get_contents($url, FALSE, $context));


?>