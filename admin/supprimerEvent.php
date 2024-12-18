<?php
    include("../config/configuration.php");
    $bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

    // Récupération des événements pour affichage dans la liste
    $eventList = $bdd->query("SELECT id_evenement, titre FROM evenement ORDER BY date_evenement DESC")->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Suppression de l’événement
        if (isset($_POST['id_evenement'])) {
            $requete = $bdd->prepare("DELETE FROM evenement WHERE id_evenement = :id_evenement");
            $requete->bindValue(':id_evenement', $_POST['id_evenement'], PDO::PARAM_INT);

            try {
                $res = $requete->execute();
                if ($res) {
                    header("Location: supprimerEvent.php?success=true");
                    exit();
                } else {
                    header("Location: supprimerEvent.php?success=false");
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
    <title>Supprimer un Événement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-primary my-4">Supprimer un Événement</h1>

        <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
            <div class="alert alert-success text-center">L’Événement a été supprimé avec succès !</div>
        <?php elseif (isset($_GET['success']) && $_GET['success'] == 'false'): ?>
            <div class="alert alert-danger text-center">Erreur : Impossible de supprimer l’Événement.</div>
        <?php endif; ?>

        <!-- Liste des événements existants -->
        <div class="mb-4">
            <h3>Choisir un Événement à supprimer :</h3>
            <form action="supprimerEvent.php" method="POST">
                <ul class="list-group">
                    <?php foreach ($eventList as $item): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= htmlspecialchars($item['titre']) ?>
                            <button type="submit" name="id_evenement" value="<?= $item['id_evenement'] ?>" class="btn btn-danger btn-sm">Supprimer</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
