<?php
// Démarrer la session
session_start();

// Initialiser la variable de session pour stocker les prénoms
if (!isset($_SESSION['prenoms'])) {
    $_SESSION['prenoms'] = [];
}

// Vérifier si le formulaire est soumis
if (isset($_POST['prenom'])) {
    $prenom = $_POST['prenom'];

    // Ajouter le prénom dans la variable de session
    if ($prenom !== '') { // S'assurer que le prénom n'est pas vide
        $_SESSION['prenoms'][] = $prenom;
    }
}

// Vérifier si le bouton "reset" est cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser la liste des prénoms
    $_SESSION['prenoms'] = [];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des prénoms</title>
</head>
<body>
    <h1>Ajouter des prénoms</h1>
    
    <!-- Formulaire pour ajouter des prénoms -->
    <form action="" method="POST">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>
        <button type="submit">Ajouter</button>
    </form>
    
    <!-- Formulaire pour réinitialiser la liste -->
    <form action="" method="POST">
        <button type="submit" name="reset">Réinitialiser la liste</button>
    </form>
    
    <h2>Liste des prénoms :</h2>
    <ul>
        <?php
        // Afficher la liste des prénoms
        foreach ($_SESSION['prenoms'] as $prenom) {
            echo "<li>" . htmlspecialchars($prenom) . "</li>";
        }
        ?>
    </ul>
</body>
</html>
