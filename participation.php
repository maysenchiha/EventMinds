<?php
// S'assurer qu'il n'y a pas de sortie avant session_start()
ob_start(); // Démarre la mise en tampon de sortie (output buffering)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 // Démarrer la session pour accéder aux données utilisateur

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die("Utilisateur non connecté");
}

// Connexion à la base de données avec PDO
$host = 'localhost'; // Votre hôte
$dbname = 'eventminds'; // Le nom de votre base de données
$username = 'root'; // Votre nom d'utilisateur MySQL
$password = ''; // Votre mot de passe MySQL

try {
    // Créer une instance PDO pour la connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Activer le mode d'erreurs pour faciliter le débogage
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Supposons que l'ID de l'utilisateur soit stocké dans la session
$userId = $_SESSION['user_id'];  // ID de l'utilisateur connecté

// Requête pour récupérer les événements où l'utilisateur va participer
$sql = " SELECT e.*,r.registration_date
    FROM 
        event e
    INNER JOIN 
        registration r ON e.id = r.event_id
    WHERE 
        r.user_id = :user_id
";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
$stmt->execute();

// Récupérer les événements
$userEvents = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Formatage de la date pour chaque événement
foreach ($userEvents as &$event) {
    // Créer un objet DateTime pour la date de l'événement
    $date = new DateTime($event['date']);
    // Format de la date
    $event['formatted_date'] = $date->format('l, F jS \a\t g:i A');
}


ob_end_flush(); // Fin de la mise en tampon de sortie
?>
