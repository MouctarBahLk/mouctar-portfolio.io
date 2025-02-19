<?php


require_once 'Projects.php';

//Obtiens les paramètres de démarrage (start) et de comptage (count) de la requête AJAX.
$start = $_GET["start"];
$count = $_GET["count"];

// Crée une nouvelle instance de la classe Projects pour interagir avec la base de données.
$projects = new Projects();

// Récupère les projets demandés depuis la base de données
$projectData = $projects->getProjectBetween($start, $count);

//  Convertit les données du projet en une chaîne JSON encodée
$jsonData = json_encode($projectData);

// Définit l'en-tête de type de contenu sur application/json
header("Content-Type: application/json");

// Écho de retourne les données du projet encodées en JSON au client
echo $jsonData;
