<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="etude.css">
</head>

<body>
    <div class="container">
        <h1>
            <?php
            $image = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Récupération des données du formulaire
                $nom = $_POST["nom"] ?? "";
                $prenom = $_POST["prenom"] ?? "";

                echo "<h2>Récapitulatif des données du formulaire</h2>";
            } else {
                header("Location: formulaire.php");
            }
            if (isset($_FILES['avatar'])) {
                $uploaddir = '../img/';
                $uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
                $imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
                $maxFileSize = 1.5 * 1024 * 1024; // 1.5 Mo en octets
            
                // Vérification de l'extension et de la taille du fichier
                $allowedExtensions = array('jpg', 'png', 'jpeg', '');
                if (in_array($imageFileType, $allowedExtensions) && $_FILES['avatar']['size'] <= $maxFileSize) {
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
                        //echo "Le fichier a été téléchargé avec succès.";
                        $image = "<img src='" . $uploadfile . "' alt='Image téléchargée' />";
                    } else {
                        $image = "Problème avec le téléchargement du fichier !";
                    }
                } else {
                    $image = "Le fichier n'est pas une image JPG/PNG ou dépasse la taille autorisée.";
                }
            }
            $file = fopen("test2.txt", "a+");
            fwrite($file, date("Y-m-d H:i:s") . " " . $_POST['nom'] . PHP_EOL);
            fclose($file);
            ?>
        </h1>
        <div class="ecrit">
            <p>Nom :
                <?php echo $nom ?>
            </p>
        </div>
        <div class="ecrit">
            <p>Prénom :
                <?php echo $prenom ?>
            </p>
        </div>
        <div class="ecrit">
            <p>Heure d'envoie :
                <?php $file = fopen("test2.txt", "r");
                while (!feof($file)) {
                    $line = fgets($file);
                    echo "<br>" . $line;
                } ?>
            </p>
        </div>
        <div class="image-preview">
            <?php
            echo $image;
            ?>
        </div>
    </div>
</body>

</html>