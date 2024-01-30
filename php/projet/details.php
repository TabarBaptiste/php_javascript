<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wtitreth=device-wtitreth, initial-scale=1.0">
    <title>Détails du Livre</title>
    <link rel="stylesheet" href="css/details.css">
</head>

<body>
    <div class="container">
        <h1>Détails du Livre</h1>
        <?php
        // Vérifier si l'titre du livre est passé en paramètre
        if (isset($_GET['id'])) {
            // Récupérer l'id du livre depuis l'URL
            $selectedBookid = $_GET['id'];

            // Récupérer tous les livres
            $livres = file_get_contents('livres.txt');
            $livresArray = json_decode($livres, true) ?: [];

            // Rechercher le livre spécifique par son id
            $selectedBook = null;
            foreach ($livresArray as $livre) {
                if ($livre['id'] === $selectedBookid) {
                    $selectedBook = $livre;
                    break;
                }
            }

            // Afficher les détails du livre si trouvé
            if ($selectedBook) { 
                echo "<div class='livre'>";
                echo "<h2>{$selectedBook['titre']}</h2>";
                echo "<div class='separe'>";
                echo "<div class='sep'>";
                echo "<img src='{$selectedBook['image']}' alt='Couverture du livre' />";
                echo "</div>";
                echo "<div class='sep'>";
                echo "<p><strong>Auteur:</strong> {$selectedBook['auteur']}</p>";
                echo "<p><strong>Éditeur:</strong> {$selectedBook['editeur']}</p>";
                echo "<p><strong>Date de parution:</strong> {$selectedBook['parup']}</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<p>Livre non trouvé.</p>";
            }
        } else {
            echo "<p>Aucun id de livre spécifié.</p>";
        }
        ?>
    </div>
</body>

</html>