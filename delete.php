<?php
session_start();
$page = "delete.php";

require_once 'bootstrap.php';

$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);

$_SESSION['messages'] = [];



if(isset($_POST['id_article'])) {
	$id = $_POST['id_article'];
	$articleModel = new Article();
	$article = $articleModel->getArticleById($id);
	if(!empty($article['url_photo'])) {
		unlink($article['url_photo']);
	}
	$articleModel->deleteArticle($id);
	$message = "L'article a bien été supprimé";
	array_push($_SESSION['messages'], $message);

} elseif(isset($_POST['id_algue'])) {
	$id = $_POST['id_algue'];
	$algueModel = new Algue();
	$algue = $algueModel->getAlgueById($id);
	unlink($algue['image_url']);	
	$algueModel->deleteAlgue($id);
	$message = "L'algue a bien été supprimée";
	array_push($_SESSION['messages'], $message);

} elseif(isset($_POST['id_user'])) {
	$id = $_POST['id_user'];
	$userModel = new UserModel();
	$userModel->deleteUser($id);
	$message = "L'utilisateur a bien été supprimé";
	array_push($_SESSION['messages'], $message);

} elseif(isset($_GET['id'])) {
	$id = $_GET['id'];
	$messageModel = new Message();
	$messageModel->deleteMessage($id);
	$message = "Le message a bien été supprimé";
	array_push($_SESSION['messages'], $message);
} elseif(isset($_GET['idCoord'])) {
	$id = $_GET['idCoord'];
	$algueModel = new Algue();
	$algueModel->deleteCoord($id);
	$message = "Ces coordonnées ont bien été supprimées";
	array_push($_SESSION['messages'], $message);
}

header('Location: admin.php');


require_once 'views/footer.phtml';