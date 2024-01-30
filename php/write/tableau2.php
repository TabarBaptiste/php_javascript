<?php
$fruitsEtLegumes = array(
    'fruit1' => 'Pomme',
    'fruit2' => 'Banane',
    'fruit3' => 'Orange',
    'legume1' => 'Carotte',
    'legume2' => 'Tomate',
    'legume3' => 'Brocoli',
    'fruit4' => 'Fraise',
    'fruit5' => 'Raisin',
    'legume4' => 'Courgette',
    'legume5' => 'Poivron'
);

$nomFichier = 'fichier.txt';

$file = fopen($nomFichier, 'w');
foreach ($fruitsEtLegumes as $indice => $valeur) {
    fwrite($file, "$indice:$valeur\n");
}
fclose($file);
//echo 'Données écrites dans le fichier avec les indices.';

/*
$fileName = "fichier.txt";
if (file_exists($fileName)) {
    unlink($fileName);
}
fwrite($key . ':' . $value . PHP_EOL);
$details = explode(':', $line);
echo "<td>" . $details[0]."</td>";*/
?>