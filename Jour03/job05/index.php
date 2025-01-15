<?php

$str = "On n est pas le meilleur quand on le croit mais quand on le sait";

$voyelles = "aeiouyAEIOUY";


$dic = ["consonnes" => 0, "voyelles" => 0];


for ($i = 0; isset($str[$i]); $i++) {
    $char = $str[$i];

   
    if (($char >= 'a' && $char <= 'z') || ($char >= 'A' && $char <= 'Z')) {
        // Vérifier si c'est une voyelle
        $isVoyelle = false;
        for ($j = 0; isset($voyelles[$j]); $j++) {
            if ($char === $voyelles[$j]) {
                $isVoyelle = true;
                break;
            }
        }

       
        if ($isVoyelle) {
            $dic["voyelles"]++;
        } else {
            $dic["consonnes"]++;
        }
    }
}

echo "<table border='1'>";
echo "<thead><tr><th>Voyelles</th><th>Consonnes</th></tr></thead>";
echo "<tbody><tr><td>" . $dic["voyelles"] . "</td><td>" . $dic["consonnes"] . "</td></tr></tbody>";
echo "</table>";

?>
