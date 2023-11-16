<?php
session_start();
include("connection.php");
include("functions.php");

$email=$_SESSION['user_email'];



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "phpmailer/src/Exception.php";
require "phpmailer/src/PHPMailer.php";
require "phpmailer/src/SMTP.php";

$mail = new PHPMailer(true);

$mail->isSMTP();


$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "webg333@gmail.com";
$mail->Password = "uftkhnqvpwefohcz";
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;



$mail->set('webg333@gmail.com');
$mail->addAddress($email);

$mail->isHTML(true); 

$mail->Subject = "Verification Code";
$code = random_num($lenght);
$user = $user_data["user_name"];
$mail->Body = "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Your Verification Code</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
        }
        .verification-code {
            font-size: 1.5em;
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Your Verification Code</h2>
    <p>Dear $user,</p>
    <p>Thank you for using EnMor. To complete the verification process, please use the following code:</p>
    <p class=\"verification-code\">$code</p>
    <p>If you didn't request this code, please ignore this email. Keep your account secure by not sharing this code with anyone.</p>
    <p>Best regards,<br>EnMor</p>
</body>
</html>

";
$mail->send();
$query = "UPDATE  users SET verification_code='$code' where email = '$email' ";
$query_run= mysqli_query($con,$query);
?>