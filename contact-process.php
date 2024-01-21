<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>

<?php

require 'path/to/PHPMailerAutoload.php'; // Make sure to include the PHPMailerAutoload.php file

if (isset($_POST['submit'])) {

    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    // SMTP Configuration
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server address
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'lankatourdriver@gmail.com'; // Your SMTP username
    $mail->Password = 'ocyj ulgo tspo xlkk'; // Your SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption; 'ssl' is also possible
    $mail->Port = 587; // TCP port to connect to

    // Set email parameters
    $to = 'minukadev404@gmail.com'; // Replace with your recipient email address
    $subject = 'New Customized Tour Request';

    // Build the email message
    $message = '';

    // ... (rest of your form data collection code)

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
            echo '<script>window.location.href = "thank_you.html";</script>';
        } else {
            echo "Email could not be sent. Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Email could not be sent. Error: " . $mail->ErrorInfo;
    }
}
?>
