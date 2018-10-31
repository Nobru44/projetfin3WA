<?php 

class Upload {
	

	public $path;


/////METHODE POUR SAUVEGARDER UNE IMAGE UPLOADEE APRES VERIFICATION DES INPUT DE L'UTILISATEUR, DE SON TYPE ET DE SA TAILLE/////
	
	public function verifImage(array $image, $title, $idAuthor) {
		
		if ($image['error'] > 0) {
			$erreur = "Pas de photo chargée ou erreur lors du transfert.";
			array_push($_SESSION['messages'], $erreur);
		} else {

			$error = 0;
			$type_mime_upload = $image['type'];
			
			$extension = explode(".", $image['name']);

			$extensionValides = [
			'image/jpg',
			'image/jpeg'
			];
			
			if(count($extension) < 3 AND in_array($type_mime_upload, $extensionValides)) {
				$message = "L'extension du fichier est valide.";
				array_push($_SESSION['messages'], $message);
				$image['name'] = htmlentities($image['name']);
			} else {
				$erreur = "L'extension du fichier n'est pas valide.";
				array_push($_SESSION['messages'], $erreur);
				$error++;
			}

			$imageSize = $image['size'];
	

			$maxsize = 1048576;
			if ($imageSize < $maxsize) {
				$message = "La taille du fichier est valide.";
				array_push($_SESSION['messages'], $message);
			} else {
				$erreur = "Le fichier est trop gros.";
				array_push($_SESSION['messages'], $erreur);
				$error ++;
			}


			if($error == 0) {

				$title = filter_var ($title, FILTER_SANITIZE_ENCODED);

				$title = md5($title);

				$path = $this->path; 

	
				$extension = end($extension);



				$nom = "$path/{$idAuthor}.{$title}.{$extension}";


				$resultat = move_uploaded_file($image['tmp_name'],$nom);

				if ($resultat == true) {
				$message = "Transfert du fichier réussi.";
				array_push($_SESSION['messages'], $message);
				return $nom;
				} else {
				unlink($nom);
				$message = "Le transfert du fichier a échoué.";
				array_push($_SESSION['messages'], $message);
				$retour = '"failed" . $result';
				return "failed";
				}
			} else {
				$message = "Le transfert du fichier a échoué.";
				array_push($_SESSION['messages'], $message);
				return "failed";
			}
		
		}
	}
}