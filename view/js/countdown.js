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

    // Lance le compte à rebours lorsque le DOM est complètement chargé
    document.addEventListener("DOMContentLoaded", startCountdown);