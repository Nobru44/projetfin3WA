<?php
session_start();
$page = "extractCoord.php";


require_once 'bootstrap.php';


$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);

$_SESSION['messages'] = [];

if(isset($_GET['id_algue'])) {
	$idAlgue = $_GET['id_algue'];
	$algueModel = new Algue();
	$algue = $algueModel->getAlgueById($idAlgue);
	$algue['name'] = strip_tags($algue['name']);
	$oneCoord = [];
	array_push($oneCoord, $algue['latitude']);
	$oneCoord['latitude'] = $oneCoord[0];
	unset($oneCoord[0]);
	array_push($oneCoord, $algue['longitude']);
	$oneCoord['longitude'] = $oneCoord[1];
	unset($oneCoord[1]);

	$algueCoord = [];
	array_push($algueCoord, $oneCoord);

	$json = json_encode($algueCoord);
	header('mime_content_type! text/json');

	$algueModel = new Algue();
	$listAlguesVerif = $algueModel->getListAlguesVerif();

} else {
	$message = "Vous n'avez sélectionné aucune algue";
	array_push($_SESSION['messages'], $message);
	header('Location: admin.php');
}







require_once 'views/extractCoord.phtml';



require_once 'views/footer.phtml';