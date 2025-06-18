<div>
    <?php 
    echo'<h1>'.$messages[0]['mes_titre'].'</h1>';
    echo'<h2>De : '.$messages[0]['mes_expediteur'].'</h2>';
    echo '<h2>A :' .$messages[0]['mes_destinataire'].'</h2>';
    echo '<h2>Message : '.$messages[0]['mes_contenu'].'</h2>';
    ?>
    <br>
    <form action="/messagerie/envoi" method="post">
    <button type="submit" name="expe" value="<?php echo $messages[0]['mes_expediteur']; ?>" class="btn btn-success px-4 py-2">Répondre</button>
    </form>
</div>