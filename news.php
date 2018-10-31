<?php
session_start();
$page = "news";

require_once 'bootstrap.php';

$articlesModel = new Article();
$articlesList = $articlesModel->getListArticles();

require_once 'views/news.phtml';


require_once 'views/footer.phtml';