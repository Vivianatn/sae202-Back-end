<div class="profile-container">
    <h1>Votre Profil :</h1>
    <?php
    echo '<img class="pdp" src="view/img/pdp/'.$_SESSION['user_photo'].'" alt="Photo de profil">';
    ?>
    <h2>Votre adresse email : <span><?php echo $_SESSION['user_email']; ?></span></h2>
    <h2>Votre nom : <span><?php echo $_SESSION['user_nom']; ?></span></h2>
    <h2>Votre prénom : <span><?php echo $_SESSION['user_prenom']; ?></span></h2> 
    <h2>Votre numéro de téléphone : <span><?php echo $_SESSION['user_tel']; ?></span></h2> 
    <div class="col-12 text-center mt-4">
        <a href="/modification" class="btn btn-outline-primary px-5 py-3 fs-4">Modification</a>
    </div>
</div>