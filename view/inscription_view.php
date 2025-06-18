<?php
// Variables pour pré-remplir les champs en cas d'erreur de validation (pour l'UX)
$user_nom = $_POST['user_nom'] ?? '';
$user_prenom = $_POST['user_prenom'] ?? '';
$user_email = $_POST['user_email'] ?? '';
$user_tel = $_POST['user_tel'] ?? '';
$user_adresse = $_POST['user_adresse'] ?? '';
$user_comp_adresse = $_POST['user_comp_adresse'] ?? '';
$user_cp = $_POST['user_cp'] ?? '';
$user_message = $_POST['user_message'] ?? '';

?>

<main class="inscription-page">
    <div class="container-fluid position-relative py-5" style="overflow: hidden;">
        <img class="img-fluid w-100 position-absolute top-0 start-0 z-n1" src="https://placehold.co/1920x667" alt="Background decoration" style="object-fit: cover; height: 667px;">

        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                <div class="card p-4 p-md-5 my-5" style="background: rgba(255, 255, 255, 0.9); border: none; border-radius: 0;">
                    <img class="img-fluid position-absolute d-none d-lg-block" src="https://placehold.co/1134x1386" alt="Form decoration" style="top: -50px; left: -100px; max-width: 120%; z-index: -1; opacity: 0.8;">

                    <h1 class="text-center mb-4" style="font-family: 'Grenze Gotisch', cursive; font-size: 2.5rem; color: black;">Rejoignez nous !</h1>
                    <h2 class="text-center mb-5" style="font-family: 'Inter', sans-serif; font-size: 1.5rem; color: black;">Formulaire d'inscription (maximum de 25 caractères dans le mot de passe)</h2>

                    <?php if ($error_message): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($success_message): ?>
                        <div class="alert alert-success text-center" role="alert">
                            <?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>

                    <form action="/connexion/validation_inscription" method="post" class="row g-3">
                        <div class="col-12 col-md-6">
                            <label for="user_nom" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Nom*</label>
                            <input type="text" class="form-control form-control-custom" id="user_nom" name="user_nom" placeholder="Nom" value="<?php echo htmlspecialchars($user_nom); ?>" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="user_prenom" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Prénom*</label>
                            <input type="text" class="form-control form-control-custom" id="user_prenom" name="user_prenom" placeholder="Prénom" value="<?php echo htmlspecialchars($user_prenom); ?>" required>
                        </div>

                        <div class="col-12">
                            <label for="user_tel" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Téléphone*</label>
                            <input type="tel" class="form-control form-control-custom" id="user_tel" name="user_tel" placeholder="Téléphone" value="<?php echo htmlspecialchars($user_tel); ?>" required>
                        </div>
                        
                        <div class="col-12">
                            <label for="user_email" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Adresse e-mail*</label>
                            <input type="email" class="form-control form-control-custom" id="user_email" name="user_email" placeholder="Email" value="<?php echo htmlspecialchars($user_email); ?>" required>
                        </div>

                        <!-- <div class="col-12 col-md-6">
                            <label for="user_adresse" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Adresse*</label>
                            <input type="text" class="form-control form-control-custom" id="user_adresse" name="user_adresse" placeholder="Adresse" value="<?php echo htmlspecialchars($user_adresse); ?>" required>
                        </div> -->
                        <!-- <div class="col-12 col-md-6">
                            <label for="user_comp_adresse" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Complément d’adresse</label>
                            <input type="text" class="form-control form-control-custom" id="user_comp_adresse" name="user_comp_adresse" placeholder="Complément d’adresse" value="<?php echo htmlspecialchars($user_comp_adresse); ?>">
                        </div> -->
                        
                        <!-- <div class="col-12">
                            <label for="user_cp" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Code Postal*</label>
                            <input type="text" class="form-control form-control-custom" id="user_cp" name="user_cp" placeholder="Code Postal" value="<?php echo htmlspecialchars($user_cp); ?>" required>
                        </div> -->

                        <div class="col-12 col-md-6">
                            <label for="user_mdp" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Mot de passe*</label>
                            <input type="password" class="form-control form-control-custom" id="user_mdp" name="user_mdp" placeholder="Mot de passe" maxlength="25" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="user_mdp2" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Confirmer le mot de passe*</label>
                            <input type="password" class="form-control form-control-custom" id="user_mdp2" name="user_mdp2" placeholder="Confirmer le mot de passe" maxlength="25" required>
                        </div>

                        <!-- <div class="col-12">
                            <label for="user_message" class="form-label text-dark fs-5" style="font-family: 'Inter', sans-serif;">Message, Questions...</label>
                            <textarea class="form-control form-control-custom" id="user_message" name="user_message" rows="5" placeholder="Votre message ou question..."><?php echo htmlspecialchars($user_message); ?></textarea>
                        </div> -->
                        
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn bg-custom-button px-5 py-3 fs-4">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>