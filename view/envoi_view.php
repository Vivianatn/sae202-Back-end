<?php
if(isset($expe) && $expe == 'Administration'){
    header('Location: /contact');
    exit(); // Toujours ajouter exit() après une redirection
}

// Variables pour pré-remplir les champs si besoin (pas directement utilisées ici, mais bonne pratique)
$mes_titre = $_POST['mes_titre'] ?? '';
$mes_contenu = $_POST['mes_contenu'] ?? '';
// Note: $expe est déjà géré par ton PHP pour le champ select
?>

<main class="inscription-page">
    <div class="container-fluid position-relative py-5" style="overflow: hidden;">
        <img class="img-fluid w-100 position-absolute top-0 start-0 z-n1" src="https://placehold.co/1920x667" alt="Background decoration" style="object-fit: cover; height: 667px;">

        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                <div class="card p-4 p-md-5 my-5" style="background: rgba(255, 255, 255, 0.9); border: none; border-radius: 0; position: relative;">
                    <img class="img-fluid position-absolute d-none d-lg-block" src="https://placehold.co/1134x1386" alt="Form decoration" style="top: -50px; left: -100px; max-width: 120%; z-index: -1; opacity: 0.8;">

                    <h1 class="text-center mb-4" style="font-family: 'Grenze Gotisch', cursive; font-size: 2.5rem; color: black;">Envoyer un message</h1>
                    <h2 class="text-center mb-5" style="font-family: 'Inter', sans-serif; font-size: 1.5rem; color: black;">Commençons votre correspondance !</h2>

                    <form action="/messagerie/reception" method="post" class="row g-3">
                        <div class="col-12">
                            <label for="user-select" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Choisir un utilisateur :</label>
                            <select id="user-select" name="user" class="form-control form-control-custom" required>
                                <?php
                                if (isset($messagerie) && is_array($messagerie)) {
                                    foreach ($messagerie as $utilisateur) {
                                        $selected = (isset($expe) && $expe == $utilisateur['user_email']) ? 'selected' : '';
                                        echo '<option value="'.htmlspecialchars($utilisateur['user_email']).'" '.$selected.'>'.htmlspecialchars($utilisateur['user_email']).'</option>';
                                    }
                                } else {
                                    echo '<option value="">Aucun utilisateur disponible</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="subject-textarea" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Sujet*</label>
                            <textarea id="subject-textarea" name="mes_titre" placeholder="Votre sujet ici..." class="form-control form-control-custom" rows="2" required><?php echo htmlspecialchars($mes_titre); ?></textarea>
                        </div>

                        <div class="col-12">
                            <label for="message-textarea" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Message*</label>
                            <textarea id="message-textarea" name="mes_contenu" placeholder="Écrivez votre message ici..." class="form-control form-control-custom" rows="8" required><?php echo htmlspecialchars($mes_contenu); ?></textarea>
                        </div>

                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn bg-custom-button px-5 py-3 fs-4">Envoyer le message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>