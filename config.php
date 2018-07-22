<?php

session_start();

require_once "Facebook/autoload.php";

$FB = new \Facebook\Facebook([
	'app_id' => '278168876267469',
	'app_secret' => 'd527ca2c3337076c09106c1fcd4e5d91',
	'default_graph_version' => 'v2.10',
	]);

$helper = $FB->getRedirectLoginHelper();


?>