<?php
$host = 'localhost'; // Votre hôte
$dbname = 'eventminds'; // Le nom de votre base de données
$username = 'root'; // Votre nom d'utilisateur MySQL
$password = ''; // Votre mot de passe MySQL

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$message = ''; // Variable pour stocker le message d'alerte

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPassword = $_POST['password'];
    $newPassword = $_POST['newpassword'];
    $reNewPassword = $_POST['renewpassword'];

    if (empty($currentPassword) || empty($newPassword) || empty($reNewPassword)) {
        $_SESSION['message'] = '<div class="alert alert-warning" role="alert">Veuillez remplir tous les champs.</div>';
    } else {
        $query = "SELECT password FROM users WHERE id = :id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($currentPassword, $user['password'])) {
                if ($newPassword === $reNewPassword) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    $updateQuery = "UPDATE users SET password = :password WHERE id = :id";
                    $updateStmt = $con->prepare($updateQuery);
                    $updateStmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
                    $updateStmt->bindParam(':id', $user_id, PDO::PARAM_INT);

                    if ($updateStmt->execute()) {
                        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Mot de passe changé avec succès.</div>';
                        header('Location: profile.php');
                        exit();
                    } else {
                        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Erreur lors de la mise à jour du mot de passe.</div>';
                    }
                } else {
                    $_SESSION['message'] = '<div class="alert alert-warning" role="alert">Les nouveaux mots de passe ne correspondent pas.</div>';
                }
            } else {
                $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Le mot de passe actuel est incorrect.</div>';
            }
        } else {
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Utilisateur introuvable.</div>';
        }
    }

    // Redirection vers profile.php pour afficher les messages
    header('Location: profile.php');
    exit();
}
?>