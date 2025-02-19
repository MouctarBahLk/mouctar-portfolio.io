<?php
class Database {
    public $pdo;
    
    function __construct() {
        $dbFile = dirname(__FILE__) . "/database.sqlite";
        $dbExists = file_exists($dbFile);
        $this->pdo = new PDO("sqlite:$dbFile");
        if (!$dbExists) {
            $this->createDatabase(); // Crée la table contact si la base de données est nouvelle
        }
        $this->createProjectsTable(); // Création de la table projets
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
// Méthode pour établir la connexion à la base de données
function connect() {
    $dbFile = dirname(__FILE__) . "/database.sqlite";
    $this->pdo = new PDO("sqlite:$dbFile");
    return $this->pdo;
}
    function createDatabase() {
        $this->pdo->exec('CREATE TABLE contact (
            id INTEGER PRIMARY KEY,
            nom VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            num VARCHAR(255) NOT NULL,
            msg TEXT NOT NULL
        )');
    }   
    
    function createProjectsTable() {
        $this->pdo->exec('CREATE TABLE IF NOT EXISTS projets (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            titre VARCHAR(255) NOT NULL,
            descrip TEXT NOT NULL,
            img VARCHAR(255) NOT NULL,
            imageAlt VARCHAR(255) NOT NULL
        )');
    }   
};
