<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php'); // Redirige si non connecté
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenue, utilisateur <?php echo $_SESSION['user_id']; ?> !</h1>
    <p>Vous êtes connecté en tant que : <?php echo $_SESSION['role']; ?></p>
</body>
</html>
