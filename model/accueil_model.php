<?php

function getUtilisateurs(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);
    
        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->query('SELECT * FROM utilisateurs');
    
        // Récupération des résultats
        $parties = $req->fetchAll(PDO::FETCH_ASSOC);
    
        // Return des jeux
        return $parties ;
    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }


}

function getProfil(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('SELECT * FROM utilisateurs WHERE user_email = :email');
        $req->execute([
            'email' => $_SESSION['user_email']
        ]);

        // Récupération des résultats
        $user = $req->fetchAll(PDO::FETCH_ASSOC);

        // Return des jeux
        return $user ;

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

