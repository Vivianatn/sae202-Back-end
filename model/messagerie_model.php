<?php

require_once("conf/conf.inc.php");

/* INNER JOIN utilisateurs ON messagerie.mes_expediteur = utilisateurs.user_id */

function getUtilisateurs(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->query('SELECT * FROM utilisateurs');

        /* $req->execute(['email' => $_SESSION['user_email']]); */
    
        // Récupération des résultats
        $messagerie = $req->fetchAll(PDO::FETCH_ASSOC);
    
        // Return des jeux
        return $messagerie ;
    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function getMessageDestinataire(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('SELECT * FROM messagerie WHERE mes_destinataire = :email ORDER BY mes_id DESC');

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
        $req = $db->prepare('SELECT * FROM messagerie WHERE mes_expediteur = :email ORDER BY mes_id DESC');

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

        $req->execute(['id' => $_POST['id']]);
    
        // Récupération des résultats
        $messagerie = $req->fetchAll(PDO::FETCH_ASSOC);
    
        // Return des jeux
        return $messagerie ;
    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function getMessageLuDestinataire(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('UPDATE messagerie
                                    SET mes_lu_dest = TRUE
                                    WHERE mes_id = :id;');

        $req->execute(['id' => $_POST['id']]);
    
        // Récupération des résultats
        $messagerie = $req->fetchAll(PDO::FETCH_ASSOC);
    
        // Return des jeux
        return $messagerie ;
    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function getMessageLuExpediteur(){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('UPDATE messagerie
                                    SET mes_lu_expe = TRUE
                                    WHERE mes_id = :id;');

        $req->execute(['id' => $_POST['id']]);
    
        // Récupération des résultats
        $messagerie = $req->fetchAll(PDO::FETCH_ASSOC);
    
        // Return des jeux
        return $messagerie ;
    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function envoiDestinataire($message, $destinataire, $titre){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('INSERT INTO messagerie(mes_contenu, mes_destinataire, mes_expediteur, mes_titre) 
        VALUES (:mes_contenu, :mes_destinataire, :mes_expediteur, :mes_titre)');

        $req->execute([
            'mes_contenu' => $message,
            'mes_destinataire' => $destinataire,
            'mes_expediteur' => $_SESSION['user_email'],
            'mes_titre' => $titre
            ]);
    
        // Récupération des résultats
        $messagerie = $req->fetchAll(PDO::FETCH_ASSOC);    
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}