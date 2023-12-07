<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Upload</title>
    <link rel="stylesheet" href="formulaire_.css">
</head>
<body>
    <div class="container">
        <h2>Formulaire PHP pour Upload de Fichier</h2>
        <form action="etude.php" method="POST" enctype="multipart/form-data">
            <label for="nom">Votre nom</label>
            <input type="text" name="nom" id="nom" required value="">
            
            <label for="prenom">Votre prénom</label>
            <input type="text" name="prenom" id="prenom" value="">
            
            <input type="file" name="avatar" id="avatar" accept="image/*">
            
            <button type="submit" name="submit">Envoyer</button>
            <button type="reset">Annuler</button>
        </form>
    </div>
</body>
</html>
<!--
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #EAC696;
    margin: 0;
    padding: 0;
}

.container {
    width: 50%;
    margin: 50px auto;
    background-color: #C8AE7D;
    border-radius: 15px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
    padding: 20px;
}

h2 {
    text-align: center;
    color: #765827;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    color: #65451F;
    margin-bottom: 5px;
}

input[type="text"] {
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #65451F;
    border-radius: 5px;
    transition: border-color 0.3s ease-in-out;
}

input[type="text"]:focus {
    border-color: #765827;
    outline: none;
}

button {
    padding: 10px 20px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    background-color: #765827;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

button:hover {
    background-color: #65451F;
}

</style>