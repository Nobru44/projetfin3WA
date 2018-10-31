<?php
session_start();
$page = "contact";
require_once 'bootstrap.php';




if(!empty($_POST)) {
	$_SESSION['messages'] = [];
	$_POST['name'] = strip_tags($_POST['name']);
	$_POST['mail'] = strip_tags($_POST['mail']);
	$_POST['message'] = strip_tags($_POST['message']);

	switch($_POST) {
		case(empty($_POST['mail']) OR $_POST['mail'] == "") :
			$message = "Vous n'avez pas renseigné de mail de contact.";
			array_push($_SESSION['messages'], $message);
			break;
		case(empty($_POST['message'])) :
			$message = "Vous n'avez pas écrit de message.";
			array_push($_SESSION['messages'], $message);
			break;
		case(!empty($_POST['message']) AND !empty($_POST['mail'])) :
			$message = "Votre message a bien été posté. Nous y répondrons dans les plus bref délais.";
			array_push($_SESSION['messages'], $message);
			$_POST['status'] = "En attente";
			$messageModel = new Message();
			$messageModel->insertMessage($_POST);
			break;
		default: 
			$message = "Nous avons rencontré un problème. Veuillez réessayer.";
			array_push($_SESSION['messages'], $message);
			break;
	}
	header('Location: contact.php');
}


require_once 'views/contact.phtml';


 

require_once 'views/footer.phtml';