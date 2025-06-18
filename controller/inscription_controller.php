<?php 

require_once("model/utilisateurs_model.php");

function index()
{
    $error_message = '';
    $success_message = '';

    // Exemple de comment vous pourriez gérer une erreur renvoyée par le contrôleur
    // Dans un vrai contrôleur, vous passeriez ces variables à la vue
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'email_exists') {
            $error_message = 'Cette adresse e-mail est déjà utilisée.';
        } elseif ($_GET['error'] == 'password_mismatch') {
            $error_message = 'Les mots de passe ne correspondent pas.';
        } elseif ($_GET['error'] == 'invalid_input') {
            $error_message = 'Veuillez remplir tous les champs obligatoires ou vérifier leur format.';
        }
    }
    if (isset($_GET['success']) && $_GET['success'] == 'registered') {
        $success_message = 'Votre inscription a été effectuée avec succès !';
    }

    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/inscription_view.php');
    require('view/autres_pages/footer.php');
}