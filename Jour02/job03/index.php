<?php
for ($i = 0; $i <= 100; $i++) {

    if ($i === 42) {
        echo "La Plateforme_<br>";
    } 
   
    elseif ($i >= 0 && $i <= 20) {
        echo "<i>$i</i><br>"; 
    } 
  
    elseif ($i >= 25 && $i <= 50) {
        echo "<span style='text-decoration: underline;'>$i</span><br>"; 
    } 
  
    else {
        echo "$i<br>";
    }
}
?>
