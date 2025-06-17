<?php
require_once("model/messagerie_model.php");
require_once("model/utilisateurs_model.php");

function index(){

$messages_envoyes = getMessageDestinataire();
$messages_recus = getMessageExpediteur();

require('view/autres_pages/header.php');
require('view/autres_pages/menu.php');
require('view/messagerie_view.php');
require('view/autres_pages/footer.php');
}

function envoi(){

    $messages_envoyes = getMessageDestinataire();
    $messages_recus = getMessageExpediteur();
    
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/envoi_view.php');
    require('view/autres_pages/footer.php');
    }

function reception(){
    if(!empty($_POST['mes_dest']) && !empty($_POST['mes_contenu'])){
        $resultat = verif_utilisateur($_POST['mes_dest']);
        envoiDestinataire($_POST['mes_contenu'], $_POST['mes_dest']);
        header('Location: /messagerie');
    }else{
        header('Location: /messagerie/envoi');
    }
}