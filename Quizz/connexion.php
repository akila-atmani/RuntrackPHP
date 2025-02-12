<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'quizz';
    private $user = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            exit;
        }
    }
}
?>
<?php
class User {
    private $db;
    private $conn;

    public function __construct($db) {
        $this->db = $db;
        $this->conn = $this->db->connect();
    }

    public function login($username, $password) {
        // Requête pour vérifier les identifiants de l'utilisateur
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Si l'utilisateur existe
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifie le mot de passe
            if (password_verify($password, $user['password'])) {
                // Si les identifiants sont corrects, démarrer une session et stocker des données
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['id'];

                // Redirection vers une page sécurisée (par exemple, la page d'accueil ou tableau de bord)
                header("Location: traitement_connexion.php");
                exit;
            } else {
                // Si le mot de passe est incorrect
                return "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            // Si l'utilisateur n'existe pas
            return "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
}
?>
<?php


// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données envoyées par le formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crée une instance de la classe Database
    $db = new Database();

    // Crée une instance de la classe User
    $user = new User($db);

    // Appel de la méthode login pour tenter la connexion
    $message = $user->login($username, $password);

    // Si un message d'erreur est renvoyé, l'afficher
    if ($message) {
        echo $message;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="css/akila.css"> 
</head>
<body>
    <h2>Connexion</h2>

    <!-- Formulaire de connexion -->
    <form action="conx.php" method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">Se connecter</button>
    </form>

    <footer>
        <p>&copy; 2025 Restaurant du Monde. Tous droits réservés.</p>
    </footer>
</body>
</html>

