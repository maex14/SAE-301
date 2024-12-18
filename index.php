<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Accueil CVP43</title>
</head>
<body>
    <!-- Header Navigation -->
 
    <?php include('navbar.php'); ?>

    <!-- Qui sommes-nous -->
    <div class="container">
        <div class="custom-section">
            <div class="custom-text">
                <h1 class="custom-title">Qui sommes nous ?</h1>
                <p class="custom-paragraph">
                    Bienvenue sur le site de CVP43, votre partenaire de confiance en Haute-Loire pour tous vos besoins en services professionnels.
                    Que vous soyez une entreprise ou un particulier, nous mettons notre expertise et notre savoir-faire à votre disposition
                    pour vous accompagner dans vos projets. Qualité, proximité et engagement sont au cœur de notre mission pour vous offrir des solutions adaptées et performantes.
                </p>
                <a href="#" class="btn btn-custom">Devenez membres</a>
            </div>
            <div>
                <img src="images/fond-1.png" alt="Panneau Club Velave de Plongée" class="rounded-image">
            </div>
        </div>
    </div>

    <!-- Partenaires -->
    <section class="container my-5">
        <h2 class="partners-title text-center mb-4">Nos Partenaires</h2>
        <div class="row justify-content-center">
            <div class="col-4 text-center">
                <img src="images\bonbon_q.png" alt="Partenaire 1" class="img-fluid partner-logo">
            </div>
            <div class="col-4 text-center">
                <img src="images\6181783d9d6e7_logoL181.png" alt="Partenaire 2" class="img-fluid partner-logo">
            </div>
            <div class="col-4 text-center">
                <img src="images\5d9ebe5a09f80_FFESSMLogoFFESSMquadri500300.png" alt="Partenaire 3" class="img-fluid partner-logo">
            </div>
        </div>
    </section>
    

    <!-- Dernières news -->
    <section class="container my-5">
    <h2 class="text-primary mb-4">Dernières news :</h2>
    <div class="row gx-3 gy-4">
        <div class="col-md-6">
            <div class="admin-card">
                <h3>Modifier une News</h3>
                <p>Mettez à jour les informations des news existantes.</p>
                <a href="modifierNews.php" class="icon-arrow">
                    <img src="images\icon arrow.png" alt="Flèche">
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="admin-card">
                <h3>Ajouter une News</h3>
                <p>Ajoutez de nouvelles informations pour tenir les membres informés.</p>
                <a href="ajouterNews.php" class="icon-arrow">
                    <img src="images\icon arrow.png" alt="Flèche">
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="admin-card">
                <h3>Supprimer une News</h3>
                <p>Retirez les informations obsolètes ou incorrectes.</p>
                <a href="supprimerNews.php" class="icon-arrow">
                    <img src="images\icon arrow.png" alt="Flèche">
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="admin-card">
                <h3>Voir les Archives</h3>
                <p>Accédez aux anciennes informations pour les consulter.</p>
                <a href="voirArchives.php" class="icon-arrow">
                    <img src="images\icon arrow.png" alt="Flèche">
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
