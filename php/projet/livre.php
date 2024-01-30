<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['avatar'])) {
        $uploaddir = 'img/';
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
    $livre = [
        'id' => uniqid(),
        'titre' => $_POST['titre'] ?? '',
        'auteur' => $_POST['auteur'] ?? '',
        'editeur' => $_POST['editeur'] ?? '',
        'parup' => $_POST['parup'] ?? '',
        'image' => isset($_FILES['avatar']) ? 'img/' . basename($_FILES['avatar']['name']) : ''
    ];

    // Enregistrement des données dans un fichier (livres.txt)
    $livres = file_get_contents('livres.txt');
    $livresArray = json_decode($livres, true) ?: [];
    $livresArray[] = $livre;
    file_put_contents('livres.txt', json_encode($livresArray));

    header("Location: liste.php");
} else {
    header("Location: creation.php");
}