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
                echo '<form action="/messagerie/message" method="post">';
                echo '<p name="user_id">ID : ' . $message['mes_id'].'</p>';
                echo '<br>';
                echo '<p>Titre : ' . $message['mes_titre'].'</p>';
                echo '<br>';
                echo '<p>De : ' . $message['mes_expediteur'].'</p>';
                echo '<br>';
                echo '<p>De : ' . if($message['mes_lu']).'</p>';
                echo '<br>';
                echo '<button type="submit" class="btn bg-custom-button px-4 py-2 mt-auto">Voir le message</button>';
                echo '<br>';
                echo '</form>';
            }
        ?>
        <!-- </table> -->
</div>

<hr>

<div>
    <h1>Messages envoyés</h1>
        <table border="1">
        <tr>
            <td>Id</td>
            <td>Contenu</td>
            <td>Destinataire</td>
            <td>Expéditeur</td>
        </tr>
        <?php
            foreach ($messages_recus as $message) {
                echo '<tr>';
                echo '<td>' . $message['mes_id'] . '</td>';
                echo '<td>' . $message['mes_contenu'] . '</td>';
                echo '<td>' . $message['mes_destinataire'] . '</td>';
                echo '<td>' . $message['mes_expediteur'] . '</td>';
                echo '</tr>';
            }
        ?>
        </table>
</div>

<a href="/messagerie/envoi"><button> Envoyer un message </button></a>