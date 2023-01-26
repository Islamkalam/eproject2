<?php



if (isset($_POST['submit'])) {
    $otp = $_POST['otp'];
session_start();
if($_SESSION['reset_code']==$otp){

    header('location:forget_password.php');
}
}

if (isset($_SESSION['code'])) {
    header('location:login.php');
  
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
                <input type="text" name="otp" required="required">
                <span>Enter The OTP</span>
                <i></i>
            </div>
            <input type="submit" value="Next" name='submit'>
        </form>
    </div>

</body>

</html>