<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
include("admin/conf/db.php");

// Charger les classes PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

if (isset($_POST['register'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    if ($password == $confirm_password) {
        // Vérifier dans table_agent que le couple existe
        $stmt = $con->prepare("SELECT password FROM membres WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($password_db);
        if ($stmt->fetch()) {
            if (!empty($password_db)) {
                $_SESSION['message'] = "Un compte existe déjà pour ce mail.";
                header('Location: register.php');
                exit(0);
            }
        } else {
            $_SESSION['message'] = "Le Mail est invalide.";
            header('Location: register.php');
            exit(0);
        }
        $stmt->close();

        // Insertion
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $con->prepare("UPDATE membres SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $passwordHash, $email);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Inscription réussie";
            header('Location: login.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Erreur lors de la création du compte";
            header('Location: register.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Les mots de passe ne correspondent pas";
        header('Location: register.php');
        exit(0);
    }
} else if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    //on va juste vérifier le mot de passe après avoir récupéré le hash
    $login_query = "SELECT * FROM membres WHERE email = '$email' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $userdata = mysqli_fetch_array($login_query_run);

        //Récupère le mot de passe haché depuis la base de données
        $hashed_password = $userdata['password'];

        //Vérifie si le mot de passe saisi correspond au hash
        if (password_verify($password, $hashed_password)) {

            $user_id = $userdata['id'];
            $nom = $userdata['nom'];
            $postnom = $userdata['postnom'];
            $prenom = $userdata['prenom'];
            $email = $userdata['email'];
            $role = $userdata['role'];
            $profile = $userdata['profile'];

            $_SESSION['auth_user'] = [
                'id' => $user_id,
                'nom' => $nom,
                'postnom' => $postnom,
                'prenom' => $prenom,
                'email' => $email,
                'profile' => $profile,
                'role' => $role
            ];

            //Redirection selon le rôle
            if ($role == 'admin') {
                $_SESSION['message'] = "Bienvenue Admin";
                header("Location: admin/index.php");
            } else {
                $_SESSION['message'] = "Bienvenue Utilisateur";
                header("Location: admin/index.php");
            }
            exit(0);

        } else {
            $_SESSION['message'] = "Mot de passe incorrect";
            header("Location: login.php");
            exit(0);
        }

    } else {
        $_SESSION['message'] = "Matricule introuvable";
        header("Location: login.php");
        exit(0);
    }
} else if (isset($_POST['subscribe'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Vérifier si l'email existe déjà dans la table des abonnés
    $check_query = "SELECT * FROM subscribers WHERE email = '$email' LIMIT 1";
    $check_query_run = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_query_run) > 0) {
        $_SESSION['message'] = "Vous êtes déjà abonné.";
        header("Location: index.php");
        exit(0);
    } else {
        // Insérer le nouvel abonné
        $insert_query = "INSERT INTO subscribers (email) VALUES ('$email')";
        if (mysqli_query($con, $insert_query)) {
            $_SESSION['message'] = "Abonnement réussi. Merci de vous être abonné!";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Erreur lors de l'abonnement. Veuillez réessayer.";
            header("Location: index.php");
            exit(0);
        }
    }
}
if (isset($_POST["temoignage"])) {

    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message = mysqli_real_escape_string($con, $_POST['message']);


    // Vérifier si un fichier a été envoyé
    if (empty($_FILES['photo']['name'])) {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Veuillez choisir une Photo'];
        header("Location: testimonials.php");
        exit;
    }

    $image = $_FILES['photo']['name'];
    $image_tmp = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];

    // Vérifier l’erreur d’upload
    if ($error !== UPLOAD_ERR_OK) {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Erreur lors de l\'upload de l\'image (code : ' . $error . ').'];
        header("Location: testimonials.php");
        exit;
    }

    // Extension autorisée
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Format d\'image non valide.'];
        header("Location: testimonials.php");
        exit;
    }

    // Dossier de destination
    $upload_dir = 'admin/uploads/testimonials/';

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Nouveau nom unique pour éviter les collisions
    $new_name = uniqid('temoin_') . '.' . $file_extension;
    $upload_path = $upload_dir . $new_name;

    //Insertion dans la base de données
    $stmt = $con->prepare("INSERT INTO testimonials (name,email,message,photo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nom, $email, $message, $new_name);
    if ($stmt->execute()) {

        // Si l’INSERT est OK, on déplace le fichier
        if (move_uploaded_file($image_tmp, $upload_path)) {
            $mail = new PHPMailer(true);
            try {
                // Configuration SMTP (adaptez à votre hébergeur)
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // Gmail, OVH, etc.
                $mail->SMTPAuth = true;
                $mail->Username = 'etoiledelouangeuea01@gmail.com';  // ✅ VOTRE EMAIL
                $mail->Password = 'gkqhahtvfwvwwsyk';  // Mot de passe APP
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Destinataire(s)
                $mail->setFrom('etoiledelouangeuea01@gmail.com', 'Etoile de Louange UEA');  // ✅ VOTRE EMAIL
                $mail->addAddress('celestinrushigiradonnie@gmail.com');  // ✅ VOTRE EMAIL ADMIN

                // Contenu email
                $mail->isHTML(true);
                $mail->Subject = '🆕 Nouveau témoignage reçu !';
                $mail->Body = "
                    <h2>Nouveau témoignage en attente de validation</h2>
                    <p><strong>👤 Nom:</strong> $nom</p>
                    <p><strong>📧 Email:</strong> $email</p>
                    <p><strong>💬 Message:</strong><br>$message</p>
                    <p><strong>🖼️ Photo:</strong> <a href='http://votre-site.com/$upload_path'>Voir la photo</a></p>
                    <hr>
                    <p><em>À valider dans l'admin → admin/testimonials/</em></p>
                ";

                $mail->send();
                error_log("✅ Email notification envoyé pour $new_name");

            } catch (Exception $e) {
                error_log("❌ Email échoué: {$mail->ErrorInfo}");  // Log seulement
            }

            $_SESSION['toastr'] = ['type' => 'success', 'message' => '✅ Témoignage enregistré et notifié !'];

        } else {
            $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Enregistrement OK, mais échec de l\'upload de l\'image.'];
        }
        header("Location: index");  // ou index.php
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Echec de l\'enregistrement en base.'];
        header("Location: testimonials.php");
        exit;
    }
}


?>