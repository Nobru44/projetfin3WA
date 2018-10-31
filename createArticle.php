<?php
session_start();
$page ="createArticle";
require_once 'bootstrap.php';


$user =  $_SESSION;
$adminModel = new Admin();
$adminModel->verifAdmin($user);












require_once 'views/createArticle.phtml';



require_once 'views/footer.phtml';