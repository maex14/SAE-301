<?php
require_once 'config.php';

// Ajouter des identifiants admin préenregistrés
$admins = [
    ['email' => 'admin1@example.com', 'password' => password_hash('admin123', PASSWORD_BCRYPT), 'nom' => 'Admin', 'prenom' => 'One', 'role' => 'admin'],
    ['email' => 'admin2@example.com', 'password' => password_hash('admin456', PASSWORD_BCRYPT), 'nom' => 'Admin', 'prenom' => 'Two', 'role' => 'admin']
];

foreach ($admins as $admin) {
    $stmt = $pdo->prepare("SELECT * FROM comptes WHERE email = ?");
    $stmt->execute([$admin['email']]);
    if ($stmt->rowCount() === 0) {
        $stmt = $pdo->prepare("INSERT INTO comptes (nom, prenom, email, mot_de_passe, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$admin['nom'], $admin['prenom'], $admin['email'], $admin['password'], $admin['role']]);
    }
}

// Traitement de l'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'inscription') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Vérifier si l'email existe déjà
    $stmt = $pdo->prepare("SELECT * FROM comptes WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Email déjà utilisé.');</script>";
    } else {
        // Insérer un nouvel utilisateur
        $stmt = $pdo->prepare("INSERT INTO comptes (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $password]);
        echo "<script>alert('Inscription réussie. Vous pouvez vous connecter.');</script>";
    }
}

// Traitement de la connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'connexion') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier les identifiants
    $stmt = $pdo->prepare("SELECT * FROM comptes WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        session_start();
        $_SESSION['user_id'] = $user['id_compte'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        header('Location: index.php'); // Redirige vers l'accueil
        exit;
    } else {
        echo "<script>alert('Identifiants incorrects.');</script>";
    }
}

// Traitement de la déconnexion
if (isset($_GET['action']) && $_GET['action'] === 'deconnexion') {
    session_start();
    session_destroy();
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers le CSS global -->
    <link rel="stylesheet" href="style.css">
    <title>Connexion / Inscription</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center text-primary">Connexion / Inscription</h2>

    <div class="row mt-4">
        <!-- Formulaire d'inscription -->
        <div class="col-md-6">
            <div class="form-container">
                <h3 class="form-title">Inscription</h3>
                <form method="POST">
                    <input type="hidden" name="action" value="inscription">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="form-submit">S'inscrire</button>
                </form>
            </div>
        </div>

        <!-- Formulaire de connexion -->
        <div class="col-md-6">
            <div class="form-container">
                <h3 class="form-title">Connexion</h3>
                <form method="POST">
                    <input type="hidden" name="action" value="connexion">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="form-submit">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
