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

    /* $messages_envoyes = getMessageDestinataire();
    $messages_recus = getMessageExpediteur(); */
    $messagerie = getUtilisateurs();
    if(isset($_POST['expe']) && $_POST['expe'] != null){
        $expe = $_POST['expe'];
    }
    
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/envoi_view.php');
    require('view/autres_pages/footer.php');
}

function destinataire(){

    $messages = getMessageById();
    getMessageLuDestinataire();

    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/message_view.php');
    require('view/autres_pages/footer.php');
    }

function expediteur(){

    $messages = getMessageById();
    getMessageLuExpediteur();
    
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/message_view.php');
    require('view/autres_pages/footer.php');
    }

function reception(){
    if(!empty($_POST['user']) && !empty($_POST['mes_contenu'])){
        $resultat = verif_utilisateur($_POST['user']);
        envoiDestinataire($_POST['mes_contenu'], $_POST['user'], $_POST['mes_titre']);
        header('Location: /messagerie');
    }else{
        header('Location: /messagerie/envoi');
    }
}

function reponse(){

}