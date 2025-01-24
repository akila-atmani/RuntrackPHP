<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color:rgb(176, 54, 146);
            color: white;
        }

        tr:nth-child(even) {
            background-color:rgb(140, 196, 230);
        }

        tr:hover {
            background-color: rgb(140, 196, 230);
        }
        
        /* Optionnel : style du tableau quand il n'y a pas de données */
        .no-data {
            text-align: center;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Liste des Étudiants</h1>

    <?php
    // Paramètres de connexion
    $host = 'localhost'; // Hôte de la base de données
    $dbname = 'jour8';  // Nom de la base de données
    $username = 'root';  // Nom d'utilisateur
    $password = '';      // Mot de passe

    try {
        // Connexion à la base de données avec PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour récupérer toutes les informations de la table étudiants
        $query = 'SELECT * FROM etudiants';
        $stmt = $pdo->query($query);

        // Récupération des résultats sous forme de tableau associatif
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Affichage du tableau HTML sans bordure et présentation simple
        echo '<table>';
        
        // Affichage de l'entête du tableau avec les noms des champs
        echo '<tr>';
        foreach ($students[0] as $key => $value) {
            echo "<th>$key</th>";
        }
        echo '</tr>';

        // Affichage des données des étudiants
        foreach ($students as $student) {
            echo '<tr>';
            foreach ($student as $value) {
                echo "<td>$value</td>";
            }
            echo '</tr>';
        }

        echo '</table>';
        
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>

</body>
</html>
