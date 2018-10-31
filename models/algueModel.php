<?php 

class Algue {

///COMPTE LES ALGUES PAR CATEGORIE////

	public function countAlgues($id) {
		$db = getConnection();
		$sql = "SELECT COUNT(*) FROM algue WHERE category_id LIKE '$id' AND status LIKE 'verified'";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute();
		$nombre = $statement->fetchAll(\PDO::FETCH_ASSOC);
		return $nombre;
	}

////COMPTE TOUTES LES ALGUES DANS LA BASE///

	public function countAllAlgues() {
		$db = getConnection();
		$sql = "SELECT COUNT(*) FROM algue";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute();
		$nombre = $statement->fetchAll(\PDO::FETCH_ASSOC);
		return $nombre;
	}

///LA LISTE DES ALGUES PAR CATEGORIE///

	public function getAlguesByCategory($id_category) {
	$db = getconnection();
	$sql = "
		SELECT * FROM algue
		JOIN user ON user.id_user = algue.id_author
		JOIN category ON category.category_id = algue.category_id
		WHERE algue.category_id = '$id_category'
		AND algue.status = 'verified'
		ORDER BY name ASC";
	$statement = $db->prepare($sql);
	$db->exec('SET NAMES UTF8');
	$statement->execute();
	$listAlgues = $statement->fetchAll(\PDO::FETCH_ASSOC);

	return $listAlgues;
	}

///RETROUVER LA CATEGORIE DE L'ALGUE////

	public function getCategoryName($id) {
		$db = getConnection();
		$sql = "SELECT category_name FROM category WHERE category_id LIKE '$id'";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute();
		$categoryName = $statement->fetch(\PDO::FETCH_ASSOC);
		return $categoryName;
	}


////AJOUTER UNE ALGUE/////

	public function addAlgue(array $algue) {
		$db = getConnection();
		if(isset($algue['utilisation']) AND isset($algue['url_info'])) {
			$sql = "INSERT INTO algue (id_algue, name, category_id, description, image_url, title_photo, created_at, updated_at, latitude, longitude, profondeur, observed_at, status, id_author, utilisation, url_info)
				VALUES (NULL, :name, :category_id, :description, :image_url, :title_photo, NOW(), NOW(), :latitude, :longitude, :profondeur, :observed_at, :status, :id_author, :utilisation, :url_info)";
		} elseif (isset($algue['utilisation'])) {
			$sql = "INSERT INTO algue (id_algue, name, category_id, description, image_url, title_photo, created_at, updated_at, latitude, longitude, profondeur, observed_at, status, id_author, utilisation)
				VALUES (NULL, :name, :category_id, :description, :image_url, :title_photo, NOW(), NOW(), :latitude, :longitude, :profondeur, :observed_at, :status, :id_author, :utilisation)";
		} elseif (isset($algue['url_info'])) {
			$sql = "INSERT INTO algue (id_algue, name, category_id, description, image_url, title_photo, created_at, updated_at, latitude, longitude, profondeur, observed_at, status, id_author, url_info)
				VALUES (NULL, :name, :category_id, :description, :image_url, :title_photo, NOW(), NOW(), :latitude, :longitude, :profondeur, :observed_at, :status, :id_author, :url_info)";
		}
		else {
			$sql = "INSERT INTO algue (id_algue, name, category_id, description, image_url, title_photo, created_at, updated_at, latitude, longitude, profondeur, observed_at, status, id_author)
				VALUES (NULL, :name, :category_id, :description, :image_url, :title_photo, NOW(), NOW(), :latitude, :longitude, :profondeur, :observed_at, :status, :id_author)";
		}
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute($algue);
	}


////MODIFIER UNE ALGUE/////

	////MODIFIER UNE ALGUE/////

