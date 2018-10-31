<?php
session_start();

$page ="modifUser";

require_once 'bootstrap.php';

$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);

$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);





if(!empty($_GET)) {
	$userModel = new UserModel();
	$user = $userModel->getUserById($_GET['id']);
	
	unset($_GET);
} else {
	header('Location: admin.php');
}






require_once 'views/modifUser.phtml';



require_once 'views/footer.phtml';