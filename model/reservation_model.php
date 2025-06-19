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
    $req = $db->query('SELECT reserv_utilisateur FROM reservation');
    $reserv = $req->fetchAll(PDO::FETCH_ASSOC);

    //return client
    return $reserv;

}

function ajouterReservation($user_id)
{
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', USER, PASSWORD);
    $req = $db->prepare('INSERT INTO reservation (reserv_utilisateur) VALUES (:user_id)');
    $req->execute(['user_id' => $user_id]);
    $client = $req->fetchAll(PDO::FETCH_ASSOC);

        //return client
        return $client;
}