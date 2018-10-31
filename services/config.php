<?php


function getConnection() {
	$user = '';
	$password = '';
	$db = new PDO(
		'mysql:host=;dbname=', 
		$user, 
		$password,
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
	);
	$db->exec('SET NAMES UTF8');
	return $db;
}