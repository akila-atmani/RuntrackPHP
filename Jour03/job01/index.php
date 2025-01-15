<?php

$numero = [200, 204, 173, 98, 171, 404, 459];


for ($i = 0; isset($numero[$i]); $i++) {
    $num = $numero[$i]; 

   
    if ($num % 2 === 0) {
        echo "$num est paire<br>";
    } else {
        echo "$num est impaire<br>";
    }
}
?>
