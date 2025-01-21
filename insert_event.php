<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "eventminds");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les informations de l'événement
    $titre = htmlspecialchars($_POST["eventTitle"]);
    $description = htmlspecialchars($_POST["eventDescription"]);
    $date = htmlspecialchars($_POST["eventDate"]);
    $heure = htmlspecialchars($_POST["eventTime"]);
    $lieu = htmlspecialchars($_POST["eventLocation"]);
    $type = htmlspecialchars($_POST["eventType"]);
    $image = file_get_contents($_FILES['image']['tmp_name']); // Lire l'image
    $images = file_get_contents($_FILES['images']['tmp_name']); // Lire l'image

    // Assurez-vous que l'ID de l'utilisateur est stocké dans la session
    session_start();
    $userId = $_SESSION['user_id'];  // ID de l'utilisateur connecté
    

    // Préparer et exécuter la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO event (trainer_photot, image, titre, description, date, heure, lieu, type, created_by,status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,'Pending')");
    $stmt->bind_param("sssssssss", $images, $image, $titre, $description, $date, $heure, $lieu, $type, $userId);

    if ($stmt->execute()) {
        header("Location: users-profile.php?success=1"); // Rediriger avec un message de succès
        exit();
    } else {
        header("Location: users-profile.php?error=1"); // Rediriger avec un message d'erreur
        exit();
    }

    $stmt->close();
}

$conn->close();
?>