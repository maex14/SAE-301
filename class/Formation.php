<?php

class Formation {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM formations";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
