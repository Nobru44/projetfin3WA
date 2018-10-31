<?php
session_start();
$page ="modifMessage";
require_once 'bootstrap.php';


$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);



if(!empty($_GET['id'])) {
	$messageModel = new Message();
	$messageModel->classifiedMessage($_GET['id']);
	unset($_GET);
	header('Location: admin.php');
} else {
	header('Location: admin.php');
}

