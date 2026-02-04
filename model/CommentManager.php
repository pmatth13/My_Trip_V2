<?php 

    require_once 'Manager.php';

    class CommentManager extends Manager {

        // Ajout d'un commentaire
        public function createComment($content, $article_id, $author_id){

            //Connexion à la BDD
            $db = $this->dbConnect();

            // Création de la requête
            $requete = $db->prepare ('INSERT INTO comments (content, article_id, author_id) VALUES (:content, :article_id, :author_id)');

            // Execute la requete 
            $requete -> execute([
                ':content'   => $content,
                ':article_id'=> $article_id,
                ':author_id' => $author_id
            ]);

            return true;
        }

        // Récuperer tout les commentaires d'un article
        public function getCommentsByArticle($article_id){

            // Connexion à la BDD
            $db = $this->dbConnect();

            // Création de la reqûete
            $requete = $db->prepare('SELECT comments.*, users.pseudo FROM comments JOIN users ON comments.author_id = users.id WHERE comments.article_id = :article_id ORDER BY comments.created_at ASC');

            // Exécute la requête
            $requete->execute([':article_id' => $article_id]);

            // Retourner tous les commentaires
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        }

        // Supprimer un commentaire 
       public function deleteComment($id) {

            // Connexion à la BDD
            $db = $this->dbConnect();

            // Supprimer le commentaire
            $requete = $db->prepare('DELETE FROM comments WHERE id = :id');
            $requete->execute([':id' => $id]);

            return true;
        }
    }