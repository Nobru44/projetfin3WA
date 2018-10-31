<?php
session_start();
$page = "catalogue";

require_once 'bootstrap.php';

$algueModel = new Algue();
$nombre = $algueModel->countAllAlgues();




require_once 'views/catalogue.phtml';



require_once 'views/footer.phtml';