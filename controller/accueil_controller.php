<?php
require_once("conf/conf.inc.php");
require_once("model/accueil_model.php");
require_once("model/reservation_model.php");

function index(){

$parties = getUtilisateurs();
$commentaires_verif = commentaireVerifie();
$nb_inscrits = verif_reservation();
  
$titre="Voici tous les comptes:";

require('view/autres_pages/header.php');
require('view/autres_pages/menu.php');
require('view/accueil_view.php');
require('view/autres_pages/footer.php');
}

function profil(){

$user = getProfil();
    
require('view/autres_pages/header.php');
require('view/autres_pages/menu.php');
require('view/accueil_view.php');
require('view/autres_pages/footer.php');
}

function repondre(){

    /* $admin = envoiReponseAdmin($_POST['id']); */
    $utilisateur = $_POST['user_email'];

    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/reponse_view.php');
    require('view/autres_pages/footer.php');
    }

function suppression(){
    supprimeUtilisateur($_POST['id']);

    header("Location: /gestion");
}

function supprimer(){
    supprimeMessage($_POST['id']);

    header("Location: /gestion");
}


function admettre(){
    admettreCommentaire($_POST['id']);

    header("Location: /gestion");
}

function bannir(){
    supprimeCommentaire($_POST['id']);

    header("Location: /gestion");
}


function commentaire(){
    envoiCommentaire($_POST['com_contenu']);

    header("Location: /");
}

function envoyer(){
    if(!empty($_POST['mes_titre']) && !empty($_POST['mes_contenu'])){
        envoiReponseAdmin($_POST['mes_contenu'], $_POST['mes_titre'], $_POST['user_email']);
        header('Location: /gestion');
    }else{
        header('Location: /gestion');
    }
}

function lu(){
    luAdmin($_POST['id']);

    header("Location: /gestion");
}