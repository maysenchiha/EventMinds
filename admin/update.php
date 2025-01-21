<?php
// update_user_status.php

// update.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $status = $_POST['status'];
    
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eventminds";

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Mettre à jour le statut de l'utilisateur
    $query = "UPDATE users SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $userId);

    if ($stmt->execute()) {
        echo json_encode(['status' => $status, 'success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour']);
    }

    $stmt->close();
    $conn->close();
}

?>
