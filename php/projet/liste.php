<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des livres</title>
    <link rel="stylesheet" href="css/0liste_.css">
</head>

<body>
    <div class="container">
        <h1>Récapitulatif des livres</h1>
        <?php
        // Récupération des livres
        $livres = file_get_contents('livres.txt');
        $livresArray = json_decode($livres, true) ?: [];
        $titre = $_POST["titre"] ?? "";
        $auteur = $_POST["auteur"] ?? "";
        $editeur = $_POST["editeur"] ?? "";
        $parup = $_POST["parup"] ?? "";
        ?>
        <table>
            <thead>
                <tr>
                    <th>Couverture</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Editeur</th>
                    <th>Date de paruption</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livresArray as $livre): ?>
                    <tr>
                        <td>
                            <div class="image-preview">
                                <?php echo isset($livre['image']) ? "<img src='" . $livre['image'] . "' alt='Image du livre' />" : ''; ?>
                            </div>
                        </td>
                        <td>
                            <a href="details.php?id=<?php echo $livre['id']; ?>"><?php echo $livre['titre']; ?></a>
                        </td>
                        <td>
                            <?php echo $livre['auteur']; ?>
                        </td>
                        <td>
                            <?php echo $livre['editeur']; ?>
                        </td>
                        <td>
                            <?php echo $livre['parup']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<style>
    body {
        background-color: rgb(34, 40, 49);
        color: rgb(238, 238, 238);
        font-family: Arial, sans-serif;
        margin: 0;
    }

    .container {
        width: 80%;
        margin: 20px auto;
    }

    h1 {
        background-color: rgb(57, 62, 70);
        padding: 20px;
        text-align: center;
        border-radius: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid rgb(57, 62, 70);
    }

    th {
        background-color: rgb(0, 173, 181);
    }

    .image-preview img {
        max-width: 100%;
        height: auto;
    }

    .image-preview {
        max-width: 300px;
        margin: 0 auto;
    }
</style>