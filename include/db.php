<?php

// database credentials
$dbHost		 = 'linuxproj.ecs.soton.ac.uk';
$dbUsername	 = 'jp19g13';
$dbPassword	 = '1234';
$dbSchema	 = 'db_jp19g13';

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbSchema);

// check if the database connection failed
if($db->connect_errno){
	echo "Failed to connect to MySQL: " . $db->connect_error;
}