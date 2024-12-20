<?php
    require_once 'config.php';


    // Récupération des news pour affichage dans la liste
    $newsList = $pdo->query("SELECT id_news, titre FROM news ORDER BY date_publication DESC")->fetchAll(PDO::FETCH_ASSOC);

    // Initialisation des données de la news à modifier
    $news = null;
    if (isset($_GET['id_news'])) {
        $stmt = $pdo->prepare("SELECT * FROM news WHERE id_news = :id_news");
        $stmt->bindValue(":id_news", $_GET['id_news'], PDO::PARAM_INT);
        $stmt->execute();
        $news = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Modification de la news
        if (isset($_POST['id_news'], $_POST['titre'], $_POST['contenu'], $_POST['auteur'], $_POST['date'])) {
            $requete = $pdo->prepare(
                'UPDATE news SET titre = :titre, contenu = :contenu, auteur = :auteur, date_publication = :date WHERE id_news = :id_news'
            );
            $requete->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $requete->bindValue(':contenu', $_POST['contenu'], PDO::PARAM_STR);
            $requete->bindValue(':auteur', $_POST['auteur'], PDO::PARAM_STR);
            $requete->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
            $requete->bindValue(':id_news', $_POST['id_news'], PDO::PARAM_INT);

            try {
                $res = $requete->execute();
                if ($res) {
                    header("Location: modifierNews.php?success=true");
                    exit();
                } else {
                    header("Location: modifierNews.php?success=false");
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
    <title>Modifier une News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-primary my-4">Modifier une News</h1>

        <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
            <div class="alert alert-success text-center">La News a été modifiée avec succès !</div>
        <?php elseif (isset($_GET['success']) && $_GET['success'] == 'false'): ?>
            <div class="alert alert-danger text-center">Erreur : Impossible de modifier la News.</div>
        <?php endif; ?>

        <!-- Liste des news existantes -->
        <div class="mb-4">
            <h3>Choisir une News à modifier :</h3>
            <ul class="list-group">
                <?php foreach ($newsList as $item): ?>
                    <li class="list-group-item">
                        <a href="modifierNews.php?id_news=<?= $item['id_news'] ?>">
                            <?= htmlspecialchars($item['titre']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Formulaire de modification -->
        <?php if ($news): ?>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="modifierNews.php" method="POST">
                        <input type="hidden" name="id_news" value="<?= htmlspecialchars($news['id_news']) ?>">

                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre :</label>
                            <input type="text" name="titre" id="titre" class="form-control" value="<?= htmlspecialchars($news['titre']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Date de Publication :</label>
                            <input type="datetime-local" name="date" id="date" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($news['date_publication'])) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="auteur" class="form-label">Auteur :</label>
                            <input type="text" name="auteur" id="auteur" class="form-control" value="<?= htmlspecialchars($news['auteur']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="contenu" class="form-label">Contenu :</label>
                            <textarea name="contenu" id="contenu" class="form-control" rows="5" required><?= htmlspecialchars($news['contenu']) ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
