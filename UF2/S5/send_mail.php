<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validación de campos
    if (empty($name)) {
        $errors['name'] = "El nom és obligatori.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Correu electrònic vàlid requerit.";
    }

    if (empty($message)) {
        $errors['message'] = "El missatge és obligatori.";
    }

    // Validación del archivo adjunto
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['attachment'];
        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];

        if ($file['size'] > 2 * 1024 * 1024) {
            $errors['attachment'] = "El fitxer no pot superar els 2 MB.";
        }

        if (!in_array($file['type'], $allowedTypes)) {
            $errors['attachment'] = "Tipus de fitxer no acceptat.";
        }
    }

    if (empty($errors)) {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tu_correo@example.com';  // Eliminar abans d'entregar
            $mail->Password = 'contrasenya';           // Eliminar abans d'entregar
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinatarios
            $mail->setFrom($email, $name);
            $mail->addAddress('destinatario@example.com');

            // Adjuntar archivo si existe
            if (isset($file)) {
                $mail->addAttachment($file['tmp_name'], $file['name']);
            }

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = "Missatge del formulari de contacte";
            $mail->Body    = nl2br($message);

            $mail->send();
            echo "<p>El missatge s'ha enviat correctament.</p>";
        } catch (Exception $e) {
            error_log(date('Y-m-d H:i:s') . " - Error: {$mail->ErrorInfo}\n", 3, 'error.log');
            echo "<p>Hi ha hagut un error en enviar el missatge.</p>";
        }
    } else {
        foreach ($errors as $field => $error) {
            echo "<p>Error en $field: $error</p>";
        }
    }
}
?>
