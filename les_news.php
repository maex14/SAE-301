<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="">
    <title>Les News</title>
</head>
<body>
    <!-- Header Navigation -->
 
    <?php include('navbar.php'); ?>

    <!-- Qui sommes-nous -->
    <div class="container">
        <div class="custom-section">
            <div class="custom-text">
                <h1 class="custom-title">Les News</h1>
                <p class="custom-paragraph">
                Restez informé avec les dernières nouvelles ! Découvrez les actualités et mises à jour importantes pour ne rien manquer de nos événements, activités et plus encore.
                </p>
            </div>
        </div>
    </div>

    

    <!-- Dernières news -->
    <section class="container my-5"> 
    <!-- Conteneur centré pour le bouton -->
    <div class="mb-4">
        <a href="#" class="btn btn-custom">Filtrer</a>
    </div>
    <div class="row gx-3 gy-4">
        <div class="col-12">
            <div class="admin-card">
                <h3>Modifier une News</h3>
                <p>Mettez à jour les informations des news existantes.</p>
                <a href="modifierNews.php" class="icon-arrow">
                    <img src="images/icon arrow.png" alt="Flèche">
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="admin-card">
                <h3>Ajouter une News</h3>
                <p>Ajoutez de nouvelles informations pour tenir les membres informés.</p>
                <a href="ajouterNews.php" class="icon-arrow">
                    <img src="images/icon arrow.png" alt="Flèche">
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="admin-card">
                <h3>Supprimer une News</h3>
                <p>Retirez les informations obsolètes ou incorrectes.</p>
                <a href="supprimerNews.php" class="icon-arrow">
                    <img src="images/icon arrow.png" alt="Flèche">
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="admin-card">
                <h3>Voir les Archives</h3>
                <p>Accédez aux anciennes informations pour les consulter.</p>
                <a href="voirArchives.php" class="icon-arrow">
                    <img src="images/icon arrow.png" alt="Flèche">
                </a>
            </div>
        </div>
    </div>
</section>






    <!-- Footer -->
    <?php include('footer.php'); ?>
        <!-- Footer -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
