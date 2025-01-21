<?php
// Connexion à la base de données (adapter avec vos informations de connexion)
$servername = "localhost"; // ou votre serveur de base de données
$username = "root";        // ou votre utilisateur
$password = "";            // ou votre mot de passe
$dbname = "eventminds"; // ou votre base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer l'email envoyé via la requête AJAX
$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'] ?? '';

// Préparer la requête pour vérifier si l'email existe déjà
$sql = "SELECT COUNT(*) AS count FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
$conn->close();

// Vérifier si l'email est déjà dans la base de données
$isEmailUnique = $count == 0;

// Si l'email est unique, la réponse doit être 'isEmailUnique: true', sinon 'isEmailUnique: false'
echo json_encode(['emailStatus' => $isEmailUnique ? 'unique' : 'taken']);
?>