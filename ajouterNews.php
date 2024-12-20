<?php
require_once 'config.php';

    // Récupération des événements pour le menu déroulant
    $evenements = $pdo->query('SELECT id_evenement, titre FROM evenement')->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Vérification des champs POST
        if (isset($_POST["titre"], $_POST["contenu"], $_POST["auteur"], $_POST["date"])) {
            $requete_preparee = $pdo->prepare('INSERT INTO news (titre, contenu, auteur, date_publication, id_evenement) VALUES (:titre, :contenu, :auteur, :date, :id_evenement)');
            $requete_preparee->bindValue(':titre', $_POST["titre"], PDO::PARAM_STR);
            $requete_preparee->bindValue(':contenu', $_POST["contenu"], PDO::PARAM_STR);
            $requete_preparee->bindValue(':auteur', $_POST["auteur"], PDO::PARAM_STR);
            $requete_preparee->bindValue(':date', $_POST["date"], PDO::PARAM_STR);
            $requete_preparee->bindValue(':id_evenement', empty($_POST["id_evenement"]) ? null : $_POST["id_evenement"], PDO::PARAM_INT);

            try {
                $res = $requete_preparee->execute();
                if ($res) {
                    header("Location: ajouterNews.php?success=true");
                    exit();
                } else {
                    header("Location: ajouterNews.php?success=false");
                    exit();
                }
            } catch (PDOException $e) {
                echo "Erreur PDO : " . $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo '<div class="alert alert-success text-center">La News a été ajoutée avec succès !</div>';
    } elseif (isset($_GET['success']) && $_GET['success'] == 'false') {
        echo '<div class="alert alert-danger text-center">Erreur : Impossible d’ajouter la News.</div>';
    }
    ?>

    <div class="container">
        <h1 class="text-center text-primary my-4">Ajouter une News</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="ajouterNews.php" method="POST">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre :</label>
                        <input type="text" name="titre" id="titre" class="form-control" placeholder="Entrez le titre de la news" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date de Publication :</label>
                        <input type="datetime-local" name="date" id="date" class="form-control" value="<?php echo date('Y-m-d\TH:i'); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="auteur" class="form-label">Auteur :</label>
                        <input type="text" name="auteur" id="auteur" class="form-control" placeholder="Entrez le nom de l'auteur" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenu" class="form-label">Contenu :</label>
                        <textarea name="contenu" id="contenu" class="form-control" rows="5" placeholder="Entrez le contenu de la news" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_evenement" class="form-label">Associer à un événement :</label>
                        <select name="id_evenement" id="id_evenement" class="form-select">
                            <option value="">Aucun</option>
                            <?php foreach ($evenements as $evenement): ?>
                                <option value="<?php echo htmlspecialchars($evenement['id_evenement']); ?>">
                                    <?php echo htmlspecialchars($evenement['titre']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
