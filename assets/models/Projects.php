<?php

require_once 'Database.php';

class Projects extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->createProjectsTable(); // Appelle de la méthode pour créer la table
    }

   

    public function getProject(int $id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM projets WHERE id=:identifiant');
        $statement->bindValue(':identifiant', $id);
        $statement->execute();

        return $statement->fetch();
    }

    public function getProjectBetween(int $startPosition, int $countProject)
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM projets
            ORDER BY id
            LIMIT :start, :countP'
        );
        $statement->bindValue(':start', $startPosition, PDO::PARAM_INT);
        $statement->bindValue(':countP', $countProject, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getProjects()
    {
        return $this->pdo->query('SELECT * FROM projets')->fetchAll();
    }

    public function insertProject($title, $description, $image)
    {
        $stmt = $this->pdo->prepare("INSERT INTO projets (titre, descrip, img) 
                               VALUES (:titre, :descrip, :img)");

        $stmt->bindValue(":titre", htmlspecialchars($title));
        $stmt->bindValue(":descrip", htmlspecialchars($description));
        $stmt->bindValue(":img", htmlspecialchars($image));

        $stmt->execute();
    }
    public function getProjectTableSize()
    {
        // Logique pour obtenir la taille de la table projets
        $statement = $this->pdo->query('SELECT COUNT(*) AS size FROM projets');
        $result = $statement->fetch();
        return $result['size'];
    }
    

    
}
