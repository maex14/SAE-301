<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ms.css">
    <link rel="stylesheet" href="css/news.css">
    

    <title>Les News</title>
</head>

<body>
    <div class="container">
        <div class="custom-section">
            <div class="custom-text">
                <h1 class="custom-title">Les News</h1>
                <p class="custom-paragraph">
                    Restez informé avec les dernières nouvelles ! Découvrez les actualités et mises à jour importantes
                    pour ne rien manquer de nos événements, activités et plus encore.
                </p>
            </div>
        </div>
    </div>

    <!-- Dernières news -->
    <section class="container my-5">
        <!-- Conteneur centré pour le bouton -->
        <div class="mb-4">
            <select id="mois" onchange="filterArticlesByMonth()">
            <option value="0">tous les mois</option>
            <option value="1">Janvier</option>
            <option value="2">Février</option>
            <option value="3">Mars</option>
            <option value="4">Avril</option>
            <option value="5">Mai</option>
            <option value="6">Juin</option>
            <option value="7">Juillet</option>
            <option value="8">Août</option>
            <option value="9">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
    </select>
            <div class="container my-5">
                <div id="articles-list"></div>
            </div>
        </div>
    </section>
</body>
        <script src="js/triage.js"></script>
</html>
<?php include('footer.php'); ?>