
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tableau des Variables</title>
        <style>
            table {
                width: 50%;
                margin: 20px auto;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #ccc;
                padding: 8px;
                text-align: center;
            }
           
        </style>
    </head>
    <body>
        <h1>Tableau des Variables</h1>
        <?php
           
            $isBoolean = true; 
            $integer = 2; 
            $string = "coucou"; 
            $float = 1.4; 
    
          
            $variables = [
                ["type" => "boolean", "nom" => "isBoolean", "valeur" => $isBoolean ? "true" : "false"],
                ["type" => "entier", "nom" => "integer", "valeur" => $integer],
                ["type" => "string", "nom" => "string", "valeur" => $string],
                ["type" => "float", "nom" => "float", "valeur" => $float],
            ];
        ?>
    
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Nom</th>
                    <th>Valeur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($variables as $var): ?>
                    <tr>
                        <td><?php echo $var['type']; ?></td>
                        <td><?php echo $var['nom']; ?></td>
                        <td><?php echo $var['valeur']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
    </html>
    