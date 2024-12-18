// Fonction pour récupérer tous les articles via l'API
function fetchAllArticles() {
    fetch('API/Trieur.php')
        .then(response => response.json())
        .then(data => {
            const articlesList = document.getElementById('articles-list');
            articlesList.innerHTML = '';  // Vide la liste avant de la remplir

            data.articles.forEach(article => {
                const articleElement = document.createElement('div');
                articleElement.classList.add('article');  // Ajouter une classe pour chaque article

                // Créer un élément pour afficher la date
                const dateElement = document.createElement('p');
                dateElement.textContent = `Date de publication : ${article.date_publication}`;
                articleElement.appendChild(dateElement);

                // Créer un élément pour afficher le titre
                const titleElement = document.createElement('h2');
                titleElement.textContent = article.titre;
                articleElement.appendChild(titleElement);

                // Créer un lien cliquable vers la page de détails
                const articleLink = document.createElement('a');
                articleLink.href = article.lien;  // Lien vers la page de détails
                articleLink.textContent = "Voir les détails";
                articleElement.appendChild(articleLink);

                // Ajouter l'élément de l'article à la liste
                articlesList.appendChild(articleElement);
            });
        })
        .catch(error => console.log('Erreur:', error));
}

// Fonction pour filtrer les articles en fonction du mois sélectionné
function filterArticlesByMonth() {
    const month = document.getElementById('mois').value;
    if (month == "0") {
        // Si le mois est "0", on affiche tous les articles
        fetchAllArticles();
    } else {
        // Sinon, on récupère les articles filtrés par le mois
        fetch(`API/Trieur.php?month=${month}`)
            .then(response => response.json())
            .then(data => {
                const articlesList = document.getElementById('articles-list');
                articlesList.innerHTML = '';  // Vide la liste avant de la remplir

                data.articles.forEach(article => {
                    const articleElement = document.createElement('div');
                    articleElement.classList.add('article');  // Ajouter une classe pour chaque article

                    // Créer un élément pour afficher la date
                    const dateElement = document.createElement('p');
                    dateElement.textContent = `Date de publication : ${article.date_publication}`;
                    articleElement.appendChild(dateElement);

                    // Créer un élément pour afficher le titre
                    const titleElement = document.createElement('h2');
                    titleElement.textContent = article.titre;
                    articleElement.appendChild(titleElement);

                    // Créer un lien cliquable vers la page de détails
                    const articleLink = document.createElement('a');
                    articleLink.href = article.lien;  // Lien vers la page de détails
                    articleLink.textContent = "Voir les détails";
                    articleElement.appendChild(articleLink);

                    // Ajouter l'élément de l'article à la liste
                    articlesList.appendChild(articleElement);
                });
            })
            .catch(error => console.log('Erreur:', error));
    }
}

// Charger les articles au chargement de la page
document.addEventListener('DOMContentLoaded', fetchAllArticles);
