<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && isset($_GET["id"])) {
    $conn = new mysqli("localhost", "root", "", "learn");
    
    if ($conn->connect_error) {
        die("Connection Failed");
    }

    $action = $_GET["action"];
    $id = $_GET["id"];
    $email=$_GET['email'];

    if ($action === "accept") {
        // Prepare the update statement
        $updateQuery = "UPDATE comdetails SET status = 'Accepted' WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("i", $id); // "i" indicates an integer parameter
        if ($stmt->execute()) {
            $mail=new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail->Username='shipmanagement86@gmail.com';
            $mail->Password='ykdkpwoipibpctyc';
            $mail->SMTPSecure='ssl';
            $mail->Port=465;
            $mail->setFrom('shipmanagement86@gmail.com');
            $mail->addAddress($email);
            $mail->Subject="Primary Acceptence Mail";
            $mail->Body="After Checking all online documents Your Ship is Acceptence to Come the ship";
            $mail->send();







            echo "Status updated to Accepted.";
        } else {
            echo "Error updating status: " . $conn->error;
        }
        $stmt->close();
    } elseif ($action === "reject") {
        // Prepare the update statement
        $updateQuery = "UPDATE comdetails SET status = 'Rejected' WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("i", $id); // "i" indicates an integer parameter
        if ($stmt->execute()) {

            $mail=new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail->Username='shipmanagement86@gmail.com';
            $mail->Password='ykdkpwoipibpctyc';
            $mail->SMTPSecure='ssl';
            $mail->Port=465;
            $mail->setFrom('shipmanagement86@gmail.com');
            $mail->addAddress($email);
            $mail->Subject="Your  ";
            $mail->Body="Your User ";
            $mail->send();

            echo "Status updated to Rejected.";
        } else {
            echo "Error updating status: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Invalid action.";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}

?>
