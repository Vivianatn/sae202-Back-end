<?php

require_once("conf/conf.inc.php");

if (!function_exists('getutilisateurs')) {
    function getutilisateurs()
    {
        /* $db = new PDO('mysql:host=localhost;dbname=wr213Base', USER, PASSWORD);
        $req = $db->prepare('SELECT * FROM utilisateurs');
        $utilisateurs = $req->fetchAll();
        
        $utilisateurs = json_decode(file_get_contents('data/utilisateurs.json'), true);
        return $utilisateurs; */
                
        try {
            // Connexion à la base de données
            // utilisation des constantes, comme PASSWORD
            $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

            // Exécution de la requête SQL
            $req = $db->query('SELECT * FROM utilisateurs');

            // Récupération des résultats
            $client = $req->fetchAll();

            return $client;
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }
}

function getutilisateursAlphabetiques()
{
    /* $utilisateurs = getutilisateurs();
    usort($utilisateurs, function($a, $b) {
        return strcmp($a['client_prenom'], $b['client_prenom']);
    });
    return $utilisateurs; */

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->query('SELECT * FROM utilisateurs ORDER BY user_prenom ASC');

        // Récupération des résultats
        $utilisateur = $req->fetchAll(PDO::FETCH_ASSOC);

        // Return des utilisateur
        return $utilisateur;
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

function getQuatreutilisateurs()
{
    /* $utilisateurs = getutilisateurs();
    return array_slice($utilisateurs, 0, 4); */

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);


        // Requête SQL pour sélectionner les trois derniers jeux
        $req = $db->query('SELECT * FROM utilisateurs ORDER BY user_id DESC LIMIT 4');

        // Récupération des résultats
        $client = $req->fetchAll(PDO::FETCH_ASSOC);

        //return client
        return $client;
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}
// cette fonction est à mettre après la fonction quatre dans le modele utilisateurs

//Fonction pour vérifier si un client existe par email et retourner ses informations

//Fonction pour vérifier si un client existe par email et retourner ses informations
function verif_utilisateur($utilisateur_mail)
{
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);
    $req = $db->prepare('SELECT * FROM utilisateurs WHERE user_email = :email');
    $req->execute(['email' => $utilisateur_mail]);
    $utilisateurs = $req->fetch(PDO::FETCH_ASSOC);

    return $utilisateurs;
}

//Fonction pour insérer un nouveau client
function inscription_utilisateur($user_prenom, $user_nom, $user_email, $user_tel, $user_mdp)
{
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);
    $req = $db->prepare('INSERT INTO utilisateurs (user_prenom, user_nom, user_email, user_tel, user_mdp) VALUES (:user_prenom, :user_nom, :user_email, :user_tel, :user_mdp)');
    $req->execute([
        'user_prenom' => $user_prenom,
        'user_nom' => $user_nom,
        'user_email' => $user_email,
        'user_tel' => $user_tel,
        'user_mdp' => $user_mdp
    ]);
/* 'user_mdp' => password_hash($user_mdp, PASSWORD_BCRYPT) */
    echo "Nouvel utilisateur inséré avec succès.";
}
