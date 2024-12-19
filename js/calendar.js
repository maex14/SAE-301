// Variables globales pour suivre le mois et l'année
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

// Fonction pour générer le calendrier
function generateCalendar(month, year) {
    const calendar = document.getElementById("calendar");
    if (!calendar) {
        console.error("L'élément calendrier n'existe pas !");
        return;
    }

    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDay = new Date(year, month, 1).getDay();
    const monthNames = [
        "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
    ];

    // Effacer le contenu précédent
    calendar.innerHTML = "";

    // En-tête du calendrier
    let calendarHTML = `
        <div class="calendar-header">
            <button id="prev" class="btn-nav">&lt;</button>
            <span>${monthNames[month]} ${year}</span>
            <button id="next" class="btn-nav">&gt;</button>
        </div>
        <table class="calendar-table">
            <thead>
                <tr>
                    <th>Lu</th><th>Ma</th><th>Me</th><th>Je</th><th>Ve</th><th>Sa</th><th>Di</th>
                </tr>
            </thead>
            <tbody>
    `;

    // Générer les jours
    let dayCounter = 1;
    for (let i = 0; i < 6; i++) {
        calendarHTML += "<tr>";
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < (firstDay === 0 ? 6 : firstDay - 1)) {
                calendarHTML += "<td></td>";
            } else if (dayCounter > daysInMonth) {
                calendarHTML += "<td></td>";
            } else {
                calendarHTML += `<td>${dayCounter++}</td>`;
            }
        }
        calendarHTML += "</tr>";
    }

    calendarHTML += `
            </tbody>
        </table>
    `;

    calendar.innerHTML = calendarHTML;

    // Ajouter les gestionnaires d'événements pour les boutons
    document.getElementById("prev").addEventListener("click", () => changeMonth(-1));
    document.getElementById("next").addEventListener("click", () => changeMonth(1));
}

// Fonction pour changer le mois
function changeMonth(direction) {
    currentMonth += direction;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    } else if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    generateCalendar(currentMonth, currentYear);
}

// Initialisation au chargement de la page
document.addEventListener("DOMContentLoaded", () => {
    generateCalendar(currentMonth, currentYear);
});
