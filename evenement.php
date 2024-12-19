<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plongée Sous-Marine CVP43</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <script src="js/calendar.js"></script>

    <?php include('navbar.php'); ?>

    <div class="container mt-5">
    <div class="row align-items-center">
        <!-- Colonne du texte -->
        <div class="col-md-6">
            <h2 class="events-title">Les Événements</h2>
            <p class="events-description">
                Restez informé avec les dernières nouvelles ! Découvrez les actualités et mises à jour importantes
                pour ne rien manquer de nos événements, activités et plus encore.
            </p>
        </div>
        <!-- Colonne de l'image -->
        <div class="col-md-6 text-center">
            <img src="images\imagpcmock.png" alt="Application Mockup" class="app-image img-fluid">
        </div>
    </div>
</div>



    <div class="row">
        <!-- Cartes d'événements -->
        <div class="col-md-8">
            <div class="admin-card mb-4">
                <h3>Salon de la Plongée</h3>
                <span class="event-tag-secondary ms-3">Paris</span>
                <p>Du jeudi 09 au dimanche 12 janv. 2025</p>
                <div class="icon-arrow">
                    <img src="images/icon arrow.png" alt="Flèche">
                </div>
            </div>
            <div class="admin-card mb-4">
                <h3>Salon de la Plongée</h3>
                <span class="event-tag-secondary ms-3">Paris</span>
                <p>Du jeudi 09 au dimanche 12 janv. 2025</p>
                <div class="icon-arrow">
                    <img src="images/icon arrow.png" alt="Flèche">
                </div>
            </div>
            <div class="admin-card mb-4">
                <h3>Salon de la Plongée</h3>
                <span class="event-tag-secondary ms-3">Paris</span>
                <p>Du jeudi 09 au dimanche 12 janv. 2025</p>
                <div class="icon-arrow">
                    <img src="images/icon arrow.png" alt="Flèche">
                </div>
            </div>
            <div class="admin-card mb-4">
                <h3>Salon de la Plongée</h3>
                <span class="event-tag-secondary ms-3">Paris</span>
                <p>Du jeudi 09 au dimanche 12 janv. 2025</p>
                <div class="icon-arrow">
                    <img src="images/icon arrow.png" alt="Flèche">
                </div>
            </div>
        </div>

        <!-- Calendrier et Carrousel -->
        <div class="col-md-4 d-flex flex-column align-items-center">
            <!-- Calendrier -->
            <div class="calendar-container">
                <div class="calendar" id="calendar"></div>
            </div>

            <!-- Carrousel -->
            <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images\img news 1.jpg" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="images\img news 2.jpg" alt="Slide 2">
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
    </section>



    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>