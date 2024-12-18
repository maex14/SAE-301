<?php
    include("../config/configuration.php");
    $bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['titre'], $_POST['date'], $_POST['lieu'], $_POST['description'])) {
            $requete = $bdd->prepare('INSERT INTO evenement (titre, date_evenement, lieu, description) VALUES (:titre, :date, :lieu, :description)');
            $requete->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $requete->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
            $requete->bindValue(':lieu', $_POST['lieu'], PDO::PARAM_STR);
            $requete->bindValue(':description', $_POST['description'], PDO::PARAM_STR);

            try {
                $res = $requete->execute();
                if ($res) {
                    header("Location: ajouterEvent.php?success=true");
                    exit();
                } else {
                    header("Location: ajouterEvent.php?success=false");
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
                        <label for="lieu" class="form-label">Lieu :</label>
                        <input type="text" name="lieu" id="lieu" class="form-control" placeholder="Entrez le lieu de l’événement" required>
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
