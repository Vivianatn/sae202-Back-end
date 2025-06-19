<?php
require_once("conf/conf.inc.php");
require_once("model/utilisateurs_model.php");

function index(){
require('view/autres_pages/header.php');
require('view/autres_pages/menu.php');
require('view/modification_view.php');
require('view/autres_pages/footer.php');
}

function modifier(){
    modificationUtilisateur($_POST['user_nom'], $_POST['user_prenom'], $_POST['user_tel'], $_POST['user_email'], $_POST['user_photo']);
    header('Location: /profil');
}