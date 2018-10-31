<?php


require_once "services/config.php";
require_once "models/userModel.php";




if( isset($_POST['mail']) && !empty($_POST['mail'])){
	

	$mail = $_POST['mail'];
	$regexMail = "#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z][fr|com|net|org]{1,3}$#";
	$verif = new UserModel();
	$result	 = $verif->getUserByMail($mail);
	if($result == true) {
		echo("Ce mail existe déjà");
	} else if(preg_match($regexMail, $mail) != true) {
		echo("Mail invalide");
	} else {
		echo("Mail valide");
	}
}