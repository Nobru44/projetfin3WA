<?php
session_start();
$page ="addArticle";
require_once 'bootstrap.php';

$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);


$_SESSION['messages'] = [];



if(!empty($_POST)) {
	$article = $_POST;
	if(!empty($_FILES)) {
		$image = $_FILES['mon_fichier2'];
		$title = htmlentities($article['title_photo']);
		$idAuthor = $article['id_author'];
		$upload = new Upload();
		$upload->path = "public/medias/images";
		$nomImage = $upload-> verifImage($image, $title, $idAuthor);

		if ($nomImage != 'failed') {
			$article['url_photo'] = $nomImage;
			$article['title_photo'] = $idAuthor . $title;
			unset($article['MAX_FILE_SIZE']);

		} else {
			$message = "Pas de photo chargée ou erreur lors du transfert de l'image.";
			array_push($_SESSION['messages'], $message);
		}
	} 

	if(empty($article['url_media']) OR $article['url_media'] == "") {
		$article['url_media'] = NULL;
	}
		
	if(empty($article['url_photo'])) {
		unset($article['title_photo']);
	}
	

	$articleModel = new Article();
	$articleModel->modifArticle($article);
	$message = "L'article a bien été modifié.";
	array_push($_SESSION['messages'], $message);

} else {

	$message = "L'article n'a pas été modifié.";
	array_push($_SESSION['messages'], $message);
	
}

header('Location: admin.php');