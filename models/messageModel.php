<?php

class Message {


/////EFFACER UN MESSAGE//////////
	
	public function deleteMessage($id) {
		$db = getConnection();
		$sql = "DELETE FROM message
				WHERE id_message = '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
	}

////////CLASSER UN MESSAGE COMME TRAITE/////////

	public function classifiedMessage($id) {
	 	$db = getConnection();
	 	$sql = "UPDATE message
				SET  status = 'traité'
				WHERE id_message = '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
	}


/////////RECUPERER LA LISTE DES MESSAGE//////////

	public function getListMessages() {
		$db = getconnection();
		$sql = "SELECT * 
				FROM message
				ORDER BY updated_at 
				DESC";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute();
		$listMessages = $statement->fetchAll(\PDO::FETCH_ASSOC);

		return $listMessages;
	}


///////RECUPERER LE MESSAGE GRACE A SON ID//////////

	public function getMessageById($id) {
	 	$db = getConnection();
		$sql = "SELECT * FROM message
		WHERE id_message LIKE '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
		$message = $statement->fetch(\PDO::FETCH_ASSOC);
		return $message;
	}



///////INSERER UN MESSAGE////

	public function insertMessage(array $message) {
		$db = getConnection();
		$sql = "INSERT INTO message
		(id_message, name, mail, message, created_at, updated_at, status)
		VALUES (NULL, :name, :mail, :message, NOW(), NOW(), :status)
			";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute($message);
	}

}