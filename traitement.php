<?php
include 'inc/config.php';

// Charger les classes PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

if (isset($_POST['envoyer'])) {

    // 1. Récupération & petite sécurisation
    $nom     = htmlspecialchars(trim($_POST['nom']));
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $sujet   = htmlspecialchars(trim($_POST['sujet']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Insertion avec requête préparée
    $stmt = $con->prepare("INSERT INTO messages (nom, email, sujet, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nom, $email, $sujet, $message);
    $stmt->execute();

    // Récupérer l'id pour lier plus tard la réponse, si besoin
    $id_message = $stmt->insert_id;

    $stmt->close();
    $con->close();

    // 2. Préparation de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Debug (0 en production)
        $mail->SMTPDebug = SMTP::DEBUG_OFF;

        // Config SMTP Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'etoiledelouangeuea01@gmail.com';       // Gmail de la chorale
        $mail->Password   = 'gkqhahtvfwvwwsyk';         // mot de passe d’application
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // TLS
        $mail->Port       = 587;

        // 3. Infos d’expéditeur et destinataire
        $mail->setFrom('etoiledelouangeuea01@gmail.com', 'Site Chorale Etoile de Louange');
        $mail->addAddress('celestinrushigiradonnie@gmail.com', 'Responsable chorale');
        $mail->addReplyTo($email, $nom); // pour répondre directement à la personne

        // 4. Contenu du mail
        $mail->isHTML(false); // texte simple
        $mail->Subject = "Nouveau message du site chorale : ".$sujet;
        $body  = "Vous avez reçu un nouveau message depuis le site de la chorale.\n\n";
        $body .= "Nom : $nom\n";
        $body .= "Email : $email\n";
        $body .= "Sujet : $sujet\n\n";
        $body .= "Message :\n$message\n";

        $mail->Body = $body;

        // 5. Envoi
        $mail->send();
        $_SESSION['toastr'] = ['type' => 'success', 'message' => 'Message envoyé avec succès.'];
        header("Location: contact.php");
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
    }
} else {
    echo "Accès direct interdit.";
}


?>