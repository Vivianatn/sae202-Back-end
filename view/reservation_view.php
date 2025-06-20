<form id="reservationForm" action="/reservation/reserver" method="post">
    <h1>Réserver votre place</h1>
    <div class="form-group">
        <label for="emailInput">Votre adresse e-mail :</label>
        <input type="email" id="emailInput" name="user_email" required class="form-control">
    </div>
 <div class="form-group mt-3">
        <label for="tariffSelect">Choix tarifaire :</label>
        <select id="tariffSelect" name="tarif" required class="form-control">
            <option value="">-- Veuillez choisir un tarif --</option> 
            <option name="tarif" value="1">Étudiant (28€)</option>
            <option name="tarif" accesskey="" value="2">Early bird (32€)</option>
            <option name="tarif" accesskey="" value="3">Groupe (35€)</option>
            <option name="tarif" accesskey="" value="4">Individuel (39€)</option>
            <option name="tarif" accesskey="" value="5">Prestige (49€)</option>
        </select>
    </div>
    <div class="form-group mt-3">
        <label class="d-block mb-2">Conditions de participation et CGU :</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="acceptConditions" id="acceptYes" value="yes" required>
            <label class="form-check-label" for="acceptYes">
                J'accepte les conditions de participation et les Conditions Générales d'Utilisation (CGU).
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="acceptConditions" id="acceptNo" value="no" required>
            <label class="form-check-label" for="acceptNo">
                Je refuse les conditions de participation et les Conditions Générales d'Utilisation (CGU).
            </label>
        </div>
    </div>
    <button type="submit" id="submitButton" class="bg-custom-button mt-4" disabled>Réserver</button>
</form>

<script>
    // JavaScript pour gérer l'état du bouton de soumission
    const reservationForm = document.getElementById('reservationForm');
    const emailInput = document.getElementById('emailInput');
    const tariffSelect = document.getElementById('tariffSelect');
    const acceptYesRadio = document.getElementById('acceptYes');
    const acceptNoRadio = document.getElementById('acceptNo'); // Ajouté pour pouvoir le décocher
    const submitButton = document.getElementById('submitButton');

    function checkFormValidity() {
        // Condition 1: L'e-mail est rempli (et valide selon le type="email" et required)
        const isEmailFilled = emailInput.value.trim() !== '';

        // Condition 2: Un tarif a été sélectionné (la valeur n'est pas vide)
        const isTariffSelected = tariffSelect.value !== '';

        // Condition 3: Les conditions ont été acceptées (seul acceptYesRadio.checked compte)
        const areConditionsAccepted = acceptYesRadio.checked;

        // Le bouton est activé si TOUTES les conditions sont remplies
        submitButton.disabled = !(isEmailFilled && isTariffSelected && areConditionsAccepted);
    }

    // Ajoute des écouteurs d'événements pour tous les champs pertinents
    emailInput.addEventListener('input', checkFormValidity); // 'input' pour les champs de texte

    // Écouteur pour le changement de tarif : réinitialise les radios ET vérifie la validité
    tariffSelect.addEventListener('change', function() {
        // Décocher les radios des conditions quand le tarif est changé
        acceptYesRadio.checked = false;
        acceptNoRadio.checked = false;
        checkFormValidity(); // Vérifie la validité après la réinitialisation
    });

    // Écouteurs pour les radios des CGU
    acceptYesRadio.addEventListener('change', checkFormValidity);
    acceptNoRadio.addEventListener('change', checkFormValidity); // Important : doit aussi appeler checkFormValidity si l'utilisateur coche "refuse"

    // Vérifie l'état au chargement de la page
    checkFormValidity();
</script>