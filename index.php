<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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

                    Bienvenue sur le site de CVP43, votre partenaire de confiance en Haute-Loire pour tous vos besoins
                    en services professionnels.
                    Que vous soyez une entreprise ou un particulier, nous mettons notre expertise et notre savoir-faire
                    à votre disposition
                    pour vous accompagner dans vos projets. Qualité, proximité et engagement sont au cœur de notre
                    mission pour vous offrir des solutions adaptées et performantes.

                Le Club Vellave de Plongée (CVP43), basé au Puy-en-Velay en Haute-Loire, est une association affiliée à la Fédération Française d'Études et de Sports Sous-Marins (FFESSM). Animé par une passion commune pour le monde sous-marin, le club propose des formations à la plongée sous-marine, à l'apnée, ainsi qu'à d'autres activités aquatiques encadrées par la fédération. Ouvert aux débutants comme aux plongeurs confirmés, le CVP43 offre un cadre convivial pour partager des expériences uniques et découvrir les richesses des fonds marins, tout en respectant les valeurs de sécurité, d’apprentissage et de plaisir.
                </p>
                <a href="formulaire.php" class="btn btn-custom">Devenez membres</a>
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
                <img src="images\5d9ebe5a09f80_FFESSMLogoFFESSMquadri500300.png" alt="Partenaire 3"
                    class="img-fluid partner-logo">
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

    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>