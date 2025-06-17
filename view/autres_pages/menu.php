<header>
    <!-- Première partie header -->
    <nav>
        <a href="/">Accueil</a>
        <a href="/">Concept</a>
        <a href="/">Informations pratiques</a>
        <?php
        if (isset($_SESSION['user_email'])){
            echo '<a href="/profil">Mon profil</a>';
        }
        ?>
    </nav>
    <!-- Deuxième partie header -->
    <nav>
        <?php
        if (isset($_SESSION['user_email'])){
            echo '<h2>Bienvenue '.$_SESSION['user_prenom'].' '.$_SESSION['user_nom'].'</h2> <a href="/messagerie">Messagerie</a><a href="/connexion/deconnexion">Déconnexion</a>';
        }else{
            echo '<a href="/inscription">Inscription</a>
            <a href="/connexion">Connexion</a>';
        }
        ?>
        
    </nav>
</header>