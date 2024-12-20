<?php
// Inclure la configuration de la base de données
include("config/configuration.php"); 

// Récupérer l'ID de l'article à partir de l'URL
if (isset($_GET['id'])) {
    $id_news = $_GET['id'];

    try {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer l'article en fonction de son ID
        $query = "SELECT id_news, titre, date_publication, contenu, auteur FROM news WHERE id_news = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id_news, PDO::PARAM_INT);
        $stmt->execute();
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si l'article n'existe pas, afficher une erreur
        if (!$article) {
            echo "Article non trouvé.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        exit;
    }
} else {
    echo "Aucun ID d'article spécifié.";
    exit;
}
?>
<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/news.css">
</head>

<body>

    <div class="container my-5">
        <article class="article">
            <h1 class="text-primary"><?php echo htmlspecialchars($article['titre']); ?></h1>
            <p><strong>Auteur:</strong> <?php echo htmlspecialchars($article['auteur']); ?></p>
            <p><strong>Date de publication:</strong> <?php echo htmlspecialchars($article['date_publication']); ?></p>
            <div>
                <strong>Contenu:</strong>
                <p><?php echo nl2br(htmlspecialchars($article['contenu'])); ?></p>
            </div>
        </article>

        <section class="d-flex justify-content-center align-items-center vh-20">
            <div class="custom-card text-center">
                <h1 class="custom-title-card">Distribution du matériel</h1>        
                <!-- Liste centrée -->
                <ul class="custom-list d-inline-block text-start">
                    <li><strong>Les mardis :</strong> de 17 H 30 à 18 H 00</li>
                    <li><strong>Les dimanches :</strong> de 10 H 00 à 10 H 30</li>
                    <li>La restitution du matériel rincé aura <strong>TOUJOURS</strong> lieu les jeudis de 18 H à 18 H 30</li>
                </ul>
                <p class="lead">Votre CACI de moins de 1 an vous sera demandé à la première plongée au lac afin d'être photographié et stocké dans nos fichiers en cas de contrôle inopiné de la gendarmerie.</p>
                <p class="lead">Bonnes plongées à tous !</p>
                <a href="#" class="btn btn-outline-primary btn-inscription">Inscrivez-vous</a> <br>
                <a href="les_news.php" class="btn btn-outline-primary my-3">Retour à la liste des articles</a>
            </div>
        </section>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php include('footer.php'); ?>