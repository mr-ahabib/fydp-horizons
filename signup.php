<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $name = $_POST["name"];

    $emailCheck = $conn->prepare("SELECT COUNT(*) FROM `signup` WHERE `email` = ?");
    $emailCheck->bind_param("s", $email);
    $emailCheck->execute();
    $emailCheck->bind_result($emailCount);
    $emailCheck->fetch();
    $emailCheck->close();

    if ($emailCount > 0) {
        echo "<script>alert('Email already in use.');</script>";
    } else {
        $idCheck = $conn->prepare("SELECT COUNT(*) FROM `signup` WHERE `u_id` = ?");
        $idCheck->bind_param("i", $id);
        $idCheck->execute();
        $idCheck->bind_result($idCount);
        $idCheck->fetch();
        $idCheck->close();

        if ($idCount > 0) {
            echo "<script>alert('ID already in use.');</script>";
        } else {
            $verificationCode = mt_rand(100000, 999999); 

            $sql = "INSERT INTO `signup`(`name`,`u_id`, `email`, `password`, `verification_code`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $name, $id, $email, $password, $verificationCode);

            if ($stmt->execute()) {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'little.library261@gmail.com';
                $mail->Password = 'wuyomlqgwywhlzpy';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('little.library261@gmail.com');
                $mail->addAddress($email);
                $mail->Subject = "UIU FYDP HORIZON'S Verification Code";
                $mail->Body = "Dear, $name. Your verification code is: $verificationCode";
                $mail->send();

                echo "<script>alert('Registration successful. Check your email for the verification code.');</script>";
                echo "<script>window.location.href = 'verification.php?id=$id';</script>";
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        }
    }
}
?>
