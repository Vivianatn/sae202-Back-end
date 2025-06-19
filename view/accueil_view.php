<main>
    <section class="hero-banner-section">
        <img src="view/img/banniere3.png" alt="Bannière d'accueil Entrez dans l'ombre d'un meurtre" class="background-image">

        <div class="fanion-container">
            <img src="view/img/fanion1.png" alt="Fanion décoratif">
        </div>
                    <div class="row justify-content-center">
        <div class="col-auto">
          <button class="btn bg-custom-button px-5 py-3 fs-4">Démarrer l'enquête</button>
        </div>
      </div>
    </section>
    <section class="container-fluid bg-custom-grey py-5 section-border">
      <div class="row justify-content-center text-center">
        <div class="col-12">
          <h1>Plongez au cœur du Second Empire, enquêtez dans le salon <br/>d'un comte assassiné, fouillez les indices, confrontez <br/>les témoignages, et démasquez le meurtrier…</h1>
        </div>
      </div>
    </section>

    <section class="container-fluid py-5">
      <div class="row text-center mb-5">
        <div class="col-12">
          <h2 class="fw-normal text-dark">Notre prochaine session se déroulera dans...</h2>
 <div id="countdown" class="text-custom-yellow display-1 fw-bold my-4"></div>
          <div class="row justify-content-center mt-5">
            <div class="col-md-4 mb-3">
              <div class="testimonial-block p-4">
                <p class="fs-5 text-center">Illud tamen clausos vehementer angebat quod</p>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="testimonial-block p-4">
                <p class="fs-5 text-center">Illud tamen clausos vehementer angebat quod</p>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="testimonial-block p-4">
                <p class="fs-5 text-center">Illud tamen clausos vehementer angebat quod</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row text-center mb-5">
        <div class="col-12">
          <h2 class="fw-normal text-dark">Quelques témoignages pour vous donnez envie de <br/>plonger dans notre univers.</h2>
          <div class="row justify-content-around py-4">
            <div class="col-md-4 mb-4">
              <div class="testimonial-block p-5 text-center" style="height: 224px;">
                <p>Témoignage 1</p>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="testimonial-block p-5 text-center" style="height: 224px;">
                <p>Témoignage 2</p>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="testimonial-block p-5 text-center" style="height: 224px;">
                <p>Témoignage 3</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container py-5">
        </div>

        <hr class="my-5">

        <h1 class="mb-4">Notre événement</h1>
        <p class="lead mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae unde ipsum placeat deserunt distinctio voluptas aut accusantium suscipit consequuntur dicta! Eligendi soluta delectus sed ad ullam! Minima facilis laborum inventore? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est eaque officiis molestiae facilis doloremque ratione, amet unde veritatis ducimus quasi quis voluptatibus et aliquid maiores, voluptas harum, minima obcaecati iste!</p>
        <a href="/concept" class="btn bg-custom-button mb-5">En savoir plus</a>

        <hr class="my-5">

        <div class="container py-4">
        <br><br>
        <div class="row"></div>
        <h1 class="mb-4">Voici les commentaires :</h1>
        <?php
          if(!empty($commentaires_verif)){
            foreach ($commentaires_verif as $commentaire) {
              
              echo '<div class="col-12 mb-3">'; // Chaque message dans une colonne
              echo '<div class="card bg-custom-grey border-dark">'; // Carte pour le message
              echo '<div class="card-body">';
              echo '<h1 class="card-text mb-1"><img class="pdp" src="view/img/pdp/'.$commentaire['user_photo'].'" alt="Photo de profil">' . htmlspecialchars($commentaire['user_prenom']) .' '. htmlspecialchars($commentaire['user_nom']) .'</h1><em class="com-desc">le '.htmlspecialchars(substr($commentaire['com_date'], 0, 10)).' à '.htmlspecialchars(substr($commentaire['com_date'], 11, 5)).'</em><br>';
              echo '<em class="card-text mb-1">Adresse : ' . htmlspecialchars($commentaire['user_email']) .' </em><br><br>';
              echo '<h4 class="card-title mb-2">' . htmlspecialchars($commentaire['com_contenu']) . '</h4>';
              // Bouton "Voir le message"
              /* echo '<button type="submit" name="id" value="' . htmlspecialchars($commentaire['mes_id']) . '" class="btn bg-custom-button px-4 py-2">Voir le message</button>'; */
              echo '</div>'; // Fin card-body
              echo '</div>'; // Fin card
              echo '</div>'; // Fin col
            }
          }else{
            echo '<div class="alert alert-info" role="alert">Aucun commentaire pour l\'instant.</div>';
          }
          
        ?>
        </div>
        </div>

        <?php
        if(isset($_SESSION['user_email'])) {
            echo '<h1>Laissez nous un commentaire :</h1>';
            echo '<form action="/accueil/commentaire" method="post">';
            echo '<br>';
            echo '<div class="col-12 col-md-6">
                    <input type="text" class="form-control form-control-custom" id="com_contenu" name="com_contenu" placeholder="Commentaire..." value="" required>
                  </div>';
            echo '<br><br>';
            echo '<button class="btn btn-success px-4 py-2">Envoyer</button>';
            echo '</form>';
        }
        ?>
    </section>

    <section class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-md-3 d-flex flex-column align-items-center mb-4">
                <div class="circle-placeholder rounded-circle mb-3" style="width: 164px; height: 164px;"></div>
                <h3 class="fs-4 fw-bold mb-3" style="font-family: 'Times New Roman', serif; line-height: 1.2;">Dates, lieux, tarifs et <br/>réservations.</h3>
                <button class="btn bg-custom-button px-4 py-2 mt-auto">En savoir plus</button>
            </div>
            <div class="col-auto d-flex align-items-center">
                <div class="rotated-line-90deg"></div>
            </div>
            <div class="col-md-3 d-flex flex-column align-items-center mb-4">
                <img src="https://placehold.co/271x258" alt="Placeholder" class="img-fluid mb-3" style="width: 271px; height: 258px;">
                <h3 class="fs-4 fw-bold mb-3" style="font-family: 'Times New Roman', serif; line-height: 1.2;">Espace joueur pour discuter, <br/>échanger des indices.</h3>
                <button class="btn bg-custom-button px-4 py-2 mt-auto">Partagez votre expérience</button>
            </div>
            <div class="col-auto d-flex align-items-center">
                <div class="rotated-line-90deg"></div>
            </div>
            <div class="col-md-3 d-flex flex-column align-items-center mb-4">
                <img src="https://placehold.co/480x456" alt="Placeholder" class="img-fluid mb-3" style="width: 300px; height: auto;">
                <h3 class="fs-4 fw-bold mb-3" style="font-family: 'Times New Roman', serif; line-height: 1.2;">Une question ? Besoin d'aide ?</h3>
                <button class="btn bg-custom-button px-4 py-2 mt-auto">Besoin d'aide ?</button>
            </div>
        </div>
    </section>

    <section class="container-fluid bg-custom-yellow py-5">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-12">
                <h2 class="display-4 fw-normal text-dark mb-4">Saurez-vous percer le mystère ?</h2>
                <p class="fs-4 text-dark" style="font-family: 'Inter', sans-serif;">Démarrer l'enquête</p>
                <div class="row justify-content-center align-items-center my-4">
                    <div class="col-md-4">
                        <img src="https://placehold.co/327x399" alt="Placeholder" class="img-fluid mb-3" style="width: 327px; height: 399px;">
                    </div>
                    <div class="col-md-6">
                        <p class="fs-5 text-dark" style="font-family: 'Times New Roman', serif;">
                            Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos <br/>vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare r<br/>estricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in terram defluat, aut ne plus <br/>aequo quid in amicitiam congeratur.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-around text-center my-5">
            <div class="col-md-3 mb-4">
                <img src="https://placehold.co/438x536" alt="Placeholder" class="img-fluid">
            </div>
            <div class="col-md-3 mb-4">
                <img src="https://placehold.co/410x501" alt="Placeholder" class="img-fluid">
            </div>
            <div class="col-md-3 mb-4">
                <img src="https://placehold.co/367x449" alt="Placeholder" class="img-fluid">
            </div>
        </div>
    </section>
</main>
<script src="view/js/countdown.js"></script>