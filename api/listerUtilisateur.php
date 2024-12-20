<?php
// Pour se connecter à la base de données
include("../config.php");

// Connexion à la base de données
try {
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Échec lors de la connexion : ' . $e->getMessage();
}

$donnees = array();

if (isset($_GET["id_utilisateur"])) {
    $id_utilisateur = intval($_GET["id_utilisateur"]);  // Assurez-vous que l'ID est un entier
    $donnees["status"] = "OK";

    // Requête pour récupérer les informations de l'utilisateur
    $requete = 'SELECT id_inscription, civilite, nom, prenom, email, adresse, ville, departement, code_postal, telephone, niveau, date_inscription
                FROM inscription WHERE id_inscription = :id_utilisateur';
    $stmt = $dbh->prepare($requete);
    $stmt->execute(['id_utilisateur' => $id_utilisateur]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifiez si l'utilisateur a été trouvé
    if ($utilisateur) {
        $donnees['utilisateur'] = $utilisateur;
    } else {
        $donnees["status"] = "Utilisateur non trouvé";
    }
} else {
    $donnees["status"] = "Aucun identifiant d'utilisateur fourni";
}

// Encodage des données au format JSON
$donneesJson = json_encode($donnees, JSON_HEX_APOS | JSON_UNESCAPED_UNICODE);

// Remplacement des \\n qui peuvent causer des erreurs en JavaScript
$donneesJson = str_replace("\\n", " ", $donneesJson);

// Envoi des données JSON
echo $donneesJson;
?>
