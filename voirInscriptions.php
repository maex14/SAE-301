<?php
    include("config/configuration.php");
    $bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

    // Récupération des inscriptions
    $inscriptions = $bdd->query(
        "SELECT inscription.nom, inscription.email, inscription.date_inscription, evenement.titre AS evenement_titre 
        FROM inscription 
        LEFT JOIN evenement ON inscription.id_evenement = evenement.id_evenement 
        ORDER BY inscription.date_inscription DESC"
    )->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualiser les Inscriptions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center text-primary my-4">Visualiser les Inscriptions</h1>

        <?php if (count($inscriptions) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date d'Inscription</th>
                        <th>Événement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inscriptions as $inscription): ?>
                    <tr>
                        <td><?= htmlspecialchars($inscription['nom']) ?></td>
                        <td><?= htmlspecialchars($inscription['email']) ?></td>
                        <td><?= htmlspecialchars(date('d/m/Y H:i', strtotime($inscription['date_inscription']))) ?></td>
                        <td><?= htmlspecialchars($inscription['evenement_titre'] ?? 'Aucun') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-info text-center">Aucune inscription trouvée.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>