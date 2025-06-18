    <div class="container py-4">
        <br><br>
        <h1 class="mb-4">Messages reçus</h1>
        <div class="row">
        <?php
        if (isset($messages_envoyes) && is_array($messages_envoyes) && !empty($messages_envoyes)) {
            foreach ($messages_envoyes as $message) {
                $lu_class = ($message['mes_lu_dest'] == 0) ? 'text-danger' : 'text-success';
                $lu_text = ($message['mes_lu_dest'] == 0) ? 'Non lu' : 'Lu';
                
                echo '<div class="col-12 mb-3">'; // Chaque message dans une colonne
                echo '<div class="card bg-custom-grey border-dark">'; // Carte pour le message
                echo '<div class="card-body">';
                echo '<form action="/messagerie/destinataire" method="post">';
                echo '<h5 class="card-title mb-2">Titre: ' . htmlspecialchars($message['mes_titre']) . '</h5>';
                echo '<p class="card-text mb-1"><strong>De:</strong> ' . htmlspecialchars($message['mes_expediteur']) . '</p>';
                echo '<p class="card-text ' . $lu_class . ' mb-3"><strong>État:</strong> ' . $lu_text . '</p>';
                // Bouton "Voir le message"
                echo '<button type="submit" name="id" value="' . htmlspecialchars($message['mes_id']) . '" class="btn bg-custom-button px-4 py-2">Voir le message</button>';
                echo '</form>';
                echo '</div>'; // Fin card-body
                echo '</div>'; // Fin card
                echo '</div>'; // Fin col
            }
        } else {
            echo '<div class="col-12"><div class="alert alert-info" role="alert">Aucun message reçu pour l\'instant.</div></div>';
        }
        ?>
    </div>

    <hr class="my-5">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Messages envoyés</h1>
    <a href="/messagerie/envoi" class="btn btn-success px-4 py-2">Envoyer un message</a>
</div>
    <div class="row">
        <?php
        if (isset($messages_recus) && is_array($messages_recus) && !empty($messages_recus)) {
            foreach ($messages_recus as $message) {
                /* var_dump($message); */
                $lu_class = ($message['mes_lu_expe'] == 0) ? 'text-danger' : 'text-success';
                $lu_text = ($message['mes_lu_expe'] == 0) ? 'Non lu' : 'Lu';
                $lu_class_dest = ($message['mes_lu_dest'] == 0) ? 'text-danger' : 'text-success';
                $lu_text_dest = ($message['mes_lu_dest'] == 0) ? 'Non lu' : 'Lu';

                echo '<div class="col-12 mb-3">'; // Chaque message dans une colonne
                echo '<div class="card bg-custom-grey border-dark">'; // Carte pour le message
                echo '<div class="card-body">';
                echo '<form action="/messagerie/expediteur" method="post">';
                echo '<h5 class="card-title mb-2">Titre: ' . htmlspecialchars($message['mes_titre']) . '</h5>';
                echo '<p class="card-text mb-1"><strong>À:</strong> ' . htmlspecialchars($message['mes_destinataire']) . '</p>';
                echo '<p class="card-text ' . $lu_class . ' mb-3"><strong>État:</strong> ' . $lu_text . '</p>';
                echo '<p class="card-text ' . $lu_class_dest . ' mb-3"><strong>A été</strong> ' . $lu_text_dest . '</p>';
                // Bouton "Voir le message"
                echo '<button type="submit" name="id" value="' . htmlspecialchars($message['mes_id']) . '" class="btn bg-custom-button px-4 py-2">Voir le message</button>';
                echo '</form>';
                echo '</div>'; // Fin card-body
                echo '</div>'; // Fin card
                echo '</div>'; // Fin col
            }
        } else {
            echo '<div class="col-12"><div class="alert alert-info" role="alert">Aucun message envoyé pour l\'instant.</div></div>';
        }
        ?>
    </div>
</div>