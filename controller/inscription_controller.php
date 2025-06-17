<?php 

require_once("model/utilisateurs_model.php");

function index()
{
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/inscription_view.php');
    require('view/autres_pages/footer.php');
}