<h1>Formulaire d'inscription (maximum de 25 caractères dans le mot de passe)</h1>
        <form action="/connexion/validation_inscription" method="post">
        <input type="text" name="user_nom" placeholder="Nom">
        <input type="text" name="user_prenom" placeholder="Prénom">
        <input type="text" name="user_email" placeholder="Email">
        <input type="text" name="user_tel" placeholder="Téléphone">
        <input type="password" name="user_mdp" placeholder="Mot de passe">
        <input type="password" name="user_mdp2" placeholder="Mot de passe">
        <button type="submit"> Inscription </button>
    </form>