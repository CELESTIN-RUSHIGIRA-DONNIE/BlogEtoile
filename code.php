<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1);
session_start();
include("admin/conf/db.php");

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
} 

else if (isset($_POST['login'])) {

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
            }
            else {
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
}

?>