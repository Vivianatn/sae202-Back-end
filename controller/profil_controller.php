<?php

require_once("conf/conf.inc.php");
require_once("model/accueil_model.php");

function index(){

    $user = getProfil();
    
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/profil_view.php');
    require('view/autres_pages/footer.php');
}