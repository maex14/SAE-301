<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/news.css">
    <title>Accueil CVP43</title>
</head>
<body>
    <!-- Header Navigation -->

    <?php 
    include('navbar.php'); 
    require_once 'config.php';
 // Configuration pour la base de données
    ?>

    <!-- Qui sommes-nous -->
    <div class="container">
        <div class="row custom-section align-items-center">
            <!-- Texte -->
            <div class="col-md-6 custom-text">
                <h1 class="custom-title">Qui sommes-nous ?</h1>
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
            <!-- Image -->
            <div class="col-md-6 text-center">
                <div class="rounded-image-wrapper">
                    <img src="images/fond-1.png" alt="Panneau Club Velave de Plongée" class="rounded-image" loading="lazy">
                </div>
            </div>
        </div>
    </div>

    <!-- Partenaires -->
    <section class="container my-5">
        <h2 class="partners-title text-center mb-4">Nos Partenaires</h2>
        <div class="row justify-content-center">
            <div class="col-4 text-center">
                <img src="images/bonbon_q.png" alt="Partenaire 1" class="img-fluid partner-logo" loading="lazy">
            </div>
            <div class="col-4 text-center">
                <img src="images/6181783d9d6e7_logoL181.png" alt="Partenaire 2" class="img-fluid partner-logo" loading="lazy">
            </div>
            <div class="col-4 text-center">
                <img src="images/5d9ebe5a09f80_FFESSMLogoFFESSMquadri500300.png" alt="Partenaire 3" class="img-fluid partner-logo" loading="lazy">
            </div>
        </div>
    </section>

        <!-- Dernières news -->
    <section class="container my-5">
        <h2 class="text-primary mb-4">Dernières news :</h2>
        <div class="row gx-3 gy-4">
            <?php
            try {
                require_once 'config.php';


                // Récupérer les 4 dernières news
                $stmt = $pdo->prepare("SELECT titre, contenu, date_publication, id_news FROM news ORDER BY date_publication DESC LIMIT 4");
                $stmt->execute();
                $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($news as $article) {
                    echo '<div class="col-md-6">';
                    echo '<div class="admin-card">';
                    echo '<h3>' . htmlspecialchars($article['titre']) . '</h3>';
                    echo '<p>' . htmlspecialchars(substr($article['contenu'], 0, 100)) . '...</p>';
                    echo '<small><em>Publié le ' . htmlspecialchars(date("d-m-Y", strtotime($article['date_publication']))) . '</em></small>';
                    echo '<a href="details_article.php?id=' . htmlspecialchars($article['id_news']) . '" class="icon-arrow">';
                    echo '<img src="images/icon arrow.png" alt="Flèche">';
                    echo '</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } catch (PDOException $e) {
                echo '<p class="text-danger">Erreur : ' . $e->getMessage() . '</p>';
            }
            ?>
        </div>
    </section>




</body>
</html>
    <?php include('footer.php'); ?>
