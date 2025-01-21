<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventminds";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Initialisation de la variable d'erreur
$error = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Requête pour récupérer l'utilisateur
    $sql = "SELECT * FROM users WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Vérifier le mot de passe
        if (password_verify($password, $user['password'])) {
            // Démarrer une session et stocker les informations de l'utilisateur
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nom'] . " " . $user['prenom'];

            // Rediriger vers la page d'accueil de l'utilisateur
            echo "<script>console.log('Connexion réussie.');</script>";
            echo "<script>window.location.href = 'user_home.php';</script>";
            exit();
        } else {
            // Mot de passe incorrect
            $error = "Mot de passe incorrect.";
            echo "<script>console.log('" . addslashes($error) . "');</script>";
        }
    } else {
        // Aucun utilisateur trouvé
        $error = "Aucun compte trouvé avec cet e-mail.";
        echo "<script>console.log('" . addslashes($error) . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
