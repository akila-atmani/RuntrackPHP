<?php
// Chemin du fichier simulant un cookie
$cookieFile = 'simulated_cookie.txt';

// Initialiser le compteur si le fichier n'existe pas
if (!file_exists($cookieFile)) {
    $nbvisites = 0;
} else {
    // Lire la valeur actuelle simulée
    $handle = fopen($cookieFile, 'r');
    $nbvisites = 0;
    if ($handle) {
        $content = fread($handle, filesize($cookieFile));
        if ($content !== false) {
            $nbvisites = (int)$content;
        }
        fclose($handle);
    }
}

// Vérifier si le bouton "reset" est cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser le compteur
    $nbvisites = 0;
} else {
    // Sinon, incrémenter le compteur
    $nbvisites++;
}

// Mettre à jour le fichier simulant le cookie
$handle = fopen($cookieFile, 'w');
if ($handle) {
    fwrite($handle, $nbvisites);
    fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simuler un Cookie</title>
</head>
<body>
    <h1>Simuler un cookie "nbvisites"</h1>
    <p>Nombre de visites : <?php echo $nbvisites; ?></p>
    
    <!-- Formulaire pour réinitialiser le compteur -->
    <form action="" method="POST">
        <button type="submit" name="reset">Réinitialiser</button>
    </form>
</body>
</html>
