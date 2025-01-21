<?php
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "eventminds");

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Requête de suppression
    $sql = "DELETE FROM event WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventId);

    if ($stmt->execute()) {
        header("Location: users-profile.php");
        echo "<script>alert('Événement supprimé avec succès'); window.location.href = 'users-profile.php';</script>";
    } else {
        header("Location: users-profile.php");
        echo "<script>alert('Erreur lors de la suppression de l\'événement'); window.location.href = 'users-profile.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>