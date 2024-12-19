<?php

class RecupForm {
    public $civilite;
    public $nom;
    public $prenom;
    public $email;
    public $adresse;
    public $ville;  
    public $departement;
    public $code_postal;
    public $telephone;
    public $niveau;
    public $commentaire;

    public function __construct($data) {
        $this->civilite = $data['civilite'] ?? '';
        $this->nom = $data['nom'] ?? '';
        $this->prenom = $data['prenom'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->adresse = $data['adresse'] ?? '';
        $this->ville = $data['ville'] ?? '';
        $this->departement = $data['departement'] ?? '';
        $this->code_postal = $data['code_postal'] ?? '';
        $this->telephone = $data['telephone'] ?? '';
        $this->niveau = $data['niveau'] ?? '';
        $this->commentaire = $data['commentaire'] ?? '';
    }
}
?>