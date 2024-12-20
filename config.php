<?php
$host = 'localhost';
$port = '3306';
$dbname = 'u235618863_webweek';
$username = 'u235618863_webweek';
$password = 'f0P=3p8A*';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion");
}
?>
