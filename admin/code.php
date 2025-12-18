<?php
session_start();
include("conf/db.php");

if (isset($_POST["save_membre"])) {

    //$user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté

    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $postnom = mysqli_real_escape_string($con, $_POST['postnom']);
    $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $date_enregistrement = mysqli_real_escape_string($con, $_POST['date_enregistrement']);
    $date_anniv = mysqli_real_escape_string($con, $_POST['date_anniv']);
    $genre = mysqli_real_escape_string($con, $_POST['genre']);
    $fonction = mysqli_real_escape_string($con, $_POST['fonction']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $adress_origine = mysqli_real_escape_string($con, $_POST['adress_origine']);
    $adress_actuelle = mysqli_real_escape_string($con, $_POST['adress_actuelle']);
    $bios = mysqli_real_escape_string($con, $_POST['bios']);
    
    // Vérifier si un fichier a été envoyé
    if (empty($_FILES['photo']['name'])) {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Veuillez choisir une Photo'];
        header("Location: add-members.php");
        exit;
    }

    $image     = $_FILES['photo']['name'];
    $image_tmp = $_FILES['photo']['tmp_name'];
    $error     = $_FILES['photo']['error'];

    // Vérifier l’erreur d’upload
    if ($error !== UPLOAD_ERR_OK) {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Erreur lors de l\'upload de l\'image (code : '.$error.').'];
        header("Location: add-members.php");
        exit;
    }

    // Extension autorisée
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Format d\'image non valide.'];
        header("Location: add-members.php");
        exit;
    }

    // Dossier de destination
    $upload_dir = 'uploads/';

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Nouveau nom unique pour éviter les collisions
    $new_name = uniqid('img_').'.'.$file_extension;
    $upload_path = $upload_dir.$new_name;

    //Insertion dans la base de données
   $stmt = $con->prepare("INSERT INTO membres (nom,postnom,prenom,telephone,email,date_enregistrement,date_anniversaire,genre,fonction,role,adress_origine,adress_actuelle,bios,profile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssss", $nom, $postnom, $prenom, $telephone, $email, $date_enregistrement, $date_anniv, $genre, $fonction, $role, $adress_origine, $adress_actuelle, $bios, $new_name);
    if ($stmt->execute()) {

        // Si l’INSERT est OK, on déplace le fichier
        if (move_uploaded_file($image_tmp, $upload_path)) {
            $_SESSION['toastr'] = ['type' => 'success', 'message' => 'enregistré reussi avec succès.'];
        } else {
            $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Enregistrement OK, mais échec de l\'upload de l\'image.'];
        }
        header("Location: add-members.php");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Echec de d\enregistrement'];
        header("Location: add-members.php");
        exit;
    }
}

?>