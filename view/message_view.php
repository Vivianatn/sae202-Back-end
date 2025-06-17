<div>
    <?php var_dump($messages); ?>
    <h1><?php echo $messages['mes_titre']; ?></h1>
    <h2>De : <?php echo $messages['mes_expediteur']; ?></h2>
    <h2>A : <?php echo $messages['mes_destinataire']; ?></h2>
    <h2>Message :</h2>
    <p><?php echo $messages['mes_contenu']; ?></p>
</div>