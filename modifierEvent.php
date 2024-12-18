<?php
    include("config.php");
    $bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

    // Récupération des événements pour affichage dans la liste
    $eventList = $bdd->query("SELECT id_evenement, titre FROM evenement ORDER BY date_evenement DESC")->fetchAll(PDO::FETCH_ASSOC);

    // Initialisation des données de l’événement à modifier
    $event = null;
    if (isset($_GET['id_evenement'])) {
        $stmt = $bdd->prepare("SELECT * FROM evenement WHERE id_evenement = :id_evenement");
        $stmt->bindValue(":id_evenement", $_GET['id_evenement'], PDO::PARAM_INT);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Modification de l’événement
        if (isset($_POST['id_evenement'], $_POST['titre'], $_POST['date'], $_POST['lieu'], $_POST['description'])) {
            $requete = $bdd->prepare(
                'UPDATE evenement SET titre = :titre, date_evenement = :date, lieu = :lieu, description = :description WHERE id_evenement = :id_evenement'
            );
            $requete->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $requete->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
            $requete->bindValue(':lieu', $_POST['lieu'], PDO::PARAM_STR);
            $requete->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
            $requete->bindValue(':id_evenement', $_POST['id_evenement'], PDO::PARAM_INT);

            try {
                $res = $requete->execute();
                if ($res) {
                    header("Location: modifierEvent.php?success=true");
                    exit();
                } else {
                    header("Location: modifierEvent.php?success=false");
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
    <title>Modifier un Événement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-primary my-4">Modifier un Événement</h1>

        <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
            <div class="alert alert-success text-center">L’Événement a été modifié avec succès !</div>
        <?php elseif (isset($_GET['success']) && $_GET['success'] == 'false'): ?>
            <div class="alert alert-danger text-center">Erreur : Impossible de modifier l’Événement.</div>
        <?php endif; ?>

        <!-- Liste des événements existants -->
        <div class="mb-4">
            <h3>Choisir un Événement à modifier :</h3>
            <ul class="list-group">
                <?php foreach ($eventList as $item): ?>
                    <li class="list-group-item">
                        <a href="modifierEvent.php?id_evenement=<?= $item['id_evenement'] ?>">
                            <?= htmlspecialchars($item['titre']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Formulaire de modification -->
        <?php if ($event): ?>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="modifierEvent.php" method="POST">
                        <input type="hidden" name="id_evenement" value="<?= htmlspecialchars($event['id_evenement']) ?>">

                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre :</label>
                            <input type="text" name="titre" id="titre" class="form-control" value="<?= htmlspecialchars($event['titre']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Date de l’Événement :</label>
                            <input type="date" name="date" id="date" class="form-control" value="<?= htmlspecialchars($event['date_evenement']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="lieu" class="form-label">Lieu :</label>
                            <input type="text" name="lieu" id="lieu" class="form-control" value="<?= htmlspecialchars($event['lieu']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description :</label>
                            <textarea name="description" id="description" class="form-control" rows="5" required><?= htmlspecialchars($event['description']) ?></textarea>
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
