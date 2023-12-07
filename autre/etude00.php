<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="etude.css">
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $nom = $_POST["nom"] ?? "";
        $prenom = $_POST["prenom"] ?? "";

        // Écriture des données dans un fichier affiche.php
        /*$file = fopen("affiche.php", "w");
        if ($file) {
            fwrite($file, "<?php\n");
            fwrite($file, "// Données du formulaire\n");
            fwrite($file, "\$nom = \"$nom\";\n");
            fwrite($file, "\$prenom = \"$prenom\";\n");
            fwrite($file, "<p>Nom : $nom</p>");
            fwrite($file, "<p>Préom : $prenom</p>");
            fwrite($file, "?>");
            fclose($file);
        } else {
            echo "Erreur lors de l'ouverture du fichier.";
        }*/

        echo "<h2>Récapitulatif des données du formulaire</h2>";
        echo "<p>Nom : $nom</p>";
        echo "<p>Prénom : $prenom</p>";
    }
    ?>
</body>

</html>