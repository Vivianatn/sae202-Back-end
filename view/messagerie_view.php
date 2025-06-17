<div>
    <h1>Messages reçus</h1>
        <table border="1">
        <tr>
            <td>Id</td>
            <td>Contenu</td>
            <td>Destinataire</td>
            <td>Expéditeur</td>
        </tr>
        <?php
            foreach ($messages_envoyes as $message) {
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