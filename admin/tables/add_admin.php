<?php
// Assurez-vous que vous avez bien configuré la connexion à votre base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventminds";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hachage du mot de passe

    // Valeurs par défaut
    $popularity = NULL;  // La valeur par défaut pour 'popularity' est NULL
    $role = 'admin';     // Le rôle par défaut est 'admin'
    $status = 'active';  // Le statut par défaut est 'active'

    // Lecture de l'image par défaut
    $defaultImagePath = "C:/xampp/htdocs/new_version/assets/img/user_anonyme.jpg"; // Chemin vers l'image par défaut
    $defaultImageData = file_get_contents($defaultImagePath); // Lire le contenu binaire de l'image

    // Vérification si l'image par défaut est bien chargée
    if ($defaultImageData === false) {
        die("Erreur lors du chargement de l'image par défaut.");
    }

    // Requête préparée pour insérer les données
    $sql = "INSERT INTO users (nom, prenom, mail, password, popularity, role, status, user_photo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    // Liaison des paramètres
    $stmt->bind_param(
        'ssssssss',          // Types des paramètres : s = string
        $nom,
        $prenom,
        $email,
        $password,
        $popularity,
        $role,
        $status,
        $defaultImageData
    );

    // Exécution de la requête
    if ($stmt->execute()) {
        // Redirection vers la page des admins ou affichage d'un message de succès
        header("Location: datatables.php"); // Vous pouvez modifier cette page selon votre besoin
        exit();
    } else {
        echo "Erreur lors de l'insertion : " . $stmt->error;
    }

    // Fermeture de la requête et de la connexion
    $stmt->close();
    $conn->close();
}
?>
