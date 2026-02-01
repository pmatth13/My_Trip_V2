<?php 

    require_once 'Manager.php';

    class ArticleManager extends Manager {

        // Méthode pour créer un article
        public function createArticle($title, $content, $destination, $author_id, $image_url = null){

            // Connexion à la BDD
            $db = $this->dbConnect();

            // Requête préparée
            $requete = $db->prepare('INSERT INTO articles (title, content, destination, author_id, image_url) VALUES (:title, :content, :destination, :author_id, :image_url)');

            // Execute la requête 
            $requete->execute([
                ':title'        => $title,
                ':content'      => $content,
                ':destination'  => $destination,
                ':author_id'    => $author_id,
                ':image_url'    => $image_url
            ]);

            return true;
        }

        // Methode pour récupérer un article selon la destination
        public function getArticlesByDestination($destination) {

            // Connexion à la BDD
            $db = $this->dbConnect();

            // Requête préparée
            $requete = $db->prepare('SELECT * FROM articles WHERE destination = :destination ORDER BY created_at DESC');

            // Execute la requête
            $requete->execute([':destination' => $destination]);

            // Récupère les données
            $destination = $requete->fetchall(PDO::FETCH_ASSOC); // Récupere TOUTES les lignes et crée un tableau

            return $destination;
        }

        // Methode pour récupérer un article précis
        public function getArticleById($id) {

            // Connexion à la BDD
            $db = $this->dbConnect();

            // Requête préparée pour récuperer un article selon son ID
            $requete = $db->prepare('SELECT * FROM articles WHERE id = :id');

            // Execute la requête
            $requete->execute([':id' => $id]);

            // Récupère l'article
            $article = $requete->fetch(PDO::FETCH_ASSOC);

            return $article;
        }

        // Methode pour supprimer un article
        public function deleteArticle($id){

            // Connexion à la BDD
            $db = $this->dbConnect();

            // Préparer la requete de suppression
            $requete = $db->prepare('DELETE FROM articles WHERE id = :id');

            // Execute la requete
            $requete->execute([':id' => $id]);

            return true;
        }

        // Methode pour modifier un article
        public function editArticle($id, $title, $content, $destination, $image_url = null){

            // Connexion à la BDD
            $db = $this->dbConnect();

            // Préparation de la requete
            $requete = $db->prepare('UPDATE articles SET title = :title, content = :content, destination = :destination, image_url = :image_url WHERE id = :id');

            // Execute la requete
            $requete->execute([
                    ':title' => $title,
                    ':content' => $content,
                    ':destination' => $destination,
                    ':image_url' => $image_url,
                    ':id' => $id
                ]);
            
            return true;
        }
    }