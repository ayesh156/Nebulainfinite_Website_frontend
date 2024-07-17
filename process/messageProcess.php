<?php

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (!empty($_POST["e"])) {
    $name = $_POST["n"];
    $email = $_POST["e"];
    $message = $_POST["m"];

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ayeshchathuranga531@gmail.com';
        $mail->Password = 'hqhutzzfbpovirng';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($email, 'Admin Verification');
        $mail->addReplyTo($email, 'Admin Verification');
        $mail->addAddress("info@nebulainfinite.com");
        $mail->isHTML(true);
        $mail->Subject = 'Nebula infinite message';
        $bodyContent = '<h2 style="color:blue;">' . $name . '</h2>
        <h3 style="color:purple;">' . $email . '</h3>
        <p>'.$message.' </p>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo "Varification code sending failed";
        } else {
            echo "Success";
        }

    
} else {
    echo ("Email field should not be empty.");
}
