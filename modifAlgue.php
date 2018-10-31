<?php
session_start();
$page = "modifAlgue.php";


require_once 'bootstrap.php';


$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);

$_SESSION['messages'] = [];


if(isset($_GET['id'])) {
	$idAlgue = $_GET['id'];

	$algueModel = new Algue();
	$algue = $algueModel->getAlgueById($idAlgue);

	$algueCoord = [];
	$algueCoord['latitude'] = $algue['latitude'];
	$algueCoord['longitude'] = $algue['longitude'];
	$json = json_encode($algueCoord);
	header('mime_content_type! text/json');
        $listCoord = $algueModel->getCoordAlgueById($idAlgue);
} else {
	$message = "Vous n'avez sélectionné aucune algue";
	array_push($_SESSION['messages'], $message);
	header('Location: admin.php');
}


require_once 'views/modifAlgue.phtml';



require_once 'views/footer.phtml';