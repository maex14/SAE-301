<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'webweek';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

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
    <title>Connexion / Inscription</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Connexion / Inscription</h2>

    <div class="row mt-4">
        <!-- Formulaire d'inscription -->
        <div class="col-md-6">
            <h3>Inscription</h3>
            <form method="POST">
                <input type="hidden" name="action" value="inscription">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>

        <!-- Formulaire de connexion -->
        <div class="col-md-6">
            <h3>Connexion</h3>
            <form method="POST">
                <input type="hidden" name="action" value="connexion">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success">Se connecter</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
