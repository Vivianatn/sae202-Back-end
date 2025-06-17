<a href="/messagerie/envoi"><button> Envoyer un message </button></a>
<div>
    <h1>Messages reçus</h1>
        <!-- <table border="1">
        <tr>
            <td>Id</td>
            <td>Contenu</td>
            <td>Destinataire</td>
            <td>Expéditeur</td>
        </tr> -->
        
        <?php
            foreach ($messages_envoyes as $message) {
                if($message['mes_lu_dest'] == 0){
                    $lu = '<p class="text-danger">Non lu</p>';
                } else {
                    $lu = '<p class="text-success">Lu</p>';
                }
                echo '<form action="/messagerie/destinataire" method="post">';
                echo '<p>ID : ' . $message['mes_id'].'</p>';
                echo '<br>';
                echo '<p>Titre : ' . $message['mes_titre'].'</p>';
                echo '<br>';
                echo '<p>De : ' . $message['mes_expediteur'].'</p>';
                echo '<br>';
                echo 'Etat: '.$lu;
                echo '<br>';
                echo '<button type="submit" name="id" value="'.$message['mes_id'].'" class="btn bg-custom-button px-4 py-2 mt-auto">Voir le message</button>';
                echo '<br>';
                echo '</form>';
                echo '<hr>';
            }
        ?>
        <!-- </table> -->
</div>

<hr>

<div>
    <h1>Messages envoyés</h1>
        <!-- <table border="1">
        <tr>
            <td>Id</td>
            <td>Contenu</td>
            <td>Destinataire</td>
            <td>Expéditeur</td>
        </tr> -->
        <?php
        foreach ($messages_recus as $message) {
            if($message['mes_lu_expe'] == 0){
                $lu = '<p class="text-danger">Non lu</p>';
            } else {
                $lu = '<p class="text-success">Lu</p>';
            }
            echo '<form action="/messagerie/expediteur" method="post">';
            echo '<p>ID : ' . $message['mes_id'].'</p>';
            echo '<br>';
            echo '<p>Titre : ' . $message['mes_titre'].'</p>';
            echo '<br>';
            echo '<p>A : ' . $message['mes_destinataire'].'</p>';
            echo '<br>';
            echo 'Etat: '.$lu;
            echo '<br>';
            echo '<button type="submit" name="id" value="'.$message['mes_id'].'" class="btn bg-custom-button px-4 py-2 mt-auto">Voir le message</button>';
            echo '<br>';
            echo '</form>';
            echo '<hr>';
        }
            /* foreach ($messages_recus as $message) {
                echo '<tr>';
                echo '<td>' . $message['mes_id'] . '</td>';
                echo '<td>' . $message['mes_contenu'] . '</td>';
                echo '<td>' . $message['mes_destinataire'] . '</td>';
                echo '<td>' . $message['mes_expediteur'] . '</td>';
                echo '</tr>';
            } */
        ?>
        <!-- </table> -->
</div>