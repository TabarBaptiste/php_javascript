<?php
$term2 = $_POST['term2'];
$term1 = $_POST['term1'];
function MultiplierPar($term1, $term2) {
    $produit = $term1 * $term2;
    return $produit."\n";
}

function PuissancePar($term1, $term2) {
    $resultat = 1;
    for ($i = 1; $i <= $term2; $i++) {
        $resultat = MultiplierPar($resultat, $term1);
    }
    return $resultat;
}
echo MultiplierPar($term1, $term2);
echo "<br>";
echo PuissancePar($term1, $term2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fontion</title>
</head>
<body>
    <form action="fonction1.php" method="post">
        <label for="term1">Term1</label>
        <input type="text" name="term1" id="term1">

        <label for="term2">term2</label>
        <input type="text" name="term2" id="term2">
        <button type="submit">Send</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>