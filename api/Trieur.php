<?php
// Inclure la configuration de la base de données
include("../config/configuration.php");  // Assurez-vous que le chemin est correct

// Affiche les erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Connexion à la base de données avec les paramètres du fichier configuration.php
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si une erreur de connexion à la base de données se produit
    http_response_code(500);
    echo json_encode(["error" => "Erreur de connexion à la base de données : " . $e->getMessage()]);
    exit;
}

// Fonction pour récupérer les articles, filtrés par mois
function getArticlesByMonth($pdo, $month) {
    $query = "SELECT id_news, titre, date_publication, contenu, auteur FROM news WHERE MONTH(date_publication) = :month ORDER BY date_publication DESC";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour récupérer tous les articles
function getAllArticles($pdo) {
    $query = "SELECT id_news, titre, date_publication, contenu, auteur FROM news ORDER BY date_publication DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Traitement de la requête API
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        // Vérifier si un mois est spécifié
        if (isset($_GET['month']) && is_numeric($_GET['month'])) {
            $month = (int) $_GET['month'];
            if ($month >= 1 && $month <= 12) {
                // Récupérer les articles filtrés par mois
                $articles = getArticlesByMonth($pdo, $month);
            } else {
                echo json_encode(["error" => "Mois invalide"]);
                exit;
            }
        } else {
            // Sinon, récupérer tous les articles
            $articles = getAllArticles($pdo);
        }

        // Ajouter un lien cliquable pour chaque article
        foreach ($articles as &$article) {
            $article['lien'] = 'details_article.php?id=' . $article['id_news']; // Lien vers la page de détails
        }

        echo json_encode(["articles" => $articles]);

    } catch (Exception $e) {
        // Si une erreur se produit lors de la récupération des articles
        http_response_code(500);
        echo json_encode(["error" => "Erreur lors de la récupération des articles : " . $e->getMessage()]);
    }
} else {
    // Si la méthode de requête n'est pas GET
    http_response_code(405);
    echo json_encode(["error" => "Méthode non autorisée. Utilisez GET."]);
}
