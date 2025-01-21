<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "eventminds");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête pour récupérer tous les événements
$sql = "SELECT id,trainer_photot ,image, titre, description, date, heure, lieu, type FROM event  WHERE CONCAT(date, ' ', heure) > NOW() Limit 3"; 
$result3 = $conn->query($sql);
$sql = "SELECT id,trainer_photot ,image, titre, description, date, heure, lieu, type FROM event  WHERE CONCAT(date, ' ', heure) > NOW() "; 
$resultComming = $conn->query($sql);

$sql = "SELECT id,trainer_photot ,image, titre, description, date, heure, lieu, type FROM event WHERE CONCAT(date, ' ', heure) > NOW()"; 
$result = $conn->query($sql);

$sql = "SELECT * FROM event WHERE CONCAT(date, ' ', heure) < NOW()";
$completed = $conn->query($sql);

$sql = "SELECT * FROM event WHERE CONCAT(date, ' ', heure) < NOW() Limit 2";
$completed2 = $conn->query($sql);


$sql = "SELECT titre, description, CONCAT(date, ' ', heure) AS datetime, lieu, type FROM event WHERE CONCAT(date, ' ', heure) < NOW() Limit 3";
$result = $conn->query($sql);

$complet = []; // Initialiser un tableau vide pour stocker les résultats

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $complet[] = $row; // Ajouter chaque ligne de résultat au tableau $complet
    }
} else {
    echo "Aucun événement trouvé.";
}


$sql = "SELECT titre, description, CONCAT(date, ' ', heure) AS datetime, lieu, type FROM event WHERE CONCAT(date, ' ', heure) < NOW() AND status = 'approved' ";
$result = $conn->query($sql);

$completA = []; // Initialiser un tableau vide pour stocker les résultats

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $completA[] = $row; // Ajouter chaque ligne de résultat au tableau $complet
    }
} else {
    echo "Aucun événement trouvé.";
}


$sql = "SELECT titre, description, CONCAT(date, ' ', heure) AS datetime, lieu, type FROM event WHERE CONCAT(date, ' ', heure) > NOW() Limit 3";
$resultc = $conn->query($sql);

$completc = []; // Initialiser un tableau vide pour stocker les résultats

if ($resultc->num_rows > 0) {
    while ($row = $resultc->fetch_assoc()) {
        $completc[] = $row; // Ajouter chaque ligne de résultat au tableau $complet
    }
} else {
    echo "Aucun événement trouvé.";
}

$sql = "SELECT id,titre, description, CONCAT(date, ' ', heure) AS datetime, lieu, type FROM event WHERE CONCAT(date, ' ', heure) > NOW() AND status = 'pending'";
$resultc = $conn->query($sql);

$completcc = []; // Initialiser un tableau vide pour stocker les résultats

if ($resultc->num_rows > 0) {
    while ($row = $resultc->fetch_assoc()) {
        $completcc[] = $row; // Ajouter chaque ligne de résultat au tableau $complet
    }
} else {
    echo "Aucun événement trouvé.";
}






$sql = "SELECT id,titre, description, CONCAT(date, ' ', heure) AS datetime, lieu, type FROM event WHERE CONCAT(date, ' ', heure) > NOW() AND status = 'approved'";
$resultcc = $conn->query($sql);

$commingc = []; // Initialiser un tableau vide pour stocker les résultats

if ($resultcc->num_rows > 0) {
    while ($row = $resultcc->fetch_assoc()) {
        $commingc[] = $row; // Ajouter chaque ligne de résultat au tableau $complet
    }
} else {
    echo "Aucun événement trouvé.";
}













$sql = "SELECT id,nom, prenom, mail,status,status FROM users WHERE role = 'user'";
$result = $conn->query($sql);

$users = []; // Initialiser un tableau vide pour stocker les résultats

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row; // Ajouter chaque ligne de résultat au tableau $complet
    }
} else {
    echo "Aucun événement trouvé.";
    
}



$sql = "SELECT nom, prenom, mail,status FROM users WHERE role = 'admin'";
$result = $conn->query($sql);

$admins = []; // Initialiser un tableau vide pour stocker les résultats

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row; // Ajouter chaque ligne de résultat au tableau $complet
    }
} else {
    echo "Aucun événement trouvé.";
    
}



$sql = "SELECT id,titre, description, CONCAT(date, ' ', heure) AS datetime, lieu, type FROM event  WHERE status = 'rejected' and CONCAT(date, ' ', heure) > NOW()";
$result = $conn->query($sql);

$rejected = []; // Initialiser un tableau vide pour stocker les résultats

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rejected[] = $row; // Ajouter chaque ligne de résultat au tableau $rejected
    }
} 


$sql = "SELECT id,titre, description, CONCAT(date, ' ', heure) AS datetime, lieu, type FROM event  WHERE status = 'approved' and CONCAT(date, ' ', heure) > NOW() ";
$result = $conn->query($sql);

$approved = []; // Initialiser un tableau vide pour stocker les résultats

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $approved[] = $row; // Ajouter chaque ligne de résultat au tableau $rejected
    }
} 
// Fermer la connexion
$conn->close();
?>
