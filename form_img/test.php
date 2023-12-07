<?php
$file = fopen("test2.txt", "r");
while (!feof($file)) {
    $line = fgets($file);
    echo $file;
}