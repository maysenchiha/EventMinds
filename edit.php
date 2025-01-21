<?php

// Connexion à la base de données avec PDO
$host = 'localhost';
$dbname = 'eventminds';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'eventminds');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prenom = $_POST['First_Name'];
    $nom = $_POST['Last_Name'];
    $mail = $_POST['email'];
    
    // Vérifie si un fichier d'image a été téléchargé
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] == 0) {
        // Chemin du fichier et type de fichier
        $fileTmpPath = $_FILES['profileImage']['tmp_name'];
        $fileName = $_FILES['profileImage']['name'];
        $fileSize = $_FILES['profileImage']['size'];
        $fileType = $_FILES['profileImage']['type'];

        // Vérifie si le fichier est une image
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (in_array($fileExtension, $allowedExtensions)) {
            // Vérifie la taille du fichier (max 2 Mo)
            if ($fileSize < 2000000) {
                // Lire le contenu du fichier et le convertir en base64 pour stockage
                $imgContent = file_get_contents($fileTmpPath);

                // Préparer la requête de mise à jour de l'image et des informations utilisateur
                $stmt = $conn->prepare("UPDATE users SET prenom = ?, nom = ?, mail = ?, user_photo = ? WHERE id = ?");
                $stmt->bind_param("ssssi", $prenom, $nom, $mail, $imgContent, $user_id);

                if ($stmt->execute()) {
                    header("Location: settings.php?success=1");
                    exit();
                } else {
                    header("Location: settings.php?error=1");
                    exit();
                }

                $stmt->close();
            } else {
                header("Location: settings.php?error=size");
                exit();
            }
        } else {
            header("Location: settings.php?error=invalidtype");
            exit();
        }
    } else {
        // Mettre à jour seulement les autres informations si aucune image n'est téléchargée
        $stmt = $conn->prepare("UPDATE users SET prenom = ?, nom = ?, mail = ? WHERE id = ?");
        $stmt->bind_param("sssi", $prenom, $nom, $mail, $user_id);

        if ($stmt->execute()) {
            header("Location: settings.php?success=1");
            exit();
        } else {
            header("Location: settings.php?error=1");
            exit();
        }

        $stmt->close();
    }
}

// Fermer la connexion
$conn->close();
?>
