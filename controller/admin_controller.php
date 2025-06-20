<?php
require_once("../conf/conf.inc.php");
require_once("../model/accueil_model.php");

function index(){
    $parties = getUtilisateurs();
    $commentaires = getCommentaires();
    $demandes = getMessagesAdmin();
    $commentairesGestion = getCommentairesGestion();
    $inscrits = getUtilisateursInscrits();

    $titre="Voici tous les comptes:"; 

    require('../view/autres_pages/header.php');
    require('../view/autres_pages/menu.php');
    require('../view/admin_view.php');
    require('../view/autres_pages/footer.php');
}