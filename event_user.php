<?php
// S'assurer qu'il n'y a pas de sortie avant session_start()
ob_start(); // Démarre la mise en tampon de sortie (output buffering)

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die("Utilisateur non connecté");
}

// Connexion à la base de données
$host = 'localhost'; // Votre hôte
$dbname = 'eventminds'; // Le nom de votre base de données
$username = 'root'; // Votre nom d'utilisateur MySQL
$password = ''; // Votre mot de passe MySQL

// Connexion en style procédural
$conn = mysqli_connect($host, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

// Supposons que l'ID de l'utilisateur soit stocké dans la session
$userId = $_SESSION['user_id'];  // ID de l'utilisateur connecté

// Requête pour récupérer les événements créés par l'utilisateur
$sql = "SELECT * FROM event WHERE created_by = ?";
$stmt = mysqli_prepare($conn, $sql);

// Associer les paramètres
mysqli_stmt_bind_param($stmt, "i", $userId);

// Exécuter la requête
mysqli_stmt_execute($stmt);

// Récupérer les résultats
$result = mysqli_stmt_get_result($stmt);
$events = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Format de la date souhaité : "Sunday, October 26th at 9:00 AM"
foreach ($events as &$event) {
    // Créer un timestamp à partir de la date de l'événement
    $timestamp = strtotime($event['date']);
    // Formater la date
    $event['formatted_date'] = date('l, F jS \a\t g:i A', $timestamp);
}

// Requête pour récupérer les événements rejetés créés par l'utilisateur
$sqlRejected = "SELECT * FROM event WHERE created_by = ? AND status = 'rejected'";
$stmtRejected = mysqli_prepare($conn, $sqlRejected);

// Associer les paramètres pour les événements rejetés
mysqli_stmt_bind_param($stmtRejected, "i", $userId);

// Exécuter la requête pour les événements rejetés
mysqli_stmt_execute($stmtRejected);

// Récupérer les résultats des événements rejetés
$resultRejected = mysqli_stmt_get_result($stmtRejected);
$rejectedEvents = mysqli_fetch_all($resultRejected, MYSQLI_ASSOC);

// Format de la date pour les événements rejetés
foreach ($rejectedEvents as &$event) {
    // Créer un timestamp à partir de la date de l'événement
    $timestamp = strtotime($event['date']);
    // Formater la date
    $event['formatted_date'] = date('l, F jS \a\t g:i A', $timestamp);
}

// Requête pour récupérer les événements rejetés créés par l'utilisateur
$sqlApprouved = "SELECT * FROM event WHERE created_by = ? AND status = 'approved'";
$stmtApprouved = mysqli_prepare($conn, $sqlApprouved);

// Associer les paramètres pour les événements rejetés
mysqli_stmt_bind_param($stmtApprouved, "i", $userId);

// Exécuter la requête pour les événements rejetés
mysqli_stmt_execute($stmtApprouved);

// Récupérer les résultats des événements rejetés
$resultApprouved= mysqli_stmt_get_result($stmtApprouved);
$ApprouvedEvents = mysqli_fetch_all($resultApprouved, MYSQLI_ASSOC);

// Format de la date pour les événements rejetés
foreach ($ApprouvedEvents as &$event) {
    // Créer un timestamp à partir de la date de l'événement
    $timestamp = strtotime($event['date']);
    // Formater la date
    $event['formatted_date'] = date('l, F jS \a\t g:i A', $timestamp);
}
// Fermer la déclaration et la connexion
mysqli_stmt_close($stmt);
mysqli_stmt_close($stmtRejected);
mysqli_stmt_close($stmtApprouved);
mysqli_close($conn);

ob_end_flush(); // Fin de la mise en tampon de sortie
?>
