<?php

session_start();

require_once "Facebook/autoload.php";

$FB = new \Facebook\Facebook([
	'app_id' => '262060994603170',
	'app_secret' => '0c26c113810d1bfd64c52346221f9251',
	'default_graph_version' => 'v2.10',
	]);

$helper = $FB->getRedirectLoginHelper();


?>