<!-- <section class="hero-banner-section">
        <img src="view/img/banniere3.png" alt="Bannière d'accueil Entrez dans l'ombre d'un meurtre" class="background-image">

        <div class="fanion-container">
            <img src="view/img/fanion14.png" alt="Fanion décoratif">
        </div>
                    <div class="row justify-content-center">
        <div class="col-auto">
          <button class="btn bg-custom-button px-5 py-3 fs-4">Démarrer l'enquête</button>
        </div>
      </div>
    </section> -->
    <section class="fond_contact">
<div class="contact-page-wrapper">
    <div class="contact-container">
        <form action="/accueil/envoyer" method="post">
            <h2>Répondre à <?php echo $utilisateur; ?></h2>
            <h3><input class="hide" name="user_email" value="<?php echo $utilisateur; ?>"></input></h3>

            <label for="subject-input" class="form-label-contact">Objet</label>
            <input type="text" id="subject-input" name="mes_titre" placeholder="" class="form-control-custom contact-input-subject">

            <label for="message-input" class="form-label-contact">Message...</label>
            <textarea id="message-input" name="mes_contenu" placeholder="" class="form-control-custom contact-textarea-message"></textarea>

            <button type="submit" class="bg-custom-button contact-submit-button">Envoyer</button>
        </form>
    </div>

    <div class="contact-decor-images">
        <img class="img-rotated-corner" src="https://placehold.co/1942x1570" alt="Décoration coin 1"/>
        <img class="img-side-top" src="https://placehold.co/1134x1386" alt="Décoration latérale supérieure"/>
        <img class="img-side-bottom" src="https://placehold.co/1645x2011" alt="Décoration latérale inférieure"/>
        <img class="img-bottom-banner" src="https://placehold.co/1920x667" alt="Bannière bas de page"/>
    </div>
</div>
</section>