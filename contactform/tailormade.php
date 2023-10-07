<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>

<?php

if (isset($_POST['submit'])) {



    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    // SMTP Configuration
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server address
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'ayodyakcc@gmail.com'; // Your SMTP username
    $mail->Password = 'ocyj ulgo tspo xlkk'; // Your SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption; 'ssl' is also possible
    $mail->Port = 587; // TCP port to connect to






    // Set email parameters
    $to = 'ayodyakcc@gmail.com'; // Replace with your recipient email address
    $subject = 'New Customized Tour Request';

    // Build the email message
    $message = '';

    // Collect and append form data to the message

    // Travel method
    $message .= '<p><b>Wie wollen Sie reisen?</b>: ' . $_POST['travel-method'] . '</p>';

    // Accommodation type
    $message .= '<p><b>Welche Art der Unterkunft wünschen Sie?</b>: ' . $_POST['accommodation-type'] . '</p>';

    // Planning progress
    $message .= '<p><b>Wie weit sind Sie mit Ihrer Reiseplanung?</b>: ' . $_POST['planning-progress'] . '</p>';

    // Languages
    if (!empty($_POST['language'])) {
        $message .= '<p><b>Sprachen:</b></p>';
        foreach ($_POST['language'] as $value) {
            $message .= '<p>' . $value . '</p>';
        }
    }

    // Other language
    if (!empty($_POST['other-language'])) {
        $message .= '<p><b>Andere Sprache:</b>: ' . $_POST['other-language'] . '</p>';
    }

    // Vacation type
    if (!empty($_POST['vacation-type'])) {
        $message .= '<p><b>Art des Urlaubs, den ich suche:</b></p>';
        foreach ($_POST['vacation-type'] as $value) {
            $message .= '<p>' . $value . '</p>';
        }
    }

    // Additional services
    if (!empty($_POST['additional'])) {
        $message .= '<p><b>Zusätzliche Dienstleistungen, die ich benötige:</b></p>';
        foreach ($_POST['additional'] as $value) {
            $message .= '<p>' . $value . '</p>';
        }
    }

    // User message
    if (!empty($_POST['user-message'])) {
        $message .= '<p><b>Meine zusätzlichen Anforderungen:</b></p>';
        $message .= '<p>' . $_POST['user-message'] . '</p>';
    }

    // Adults
    $message .= '<p><b>Erwachsene:</b>: ' . $_POST['adults'] . '</p>';

    // Children
    $message .= '<p><b>Kinder:</b>: ' . $_POST['children'] . '</p>';

    // Start date
    $message .= '<p><b>Startdatum:</b>: ' . $_POST['start'] . '</p>';

    // End date
    $message .= '<p><b>Enddatum:</b>: ' . $_POST['end'] . '</p>';

    // Flight number
    $message .= '<p><b>Flugnummer:</b>: ' . $_POST['flight'] . '</p>';

    // Name
    $message .= '<p><b>Name:</b>: ' . $_POST['name'] . '</p>';

    // Email
    $message .= '<p><b>Email:</b>: ' . $_POST['email'] . '</p>';

    // Set the email body and content type
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Add recipient and sender email addresses
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress($to);

    try {
        // Send the email
        if ($mail->send()) {
            header("Location: /thank-you");
        } else {
            echo "Email could not be sent. Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Email could not be sent. Error: " . $mail->ErrorInfo;
    }
}
?>