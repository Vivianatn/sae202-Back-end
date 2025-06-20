<?php
require_once("conf/conf.inc.php");
require_once("model/reservation_model.php");
require_once("model/utilisateurs_model.php");

function index(){
    $verif_reserv = voir_reservation();
    if (isset($_SESSION['user_email'])) {
        if (!empty($verif_reserv)) {
            header('Location: /profil');
        }else{
            require('view/autres_pages/header.php');
            require('view/autres_pages/menu.php');
            require('view/reservation_view.php');
            require('view/autres_pages/footer.php');
        }
    } else {
        header('Location: /inscription');
    }
}

function reserver() {
    $reserv = verif_reservation();
    if($_POST['tarif'] == 3){
    if ($reserv[0]['COUNT(*)']+4 < RESERV) {
        for ($i = 0; $i < 4; $i++) {
            ajouterReservation($_SESSION['user_id'], $_POST['tarif'], $_POST['user_email']);
        }
        header('Location: /profil');
    }else{
        header('Location: /');
    }}else{
        if($reserv[0]['COUNT(*)'] < RESERV) {
            ajouterReservation($_SESSION['user_id'], $_POST['tarif'], $_POST['user_email']);
            header('Location: /profil');
            }else{
            header('Location: /');
    }
   }
}

function annuler(){
    annulerReservation($_POST['id']);
    header('Location: /gestion');
}