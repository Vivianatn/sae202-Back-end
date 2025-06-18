<main>
    <section class="container-fluid bg-custom-grey py-5 section-border">
      <div class="row justify-content-center text-center">
        <div class="col-12">
          <h1 class="display-4 fw-normal text-dark mb-4">Bienvenue dans l'administration    </h1>
          <p class="lead fw-normal text-dark">Ici, vous pouvez administrer tout le site</p>
        </div>
      </div>
     <!--  <div class="row justify-content-around py-4">
        <div class="col-md-3 mb-4">
          <div class="image-placeholder p-5 text-center" style="height: 224px;">
            <p>Image Placeholder 1</p>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="image-placeholder p-5 text-center" style="height: 224px;">
            <p>Image Placeholder 2</p>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="image-placeholder p-5 text-center" style="height: 224px;">
            <p>Image Placeholder 3</p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-auto">
          <button class="btn bg-custom-button px-5 py-3 fs-4">Démarrer l’enquête</button>
        </div>
      </div> -->
</section>  

    <!-- <section class="container-fluid py-5">
      <div class="row text-center mb-5">
        <div class="col-12">
          <h2 class="fw-normal text-dark">Notre prochaine session se déroulera dans...</h2>
          <div class="text-custom-yellow display-1 fw-bold my-4">12 jours 13 heures 8 minutes</div>
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
    </section> -->

    <section class="container py-5">
        <h1 class="mb-4"><?php echo $titre; ?></h1>
        <div class="table-responsive mb-5">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Prénom</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Mot de passe</th>
                        <th class="text-center">Suppression</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assurez-vous que $parties est défini avant de l'itérer&& is_array($parties)
                    if (!empty($parties)) {    
                        foreach ($parties as $partie) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($partie['user_nom']) . '</td>';
                            echo '<td>' . htmlspecialchars($partie['user_prenom']) . '</td>';
                            echo '<td>' . htmlspecialchars($partie['user_email']) . '</td>';
                            echo '<td>' . htmlspecialchars($partie['user_mdp']) . '</td>';
                            echo '<td><form class="text-center" action="../accueil/suppression" method="post"><button class="btn btn-outline-danger" type="submit" name="id" value="'.$partie['user_id'].'">Supprimer</button></form></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5" class="text-center">Aucune compte n\'a été créé.</td></tr>';
                    }
                    ?>
                 </tbody>
            </table>
        </div>
        <hr>
        <h1 class="mb-4">Commentaire à vérifier :</h1>
        <div class="table-responsive mb-5">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Utilisateur</th>
                        <th class="text-center">Commentaire</th>
                        <th class="text-center">Date et Heure</th>
                        <th class="text-center">Admission</th>
                        <th class="text-center">Suppression</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assurez-vous que $parties est défini avant de l'itérer&& is_array($commentaires)
                    if (!empty($commentaires)) {    
                        foreach ($commentaires as $commentaire) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($commentaire['user_email']) . '</td>';
                            echo '<td>' . htmlspecialchars($commentaire['com_contenu']) . '</td>';
                            echo '<td>' . htmlspecialchars($commentaire['com_date']) . '</td>';
                            echo '<td><form class="text-center" action="../accueil/admettre" method="post"><button class="btn btn-outline-primary" type="submit" name="id" value="'.$commentaire['com_id'].'">Admettre</button></form></td>';
                            echo '<td><form class="text-center" action="../accueil/bannir" method="post"><button class="btn btn-outline-danger" type="submit" name="id" value="'.$commentaire['com_id'].'">Supprimer</button></form></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5" class="text-center">Aucun commentaire à vérifier.</td></tr>';
                    }
                    ?>
                 </tbody>
            </table>
        </div>
        <hr>
        <h1 class="mb-4">Demande des utilisateurs :</h1>
        <div class="table-responsive mb-5">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Titre</th>
                        <th class="text-center">Message</th>
                        <th class="text-center">Utilisateur</th>
                        <th class="text-center">Suppression du message</th>
                        <th class="text-center">Répondre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assurez-vous que $parties est défini avant de l'itérer&& is_array($commentaires)
                    /* var_dump($demandes); */
                    if (!empty($demandes)) {    
                        foreach ($demandes as $demande) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($demande['mesad_titre']) . '</td>';
                            echo '<td>' . htmlspecialchars($demande['mesad_contenu']) . '</td>';
                            echo '<td>' . htmlspecialchars($demande['user_email']) . '</td>';
                            echo '<td><form class="text-center" action="../accueil/supprimer" method="post"><button class="btn btn-outline-danger" type="submit" name="id" value="'.$demande['mesad_id'].'">Supprimer</button></form></td>';
                            echo '<td><form class="text-center" action="../accueil/repondre" method="post"><button class="btn btn-success" type="submit" name="user_email" value="'.$demande['user_email'].'">Répondre</button></form></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5" class="text-center">Aucun nouveau message.</td></tr>';
                    }
                    ?>
                 </tbody>
            </table>
        </div>


        </section>

<!--         <hr class="my-5">

        <h1 class="mb-4">Notre événement</h1>
        <p class="lead mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae unde ipsum placeat deserunt distinctio voluptas aut accusantium suscipit consequuntur dicta! Eligendi soluta delectus sed ad ullam! Minima facilis laborum inventore? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est eaque officiis molestiae facilis doloremque ratione, amet unde veritatis ducimus quasi quis voluptatibus et aliquid maiores, voluptas harum, minima obcaecati iste!</p>
        <button class="btn bg-custom-button mb-5">En savoir plus</button>

        <hr class="my-5">

        <h1 class="mb-4">Voici les commentaires :</h1>
        <div class="alert alert-info" role="alert">
            Aucun commentaire pour l'instant.
        </div>
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
                <h3 class="fs-4 fw-bold mb-3" style="font-family: 'Times New Roman', serif; line-height: 1.2;">Une question ? Besoin d’aide ?</h3>
                <button class="btn bg-custom-button px-4 py-2 mt-auto">Besoin d’aide ?</button>
            </div>
        </div>
    </section>

    <section class="container-fluid bg-custom-yellow py-5">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-12">
                <h2 class="display-4 fw-normal text-dark mb-4">Saurez-vous percer le mystère ?</h2>
                <p class="fs-4 text-dark" style="font-family: 'Inter', sans-serif;">Démarrer l’enquête</p>
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
        </div> -->
<!--         <div class="row justify-content-around text-center my-5">
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
    </section> -->

  </main>