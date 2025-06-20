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
        <h1 class="mb-4">Commentaire(s) à vérifier :</h1>
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
        <h1 class="mb-4">Gestion des commentaires :</h1>
        <div class="table-responsive mb-5">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Utilisateur</th>
                        <th class="text-center">Commentaire</th>
                        <th class="text-center">Date et Heure</th>
                        <!-- <th class="text-center">Admission</th> -->
                        <th class="text-center">Suppression</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assurez-vous que $parties est défini avant de l'itérer&& is_array($commentaires)
                    if (!empty($commentairesGestion)) {    
                        foreach ($commentairesGestion as $commentaire) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($commentaire['user_email']) . '</td>';
                            echo '<td>' . htmlspecialchars($commentaire['com_contenu']) . '</td>';
                            echo '<td>' . htmlspecialchars($commentaire['com_date']) . '</td>';
                            /* echo '<td><form class="text-center" action="../accueil/admettre" method="post"><button class="btn btn-outline-primary" type="submit" name="id" value="'.$commentaire['com_id'].'">Admettre</button></form></td>'; */
                            echo '<td><form class="text-center" action="../accueil/bannir" method="post"><button class="btn btn-outline-danger" type="submit" name="id" value="'.$commentaire['com_id'].'">Supprimer</button></form></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5" class="text-center">Aucun commentaire à gérer.</td></tr>';
                    }
                    ?>
                 </tbody>
            </table>
        </div>
        <hr>
        <h1 class="mb-4">Demande des utilisateurs :</h1>
        <em class="mb-4">Conseil : supprimer un message quand vous y avez répondu ou alors marque le comme "répondu".</em>
        <br><br>
        <div class="table-responsive mb-5">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Titre</th>
                        <th class="text-center">Message</th>
                        <th class="text-center">Utilisateur</th>
                        <th class="text-center">Suppression du message</th>
                        <th class="text-center">Répondre</th>
                        <th class="text-center">Etat</th>
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
                            if( $demande['mesad_lu'] == 0){
                                echo '<td class="text-center"><form class="text-center" action="../accueil/lu" method="post"><button type="submit" name="id" value="'.$demande['mesad_id'].'" class="btn btn-danger">Non répondu</button></form></td>';
                            } else {
                                echo '<td class="text-center"><button class="btn btn-outline-success">Répondu</button></td>';
                            }
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5" class="text-center">Aucun demande à traiter.</td></tr>';
                    }
                    ?>
                 </tbody>
            </table>
        </div>
        <hr>
        <h1 class="mb-4">Utilisateurs inscrits à l'événement :</h1>
        <div class="table-responsive mb-5">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Numértation</th>
                        <th class="text-center">Réservateur</th>
                        <th class="text-center">Tarif</th>
                        <th class="text-center">Cout (en €)</th>
                        <th class="text-center">Email de réservation</th>
                        <th class="text-center">Suppression de la réservation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assurez-vous que $parties est défini avant de l'itérer&& is_array($commentaires)
                    /* var_dump($demandes); */
                    if (!empty($inscrits)) {    
                      $nb = 1;
                        foreach ($inscrits as $inscrit) {
                            echo '<tr>';
                            echo '<td>' . $nb . '</td>';
                            echo '<td>' . htmlspecialchars($inscrit['user_nom']) .' '. htmlspecialchars($inscrit['user_nom']).'</td>';
                            echo '<td>' . htmlspecialchars($inscrit['tarif_titre']) . '</td>';
                            echo '<td>' . htmlspecialchars($inscrit['tarif_argent']) . '</td>';
                            echo '<td>' . htmlspecialchars($inscrit['reserv_email']) . '</td>';
                            echo '<td><form class="text-center" action="/reservation/annuler" method="post"><button class="btn btn-outline-danger" type="submit" name="id" value="'.$inscrit['user_id'].'">Supprimer</button></form></td>';
                            echo '</tr>';
                            $nb++;
                        }}
                            /* echo '<td><form class="text-center" action="../accueil/repondre" method="post"><button class="btn btn-success" type="submit" name="user_email" value="'.$inscrit['user_email'].'">Répondre</button></form></td>'; */
                           /*  if( $inscrit['mesad_lu'] == 0){
                                echo '<td class="text-center"><form class="text-center" action="../accueil/lu" method="post"><button type="submit" name="id" value="'.$inscrit['mesad_id'].'" class="btn btn-danger">Non répondu</button></form></td>';
                            } else {
                                echo '<td class="text-center"><button class="btn btn-outline-success">Répondu</button></td>';
                            }
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5" class="text-center">Aucune réservation.</td></tr>';
                    } */
                    ?>
                 </tbody>
            </table>
        </div>
        </section>
        </section>