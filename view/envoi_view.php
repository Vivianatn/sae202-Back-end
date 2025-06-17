<h1>Envoyer un message</h1>
    <form action="/messagerie/reception" method="post">
        <!-- <input type="text" name="mes_dest" placeholder="Votre destinataire"> -->
        <label for="user">Choisir un utilisateur :</label>
        <select id="user" name="user">
        <?php 
            foreach ($messagerie as $utilisateur) {
                echo '<option value="'.$utilisateur['user_email'].'">'.$utilisateur['user_email'].'</option>';
            }
        ?>
        <!-- <option value="pomme">Pomme</option>
        <option value="banane">Banane</option>
        <option value="fraise">Fraise</option>
        <option value="raisin">Raisin</option> -->
        </select>
        <textarea name="mes_titre" placeholder="Titre..."></textarea>
        <textarea name="mes_contenu" placeholder="Message..."></textarea>
        <button type="submit"> Envoyer </button>
    </form>