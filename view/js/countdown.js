// Fonction pour le compte à rebours
function startCountdown() {
    // Date cible : 26 juin 2025, 00h00:00 (minuit) à Saint-Julien-les-Villas, France
    // Note: JavaScript utilise des mois basés sur 0 (janvier = 0, juin = 5)
    const targetDate = new Date("June 26, 2025 00:00:00 GMT+0200").getTime(); // GMT+0200 pour CEST

    const countdownElement = document.getElementById("countdown");

    if (!countdownElement) {
        console.error("L'élément avec l'ID 'countdown' n'a pas été trouvé.");
        return; // Arrête la fonction si l'élément n'existe pas
    }

    const updateCountdown = () => {
        const now = new Date().getTime(); // Heure actuelle
        const distance = targetDate - now; // Différence en millisecondes

        // Calcul du temps restant
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Affichage du résultat
        if (distance < 0) {
            // Si le compte à rebours est terminé
            countdownElement.innerHTML = "L'événement a commencé !";
            clearInterval(interval); // Arrête le compte à rebours
        } else {
            // Sinon, affichage normal
            countdownElement.innerHTML = `${days} jours ${hours} heures ${minutes} minutes ${seconds} secondes`;
        }
    };

    // Mise à jour du compte à rebours toutes les secondes
    const interval = setInterval(updateCountdown, 1000);

    // Appel initial pour afficher le compte à rebours immédiatement au chargement
    updateCountdown();
}


// --- Script pour la gestion du fanion ---
document.addEventListener('DOMContentLoaded', function() {
    // Sélectionne le fanion
    const fanionContainer = document.querySelector('.fanion-container');

    // Sélectionne le bouton du menu déroulant (navbar-toggler)
    const navbarToggler = document.querySelector('.navbar-toggler');

    // Sélectionne le conteneur du menu qui se déplie
    const navbarCollapse = document.getElementById('navbarNav');

    // Vérifie si les éléments existent avant d'ajouter des écouteurs
    if (fanionContainer && navbarToggler && navbarCollapse) {
        // Ajoute un écouteur d'événement sur le bouton du menu déroulant
        navbarToggler.addEventListener('click', function() {
            // Vérifie si le menu est sur le point d'être ouvert ou fermé
            // La classe 'show' est ajoutée par Bootstrap quand le menu est ouvert
            if (navbarCollapse.classList.contains('show')) {
                // Si le menu est ouvert, masque le fanion
                fanionContainer.classList.add('hide');
            } else {
                // Si le menu est fermé, affiche le fanion
                fanionContainer.classList.remove('hide');
            }
        });

        // Gérer le cas où la fenêtre est redimensionnée (passant de responsive à desktop)
        // Cela permet de réafficher le fanion si on quitte le mode responsive avec le menu fermé
        window.addEventListener('resize', function() {
            // Si la largeur de l'écran est supérieure à la breakpoint du navbar-expand-lg (992px pour Bootstrap par défaut)
            if (window.innerWidth > 991.98) { // Bootstrap's default 'lg' breakpoint
                fanionContainer.classList.remove('hide');
            }
        });
    }
});

// Lance le compte à rebours lorsque le DOM est complètement chargé
document.addEventListener("DOMContentLoaded", startCountdown);