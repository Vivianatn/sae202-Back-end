<?php 

require_once("model/contact_model.php");

function index()
{
    if(isset($_SESSION['user_email'])){
        
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/contact_view.php');
    require('view/autres_pages/footer.php');
    }else{
        /* require('view/autres_pages/header.php');
        require('view/autres_pages/menu.php');
        require('view/proposition_view.php');
        require('view/autres_pages/footer.php'); */
        header('Location: /connexion');
    }
}

function contactadmin()
{
    if(!empty($_POST['mesad_titre']) && !empty($_POST['mesad_contenu'])){
        envoiAdmin($_POST['mesad_contenu'], $_POST['mesad_titre']);
        header('Location: /');
    }else{
        header('Location: /contact');
    }
}