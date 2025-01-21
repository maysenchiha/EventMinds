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

$sql = "SELECT COUNT(*) AS user_count FROM users WHERE role = 'user'";
$result = $conn->query($sql);
$sql = "SELECT COUNT(*) AS admin_count FROM users WHERE role = 'admin'";
$resultA = $conn->query($sql);

// Exécution de la requête avec l'objet mysqli


// Vérifier si la requête a retourné des résultats
if ($result) {
    $row = $result->fetch_assoc();  // Utilisation de fetch_assoc() pour récupérer le résultat sous forme de tableau associatif
    $userCount = $row['user_count']; // Récupérer le nombre d'utilisateurs avec le rôle "user"
} else {
    $userCount = 0; // Si la requête échoue, on met 0
}
if ($resultA) {
    $row = $resultA->fetch_assoc();  // Utilisation de fetch_assoc() pour récupérer le résultat sous forme de tableau associatif
    $adminCount = $row['admin_count']; // Récupérer le nombre d'utilisateurs avec le rôle "user"
} else {
    $adminCount = 0; // Si la requête échoue, on met 0
}


$sql = "SELECT COUNT(*) AS coming_events FROM event WHERE CONCAT(date, ' ', heure) > NOW()";

// Exécuter la requête SQL
$comm = $conn->query($sql);

// Vérifier si la requête a retourné des résultats
if ($comm) {
    // Récupérer le résultat de la requête
    $row = $comm->fetch_assoc();
    $coming = $row['coming_events'];
}

$sql = "SELECT COUNT(*) AS comp_events FROM event WHERE CONCAT(date, ' ', heure) < NOW()";

// Exécuter la requête SQL
$comp = $conn->query($sql);

// Vérifier si la requête a retourné des résultats
if ($comp) {
    // Récupérer le résultat de la requête
    $row = $comp->fetch_assoc();
    $completed = $row['comp_events'];
}









// Fermer la connexion à la base de données
$conn->close();
?>
