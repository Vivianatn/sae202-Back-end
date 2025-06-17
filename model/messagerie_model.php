<?php

require_once("conf/conf.inc.php");

/* INNER JOIN utilisateurs ON messagerie.mes_expediteur = utilisateurs.user_id */

function getMessageDestinataire(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('SELECT * FROM messagerie WHERE mes_destinataire = :email ORDER BY mes_id');

        $req->execute(['email' => $_SESSION['user_email']]);
    
        // Récupération des résultats
        $messagerie = $req->fetchAll(PDO::FETCH_ASSOC);
    
        // Return des jeux
        return $messagerie ;
    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function getMessageExpediteur(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('SELECT * FROM messagerie WHERE mes_expediteur = :email ORDER BY mes_id');

        $req->execute(['email' => $_SESSION['user_email']]);
    
        // Récupération des résultats
        $messagerie = $req->fetchAll(PDO::FETCH_ASSOC);
    
        // Return des jeux
        return $messagerie ;
    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function getMessageById(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('SELECT * FROM messagerie WHERE mes_id = :id');

        $req->execute(['id' => $_POST['user_id']]);
    
        // Récupération des résultats
        $messagerie = $req->fetchAll(PDO::FETCH_ASSOC);
    
        // Return des jeux
        return $messagerie ;
    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}




function getMessageLu(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('UPDATE messagerie
                                    SET mes_lu = TRUE
                                    WHERE mes_id = :id;');

        $req->execute(['id' => $_POST['user_id']]);
    
        // Récupération des résultats
        $messagerie = $req->fetchAll(PDO::FETCH_ASSOC);
    
        // Return des jeux
        return $messagerie ;
    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function envoiDestinataire($message, $destinataire){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('INSERT INTO messagerie(mes_contenu, mes_destinataire, mes_expediteur) 
        VALUES (:mes_contenu, :mes_destinataire, :mes_expediteur)');

        $req->execute([
            'mes_contenu' => $message,
            'mes_destinataire' => $destinataire,
            'mes_expediteur' => $_SESSION['user_email']
            ]);
    
        // Récupération des résultats
        $messagerie = $req->fetchAll(PDO::FETCH_ASSOC);    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

