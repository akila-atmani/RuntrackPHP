<?php

$str = "Dans l'espace, personne ne vous entend crier";


$compter = 0;


for ($i = 0; isset($str[$i]); $i++) {
    $compter++; 
}

echo "Nombre de caractères dans la chaîne : $compter";
?>
