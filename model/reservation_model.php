<?php

require_once("conf/conf.inc.php");

function verif_reservation()
{
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);
    $req = $db->query('SELECT COUNT(*) FROM reservation');
    $reserv = $req->fetchAll(PDO::FETCH_ASSOC);

    //return client
    return $reserv;

}

function voir_reservation()
{
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);
    $req = $db->prepare('SELECT * FROM reservation INNER JOIN tarifs ON reservation.reserv_tarif = tarifs.tarif_id WHERE reserv_utilisateur = :user_id');
    $req->execute(['user_id' => $_SESSION['user_id']]);
    $reserv = $req->fetchAll(PDO::FETCH_ASSOC);
    
    return $reserv;

}

function ajouterReservation($user_id, $tarif, $email)
{
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);
    $req = $db->prepare('INSERT INTO reservation (reserv_utilisateur, reserv_tarif, reserv_email) VALUES (:user_id, :tarif, :email)');
    $req->execute([
        'user_id' => $user_id,
        'tarif' => $tarif,
        'email' => $email
    ]);
    $client = $req->fetchAll(PDO::FETCH_ASSOC);

        //return client
        return $client;
}

function annulerReservation($id){

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);

        // Requête SQL pour sélectionner les jeux triés par ordre alphabétique
        $req = $db->prepare('DELETE FROM reservation WHERE reserv_utilisateur = :id');
        $req->execute([
            'id' => $id
        ]);

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}