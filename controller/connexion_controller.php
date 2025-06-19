<?php

require_once("model/utilisateurs_model.php");

function index(){

    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/connexion_view.php');
    require('view/autres_pages/footer.php');
}

// Fonction pour afficher la page d'inscription

//la function connexion nous permet de vérifier si l'utilisateur est bien existant
function verif_connexion(): void
{
   /*  var_dump($_POST);
    die(); */
    //on vérifie si les champs sont bien remplis
    if(isset($_POST['user_email']) && isset($_POST['user_mdp']))
    {    
        
       
        //on uili se la fonction verif_utilisateur du modèle clients_model
      	//cette fonction n'existe pas encore dans notre modele, nous allons l'ecrire apres.
        $resultat = verif_utilisateur($_POST['user_email']);
      

        
        //on vérifie si le login et le mot de passe sont corrects avec le hash du mot de passe
        //Attention $_post et $resultats sont deux variables differentes
        if($resultat['user_email']==$_POST['user_email'] && password_verify($_POST['user_mdp'], $resultat['user_mdp']))
        {

            
            //si c'est le cas, on crée une session pour l'utilisateur
            session_start();
            $_SESSION['user_nom']=$resultat['user_nom'];
            $_SESSION['user_email']=$resultat['user_email']; 
            $_SESSION['user_prenom']=$resultat['user_prenom']; 
            $_SESSION['user_id']=$resultat['user_id']; 
            $_SESSION['user_tel']=$resultat['user_tel']; 
            $_SESSION['user_mdp']=$resultat['user_mdp']; 
            $_SESSION['user_photo']=$resultat['user_photo']; 
            /* $_SESSION['user_nom']=$resultat['user_nom'];    */
            
            //on redirige l'utilisateur vers la page d'accueil
            header('Location: /');
            //on affiche un message de connexion réussie
            //echo 'connexion réussie';
        }
        else
        {
            header('Location: /connexion');
            //on affiche un message d'erreur si le login ou le mot de passe sont incorrects
            echo 'erreur de connexion login ou mot de passe incorrects';
        }
        
    }
    else
    {
        header('Location: /connexion');
        //si les champs ne sont pas remplis
        //on affiche un message d'erreur si les champs ne sont pas remplis
        echo 'erreur de connexion les champs ne sont pas remplis';
    }
}

// Fonction pour se déconnecter
function deconnexion()
{
    // On démarre la session
    session_start();
    // On détruit la session
    session_destroy();
    // On redirige l'utilisateur vers la page d'accueil
    header('Location: /');
}

//inscription d'un client
function validation_inscription()
{
    //on vérifie si les champs sont bien remplis
    if(!empty($_POST['user_email']) && !empty($_POST['user_mdp']) && !empty($_POST['user_mdp2']) && !empty($_POST['user_prenom']) && !empty($_POST['user_nom']) && !empty($_POST['user_tel']))
    {   
        /* var_dump($_POST['user_email'], $_POST['user_mdp'], $_POST['user_mdp2'], $_POST['user_prenom'], $_POST['user_tel']);
        die(); */
        //on vérifie si les deux mots de passe sont identiques
        if($_POST['user_mdp']==$_POST['user_mdp2'])
        {
            //on vérifie si l'utilisateur existe déjà
            $resultat=verif_utilisateur($_POST['user_email']);
            
            /* var_dump(password_hash($_POST['user_mdp'],PASSWORD_DEFAULT));
            die(); */
            if(!$resultat)
            {
                //on hash le mot de passe
                //on crée un nouvel utilisateur
                inscription_utilisateur(
                    $_POST['user_prenom'],
                    $_POST['user_nom'], 
                    $_POST['user_email'], 
                    $_POST['user_tel'], 
                    password_hash($_POST['user_mdp'],PASSWORD_DEFAULT),
                    $_POST['user_photo']
                );
                //on crée une session pour l'utilisateur
                session_start();
                $_SESSION['user_nom']=$resultat['user_nom'];
                $_SESSION['user_email']=$resultat['user_email']; 
                $_SESSION['user_prenom']=$resultat['user_prenom']; 
                $_SESSION['user_id']=$resultat['user_id']; 
                $_SESSION['user_tel']=$resultat['user_tel']; 
                $_SESSION['user_mdp']=$resultat['user_mdp']; 
                $_SESSION['user_photo']=$resultat['user_photo']; 
                //on redirige l'utilisateur vers la page d'accueil
                header('Location: /connexion');
                //echo 'utilisateur créé';
            }
            else
            {
                //si l'utilisateur existe déjà, on redirige l'utilisateur vers la page de connexion
                header('Location: /connexion');
                //echo 'utilisateur existe déjà';
            }
        }
        else
        {
            //si les deux mots de passe ne sont pas identiques, on redirige l'utilisateur vers la page d'inscription
            header('Location: /connexion/inscription');
            //echo 'mots de passe différents';
        }
    }
    else
    {   
        /* var_dump($_POST['user_email'], $_POST['user_mdp'], $_POST['user_mdp2'], $_POST['user_prenom'], $_POST['user_nom'], $_POST['user_tel']);
        die(); */
        //si les champs ne sont pas remplis, on redirige l'utilisateur vers la page d'inscription
        header('Location: /connexion/inscription');
        //echo 'champs non remplis';
    }
}