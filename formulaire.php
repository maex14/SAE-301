
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Plongée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include('header.php'); ?>

    <div class="container mt-5">
        <div class="text-center">
            <h1 class="text-primary fw-bold">Découvrez la plongée sous-marine avec CVP43 !</h1>
            <p class="text-muted fs-5">Plongez dans une aventure inoubliable avec notre formation de plongée sous-marine. Que vous soyez débutant ou passionné en quête de perfectionnement, nos cours sont adaptés à tous les niveaux. Encadrés par des professionnels expérimentés, vous apprendrez les techniques essentielles pour explorer les fonds marins en toute sécurité et avec confiance.</p>
        </div>
        <div class="text-center my-4">
        <img src="image/tortue.png" alt="Tortue sous-marine" class="tortue-image">
        </div>

        <!-- Formulaire -->
        <div class="formulaire-container">
            <form>
                <div class="row mb-3">
                    <label class="form-label">Civilité</label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="civilite" value="madame" id="madame">
                            <label class="form-check-label" for="madame">Madame</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="civilite" value="monsieur" id="monsieur">
                            <label class="form-check-label" for="monsieur">Monsieur</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="civilite" value="autre" id="autre">
                            <label class="form-check-label" for="autre">Autre</label>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nom" class="form-label text-primary">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Veuillez saisir votre nom">
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label text-primary">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Veuillez saisir votre prénom">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label text-primary">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="col-md-6">
                        <label for="telephone" class="form-label text-primary">Téléphone</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Veuillez saisir votre numéro de téléphone">
                    </div>
                    <div class="col-12">
                        <label for="adresse" class="form-label text-primary">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Veuillez saisir votre adresse">
                    </div>
                    <div class="col-md-4">
                        <label for="ville" class="form-label text-primary">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" placeholder="Veuillez saisir votre ville">
                    </div>
                    <div class="col-md-4">
                        <label for="departement" class="form-label text-primary">Département</label>
                        <input type="text" class="form-control" id="departement" name="departement" placeholder="Veuillez saisir votre département">
                    </div>
                    <div class="col-md-4">
                        <label for="code_postal" class="form-label text-primary">Code Postal</label>
                        <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="Veuillez saisir votre code postal">
                    </div>
                    <div class="col-md-6">
                        <label for="niveau" class="form-label text-primary">Niveau</label>
                        <select id="niveau" name="niveau" class="form-select">
                            <option value="">Choisissez votre niveau de plongée</option>
                            <option value="debutant">Débutant</option>
                            <option value="intermediaire">Intermédiaire</option>
                            <option value="avance">Avancé</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="commentaires" class="form-label text-primary">Commentaires Supplémentaire</label>
                        <textarea id="commentaires" name="commentaires" class="form-control" placeholder="Saisir votre commentaire(s)" rows="3"></textarea>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Terminer</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
