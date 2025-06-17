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
            <a class="nav-link text-dark fs-5" href="/informations-pratiques">Informations pratiques</a>
          </li>
          <?php
          if (isset($_SESSION['user_email'])){
              echo '<li class="nav-item"><a class="nav-link text-dark fs-5" href="/contact">Contact</a></li>';
              echo '<li class="nav-item"><a class="nav-link text-dark fs-5" href="/profil">Mon profil</a></li>';
          } else {
              // Si l'utilisateur n'est pas connecté, "Contact" peut être affiché ici si désiré
              echo '<li class="nav-item"><a class="nav-link text-dark fs-5" href="/contact">Contact</a></li>';
          }
          ?>
        </ul>

        <div class="d-flex align-items-center">
            <div class="search-input-container">
                <input type="text" class="form-control form-control-sm" placeholder="Rechercher...">
                <i class="fas fa-search search-icon"></i> </div>

            <div class="d-flex align-items-center me-3">
                <div class="rounded-circle border border-dark border-3" style="width: 29px; height: 29px; background: rgba(217, 217, 217, 0);"></div>
                <div class="rotated-line-42deg ms-2"></div>
            </div>
            <img src="https://placehold.co/42x42" alt="Icon 1" class="img-fluid img-rotated-180 me-2" style="width: 42px; height: 42px;">
            <img src="https://placehold.co/46x45" alt="Icon 2" class="img-fluid img-rotated-180 me-3" style="width: 46px; height: 45px;">
            <?php
            if (isset($_SESSION['user_email'])){
                // User is logged in
                echo '<span class="navbar-text text-dark fs-5 me-3 mb-0">Bienvenue '.$_SESSION['user_prenom'].' '.$_SESSION['user_nom'].'</span>';
                echo '<a class="btn btn-outline-primary me-2" href="/messagerie">Messagerie</a>';
                echo '<a class="btn btn-outline-danger" href="/connexion/deconnexion">Déconnexion</a>';
            }else{
                echo '<a class="btn btn-primary me-2" href="/inscription">Inscription</a>';
                echo '<a class="btn btn-outline-primary" href="/connexion">Connexion</a>';
            }
            ?>
        </div>
      </div>
    </div>
</header>