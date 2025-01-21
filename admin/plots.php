<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventminds";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Requête pour récupérer les types et le count
$sql = "SELECT type, COUNT(*) as count FROM event GROUP BY type";
$countpartype = $conn->query($sql);

// Vérifier si des résultats ont été trouvés
if ($countpartype->num_rows > 0) {
    // Créer des tableaux pour les labels et les données
    $labels = [];
    $data = [];

    while ($row = $countpartype->fetch_assoc()) {
        // Ajouter les types et le nombre d'événements dans les tableaux
        $labels[] = htmlspecialchars($row['type'], ENT_QUOTES, 'UTF-8');
        $data[] = (int)$row['count'];
    }

    // Encoder les résultats en JSON
    $response = [
        'labels' => $labels,
        'data' => $data
    ];
    echo json_encode($response); // Retourner un JSON valide
} else {
    echo json_encode(['error' => 'Aucun événement trouvé.']);
}

$conn->close();
?>