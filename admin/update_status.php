<?php
// update_status.php

// Vérifier si la requête POST est bien envoyée
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyées par AJAX
    $eventId = $_POST['eventId'];  // Assurez-vous d'utiliser 'eventId' au lieu de 'event_id'
    $status = $_POST['status'];

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

    // Préparer la mise à jour du statut dans la base de données
    $query = "UPDATE event SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $eventId); // "si" : s pour string, i pour int

    // Exécuter la requête et retourner un résultat JSON
    if ($stmt->execute()) {
        echo json_encode(['status' => $status, 'success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour']);
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}
?>
