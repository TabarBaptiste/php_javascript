<?php
$suffixes = ["ère", "nde", "ème"];

for ($i = 1; $i < 10; $i++) {
    $suffixIndex = ($i >= 3) ? 2 : $i - 1;
    echo $i . $suffixes[$suffixIndex] . " ligne \n";
}
?>