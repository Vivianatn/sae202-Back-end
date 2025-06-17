<?php
require_once("conf/conf.inc.php");

function envoiAdmin($contenu, $titre){
    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('INSERT INTO messageadmin (mesad_titre, mesad_contenu, mesad_utilisateur) 
        VALUES (:titre, :contenu, :utilisateur)');
        $req->execute([
            'titre' => $titre,
            'contenu' => $contenu,
            'utilisateur' => $_SESSION['user_id']
        ]);

        // Récupération des résultats
        $user = $req->fetchAll(PDO::FETCH_ASSOC);

        // Return des jeux
        /* return $user ; */

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

?>