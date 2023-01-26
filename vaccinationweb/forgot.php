<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


$conn = mysqli_connect('localhost', 'root', '', 'vaccination1');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $sql = "SELECT * FROM parents where email='$email'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

        $code = rand(1000, 9999);

        session_start();
        $_SESSION["code"] = 123;
        $_SESSION["reset_code"] = $code;
        $_SESSION["reset_id"] = $row["p-id"];

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'murtazaali3014@gmail.com';                     //SMTP username
            $mail->Password   = 'vhwhtnafwhsjomij';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('murtazaali3014@gmail.com', 'Get Vaccinated');
            $mail->addAddress($row['email']);     //Add a recipient


            //Attachments


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password Reset';
            $mail->Body    = 'This is the mail to reset your password <b>RESET!</b><br>' . $code;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';

            header('location:forget.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    else {
        echo "invalid email";
    }

} 





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>

<body>
    <div class="box">
        <form autocomplete="off" method="post">
            <h2>Forgot Password</h2>
            <div class="inputBox">
                <input type="text" name="email" required="required">
                <span>Email</span>
                <i></i>
            </div>
            <div class="links">
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </div>
            <input type="submit" value="Next" name='submit'>
        </form>
    </div>


</body>

</html>