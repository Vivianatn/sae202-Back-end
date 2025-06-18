<?php
require_once("conf/conf.inc.php");
require_once("model/accueil_model.php");

function index(){

$parties = getUtilisateurs();
$commentaires_verif = commentaireVerifie();
  
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

function suppression(){
    supprimeUtilisateur($_POST['id']);

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