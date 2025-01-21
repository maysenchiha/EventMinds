<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "eventminds");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];

    // Préparer la requête SQL pour mettre à jour l'événement
    $sql = "UPDATE event SET titre = ?, description = ?, date = ?, heure = ? WHERE id = ?";
    
    // Préparer la requête avec MySQLi
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres
        $stmt->bind_param("ssssi", $titre, $description, $date, $heure, $id);
        
        // Exécuter la requête
        if ($stmt->execute()) {
            // Rediriger après la mise à jour
            header("Location: users-profile.php");
            echo "<script>alert('Événement modifier avec succès'); window.location.href = 'users-profile.php';</script>";
            exit();
        } else {
            echo "Erreur lors de la mise à jour de l'événement : " . $stmt->error;
        }

        // Fermer la déclaration préparée
        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête : " . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>
