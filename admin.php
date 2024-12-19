<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}
?>

<div class="container">
    <!-- Logo et Titre -->
    <div class="admin-header">
        <a href="index.php" title="Retour à l'accueil">
            <img src="img/logo.png" alt="Logo" class="admin-logo">
        </a>
        <h1>Page Admin</h1>
        <p class="text-muted">Bienvenue sur la page d'administration ! <br>Cet espace est réservé aux administrateurs du site pour gérer facilement son contenu et ses fonctionnalités. <br>Voici ce que vous pouvez faire ici :</p>
    </div>

    <div class="container">
        <!-- Logo et Titre -->
        <div class="admin-header">
            <a href="https://xn--webweek-club-vellave-plonge-0oc.website/" title="Retour à l'accueil">
                <img src="img/logo.png" alt="Logo" class="admin-logo">
            </a>
            <h1>Page Admin</h1>
            <p class="text-muted">Bienvenue sur la page d'administration ! <br>Cet espace est réservé aux
                administrateurs du site pour gérer facilement son contenu et ses fonctionnalités. <br>Voici ce que vous
                pouvez faire ici :</p>
        </div>

    <!-- Section News -->
    <h2 class="text-primary fw-bold">Les News :</h2>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="admin-card">
                <h3>Créer une News</h3>
                <p>Ajoutez de nouvelles actualités pour informer vos visiteurs.</p>
                <a href="ajouterNews.php" class="icon-arrow">
                    <img src="img/iconflèche.png" alt="Flèche">
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-card">
                <h3>Modifier une News</h3>
                <p>Mettez à jour les informations des news existantes.</p>
                <a href="modifierNews.php" class="icon-arrow">
                    <img src="img/iconflèche.png" alt="Flèche">
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-card">
                <h3>Supprimer une News</h3>
                <p>Retirez les actualités obsolètes ou non pertinentes.</p>
                <a href="supprimerNews.php" class="icon-arrow">
                    <img src="img/iconflèche.png" alt="Flèche">
                </a>
            </div>
        </div>
    </div>

    <!-- Section Evenements -->
    <h2 class="text-primary fw-bold">Les Événements :</h2>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="admin-card">
                <h3>Créer un Événement</h3>
                <p>Ajoutez des événements pour votre public.</p>
                <a href="ajouterEvent.php" class="icon-arrow">
                    <img src="img/iconflèche.png" alt="Flèche">
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-card">
                <h3>Modifier un Événement</h3>
                <p>Changez les détails d'un événement existant.</p>
                <a href="modifierEvent.php" class="icon-arrow">
                    <img src="img/iconflèche.png" alt="Flèche">
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-card">
                <h3>Supprimer un Événement</h3>
                <p>Retirez un événement annulé ou obsolète.</p>
                <a href="supprimerEvent.php" class="icon-arrow">
                    <img src="img/iconflèche.png" alt="Flèche">
                </a>
            </div>
        </div>
    </div>

    <!-- Section Inscriptions -->
    <h2 class="text-primary fw-bold">Les Inscriptions :</h2>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="admin-card">
                <h3>Voir les inscrits</h3>
                <p>Consultez la liste des participants aux événements.</p>
                <a href="voirInscriptions.php" class="icon-arrow">
                    <img src="img/iconflèche.png" alt="Flèche">
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>