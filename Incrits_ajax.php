<?php 
// Pour se connecter à la base de données
include("config/configuration.php");

// Connexion à la base de données
try {
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Échec lors de la connexion : ' . $e->getMessage();
}

/* Récupération des utilisateurs */
$requete = 'SELECT * FROM inscription ORDER BY nom, prenom';
$resultats = $dbh->query($requete);
$tableauUtilisateurs = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

$nbUtilisateurs = count($tableauUtilisateurs);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Liste des Utilisateurs</title>
    <meta name="description" content="" />

    <link rel="stylesheet" media="screen" href="css/normalize.css">
</head>

<body>

    <h1>Liste des utilisateurs</h1>
    <h2 id="intituleUtilisateur"></h2>
    <div id="divUtilisateurs"></div>

    <h2>Utilisateurs</h2>

    <!-- Liste des utilisateurs -->
    <form method="GET">
        <select id="selectUtilisateur" name="id_utilisateur" size="5">
            <?php
        for($i = 0; $i < $nbUtilisateurs; $i++){
          echo '<option value="'.$tableauUtilisateurs[$i]["id_inscription"].'">'.$tableauUtilisateurs[$i]["prenom"].' '.$tableauUtilisateurs[$i]["nom"].'</option>'."\n";
        }
      ?>
        </select></br>
    </form>

    <!-- Template Mustache pour afficher les informations détaillées -->
    <script id="templateUtilisateur" type="text/html">
    <ul>
        {{ #. }}
        <li>
            <strong>{{prenom}} {{nom}}</strong><br>
            <em>{{email}}</em><br>
            <p><strong>Adresse:</strong> {{adresse}}, {{ville}} ({{code_postal}}), {{departement}}</p>
            <p><strong>Téléphone:</strong> {{telephone}}</p>
            <p><strong>Niveau:</strong> {{niveau}}</p>
            <p><strong>Date d'inscription:</strong> {{date_inscription}}</p>
        </li>
        {{ /. }}
    </ul>
    </script>

    <!-- Mustache -->
    <script src="js/mustache.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>