	public function modifAlgue(array $algue) {
		if(empty($algue['id_algue'])) {
			$_SESSION['messages'] = [];
			$message = "Erreur de traitement.";
			array_push($_SESSION['messages'], $message);
		} else {
			$db = getConnection();
			if (isset($algue['latitude']) AND isset($algue['longitude']) AND (!isset($algue['image_url']))) {
					$sql = 
					"UPDATE algue
					SET 
					id_author = :id_author,
					name = :name,
					description = :description,
					category_id = :category_id,
					updated_at = NOW(),
					status = :status,
					latitude = :latitude,
					longitude = :longitude,
					utilisation = :utilisation,
					url_info = :url_info
					WHERE id_algue = :id_algue
					";
			} else if (isset($algue['latitude']) AND isset($algue['longitude']) AND isset($algue['image_url'])) {
					$sql = 
					"UPDATE algue
					SET 
					id_author = :id_author,
					name = :name,
					description = :description,
					category_id = :category_id,
					updated_at = NOW(),
					title_photo = :title_photo,
					image_url = :image_url,
					status = :status,
					latitude = :latitude,
					longitude = :longitude,
					utilisation = :utilisation,
					url_info = :url_info
					WHERE id_algue = :id_algue
					";

			} else if (!isset($algue['image_url'])) {
				$sql = 
					"UPDATE algue
					SET 
					id_author = :id_author, 
					name = :name,
					description = :description, 
					category_id = :category_id,
					updated_at = NOW(),
					status = :status,
					utilisation = :utilisation,
					status = :status,
					url_info = :url_info
					WHERE id_algue = :id_algue
					";
				} 
				else {
					$sql = 
					"UPDATE algue
					SET 
						id_author = :id_author, 
						name = :name,
						description = :description, 
						category_id = :category_id,
						updated_at = NOW(),
						image_url = :image_url,
						title_photo = :title_photo, 
						status = :status,
						utilisation = :utilisation,
						url_info = :url_info
					WHERE id_algue = :id_algue
					";
			}
		}
		$statement = $db->prepare($sql);
		$statement->execute($algue);
	}
/////TROUVER UNE ALGUE GRACE A SON ID//////

	public function getAlgueById($id) {
	 	$db = getConnection();
		$sql = "SELECT * FROM algue
		JOIN user ON user.id_user = algue.id_author
		JOIN category ON category.category_id = algue.category_id
		WHERE algue.id_algue LIKE '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
		$algue = $statement->fetch(\PDO::FETCH_ASSOC);
		return $algue;
 	}

/////DETRUIRE UNE ALGUE GRACE A SON ID /////

 	public function deleteAlgue($id) {
		$db = getConnection();
		$sql = "DELETE FROM algue
				WHERE id_algue = '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
	}


/////DETRUIRE UNE Coordonnée /////

 	public function deleteCoord($id) {
		$db = getConnection();
		$sql = "DELETE FROM coordonnees
				WHERE id_coord = '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
	}

/////////////La liste des algues vérifiées/////

	public function getListAlguesVerif() {
		$db = getconnection();
		$sql = "SELECT status, name, description, algue.updated_at, mail, image_url, title_photo, id_algue, firstname, lastname 
				FROM algue 
				JOIN user ON user.id_user = algue.id_author 
				WHERE status LIKE 'verified'
				ORDER BY algue.updated_at 
				DESC";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute();
		$listAlgues = $statement->fetchAll(\PDO::FETCH_ASSOC);

		return $listAlgues;
	}

/////////////La liste des algues à vérifier////////////

	public function getListAlguesUnverif() {
		$db = getconnection();
		$sql = "SELECT status, name, description, algue.updated_at, mail, image_url, title_photo, id_algue, firstname, lastname 
				FROM algue 
				JOIN user ON user.id_user = algue.id_author 
				WHERE status LIKE 'verification' 
				ORDER BY algue.updated_at
				DESC";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute();
		$listAlgues = $statement->fetchAll(\PDO::FETCH_ASSOC);

		return $listAlgues;
	}

////////EXTRACTION DE COORDONNES//////////

	public function addCoord(array $coord) {
		$db = getConnection();
		$sql = "INSERT INTO coordonnees (id_coord, id_algue, latitude, longitude, coord_name)
				VALUES (NULL, :id_algue, :latitude, :longitude, :coord_name)";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute($coord);
	}

	/////////TOUTES LES COORDONNES POUR UNE MEME ALGUE/////////

	public function getCoordAlgueById($id) {
	 	$db = getConnection();
		$sql = "SELECT * FROM coordonnees
		WHERE id_algue LIKE '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
		$coord = $statement->fetchAll(\PDO::FETCH_ASSOC);
		return $coord;
 	}
}


