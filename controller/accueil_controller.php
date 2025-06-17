<?php
require_once("conf/conf.inc.php");
require_once("model/accueil_model.php");

function index(){

$parties = getUtilisateurs();
  
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