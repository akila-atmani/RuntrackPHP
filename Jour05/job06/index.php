<?php

function convertir($str) {
   
    $leetStr = "";

    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];

        if ($char === 'A' || $char === 'a') {
            $leetStr .= '4';
        } elseif ($char === 'E' || $char === 'e') {
            $leetStr .= '3';
        } elseif ($char === 'I' || $char === 'i') {
            $leetStr .= '1';
        } elseif ($char === 'O' || $char === 'o') {
            $leetStr .= '0';
        } elseif ($char === 'S' || $char === 's') {
            $leetStr .= '5';
        } elseif ($char === 'T' || $char === 't') {
            $leetStr .= '7';


        } else {
           $leetStr .= $char;
        }
    }

 
    return $leetStr;
}


$chaine = "Coucou , comment ça va ?";
echo "En leet speak : " . convertir($chaine);
?>
