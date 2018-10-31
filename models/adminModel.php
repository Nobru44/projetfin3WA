<?php

class Admin {

	public function verifAdmin(array $admin) {
		$userModel = new UserModel();
		$user = $userModel->getUserByMail($admin['user']['mail']);
		
		if ($user['habilitation'] != 'admin') {
			$error = "Vous n'avez pas accès à cette zone. Vous avez été redirigé vers notre home";
			array_push($_SESSION['messages'], $error);
			header('Location: /index.php');
		} else if ($user['mail'] != $admin['user']['mail'] AND $user['password'] != $admin['user']['password']) { 
			$error = "Vous n'avez pas accès à cette zone. Vous avez été redirigé vers notre home";
			array_push($_SESSION['messages'], $error);
			header('Location: /index.php');
		} else if (empty($user)) {
			$error = "Vous n'avez pas accès à cette zone. Vous avez été redirigé vers notre home";
			array_push($_SESSION['messages'], $error);
			header('Location: /index.php');
		}
	 }

}
