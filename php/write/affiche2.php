<?php
require_once('tableau2.php');
$nomFichier = 'fichier.txt';

// Lecture du fichier et copie des données dans un tableau avec indices et valeurs
$dataFromFile = array();
$file = fopen($nomFichier, 'r');
while ($line = fgets($file)) {
    list($indice, $valeur) = explode(':', $line, 2);
    $dataFromFile[$indice] = trim($valeur);
}
fclose($file);

// Affichage du tableau
echo '<pre>';
print_r($dataFromFile);
echo '</pre>';
?>
