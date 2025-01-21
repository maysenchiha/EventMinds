<?php
// Connexion à la base de données
$servername = "localhost"; // ou votre adresse de serveur
$username = "root"; // votre nom d'utilisateur
$password = ""; // votre mot de passe
$dbname = "eventminds"; // nom de votre base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Initialisation de la variable d'erreur
$error = "";

// Vérification si les données ont été envoyées par le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $firstName = $conn->real_escape_string($_POST['signupFirstName']);
    $lastName = $conn->real_escape_string($_POST['signupLastName']);
    $email = $conn->real_escape_string($_POST['signupEmail']);
    $password = $conn->real_escape_string($_POST['signupPassword']);
    $confirmPassword = $conn->real_escape_string($_POST['signupConfirmPassword']);

    // Vérification si les mots de passe correspondent
    if ($password !== $confirmPassword) {
       
        $error = "Les mots de passe ne correspondent pas. Veuillez réessayer.";
         header("Location: ../connexion.php");
    } else {
        // Vérification si un utilisateur avec cet email existe déjà
        $sql = "SELECT * FROM users WHERE mail = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
               
                $error = "Un utilisateur avec cet email existe déjà. Veuillez en utiliser un autre.";
                header("Location: ../connexion.php");
            } else {
                // Hashage du mot de passe pour plus de sécurité
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Lecture de l'image par défaut
                $defaultImagePath = "C:/xampp/htdocs/new_version/assets/img/user_anonyme.jpg"; // Chemin vers l'image par défaut
                $defaultImageData = file_get_contents($defaultImagePath); // Lire le contenu binaire de l'image

                if ($defaultImageData === false) {
                  
                    $error = "Erreur lors du chargement de l'image par défaut."; 
                     header("Location: ../connexion.php");
                } else {
                    // Préparer une requête avec insertion d'image
                    $stmt = $conn->prepare("INSERT INTO users (nom, prenom, mail, password, user_photo) VALUES (?, ?, ?, ?, ?)");

                    if ($stmt) {
                        $stmt->bind_param("sssss", $firstName, $lastName, $email, $hashedPassword, $defaultImageData);

                        if ($stmt->execute()) {
                            // Récupérer l'ID du nouvel utilisateur inséré
                            $userId = $conn->insert_id;
                            $_SESSION['user_id'] = $userId;

                            // Redirection en cas de succès
                            header("Location: ../connexion.php");
                            exit();
                        } else {
                            
                            $error = "Erreur lors de l'insertion des données : " . $stmt->error;
                            header("Location: ../connexion.php");
                        }

                        $stmt->close();
                    } else {
                      
                        $error = "Erreur lors de la préparation de la requête."; 
                         header("Location: ../connexion.php");
                    }
                }
            }

            $stmt->close();
        } else {
          
            $error = "Erreur lors de la préparation de la requête."; 
             
        }
    }
}

// Fermeture de la connexion
$conn->close();

// Afficher l'erreur si elle existe
if (!empty($error)) {
    echo "<p style='color: red;'>$error</p>";
}
?>
