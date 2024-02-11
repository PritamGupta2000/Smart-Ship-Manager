<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && isset($_GET["id"]) && isset($_GET["email"])) {
    $conn = new mysqli("localhost", "root", "", "learn");
    
    if ($conn->connect_error) {
        die("Connection Failed");
    }

    $action = $_GET["action"];
    $id = $_GET["id"];
    $email = $_GET['email'];

    // Prepare the update statement
    if ($action === "accept") {
        $updateQuery = "UPDATE comdetails SET status = 'Accepted' WHERE license_number = ?";
    } elseif ($action === "reject") {
        $updateQuery = "UPDATE comdetails SET status = 'Rejected' WHERE license_number = ?";
    } else {
        echo "Invalid action.";
        exit;
    }

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        try {
            $mail = new PHPMailer(true);

            // Configure PHPMailer for sending emails
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'shipmanagement86@gmail.com';
            $mail->Password = 'ykdkpwoipibpctyc';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('shipmanagement86@gmail.com');
            $mail->addAddress($email);
            $mail->Subject = "Clerence Status";
            $mail->Body = "Your  Ship is Ready for Clearence";
            
            $mail->send();
            
            echo "Status updated and email sent successfully.";
        } catch (Exception $e) {
            echo "Email could not be sent. Error: " . $mail->ErrorInfo;
        }
    } else {
        echo "Error updating status: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}

?>
