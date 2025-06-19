<?php
require_once 'model/reservation_model.php';
?>

<div class="profile-container">
    <h1><?php echo $_SESSION['user_prenom'].' '.$_SESSION['user_nom']; ?></h1>
    <?php
    echo '<img class="pdp" src="view/img/pdp/'.$_SESSION['user_photo'].'" alt="Photo de profil">';
    ?>
    <h2>Votre adresse email : <span><?php echo $_SESSION['user_email']; ?></span></h2>
    <h2>Votre numéro de téléphone : <span><?php echo $_SESSION['user_tel']; ?></span></h2> 
    <span><?php 
    
    /* echo $_SESSION['user_tel'];  */
    echo '<div class="col-12"><div class="alert alert-info" role="alert">Aucune réservation pour la prochaine session.</div></div>';
    ?></span>
    <div class="col-12 text-center mt-4">
        <a href="/modification" class="btn btn-outline-primary px-5 py-3 fs-4">Modification</a>
    </div>
</div>