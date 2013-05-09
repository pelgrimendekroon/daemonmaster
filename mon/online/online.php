<?php
error_reporting(0);
$url = "http://johndekroon.nl";
$headers = get_headers($url);

if(($headers[0]=="HTTP/1.1 200 OK")OR ($headers[0]=="HTTP/1.1 302 Found"))
	post_status("ok");
else
{
	sleep(5);
	$second = get_headers($url);
	if(($second[0]=="HTTP/1.1 200 OK")OR ($second[0]=="HTTP/1.1 302 Found"))
		post_status("warning");	
	else
		post_status("error");
	
}

function post_status($status)
{
	$url = "http://daemonmaster.johndekroon.nl/post.php";
	$postdata = http_build_query(array($status => 'some content'));
	$opts = array('http' =>
		array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'content' => $postdata
		)
	);
	$context = stream_context_create($opts);

	print_r(file_get_contents($url, FALSE, $context));
}

