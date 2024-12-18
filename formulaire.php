<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plongée Sous-Marine CVP43</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container my-5">
        <!-- Titre et image -->
        <div class="text-center mb-4 position-relative">
            <h1 class="form-title">Découvrez la plongée sous-marine avec CVP43 !</h1>
            <p>
                Plongez dans une aventure inoubliable avec notre formation de plongée sous-marine. Que vous soyez débutant ou passionné en quête de perfectionnement, nos cours sont adaptés à tous les niveaux. Encadrés par des professionnels expérimentés, vous apprendrez les techniques essentielles pour explorer les fonds marins en toute sécurité et avec confiance.
            </p>
            <!-- Image de la tortue -->
            <img src="image\tortue.png" alt="Tortue de mer" class="position-absolute end-0 top-0" style="max-width: 150px;">
        </div>
        
        <!-- Formulaire -->
        <div class="form-section mx-auto">
            <form>
                <!-- Civilité -->
                <div class="row mb-3">
                    <label class="form-label">Civilité :</label>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civilite" id="madame" value="Madame" checked>
                            <label class="form-check-label" for="madame">Madame</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civilite" id="monsieur" value="Monsieur">
                            <label class="form-check-label" for="monsieur">Monsieur</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civilite" id="autre" value="Autre">
                            <label class="form-check-label" for="autre">Autre</label>
                        </div>
                    </div>
                </div>
                
                <!-- Zones de texte -->
                <div class="row g-3">
                    <!-- Colonne Gauche -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="custom-input" id="nom" placeholder="Nom">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="custom-input" id="prenom" placeholder="Prénom">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="custom-input" id="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" class="custom-input" id="telephone" placeholder="Téléphone">
                        </div>
                    </div>

                    <!-- Colonne Droite -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="custom-input" id="adresse" placeholder="Adresse">
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="custom-input" id="ville" placeholder="Ville">
                        </div>
                        <div class="mb-3">
                            <label for="departement" class="form-label">Département</label>
                            <input type="text" class="custom-input" id="departement" placeholder="Département">
                        </div>
                        <div class="mb-3">
                            <label for="codepostal" class="form-label">Code Postal</label>
                            <input type="text" class="custom-input" id="codepostal" placeholder="Code Postal">
                        </div>
                    </div>
                </div>

                <!-- Niveau -->
                <div class="mb-3">
                    <label for="niveau" class="form-label">Niveau</label>
                    <select class="custom-input" id="niveau">
                        <option selected disabled>Choisissez votre niveau de plongée</option>
                        <option value="debutant">Débutant</option>
                        <option value="intermediaire">Intermédiaire</option>
                        <option value="avance">Avancé</option>
                    </select>
                </div>

                <!-- Commentaire -->
                <div class="mb-3">
                    <label for="commentaires" class="form-label">Commentaires Supplémentaires</label>
                    <textarea class="custom-input" id="commentaires" rows="3" placeholder="Votre commentaire"></textarea>
                </div>

                <!-- Bouton aligné à gauche -->
                <div class="button-container">
                    <button type="submit" class="btn btn-primary">Terminer</button>
                </div>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    