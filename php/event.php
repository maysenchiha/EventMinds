<?php
// Configuration de la connexion à la base de données
$host = "localhost"; // Nom du serveur
$dbname = "eventminds"; // Nom de la base de données
$username = "root"; // Nom d'utilisateur
$password = ""; // Mot de passe
try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Récupérer les données du formulaire
        $titre = htmlspecialchars($_POST["eventTitle"]);
        $description = htmlspecialchars($_POST["eventDescription"]);
        $date = htmlspecialchars($_POST["eventDate"]);
        $heure = htmlspecialchars($_POST["eventTime"]);
        $lieu = htmlspecialchars($_POST["eventLocation"]);
        $type = htmlspecialchars($_POST["eventType"]);

        // Vérifier si une image a été téléchargée
        if (isset($_FILES["eventImage"]) && $_FILES["eventImage"]["error"] === UPLOAD_ERR_OK) {
            $imageTmpName = $_FILES["eventImage"]["tmp_name"];
            $imageName = uniqid() . "_" . basename($_FILES["eventImage"]["name"]);
            $uploadDir = "php/uploads/"; // Répertoire où les images seront stockées

            // Créer le répertoire s'il n'existe pas
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Déplacer l'image vers le répertoire d'uploads
            if (move_uploaded_file($imageTmpName, $uploadDir . $imageName)) {
                $imagePath = $uploadDir . $imageName;
            } else {
                die("Erreur lors du téléchargement de l'image.");
            }
        } else {
            $imagePath = null;
        }

        // Requête SQL pour insérer les données
        $sql = "INSERT INTO events (titre, description, date, heure, lieu, type, image) 
                VALUES (:titre, :description, :date, :heure, :lieu, :type, :image)";
        $stmt = $pdo->prepare($sql);

        // Lier les valeurs
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':heure', $heure);
        $stmt->bindParam(':lieu', $lieu);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':image', $imagePath);

        // Exécuter la requête
        $stmt->execute();

        echo "L'événement a été ajouté avec succès.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer tous les événements
    $sql = "SELECT * FROM events";
    $stmt = $pdo->query($sql);

    // Récupérer tous les événements sous forme de tableau associatif
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


?>
