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

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1><?php echo htmlspecialchars($article['titre']); ?></h1>
    <p><strong>Auteur:</strong> <?php echo htmlspecialchars($article['auteur']); ?></p>
    <p><strong>Date de publication:</strong> <?php echo htmlspecialchars($article['date_publication']); ?></p>
    <div>
        <strong>Contenu:</strong>
        <p><?php echo nl2br(htmlspecialchars($article['contenu'])); ?></p>
    </div>
    <a href="TriageNews_ajax.html">Retour à la liste des articles</a>
</body>

</html>