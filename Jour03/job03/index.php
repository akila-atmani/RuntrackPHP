<?php

$str = "I'm sorry Dave I'm afraid I can't do that";

$voyelles = "aeiouyAEIOUY";


for ($i = 0; isset($str[$i]); $i++) {
    
    for ($j = 0; isset($voyelles[$j]); $j++) {
        if ($str[$i] === $voyelles[$j]) {
            echo $str[$i]; 
       
        }
    }
}
?>
