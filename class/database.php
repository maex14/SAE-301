<?php

class Database {
    private $host = 'localhost';
    private $dbname = 'webweek';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function connect() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        if (!$this->pdo) {
            throw new Exception("Connexion à la base de données non établie.");
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function disconnect() {
        $this->pdo = null;
    }
}
