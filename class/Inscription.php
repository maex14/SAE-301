<?php

class Inscription {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function save(RecupForm $form, $idFormation) {
        $sql = "INSERT INTO inscription 
                (civilite, nom, prenom, email, adresse, ville, departement, code_postal, telephone, niveau, commentaire, date_inscription, id_formations) 
                VALUES 
                (:civilite, :nom, :prenom, :email, :adresse, :ville, :departement, :code_postal, :telephone, :niveau, :commentaire, NOW(), :id_formations)";
        $this->db->query($sql, [
            ':civilite' => $form->civilite,
            ':nom' => $form->nom,
            ':prenom' => $form->prenom,
            ':email' => $form->email,
            ':adresse' => $form->adresse,
            ':ville' => $form->ville,
            ':departement' => $form->departement,
            ':code_postal' => $form->code_postal,
            ':telephone' => $form->telephone,
            ':niveau' => $form->niveau,
            ':commentaire' => $form->commentaire,
            ':id_formations' => $idFormation,
        ]);
    }
    
}
