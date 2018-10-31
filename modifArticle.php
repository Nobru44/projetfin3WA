<?php
session_start();
$page ="modifArticle";
require_once 'bootstrap.php';


$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);



if(!empty($_GET)) {
	$articleModel = new Article();
	$article = $articleModel->getArticleById($_GET['id']);
	unset($_GET);
} else {
	header('Location: admin.php');
}





require_once 'views/modifArticle.phtml';



require_once 'views/footer.phtml';