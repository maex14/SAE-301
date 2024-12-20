<?php
    require_once 'config.php';


    // Récupération des news pour affichage dans la liste
    $newsList = $pdo->query("SELECT id_news, titre FROM news ORDER BY date_publication DESC")->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Suppression de la news
        if (isset($_POST['id_news'])) {
            $requete = $pdo->prepare("DELETE FROM news WHERE id_news = :id_news");
            $requete->bindValue(':id_news', $_POST['id_news'], PDO::PARAM_INT);

            try {
                $res = $requete->execute();
                if ($res) {
                    header("Location: supprimerNews.php?success=true");
                    exit();
                } else {
                    header("Location: supprimerNews.php?success=false");
                    exit();
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-primary my-4">Supprimer une News</h1>

        <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
            <div class="alert alert-success text-center">La News a été supprimée avec succès !</div>
        <?php elseif (isset($_GET['success']) && $_GET['success'] == 'false'): ?>
            <div class="alert alert-danger text-center">Erreur : Impossible de supprimer la News.</div>
        <?php endif; ?>

        <!-- Liste des news existantes -->
        <div class="mb-4">
            <h3>Choisir une News à supprimer :</h3>
            <form action="supprimerNews.php" method="POST">
                <ul class="list-group">
                    <?php foreach ($newsList as $item): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= htmlspecialchars($item['titre']) ?>
                            <button type="submit" name="id_news" value="<?= $item['id_news'] ?>" class="btn btn-danger btn-sm">Supprimer</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
