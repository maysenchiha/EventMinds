<?php
// S'assurer qu'il n'y a pas de sortie avant session_start()
ob_start(); 

// Démarrer la session si ce n'est pas déjà fait
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die("Erreur : L'utilisateur n'est pas connecté ou la session a expiré.");
}

$userId = $_SESSION['user_id'];

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventminds";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

// Requête pour récupérer les utilisateurs et leur image
$sql = "SELECT prenom, nom, mail, user_photo FROM users WHERE role = 'user'";
$result = mysqli_query($conn, $sql);

// Vérification des résultats
if ($result && mysqli_num_rows($result) > 0) {
    // Boucler à travers tous les utilisateurs
    while ($user = mysqli_fetch_assoc($result)) {
        $prenom = $user['prenom'];
        $nom = $user['nom'];
        $mail = $user['mail'];
        $userPhoto = $user['user_photo']; // Récupérer l'image sous forme de BLOB

        // Vérifier si l'image existe
        if ($userPhoto) {
            // Convertir l'image BLOB en base64 pour l'affichage
            $imageData = base64_encode($userPhoto);
            $imageSrc = 'data:image/jpeg;base64,' . $imageData; // Affichage sous forme d'image
        } else {
            // Si aucune image n'est définie, utiliser une image par défaut
            $imageSrc = 'path/to/default/image.jpg'; // Remplacez ce chemin par celui de votre image par défaut
        }

        // Affichage dynamique des utilisateurs
        echo '
        <div class="item-list">
            <div class="avatar">
                <img src="' . $imageSrc . '" alt="..." class="avatar-img rounded-circle" />
            </div>
            <div class="info-user ms-3">
                <div class="username">' . htmlspecialchars($prenom) . ' ' . htmlspecialchars($nom) . '</div>
                <div class="status">' . htmlspecialchars($mail) . '</div>
            </div>
            <button class="btn btn-icon btn-link op-8 me-1">
                <i class="far fa-envelope"></i>
            </button>
            <button class="btn btn-icon btn-link btn-danger op-8">
                <i class="fas fa-ban"></i>
            </button>
        </div>';
    }
} else {
    echo '<p>Aucun utilisateur trouvé ou erreur dans la requête.</p>';
}

mysqli_close($conn);

ob_end_flush();
?>
