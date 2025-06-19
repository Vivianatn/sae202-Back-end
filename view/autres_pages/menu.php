<header class="navbar navbar-expand-lg navbar-light bg-custom-yellow py-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="https://placehold.co/60x60" alt="Logo" class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark fs-5 underline-text" aria-current="page" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fs-5" href="/concept">Concept</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fs-5" href="/infos">Informations pratiques</a>
                </li>
                <?php
                if (isset($_SESSION['user_email'])) {
                    echo '<li class="nav-item"><a class="nav-link text-dark fs-5" href="/contact">Contact</a></li>';
                    /* echo '<li class="nav-item"><a class="nav-link text-dark fs-5" href="/profil">Mon profil</a></li>'; */
                } else {
                    echo '<li class="nav-item"><a class="nav-link text-dark fs-5" href="/contact">Contact</a></li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link text-dark fs-5" href="/gestion">Admin</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center me-3">
                    <div class="rounded-circle border border-dark border-3" style="width: 29px; height: 29px; background: rgba(217, 217, 217, 0);"></div>
                    <div class="rotated-line-42deg ms-2"></div>
                </div>
                <div class="d-flex flex-column flex-md-row align-items-md-center">
                    <?php
                    if (isset($_SESSION['user_email'])) {
                        // Message de bienvenue
                        echo '<span class="navbar-text text-dark fs-5 me-md-3 mb-2 mb-md-0">' . htmlspecialchars($_SESSION['user_prenom']) . ' ' . htmlspecialchars($_SESSION['user_nom']) . '</span>';
                        echo '<a class="nav-link text-dark fs-5" href="/profil"><img class="pdp" src="view/img/pdp/'.$_SESSION['user_photo'].'" alt="Photo de profil"></a>';
                        // Conteneur pour les boutons "Messagerie" et "Déconnexion"
                        echo '<div class="d-flex flex-column flex-sm-row">';
                        echo '<a class="btn btn-outline-primary mb-2 mb-sm-0 me-sm-2" href="/messagerie">Messagerie</a>';
                        echo '<a class="btn btn-outline-danger" href="/connexion/deconnexion">Déconnexion</a>';
                        echo '</div>'; // Fin du conteneur des boutons
                    } else {
                        // Boutons Inscription/Connexion pour les utilisateurs non connectés
echo '<div class="d-flex flex-column flex-sm-row">'; // Ajout de cette div avec flex-column
    echo '<a class="btn btn-primary mb-2 mb-sm-0 me-sm-2" href="/inscription">Inscription</a>'; // Ajout de mb-2
    echo '<a class="btn btn-outline-primary" href="/connexion">Connexion</a>';
    echo '</div>'; 
                    }
                    ?>
                </div>
                </div>
        </div>
    </div>
</header>