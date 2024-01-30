<?php
require_once('tableau.php');
$content = file_get_contents('tab.txt');

echo($content);

/*$file = fopen("txt/fruits.txt");
while(!feof($file)) {
    print(fgets($file)) . "\n";
}*/