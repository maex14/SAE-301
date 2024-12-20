<?php
    require_once 'config.php';


    // Récupérer les lieux récents ou les plus utilisés
    $lieux = $pdo->query('SELECT id_lieu, nom_lieu, adresse FROM lieux ORDER BY id_lieu DESC LIMIT 10')->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['titre'], $_POST['date'], $_POST['lieu_exist'], $_POST['lieu'], $_POST['adresse'], $_POST['description'])) {
            try {
                $pdo->beginTransaction();

                // Si un lieu existant est sélectionné
                if (!empty($_POST['lieu_exist'])) {
                    $idLieu = $_POST['lieu_exist'];
                } else {
                    // Vérifier si le lieu avec l'adresse existe déjà
                    $lieuExistant = $pdo->prepare('SELECT id_lieu FROM lieux WHERE nom_lieu = :lieu AND adresse = :adresse');
                    $lieuExistant->bindValue(':lieu', $_POST['lieu'], PDO::PARAM_STR);
                    $lieuExistant->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
                    $lieuExistant->execute();
                    $idLieu = $lieuExistant->fetchColumn();

                    // Si le lieu n'existe pas, insérez-le
                    if (!$idLieu) {
                        $ajoutLieu = $pdo->prepare('INSERT INTO lieux (nom_lieu, adresse) VALUES (:lieu, :adresse)');
                        $ajoutLieu->bindValue(':lieu', $_POST['lieu'], PDO::PARAM_STR);
                        $ajoutLieu->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
                        $ajoutLieu->execute();
                        $idLieu = $pdo->lastInsertId();
                    }
                }

                // Insérer l'événement avec l'ID du lieu
                $requete = $pdo->prepare('INSERT INTO evenement (titre, date_evenement, lieu, description, id_lieu) VALUES (:titre, :date, :lieu, :description, :id_lieu)');
                $requete->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
                $requete->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
                $requete->bindValue(':lieu', $_POST['lieu'], PDO::PARAM_STR);
                $requete->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
                $requete->bindValue(':id_lieu', $idLieu, PDO::PARAM_INT);

                $requete->execute();
                $pdo->commit();

                header("Location: ajouterEvent.php?success=true");
                exit();
            } catch (PDOException $e) {
                $pdo->rollBack();
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
    <title>Ajouter un Événement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo '<div class="alert alert-success text-center">L’Événement a été ajouté avec succès !</div>';
    } elseif (isset($_GET['success']) && $_GET['success'] == 'false') {
        echo '<div class="alert alert-danger text-center">Erreur : Impossible d’ajouter l’Événement.</div>';
    }
    ?>

    <div class="container">
        <h1 class="text-center text-primary my-4">Ajouter un Événement</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="ajouterEvent.php" method="POST">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre :</label>
                        <input type="text" name="titre" id="titre" class="form-control" placeholder="Entrez le titre de l’événement" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date de l’Événement :</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="lieu_exist" class="form-label">Lieu existant :</label>
                        <select name="lieu_exist" id="lieu_exist" class="form-select">
                            <option value="">Sélectionnez un lieu</option>
                            <?php foreach ($lieux as $lieu): ?>
                                <option value="<?php echo htmlspecialchars($lieu['id_lieu']); ?>">
                                    <?php echo htmlspecialchars($lieu['nom_lieu'] . ' (' . $lieu['adresse'] . ')'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="lieu" class="form-label">Nom du nouveau lieu :</label>
                        <input type="text" name="lieu" id="lieu" class="form-control" placeholder="Entrez le nom du lieu si nouveau">
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse du nouveau lieu :</label>
                        <input type="text" name="adresse" id="adresse" class="form-control" placeholder="Entrez l'adresse complète si nouveau">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Entrez la description de l’événement" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
