<?php

$cookieFile = 'simulated_cookie.txt';


if (isset($_POST['deco'])) {
   
    if (file_exists($cookieFile)) {
        unlink($cookieFile);
    }
}


$prenom = '';

if (file_exists($cookieFile)) {
  
    $handle = fopen($cookieFile, 'r');
    if ($handle) {
        $prenom = fread($handle, filesize($cookieFile));
        fclose($handle);
    }
}


if (isset($_POST['connexion']) && isset($_POST['prenom'])) {
    $prenom = $_POST['prenom'];

    $handle = fopen($cookieFile, 'w');
    if ($handle) {
        fwrite($handle, $prenom);
        fclose($handle);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
</head>
<body>
    <?php if ($prenom === ''): ?>
     
        <h1>Connexion</h1>
        <form action="" method="POST">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required>
            <button type="submit" name="connexion">Connexion</button>
        </form>
    <?php else: ?>
      
        <h1>Bonjour <?php echo htmlspecialchars($prenom); ?> !</h1>
        <form action="" method="POST">
            <button type="submit" name="deco">Déconnexion</button>
        </form>
    <?php endif; ?>
</body>
</html>
