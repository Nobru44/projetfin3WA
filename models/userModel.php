<?php

class UserModel {

///La liste des mails des usagers////

	public function getUsersMail() {
		
		$db = getconnection();
		$sql = "SELECT mail FROM user";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute();
		$listMails = $statement->fetchAll(\PDO::FETCH_ASSOC);

		return $listMails;
	}

///Ajouter un user////

	public function addUser(array $user) {

		if (!empty($user['mail'])) {
	
		$user['password'] = crypt($user['password'], 'rl');

		$db = getConnection();
		$sql = "
		INSERT INTO user 
		(id_user, firstname, lastname, mail, password, habilitation, created_at, updated_at)
		VALUES (NULL, :firstname, :lastname, :mail, :password, :habilitation, NOW(), NOW())";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute($user);
		} else {
			throw new Exception("Une erreur s'est produite");
		}
	}

/// Vérifier l'existence d'un mail d'usager/////

	public function VerifUserMail($mail) {
	 	$db = getConnection();
		$sql = "SELECT mail FROM user WHERE mail LIKE '$mail'";
		$statement = $db->prepare($sql);
		$statement->execute();
		$mail = $statement->fetch(\PDO::FETCH_ASSOC);
		return $mail;
	 }

////Récupérer mail d'un usager par son pseudo////

	public function getUserByMail($pseudo) {
	 	$db = getConnection();
		$sql = "SELECT * FROM user WHERE mail LIKE '$pseudo'";
		$statement = $db->prepare($sql);
		$statement->execute();
		$user = $statement->fetch(\PDO::FETCH_ASSOC);
		return $user;
	 }

///Récupérer les infos d'un usager grâce à son ID////

	public function getUserById($id) {
		$db = getConnection();
		$sql = "SELECT * FROM user WHERE id_user LIKE '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
		$user = $statement->fetch(\PDO::FETCH_ASSOC);
		return $user;
	}

	
////////CREATION DE COMPTE  : sanitize les inputs, vérifie les erreurs, contrôle que le mail ne soit pas déjà dans la base et créé les messages pour l'usager avant insertion dans la base /////

	public function cleanTextCreateUser(array $user) {   
    	

    	$options = array(
			'firstname' => FILTER_SANITIZE_STRING,
			'lastname' => FILTER_SANITIZE_STRING,
			'mail' => FILTER_VALIDATE_EMAIL,
			'password' => FILTER_SANITIZE_STRING,
			'confirmation' => FILTER_SANITIZE_STRING
		);

		$resultat = filter_input_array(INPUT_POST, $options);

		$_SESSION['messages'] = [];


		if($resultat != null) { 
			
			$messages = array(

        	'mail' => 'L\'adresse de messagerie n\'est pas valide.',

        	'password' => 'Le mot de passe n\'est pas valide.',

        	'firstname' => 'Veuillez entrer un prénom.',

        	'lastname' => 'Veuillez entrer un nom.',

        	'confirmation' => 'Confirmation mot de passe invalide.'
    		);


    		$nbrErrors = 0;


    		foreach($options as $key => $value) {
	        	if(empty($resultat[$key])) {

	            $message = 'Veuillez remplir le champ ' . $key;
	            array_push($_SESSION['messages'], $message);
	            $nbrErrors++;

	        	} elseif ($resultat[$key] === false) {

	            array_push($_SESSION['messages'], $messages[$key]);

	            $nbrErrors++;
	        	} 
			}

    		
			$mail = self::VerifUserMail($resultat['mail']);
			if ($mail != false) {
				$message = "Ce mail existe déjà";
				array_push($_SESSION['messages'], $message);
				$nbrErrors ++;
			}



	    	if ($resultat['confirmation'] != $resultat['password']) {

					$message = "La confirmation du mot de passe est invalide.";
					array_push($_SESSION['messages'], $message);
					$nbrErrors ++;
			}
			
    		
			if($nbrErrors === 0) {
        		$message = 'Vous avez bien créé votre compte. Identifiez vous';
        		array_push($_SESSION['messages'], $message);
        		return $resultat;
        	}
		} else {
		$message = 'Vous n\'avez rien posté.';
		array_push($_SESSION['message'], $message);
		}
	}

////MODIF INFOS D'UN UTILISATEUR////

	public function modifUser(array $user) {
		$db = getConnection(); 
		$sql = "UPDATE user
		SET 
		mail = :mail,
		firstname = :firstname,
		lastname = :lastname,
		habilitation = :habilitation,
		updated_at = NOW()
		WHERE id_user = :id_user
		";
		$statement = $db->prepare($sql);
		$statement->execute($user);
	}	

////////SUPPRIMER UN UTILISATEUR/////
	
	public function deleteUser($id) {
		$db = getConnection();
		$sql = "DELETE FROM user
				WHERE id_user = '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
	}

//////LA LISTE DES UTILISATEURS////

	public function getListUsers() {
		$db = getconnection();
		$sql = "SELECT * 
				FROM user 
				ORDER BY updated_at 
				DESC";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute();
		$listUsers = $statement->fetchAll(\PDO::FETCH_ASSOC);

		return $listUsers;
	}


}
