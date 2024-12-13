<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Header</title>
</head>

<body>
    <footer>
        <div class="footer-container">
          <div class="footer-top">
            <img src="image/turtle white_1.png" alt="Logo" class="footer-logo" />
            <nav class="footer-nav">
              <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="news.php">Les News</a></li>
                <li><a href="events.php">Événements</a></li>
              </ul>
            </nav>
            <div class="footer-socials">
              <a href="https://www.facebook.com/CVP43" target="_blank" class="footer-social">
                <img src="image/logofacebook.png" alt="Facebook" />
              </a>
              <a href="https://x.com/cvp43" target="_blank" class="footer-social">
                <img src="image/logotwitter.png" alt="Twitter" />
              </a>
              <a href="https://www.instagram.com/cvp43/" target="_blank" class="footer-social">
                <img src="image/Logoinsta.png" alt="Instagram" />
              </a>
            </div>
          </div>
      
          <!-- Middle section with contact info and newsletter -->
          <div class="footer-middle">
            <div class="contact-info">
              <h3>Contactez-nous</h3>
              <p>Email: cvp43.fr@gmail.com</p>
              <p>Téléphone: 06 63 33 15 96</p>
              <p>Adresse: Centre nautique de la vague, 43000, Le Puy-en-Velay</p>
            </div>
            <div class="newsletter">
                <form action="subscribe.php" method="post">
                    <input type="email" name="email" placeholder="Email" required />
                    <button type="submit">Abonnez-vous à la newsletter</button>
                </form>
            </div>
          </div>
      
          <!-- Bottom section with copyright and legal links -->
          <div class="footer-bottom">
            <hr />
            <p>&copy; 2024 Cvp43. Tous droits réservés</p>
            <a href="legal.php">Informations légales</a>
          </div>
        </div>
    </footer>
</body>

</html>
