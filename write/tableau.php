<?php

/*$tab = array(
    "element1",
    "element2",
    "element3",
    "element4",
    "element5",
    "element6",
    "element7",
    "element8",
    "element9",
    "element10",
);
file_put_contents('tab.txt', implode(', ',$tab));
*/
$fruit = ["banane", "pomme", "abricot", "mango"];

foreach ($fruit as $i => $value) {
    $file = fopen('txt/fruits.txt', "a+");
    fwrite($file, $value . PHP_EOL);
    $fclose($file);
}

?>