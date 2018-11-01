<?php
session_start();
$page ="processAdd";
require_once 'bootstrap.php';


$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);

$_SESSION['messages'] = [];

///ON NE PEUT PAS SOUMETTRE UNE ALGUE SANS SA PHOTO, NI SANS COORDONNEES, NI SANS DATE D'OBSERVATION///

if(!empty($_FILES) AND !empty($_POST)) {
	$image = $_FILES['mon_fichier'];
	$title =  htmlspecialchars($_POST['title_photo']);
	$idAuthor = $_POST['id_author'];

	$upload = new Upload();
	$upload->path = "public/images";
	$nomImage = $upload-> verifImage($image, $title, $idAuthor);
	
	if ($nomImage != "failed") {
		$errors = 0; 
		$_POST['image_url'] = $nomImage;
		$status = "verification";
		$_POST['status'] = $status;
		$_POST['name'] = htmlspecialchars($_POST['name']);
		$_POST['description'] = htmlspecialchars($_POST['description']);
		
		if(empty($_POST['lat']) AND empty($_POST['long'])) {
			$erreur = "Vous n'avez pas rempli les coordonnées";
			array_push($_SESSION['messages'], $erreur);
			$errors ++;
		} else if ($_POST['lat'] < -21.606365 OR $_POST['lat'] > -20.670051 OR $_POST['long'] > 56.057513 OR $_POST['long'] < 54.997705) {
			$erreur = "Les coordonnées ne sont pas valides";
			array_push($_SESSION['messages'], $erreur);
			$errors ++;
		} else {
			$_POST['latitude'] = $_POST['lat'];
			$_POST['longitude'] = $_POST['long'];
			unset($_POST['lat']);
			unset($_POST['long']);
			unset($_POST['MAX_FILE_SIZE']);
		}


		
		if($errors === 0) {
			$date = explode('-', $_POST['observed_at']);
			$valideDate = checkdate($date[1], $date[2], $date[0]);
			if($valideDate === true) {
			$_POST['observed_at'] = implode('-', $date);
			$algue = $_POST;
			$algueModel = new Algue();
			$algueModel->addAlgue($algue);

			$message = "Merci de votre contribution. Votre algue sera examinée avec attention";
			array_push($_SESSION['messages'], $message);
			header('Location: formulaire.php');
			} else {
				$message = "Erreur dans la date";
				array_push($_SESSION['messages'], $message);
				header('Location: formulaire.php');
			}
		} else {
			$message = "Une erreur s'est produite. Veuillez réessayer";
			array_push($_SESSION['messages'], $message);
			header('Location: formulaire.php');
		}
	} else {
		$message = "Une erreur s'est produite. Veuillez réessayer";
		array_push($_SESSION['messages'], $message);
		header('Location: formulaire.php');
	}
} else {
	$message = "Une erreur s'est produite. Veuillez réessayer";
	array_push($_SESSION['messages'], $message);
	header('Location: formulaire.php');
}




require_once 'views/footer.phtml';