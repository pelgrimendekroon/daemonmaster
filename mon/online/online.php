#!/usr/bin/env php
<?php

error_reporting(0);

if(in_array("-t", $_SERVER['argv'])&&count($_SERVER['argv'])==3)
{
	$url = $_SERVER['argv'][2];
	$headers = get_headers($url);
	
	if(($headers[0]=="HTTP/1.1 200 OK")OR ($headers[0]=="HTTP/1.1 302 Found"))
		post_status("ok", "Everything is fine.");
	else
	{
		sleep(10);
		$second = get_headers($url);
		if(($second[0]=="HTTP/1.1 200 OK")OR ($second[0]=="HTTP/1.1 302 Found"))
			post_status("warning", "Warning: ".$url." is flapping.");	
		else
			post_status("error", $url." is down!");
	}
}
else
	post_status("error", "Online monitor not right configured: args are not in the right format.");

function post_status($status, $desc)
{
	$url = "http://daemonmaster.johndekroon.nl/post.php";
	$postdata = http_build_query(array($status => $desc));
	$opts = array('http' =>
		array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'content' => $postdata
		)
	);
	$context = stream_context_create($opts);

	print_r(file_get_contents($url, FALSE, $context).PHP_EOL);
}

