<?php

$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";


$mot = "";
$display = true; // pour afficher ou ignorer un mot


for ($i = 0; isset($str[$i]); $i++) {

    if ($str[$i] !== " " && $str[$i] !== ".") {
        $mot .= $str[$i];
    } else {

        if ($display && $mot !== "") {
            echo $mot . " "; //Affiche
        }
        $mot = ""; 
        $display = !$display; 
    }
}



