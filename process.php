<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if (isset($_POST['accept'])) {
    // Handle accept operation
    $id = $_POST['id'];
    
    // Perform logic to update the database for acceptance

    // Send email notification using PHPMailer
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your@gmail.com'; // Your Gmail username
        $mail->Password = 'your-password'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('your@gmail.com', 'Your Name');
        $mail->addAddress('recipient@example.com', 'Recipient Name'); // Recipient email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Accepted Data Notification';
        $mail->Body = "Data with ID: $id has been accepted.";

        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo "Email sending failed: {$mail->ErrorInfo}";
    }
    
    // Other logic
}
?>
