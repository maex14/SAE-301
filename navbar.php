<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="../www/index.php">
                <img src="images\logo responsive.png" alt="LogoCVP43" class="logo-navbar" loading="lazy">
            </a>

            <!-- Bouton responsive -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Liens de navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="les_news.php">Les News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="evenement.php">Événements</a>
                    </li>

                    <!-- Gestion des boutons -->
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <span class="nav-link text-success">
                                Connecté : <?php echo htmlspecialchars($_SESSION['prenom'] . ' ' . $_SESSION['nom']); ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger" href="auth.php?action=deconnexion">Déconnexion</a>
                            <?php if ($_SESSION['role'] === 'admin'): ?>
                                <a class="btn btn-outline-primary" href="admin.php">Admin</a>
                            <?php else: ?>
                                <a class="btn btn-outline-primary" href="formation.php">Formation</a>
                            <?php endif; ?>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary" href="auth.php">Inscription</a>
                            <a class="btn btn-outline-primary" href="auth.php">Connexion</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
