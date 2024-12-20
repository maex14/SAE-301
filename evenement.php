<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plongée Sous-Marine CVP43</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/news.css">
</head>

<body>
    <script src="js/calendar.js"></script>

    <?php include('navbar.php'); ?>

    <?php
    // Connexion à la base de données
    try {
        require_once 'config.php';

        // Récupérer tous les événements
        $query = "SELECT titre, date_evenement, lieu, description FROM evenement ORDER BY date_evenement ASC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $evenements = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        exit;
    }
    ?> 

    <div class="container">
        <div class="row align-items-center">
            <!-- Texte d'introduction -->
            <div class="col-md-6">
                <h2 class="custom-title">Les Événements</h2>
                <p class="custom-paragraph">
                    Restez informé avec les dernières nouvelles ! Découvrez les actualités et mises à jour importantes
                    pour ne rien manquer de nos événements, activités et plus encore.
                </p>
            </div>
            <!-- Image d'illustration -->
            <div class="col-md-6 text-center">
                <img src="images/imagpcmock.png" alt="Application Mockup" class="app-image img-fluid">
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Cartes d'événements générées dynamiquement -->
            <div class="col-md-8">
                <div id="evenements-container">
                    <?php $compteur = 0; ?>
                    <?php foreach ($evenements as $evenement): ?>
                        <?php if ($compteur < 3): ?>
                            <div class="admin-card mb-4 section-bordure">
                                <h3><?php echo htmlspecialchars($evenement['titre']); ?></h3>
                                <span class="event-tag-secondary ms-3">
                                    <?php echo htmlspecialchars($evenement['lieu'] ?: 'Lieu non spécifié'); ?>
                                </span>
                                <p>
                                    <?php echo htmlspecialchars(date("l d M Y", strtotime($evenement['date_evenement']))); ?>
                                </p>
                                <p><?php echo nl2br(htmlspecialchars($evenement['description'])); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php $compteur++; ?>
                    <?php endforeach; ?>
                </div>

                <?php if (count($evenements) > 3): ?>
                    <div class="text-center mt-4">
                        <button id="afficher-plus" class="btn btn-outline-primary">Afficher plus</button>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Calendrier et Carrousel -->
            <div class="col-md-4 d-flex flex-column align-items-center">
                <div class="calendar-container section-bordure">
                    <div class="calendar" id="calendar"></div>
                </div>

                <div id="carouselExampleIndicators" class="carousel slide mt-4 section-bordure" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/img news 1.jpg" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/img news 2.jpg" alt="Slide 2">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const evenements = <?php echo json_encode($evenements); ?>;
        let affiches = 3;

        document.getElementById('afficher-plus').addEventListener('click', function() {
            const container = document.getElementById('evenements-container');
            for (let i = affiches; i < affiches + 3 && i < evenements.length; i++) {
                const evenement = evenements[i];
                const card = document.createElement('div');
                card.className = 'admin-card mb-4 section-bordure';
                card.innerHTML = `
                    <h3>${evenement.titre}</h3>
                    <span class="event-tag-secondary ms-3">
                        ${evenement.lieu || 'Lieu non spécifié'}
                    </span>
                    <p>${new Date(evenement.date_evenement).toLocaleDateString()}</p>
                    <p>${evenement.description.replace(/\n/g, '<br>')}</p>
                `;
                container.appendChild(card);
            }
            affiches += 3;
            if (affiches >= evenements.length) {
                document.getElementById('afficher-plus').style.display = 'none';
            }
        });
    </script>
</body>

</html>
