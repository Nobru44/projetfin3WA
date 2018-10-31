<?php

class Article {


////TROUVER UN ARTICLE GRACE A SON ID//////

	public function getArticleById($id) {
	 	$db = getConnection();
		$sql = "SELECT * FROM article
		JOIN article_category ON article_category.id_category = article.id_category
		WHERE article.id_article LIKE '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
		$article = $statement->fetch(\PDO::FETCH_ASSOC);
		return $article;
	}

//////DETRUIRE UN ARTICLE GRACE A SON ID//////

	public function deleteArticle($id) {
		$db = getConnection();
		$sql = "DELETE FROM article
				WHERE id_article = '$id'";
		$statement = $db->prepare($sql);
		$statement->execute();
	}

/////AJOUTER UN ARTICLE DANS LA BASE/////

	function addArticle(array $article) {
		$db = getConnection();
		$sql = 
			"INSERT INTO article
			(id_article, id_author, title, content, id_category, created_at, updated_at, url_photo, url_media, title_photo)
			VALUES (NULL, :id_author, :title, :content, :id_category, NOW(), NOW(), :url_photo, :url_media, :title_photo)
			";
		$statement = $db->prepare($sql);
		$statement->execute($article);
	}


/////MODIFIER UN ARTICLE DE LA BASE, ON ESTIME VU QUE CECI N'EST POSSIBLE QUE POUR L'ADMIN QU'ON N'A PAS BESOIN DE SANITIZE LES INPUTS/////

	public function modifArticle(array $article) {
		$db = getConnection();
		switch($article) {
			case($article['url_media'] == NULL AND $article['url_photo'] == NULL): 
				$sql = 
					"UPDATE article
					SET 
						id_author = :id_author, 
						title = :title,
						content = :content, 
						id_category = :id_category, 
						updated_at = NOW(), 
						url_photo = :url_photo, 
						url_media = :url_media 
					WHERE id_article = :id_article
					";
				break;
			
			
				case(!empty($article['url_media']) AND !empty($article['url_photo'] AND !isset($article['title_photo']))): 
					$sql = 
					"UPDATE article
						SET 
							id_author = :id_author, 
							title = :title,
							content = :content, 
							id_category = :id_category, 
							updated_at = NOW(), 
							url_photo = :url_photo, 
							url_media = :url_media 
						WHERE id_article = :id_article
						";
				break;

				case(!empty($article['url_media']) AND !empty($article['url_photo'])): 
					$sql = 
					"UPDATE article
						SET 
							id_author = :id_author, 
							title = :title,
							content = :content, 
							id_category = :id_category, 
							updated_at = NOW(), 
							title_photo = :title_photo,
							url_photo = :url_photo, 
							url_media = :url_media 
						WHERE id_article = :id_article
						";
				break;

			case($article['url_media'] == NULL AND !empty($article['url_photo']) AND !empty($article['title_photo'])): 
				$sql = 
					"UPDATE article
					SET 
						id_author = :id_author, 
						title = :title,
						content = :content, 
						id_category = :id_category, 
						updated_at = NOW(),
                                                url_media = :url_media,
						url_photo = :url_photo,
						title_photo = :title_photo
					WHERE id_article = :id_article
					";
				break;

				case(!empty($article['url_media']) AND $article['url_photo'] == NULL): 
					$sql = 
						"UPDATE article
						SET 
							id_author = :id_author, 
							title = :title,
							content = :content, 
							id_category = :id_category, 
							updated_at = NOW(), 
							url_photo = :url_photo, 
							url_media = :url_media 
						WHERE id_article = :id_article
						";
					break;

				case(!empty($article['url_media'])): 
					$sql = 
						"UPDATE article
						SET 
							id_author = :id_author, 
							title = :title,
							content = :content, 
							id_category = :id_category, 
							updated_at = NOW(), 
							url_media = :url_media 
						WHERE id_article = :id_article
						";
					break;

				case(!empty($article['url_photo'])) :
					$sql = "UPDATE article
						SET
							id_author = :id_author, 
							title = :title,
							content = :content, 
							id_category = :id_category, 
							updated_at = NOW(), 
							url_media = :url_media,
							url_photo = :url_photo
						WHERE id_article = :id_article
						";
				default:
					break;
		}
		$statement = $db->prepare($sql);
		$statement->execute($article);
	}
		


	public function getListArticles() {
		$db = getconnection();
		$sql = "SELECT * FROM article 

				JOIN article_category ON article_category.id_category = article.id_category
				JOIN author ON author.id_author = article.id_author
				ORDER BY article.updated_at
				DESC";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute();
		$listArticles = $statement->fetchAll(\PDO::FETCH_ASSOC);

		return $listArticles;
	}

//////////LA LISTE DES DERNIERS ARTICLES DE LA BASE DE DONNEES (pour futurs affichages) /////////
	
	public function getListLastArticles() {
		$db = getconnection();
		$sql = "SELECT * FROM article 

				JOIN article_category ON article_category.id_category = article.id_category
				JOIN author ON author.id_author = article.id_author
				ORDER BY article.updated_at
				DESC
				LIMIT 5";
		$statement = $db->prepare($sql);
		$db->exec('SET NAMES UTF8');
		$statement->execute();
		$listLastArticles = $statement->fetchAll(\PDO::FETCH_ASSOC);

		return $listLastArticles;
	}

}