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

function getCommentaires(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->query('SELECT * FROM commentaires INNER JOIN utilisateurs ON commentaires.com_utilisateur = utilisateurs.user_id WHERE com_verif = 0');

        // Récupération des résultats
        $commentaires = $req->fetchAll(PDO::FETCH_ASSOC);

        // Return des jeux
        return $commentaires ;

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function commentaireVerifie(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->query('SELECT * FROM commentaires INNER JOIN utilisateurs ON commentaires.com_utilisateur = utilisateurs.user_id WHERE com_verif = 1');

        // Récupération des résultats
        $commentaires = $req->fetchAll(PDO::FETCH_ASSOC);

        // Return des jeux
        return $commentaires ;

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function supprimeUtilisateur($id){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('DELETE FROM `utilisateurs` WHERE user_id = :id');
        $req->execute([
            'id' => $id
        ]);

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function admettreCommentaire($id){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('UPDATE commentaires SET com_verif = 1 WHERE com_id = :id');
        $req->execute([
            'id' => $id
        ]);

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function supprimeCommentaire($id){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('DELETE FROM `commentaires` WHERE com_id = :id');
        $req->execute([
            'id' => $id
        ]);

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}


function envoiCommentaire($contenu){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('INSERT INTO commentaires(com_utilisateur, com_contenu) VALUES (:utilisateur, :contenu)');
        $req->execute([
            'utilisateur' => $_SESSION['user_id'],
            'contenu' => $contenu
        ]);

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}
