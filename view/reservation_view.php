<form id="reservationForm" action="/reservation/reserver" method="post">
    <h1>Réserver votre place</h1>
    <div class="form-group">
        <label for="emailInput">Votre adresse e-mail :</label>
        <input type="email" id="emailInput" name="user_email" required class="form-control">
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
    const acceptYesRadio = document.getElementById('acceptYes');
    const acceptNoRadio = document.getElementById('acceptNo');
    const submitButton = document.getElementById('submitButton');

    function checkConditions() {
        // Le bouton est activé si 'acceptYes' est coché ET 'acceptNo' n'est PAS coché
        // (car 'required' assure que l'un ou l'autre est coché)
        submitButton.disabled = !acceptYesRadio.checked;
    }

    // Écoute les changements sur les radios
    acceptYesRadio.addEventListener('change', checkConditions);
    acceptNoRadio.addEventListener('change', checkConditions);

    // Vérifie l'état au chargement de la page (au cas où il y aurait un pré-remplissage)
    checkConditions();
</script>