<?php

session_start();
$page ="addUser";

require_once 'bootstrap.php';

$_SESSION['messages'] = [];

if(isset($_POST)) {
	$userModel = new UserModel();
	$user = $userModel -> cleanTextCreateUser($_POST);

	if ($user != null) {
		unset($user['confirmation']);
		$user['firstname'] = mb_strtolower($user['firstname']);
		$user['lastname'] = mb_strtolower($user['lastname']);
		$user['habilitation'] = 'guest';

    	$userModel->addUser($user);
    	header('Location: index.php');
	} else {
		$message = "La création a échoué, veuillez réessayer.";
		array_push($_SESSION['messages'], $message);
		header('Location: createUser.php');
	}
	
} else {
	$message = "La création a échoué, veuillez réessayer.";
	array_push($_SESSION['messages'], $message);
	header('Location: createUser.php');
}

