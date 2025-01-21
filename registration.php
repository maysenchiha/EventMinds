<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();  // Démarre la session uniquement si elle n'est pas déjà active
}


// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];  // Récupère l'ID utilisateur

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'eventminds');
    
    // Vérifie la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupère les données du formulaire
    $event_id = $_POST['event_id'];
    $registration_date = date("Y-m-d H:i:s");  // La date et l'heure actuelles

    // Vérifie si l'utilisateur est déjà inscrit à cet événement
    $checkQuery = $conn->prepare("SELECT * FROM registration WHERE user_id = ? AND event_id = ?");
    $checkQuery->bind_param("ii", $user_id, $event_id);
    $checkQuery->execute();
    $result = $checkQuery->get_result();

    if ($result->num_rows > 0) {
        // Si l'utilisateur est déjà inscrit, on redirige avec un message d'erreur
        header("Location: users-profile.php?error=already_registered");
        exit();
    } else {
        // Préparer la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO registration (user_id, event_id, registration_date) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $user_id, $event_id, $registration_date);

        // Exécuter la requête
        if ($stmt->execute()) {
            header("Location: users-profile.php?success=1"); // Rediriger avec un message de succès
            exit();
        } else {
            header("Location: users-profile.php?error=1"); // Rediriger avec un message d'erreur
            exit();
        }

        // Ferme la requête
        $stmt->close();
    }

    // Ferme la connexion
    $conn->close();
} else {
    // Redirige l'utilisateur vers la page de connexion si la session n'est pas définie
    header('Location: login.php');
    exit();
}

?>
