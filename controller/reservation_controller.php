<?php
require_once("conf/conf.inc.php");
require_once("model/reservation_model.php");
require_once("model/utilisateurs_model.php");

function index(){
if (isset($_SESSION['user_email'])) {
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/reservation_view.php');
    require('view/autres_pages/footer.php');
} else {
    header('Location: /inscription');
}

}

function reserver() {
    if ($_POST['user_email'] == $_SESSION['user_email']) {
            $reserv = verif_reservation();
            if($reserv[0]['COUNT(*)'] <= 4) {
                ajouterReservation($_SESSION['user_id']);
                header('Location: /concept');
            }else{
                header('Location: /');
            }
    } else {
        header('Location: /reservation');
}}