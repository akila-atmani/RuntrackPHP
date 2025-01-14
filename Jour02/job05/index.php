<?php
for ($i = 2; $i <= 1000; $i++) {
    $premier = true; 

    for ($j = 2; $j * $j <= $i; $j++) {
        if ($i % $j === 0) {
            $premier = false; 
            break; 
        }
    }

    if ($premier) {
        echo "$i<br>";
    }
}
?>
