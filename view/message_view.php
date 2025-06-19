<div class="message-view-container">
    <h1><?php echo htmlspecialchars($messages[0]['mes_titre']); ?></h1>
    <div class="message-details-block">
        <h2>De : <span><?php echo htmlspecialchars($messages[0]['mes_expediteur']); ?></span></h2>
        <h2>À : <span><?php echo htmlspecialchars($messages[0]['mes_destinataire']); ?></span></h2>
        <h2 class="message-content-label">Message :</h2>
        <p class="message-content-text"><?php echo nl2br(htmlspecialchars($messages[0]['mes_contenu'])); ?></p>
    </div>
    <div class="text-center mt-4">
        <form action="/messagerie/envoi" method="post">
            <button type="submit" name="expe" value="<?php echo htmlspecialchars($messages[0]['mes_expediteur']); ?>" class="btn bg-custom-button px-4 py-2">Répondre</button>
        </form>
    </div>
</div>