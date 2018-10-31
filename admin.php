<?php
session_start();
$page = "admin";
require_once 'bootstrap.php';



$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);



$articleModel = new Article();
$articlesList = $articleModel->getListArticles();


$algueModel = new Algue();
$alguesList = $algueModel->getListAlguesUnverif();
$alguesListVerif = $algueModel->getListAlguesVerif();


$userModel = new UserModel();
$userList = $userModel->getListUsers();

$messageModel = new Message();
$messagesList = $messageModel->getListMessages();



require_once 'views/admin.phtml';



require_once 'views/footer.phtml';



